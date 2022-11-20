<?php
require "ServerConnection.php";
require "ConfirmUserDeletion.php";
?>

<html>

<head>
	<script src=
		"https://code.jquery.com/jquery-3.2.1.min.js">
	</script>

	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		type="text/javascript">
	</script>
	
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
</head>

<!-- Remember that these feilds get keyed off the id of the input -->
<body>
	<form action="ConfirmUserDeletion.php" method="POST">

		<div class="container">
			<h1>Modify User</h1>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label>User Identifying ID</label>
						<input type='text' name="PII_ID"
							id='PII_ID' class='form-control'
							placeholder='Enter PII ID'
							onkeyup="GetDetail(this.value)" value="">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<label> First name </label>
						<input class='form-control' type="text" name="FirstName" id="FirstName" placeholder="First Name" size="15"  value="" readonly />
						<label> Lastname: </label>
						<br>
						<input class='form-control' type="text" name="LastName" id="LastName" placeholder="Last Name" size="15"  value="" readonly />
						<br>
						<br>
						<br>
						<label> Social Security Number: </label>
						<input class='form-control' type="text" name="SocialSecurity" id="SocialSecurity" placeholder="Expected pattern is ###-##-####" size=" 15" value="" readonly/>
						<br>
						<br>
						<label> Username: </label>
						<input class='form-control' type="text" name="UserName" id="UserName" placeholder="Username" size="15" value="" readonly />
						<br>
						<br>
						<label> Role : </label>
						<select name="Role" id="Role">
							<option value="Employee" name="Role">Employee</option>
							<option value="Site Admin" name="Role">Site Admin</option>
							<option value="HR" name="Role">HR</option>
							<option value="Manager" name="Role">Manager</option>
						</select>
						<br>
						<br>
						<input type="submit" class="registerbtn" name="UpdateUser" value="Delete User" >
					</div>
				</div>
			</div>
		</div>
	</form>
	<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("FirstName").value = "";
				document.getElementById("LastName").value = "";
				document.getElementById("SocialSecurity").value = "";
				document.getElementById("UserName").value = "";
				document.getElementById("Role").value = "";
				return;
			}
			else {

				// Creates a new XMLHttpRequest object
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function () {

					// Defines a function to be called when
					// the readyState property changes
					if (this.readyState == 4 &&
							this.status == 200) {
						
						// Typical action to be performed
						// when the document is ready
						var myObj = JSON.parse(this.responseText);

						// Returns the response data as a
						// string and store this array in
						// a variable assign the value
						// received to all input fields
						
						document.getElementById("FirstName").value = myObj[0];
						document.getElementById("LastName").value = myObj[1];
						document.getElementById("SocialSecurity").value = myObj[2];
						document.getElementById("UserName").value = myObj[3];
						document.getElementById("Role").value = myObj[4];
					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "DeleteUserOutput.php?PII_ID=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>
</body>

</html>
