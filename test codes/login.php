<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>	
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="login.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>


<!-- testing pullUserInfo.php -->

if (!empty($PiiID)){

// Writing query to get the session users ID

$sql = "SELECT CreatorID FROM login JOIN siteadmin ON login.CreatorID = siteadmin.userID
WHERE login.UserName = '$creator'";

$result_Creator = mysqli_query($db, $sql_Creator);

	if(!$result_Creator){
	die("Invalid query: " .mysqli_error());
}

if(!empty($result_Creator)){
	$Creator_ID = (int)$result_Creator;
}
else{
	echo 'Please enter a valid PII_ID';
}


// Write query and get result

	$sql = "INSERT INTO Login (CreatorID,PII_ID,UserName,Password,Role)
	VALUES ($Creator_ID, $sanitized_PiiID, '$sanitized_UserName', '$sanitized_pass', '$sanitized_Role' )";
	
	$result = mysqli_query($db, $sql);



}

if($result){
$_SESSION['Status'] = "You are now modifying User: ";
header("Location: ModifyUsers.php");
}
else {
$_SESSION['Error'] = "User Lookup Failed! Try Again";
header("Location: SearchModifyUser.php");
}
// fetch needed results
$NewUser = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($db);
}
