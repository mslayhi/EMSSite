<?php
include_once 'ServerConnection.php';
error_reporting (E_ALL ^ E_NOTICE);
{       
     $TimeOffType =  $_REQUEST['TimeOffType'];
     $RequestReason = $_REQUEST['RequestReason'];
    $startDate = $_REQUEST['startDate'];
    $endDate = $_REQUEST['endDate'];
    $OtherReason = $_REQUEST['OtherReason'];



        $sql = "INSERT INTO TimeOffRequest (PII_ID,TimeOffType, RequestReason, startDate, endDate, OtherReason) VALUES (NULL,'$TimeOffType','$RequestReason',
         '$startDate', '$endDate','$OtherReason') ";		 
		
		   
        if(mysqli_query($db, $sql)){
            echo "<h3> Your request has been submitted successfully. </h3>";       
 

        } else{
            echo "ERROR: insert failed $sql. "
                . mysqli_error($db);
        }
         
        // Close connection
        mysqli_close($db);
        
}
?>
