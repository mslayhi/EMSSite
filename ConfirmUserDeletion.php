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
      
      }

      if($result){
         $_SESSION['Status'] = "Account Deleted Successfully!!";
         header("Location: SearchDeleteUser.php");
       }
       else {
           $_SESSION['Error'] = "Delete Failed!!! Please Try again.";
           header("Location: SearchDeleteUser.php");
       }

     mysqli_close($db);
}
?>

