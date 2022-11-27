<?php
include_once 'ServerConnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{    
 
     $Communication = trim($_POST['Communication']);


     $sanitized_Communication = mysqli_real_escape_string($db, $Communication);


    if (isset($sanitized_Communication)) {
      
         $sql = "INSERT INTO Communication (Communication) VALUES ('$sanitized_Communication')";
		 
		
		 $result = mysqli_query($db, $sql);
		}
    if (empty($sanitized_Communication)){
      
      $_SESSION['status'] = "Please Enter ann";
      header("Location: CompanyComm.php");
    }

    if($result){
        $_SESSION['status'] = "Your Announcement is Now Displayed Company-Wide";
        header("Location: CompanyComm.php");
    }
    else {
        $_SESSION['status'] = "Failed to submit your ann. Try again!.";
        header("Location: CompanyComm.php");
    }
 
        $NewCommunication = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_close($db);
}
?>
