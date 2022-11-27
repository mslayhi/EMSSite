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
