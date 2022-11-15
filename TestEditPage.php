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
        <label> First name </label>
        <input class='form-control' type="text" name="FirstName" id="FirstName" placeholder="Firstname" size="15" onkeyup="GetDetail(this.value)" value="" required />
        <label> Lastname: </label>
        <br>
        <input class='form-control' type="text" name="LastName" id="LastName" placeholder="Lastname" size="15" onkeyup="GetDetail(this.value)" value="" required />
        <label> DOB: </label>
        <input class='form-control' type="date" name="DOB" id="DOB" placeholder="Birth Date" size="15" onkeyup="GetDetail(this.value)" value="" required />
        <br>
        <br>
        <br>
        <label> Social Security Number: </label>
        <input class='form-control' type="text" name="SocialSecurity" id="SocialSecurity" placeholder="Expected pattern is ###-##-####" size=" 15" onkeyup="GetDetail(this.value)" value="" required/>
        <div> Phone : </label>
          <input class='form-control' type="tel" name="TelNum" id="TelNum" placeholder="phone #" size="10" onkeyup="GetDetail(this.value)" value="" required/>
          <br>
          <br>
          <label for="address">Current Address :
          </label>
          <textarea class='form-control' cols="80" name="Address" id="Address" rows="5" placeholder="Current Address" onkeyup="GetDetail(this.value)" value="" required></textarea>
          <label for="email">
            <b>Email</b>
          </label>
          <input class='form-control' type="email" placeholder="Enter Email" name="Email" id="Email" required>
        <!-- <label> Username: </label>
        <input class='form-control' type="text" name="UserName" id="UserName" placeholder="Username" size="15" onkeyup="GetDetail(this.value)" value="" required />
        <div>
        <div>
          <label> Role : </label>
          <select name="Role">
            <option value="Employee" name="Role" id="Role">Employee</option>
            <option value="Site Admin" name="Role" id="Role">Site Admin</option>
            <option value="HR" name="Role" id="Role">HR</option>
            <option value="Manager" name="Role" id="Role">Manager</option>
          </select>
        </div> -->
        <br>
          <input type="submit" class="registerbtn" name="UpdateUser" value="Update User Information" >

		<!-- <div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>First Name:</label>
					<input type="text" name="first_name"
						id="first_name" class="form-control"
						placeholder='First Name'
						value="">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Last Name:</label>
					<input type="text" name="last_name"
						id="last_name" class="form-control"
						placeholder='Last Name'
						value="">
				</div>
			</div>
		</div> -->
	</div>
	<script>

		// onkeyup event will occur when the user
		// release the key and calls the function
		// assigned to this event
		function GetDetail(str) {
			if (str.length == 0) {
				document.getElementById("FirstName").value = "";
				document.getElementById("LastName").value = "";
				document.getElementById("DOB").value = "";
				document.getElementById("SocialSecurity").value = "";
				document.getElementById("TelNum").value = "";
				document.getElementById("Address").value = "";
				document.getElementById("Email").value = "";
				// document.getElementById("UserName").value = "";
				// document.getElementById("Role").value = "";
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
						// received to first name input field
						
						document.getElementById
							("FirstName").value = myObj[0];
							("$LastName").value = myObj[1];
							("$DOB").value = myObj[2];
							("SocialSecurity").value = myObj[3];
							("TelNum").value = myObj[4];
							("Address").value = myObj[5];
							("Email").value = myObj[6];
						
						// Assign the value received to
						// last name input field
						// document.getElementById(
						// 	"last_name").value = myObj[1];
                        // document.getElementById(
                        //     "DOB").value = myObj[2];
                        // document.getElementById(
                        //     "SocialSecurity").value = myObj[3];
                        // document.getElementById(
                        //     "TelNum").value = myObj[4];
                        // document.getElementById(
                        //     "Address").value = myObj[5];
                        // document.getElementById(
                        //     "Email").value = myObj[6];
                        // document.getElementById(
                        //     "UserName").value = myObj[7];
                        // document.getElementById(
                        //     "Role").value = myObj[8];

					}
				};

				// xhttp.open("GET", "filename", true);
				xmlhttp.open("GET", "TestEditOutput.php?PII_ID=" + str, true);
				
				// Sends the request to the server
				xmlhttp.send();
			}
		}
	</script>
</body>

</html>
