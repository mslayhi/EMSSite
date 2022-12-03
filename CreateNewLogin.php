<?php
include_once 'ServerConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{    
     $UserName = trim($_POST['UserName']);
     $pass = trim($_POST['Password']);
     $CPass = trim($_POST['CPassword']);
     $Role = trim($_POST['Role']);
     $PiiID = trim($_POST['PII_ID']);
     $creator = $_SESSION['username'];
     $Creator_ID = "";

     

     $sanitized_UserName = mysqli_real_escape_string($db, $UserName);

     $sanitized_pass = mysqli_real_escape_string($db, $pass);

     $sanitized_Role = mysqli_real_escape_string($db, $Role);

     $sanitized_PiiID = mysqli_real_escape_string($db, $PiiID);


     if ($sanitized_pass == $CPass){

         // Writing query to get the session users ID

         $sql_Creator = "SELECT CreatorID FROM login JOIN siteadmin ON login.CreatorID = siteadmin.userID
         WHERE login.UserName = '$creator'";

         $result_Creator = mysqli_query($db, $sql_Creator);

         if(!$result_Creator){
            die("Invalid query: " .mysqli_error());
            }

            if(!empty($result_Creator)){
            $Creator_ID = (int)$result_Creator;
            }
            else{
                echo 'Admin Does not exist, Please log out and back in.';
            }


            // Write query and get result

            $sql = "INSERT INTO Login (CreatorID,PII_ID,UserName,Password,Role)
            VALUES ($Creator_ID, $sanitized_PiiID, '$sanitized_UserName', '$sanitized_pass', '$sanitized_Role' )";
            
            $result = mysqli_query($db, $sql);
      }
      else{
        $_SESSION['Error'] ="Your Passwords do not match!! Please try again";
        header("Location: NewLogin.php");
    }
    if($result){
        $_SESSION['Status'] = "New Account Login Created Successfully!!";
        header("Location: NewLogin.php");
    }
    else {
        $error = "Login Creation Failed!!! Please Try again.";
        header("Location: NewLogin.php");
    }
        // fetch needed results
        $NewUser = mysqli_fetch_all($result, MYSQLI_ASSOC);

     mysqli_close($db);
}
?>

