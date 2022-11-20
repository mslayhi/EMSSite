<?php
// Database connection
include_once 'ServerConnection.php';

// Get the user id
$PII_ID = $_REQUEST['PII_ID'];


if ($PII_ID !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($db, "SELECT  FirstName, LastName, SSN
          FROM personal_identifying_info WHERE PII_ID ='$PII_ID'");

	$row = mysqli_fetch_array($query);

	$query2 = mysqli_query($db, "SELECT  UserName, Role FROM login WHERE PII_ID ='$PII_ID'");

	$row2 = mysqli_fetch_array($query2);

    if ($query2 !== ""){
        $UserName = $row2["UserName"];
        $Role = $row2["Role"];
    }
    else{
        $UserName = "";
        $Role = "";
    }
	

	// Get the Information 
	$FirstName = $row["FirstName"];
	$LastName = $row["LastName"];
	$SocialSecurity = $row["SSN"];
}

// Store it in a array
$result = array("$FirstName", "$LastName", "$SocialSecurity", "$UserName","$Role");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
