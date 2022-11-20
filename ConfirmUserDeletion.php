<?php
include_once 'ServerConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{   
    $PiiID = trim($_POST['PII_ID']);
     

     if ($PiiID !== ""){

        // Write query and get result

        $sql = "DELETE FROM Personal_Identifying_Info 
                WHERE PII_ID = $PiiID ";

        $result = mysqli_query($db, $sql);


        // $sql1 = "UPDATE Personal_Identifying_Info 
        // SET FirstName = '$sanitized_FirstName' ,LastName = '$sanitized_LastName',DateOfBirth = '$sanitized_DOB',SSN = '$sanitized_SSN',Address = '$sanitized_Address',PhoneNo = '$sanitized_TelNum',Email = '$sanitized_email'
        // WHERE PII_ID = '$PiiID' ";

        // $result1 = mysqli_query($db, $sql1);

        // Write query and get result
        // $sql2 = "SELECT PII_ID FROM Personal_Identifying_Info WHERE SSN = $SSN ";

        // $result2 = mysqli_query($db, $sql2);
   
      
      
      }

      if($result){
         $_SESSION['Status'] = "Account Deleted Successfully!!";
         header("Location: SearchDeleteUser.php");
       }
       else {
           $error = "Delete Failed!!! Please Try again.";
           header("Location: SearchDeleteUser.php");
       }

     mysqli_close($db);
}
?>

