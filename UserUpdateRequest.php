<?php
include_once 'ServerConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{   
    $FirstName = trim($_POST['FirstName']);
    $LastName = trim($_POST['LastName']);
    $DOB = trim($_POST['DOB']);
    $TelNum = trim($_POST['TelNum']);
    $email = trim($_POST['Email']);
    $Address = trim($_POST['Address']);
    $SSN = trim($_POST['SocialSecurity']);
    $pass = trim($_POST['Password']);
    $Role = trim($_POST['Role']);
    $PiiID = trim($_POST['PII_ID']);
    $creator = $_SESSION['username'];
    $Creator_ID = "";     
    $UserName = trim($_POST['UserName']);

     

    $sanitized_FirstName = mysqli_real_escape_string($db, $FirstName);
    $sanitized_LastName = mysqli_real_escape_string($db, $LastName);
    $sanitized_DOB = mysqli_real_escape_string($db, $DOB);
    $sanitized_TelNum = mysqli_real_escape_string($db, $TelNum);
    $sanitized_email = mysqli_real_escape_string($db, $email);
    $sanitized_Address = mysqli_real_escape_string($db, $Address);
    $sanitized_SSN = mysqli_real_escape_string($db, $SSN);
    $sanitized_UserName = mysqli_real_escape_string($db, $UserName);
    $sanitized_pass = mysqli_real_escape_string($db, $pass);
    $sanitized_Role = mysqli_real_escape_string($db, $Role);
    $sanitized_PiiID = mysqli_real_escape_string($db, $PiiID);


     if ($sanitized_PiiID == $PiiID){

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

        $sql = "UPDATE Login 
        SET CreatorID = '$Creator_ID', PII_ID = '$sanitized_PiiID', UserName = '$sanitized_UserName',Password = '$sanitized_pass',Role = '$sanitized_Role'
        WHERE PII_ID = '$PiiID' ";

        $result = mysqli_query($db, $sql);


        $sql1 = "UPDATE Personal_Identifying_Info 
        SET FirstName = '$sanitized_FirstName' ,LastName = '$sanitized_LastName',DateOfBirth = '$sanitized_DOB',SSN = '$sanitized_SSN',Address = '$sanitized_Address',PhoneNo = '$sanitized_TelNum',Email = '$sanitized_email'
        WHERE PII_ID = '$PiiID' ";

        $result1 = mysqli_query($db, $sql1);

        // Write query and get result
        $sql2 = "SELECT PII_ID FROM Personal_Identifying_Info WHERE SSN = $SSN ";

        $result2 = mysqli_query($db, $sql2);
   
      
      
      }

      else{
         echo '<script>alert("Your Passwords do not match!! Please try again")</script>';
      }
      if($result){
         $_SESSION['Status'] = "Account Updated Successfully!!";
         header("Location: TestEditPage.php");
       }
       else {
           $error = "Update Failed!!! Please Try again.";
           header("Location: TestEditPage.php");
       }
         // fetch needed results
         $NewUser = mysqli_fetch_all($result, MYSQLI_ASSOC);

     mysqli_close($db);
}
?>

