<?php
include_once 'ServerConnection.php';
include 'TimeRequest.php';
error_reporting (E_ALL ^ E_NOTICE);

//define and initialize PiiID variable to zero.
$PiiID = 0; 
//capture username from the session of whoever has logged in
$username = $_SESSION['username'];
//capture timeoff type, request reason, start date,
//end date, and other reson from the input form of TimeRequest.php file.
$TimeOffType =  $_REQUEST['TimeOffType'];
$RequestReason = $_REQUEST['RequestReason'];
$startDate = $_REQUEST['startDate'];
$endDate = $_REQUEST['endDate'];
$OtherReason = $_REQUEST['OtherReason'];

if($RequestReason == 'other'){
    $RequestReason = $OtherReason;
}


//query the database table for piiID of whoever has logged into the system.
$sql_get_piiID = "SELECT PII_ID FROM Login WHERE username = '$username';";
$result_get_piiID = mysqli_query($db, $sql_get_piiID);

if(!$result_get_piiID){
    die("Invalid query: ".mysqli_error());
}
//assigned queried PII_ID to this variable and convert it to an integer
$PiiID = (int) $result_get_piiID->fetch_assoc()['PII_ID'];

//check if any requests exist in TimeOffRequest table with pending status.
$sql_check_piiID = "SELECT PII_ID FROM TimeOffRequest WHERE PII_ID = $PiiID AND Status = 'pending';";
$result_check_piiID = mysqli_query($db, $sql_check_piiID);

if(!$result_check_piiID){
    die("Invalid query: ".mysqli_error());
}
//If no data with specified PII_ID and a pending status, insert data into TimeOffRequest table.
if ($result_check_piiID->fetch_assoc() == NULL){
    $sql_insert = "INSERT INTO TimeOffRequest (PII_ID, TimeOffType, RequestReason, startDate, endDate) VALUES ($PiiID, '$TimeOffType','$RequestReason',
    '$startDate', '$endDate'); ";		 
  
    if(mysqli_query($db, $sql_insert)){
        echo "<h3 style = color:green> Your request has been submitted successfully. </h3>"; 
            
    } else{
        echo "ERROR: insert failed $sql_insert. "
            . mysqli_error($db);
    }
}else{
    echo "<h3 style = color:red> Your request cannot be processed. You have a pending status!";
}

    
// Close connection
mysqli_close($db);

?>
