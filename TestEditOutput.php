<?php
// Database connection
include_once 'ServerConnection.php';

// Get the user id
$PII_ID = $_REQUEST['PII_ID'];


if ($PII_ID !== "") {
	
	// Get corresponding first name and
	// last name for that user id	
	$query = mysqli_query($db, "SELECT  FirstName, LastName, DateOfBirth, SSN, 
        Address, PhoneNo, Email  FROM personal_identifying_info WHERE PII_ID ='$PII_ID'");

	$row = mysqli_fetch_array($query);

	$query2 = mysqli_query($db, "SELECT  UserName, Password, Role FROM login WHERE PII_ID ='$PII_ID'");

	$row2 = mysqli_fetch_array($query2);
	

	// Get the Information 
	$FirstName = $row["FirstName"];
	$LastName = $row["LastName"];
	$DOB = $row["DateOfBirth"];
	$SocialSecurity = $row["SSN"];
	$TelNum = $row["Address"];
	$Address = $row["PhoneNo"];
	$Email = $row["Email"];
	$UserName = $row2["UserName"];
	$Password = $row2["Password"];
	$Role = $row2["Role"];
}

// Store it in a array
$result = array("$FirstName", "$LastName", "$DOB", "$SocialSecurity", "$TelNum", "$Address", "$Email", "$UserName", "$Password", "$Role");

// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>
