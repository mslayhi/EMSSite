<?php
// // Include config file
// require_once "ServerConnection.php";
// session_start();
// include ("ServerConnection.php");
// // initializing variables
// // $username = "";
// // $password = "";
// // $errors = array();
// $username = $password = "";
// $username_err = $password_err = $login_err = "";
// // LOGIN USER
// if (isset($_POST['signin-button'])) {
//     $username = mysqli_real_escape_string($db, $_POST['username']);
//     $password = mysqli_real_escape_string($db, $_POST['password']);
  
//     if (empty($username)) {
//         array_push($username_err = "Username is required");
//     }
//     if (empty($password)) {
//         array_push($password_err = "Password is required");
//     }
  
//     if(empty($username_err) && empty($password_err)) {
//         $password = md5($password);
//         $query = "SELECT * FROM employee WHERE username = '$username' AND password='$password'";
//         $results = mysqli_query($db, $query);
//         if (mysqli_num_rows($results) == 1) {
//           $_SESSION['username'] = $username;
//           $_SESSION['success'] = "You are now logged in";
//           header("location: landing.php");
//         }else {
//             array_push($errors, "Wrong username or password");
//         }
//     }
//   }
  
?>

<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to their profile page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: landing.php");
    exit;
}
// Include config file
require_once "ServerConnection.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['signin-button'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        // Check if username is empty
        if(empty(trim($_POST[$username]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST[$username]);
        }
        // Check if password is empty
        if(empty(trim($_POST[$password]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST[$password]);
        }
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            // Prepare a select statement
            $sql = "SELECT UserID, UserName FROM employee WHERE UserName = ? AND Password = ?";
            if($stmt = mysqli_prepare($db, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_password);
    
                // Set parameters
                $param_username = $username;
                $param_password = $password;
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    // Check if username$username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $UserID, $username);
                        if(mysqli_stmt_fetch($stmt)){
                            //if(password_verify($password)){
                                // Password is correct, so start a new session
                                session_start();
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["UserID"] = $UserID;
                                $_SESSION["username"] = $username;                            
                                // Redirect user to welcome page
                                header("location: landing.php");
                            // } else{
                            //     // Password is not valid, display a generic error message
                            //     $login_err = "Invalid username$username or password.";
                            // }
                        }
                    } else{
                        // username doesn't exist, display a generic error message
                        $login_err = "Invalid username or password.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
    }
}


?>
<!-- below code is for time request approval/dny -->
while($row = $result->fetch_assoc()){
                    $id = $row['ID'];
                    // echo 'The ID of for this row is: '.$row['ID'];
                    echo "<tr class = 'table-row'>
                    <td class = 'table-data'> $row[ID] </td>
                    <td class = 'table-data'> $row[Employee] </td>
                    <td class = 'table-data'> $row[TimeOffType] </td>
                    <td class = 'table-data'> $row[RequestReason] </td>
                    <td class = 'table-data'> $row[StartDate] </td>
                    <td class = 'table-data'> $row[EndDate] </td>
                    <td class = 'table-data'> $row[Status] </td>
                    <td class = 'table-data'>
                      <form action = 'ApproveTimeRequest.php' method = 'POST' >
                        <input type='submit' Value='Approve' name ='Approve' href = 'ApproveTimeRequest.php?id = $id' class = 'btn btn-primary btn-sm' >
                        <input type='submit' Value='Deny' name ='Deny' href = 'ApproveTimeRequest.php?id = $id' class = 'btn btn-danger btn-sm' >
                      </form>
                    </td>
                </tr>";
                }                
                ?>


<!-- this is the action for the approve./deny -->
<?php
    include 'ProcessTimeRequest.php';
    if(isset($id) && isset($_POST['Approve'])){
        // $id = $_POST["id"];
        // echo 'The captured id is:'.$id;
        $sql = "UPDATE TimeOffRequest SET Status = 'Approved' WHERE TimeOffRequest.ID = $id;";

        $result = mysqli_query($db, $sql);

        if(!$result){
            die("Invalid query: " .mysqli_error());
        }
    }
    if(isset($id) && isset($_POST['Deny'])){
        $sql = "UPDATE TimeOffRequest SET Status = 'Deny' WHERE TimeOffRequest.ID = $id;";

        $result = mysqli_query($db, $sql);

        if(!$result){
            die("Invalid query: " .mysqli_error());
        }

    }

?>
<script type='text/javascript'>
  
    // JavaScript anonymous function
    (() => {
        if (window.localStorage) {

            // If there is no item as 'reload'
            // in localstorage then create one &
            // reload the page
            if (!localStorage.getItem('reload')) {
                localStorage['reload'] = true;
                window.location.reload();
            } else {

                // If there exists a 'reload' item
                // then clear the 'reload' item in
                // local storage
                localStorage.removeItem('reload');
            }
        }
    })(); // Calling anonymous function here only
</script>



<!-- style -->
*{
  box-sizing: border-box;
}
body{
margin: 0;
height: 100vh;
width: 100vw;
overflow: hidden;
font-family: "Lato", sans-serif;
font-weight: 700;
display: flex;
align-items: center;
justify-content: center;
color:#555;
background-color: #ecf0f3;
}
.login-div {
    width: 430px;
    height: 700px;
    padding: 60px 35px 35px 35px;
    border-radius: 40px;
    background-color: #ecf0f3;
   box-shadow: 13px 13px 20px #cbced1,
   -13px -13px 20px #fff;

}
.title{
text-align: center;
font-size: 15px;
padding-top: 24px;
letter-spacing: 0.5px;
}
.sub-title{
    text-align: center;
    font-size: 15px;
    padding-top: 7px;
    letter-spacing: 0.5px;
}
.feilds{
width: 100%;
padding: 75px 5px 5px 5px;

}
.feilds input{
border:none;
outline:none;
background: none;
font-size: 18px;
color:#555;
padding: 20px 10px 20px 5px;
}
.username,
.password{
    margin-bottom: 30px;
    border-radius: 25px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.feilds svg{
height: 22px;
margin:0 10px -3px 25px
}
.signin-button{
    outline: none;
    border: none;
    cursor: pointer;
    width: 100%;
    height: 60px;
    border-radius: 30px;
    font-size: 20px;
    font-weight: 700;
    font-family: "Lato", sans-serif;
    text-align: center;
    background-color: #02c8db;
    box-shadow: 3px 3px 8px #b1b1b1,
    -3px -3px 8px;
    transition: all 0.5s;
}
.signin-button:hover{
    background-color: #50e5b9;
}
.signin-button:active{
    background-color: #88ef9e;
}
.signout-button {
  position: absolute;
  top: 9px;
  right: 18px;
  font-size: 15px;
  background-color: #0066A2;
  border-radius: 4px;
}
.signout-button:hover {
  background-color: #ff8c00;
}
.signout-button:active {
  background-color: #ff4500;
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*{
    margin: 0;
    padding:0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}
section{
    padding: relative;
    width: 100%;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    background-color: #f1d1bc;
}
/* header{
    position: relative;
    top: 0;
    width: 100%;
    padding: 30px 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
header.logo{
position: relative;
top:0;
color: #000;
font-size: 30px;
text-decoration: none;
text-transform: uppercase;
font-weight: 800;
letter-spacing: 1px;
}
header.navigation a{
    color:#000;
    text-decoration: none;
    font-weight: 500;
    letter-spacing: 1px;
    padding: 2px 15px;
    border-radius: 20px;
    transition: 0.3s;
}
header .navigation a:not(:last-child){
    margin-right: 30px;
}
header .navigation a:hover{
    background:#d8bca9;
} */
.content{
  /* position: relative;
  min-height: 100vh; */
  max-width: 650px;
  margin: 60px 100px;
}

/* .content.info{
  padding-top: 2.5rem;
  padding-bottom: 2.5rem;
} */
/* .content .info h2{
    color:#DEB887;
    font-size: 55px;
    text-transform: uppercase;
    font-weight: 800;
    letter-spacing: 2px;
    line-height: 60px;
    margin-bottom: 30px;
}
.content .info p{
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 40px;
}
label{
    display: none;
}
#check{
z-index:3;
display: none;
}

header.ems{
    position:absolute;
    bottom: -6px;
}
.content .info h2{
    font-size: 45px;
    font-weight: 600;
}
.content .info p{
    font-size: 14px;
}
}
* {    
    box-sizing: border-box;    
  }    
  input[type=text], select, textarea {    
    width: 100%;    
    padding: 12px;    
    border: 1px solid rgb(70, 68, 68);    
    border-radius: 4px;    
    resize: vertical;
    border-top-style: hidden;
    border-right-style: hidden;
    border-left-style: hidden;
    border-bottom-style: hidden;    
  }    
  input[type=empid], select, textarea {    
    width: 100%;    
    padding: 12px;    
    border: 1px solid rgb(70, 68, 68);    
    border-radius: 4px;    
    resize: vertical;    
  }    
  label {    
    padding: 12px 12px 12px 0;    
    display: inline-block;    
  }    
  input[type=submit] {    
   background-color: #0066A2;  
    color: white;    
    padding: 12px 20px;    
    border: none;    
    border-radius: 4px;    
    cursor: pointer;    
    float: right;    
  }    
  input[type=submit]:hover {    
    background-color: #45a049;    
  }    
  .container {    
    border-radius: 5px;    
    background-color: #f2f2f2;    
    padding: 20px;    
  }    
  .col-25 {    
    float: left;    
    width: 25%;    
    margin-top: 6px;    
  }    
  .col-75 {    
    float: left;    
    width: 75%;    
    margin-top: 6px;    
  }    
  /* Clear floats after the columns */    
  .row:after {    
    content: "";    
    display: table;    
    clear: both;    
  }

  .error{
    text-align:center;
    font-weight: bold;
    font-size:medium;
    color: crimson;
  }

  .user-input{
    outline: none;
  }

  h4{
    text-align:center;
    font-weight: bold;
    font-size:medium;
    color:#45a049;
  }

  
/* .footer {
position: absolute;
bottom: 0;
width: 100%;
height: 2.5rem;
} */
/* .content.header{
  position: absolute;
  top: 0;
  width: 100%;
  height: 2.5rem;
} */
