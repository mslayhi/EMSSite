<?php
include_once 'ServerConnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{    
     $FeedBack = trim($_POST['FeedBack']);
     $username = $_SESSION['username'];
     $ProviderID = 0;

     //get PII_ID of whoever has logged into the system
     $sql_get_PiiID = "SELECT PII_ID FROM Login WHERE UserName = '$username';";
     $result_get_PiiID = mysqli_query($db, $sql_get_PiiID);
     if(!$result_get_PiiID){
      die("Invalid query: ".mysqli_error());
    }
    $row_get_PiiID = $result_get_PiiID->fetch_assoc();
    $ProviderID = (int) $row_get_PiiID['PII_ID'];

     $sanitized_FeedBack = mysqli_real_escape_string($db, $FeedBack);


    if (isset($sanitized_FeedBack)) {
        //insert data into feedback table
         $sql = "INSERT INTO feedback (ProviderID, FeedBack) VALUES ($ProviderID, '$sanitized_FeedBack');";
		 
		 // Write query and get result
		 $result = mysqli_query($db, $sql);
		}
    if (empty($sanitized_FeedBack)){
      
      $_SESSION['status'] = "Please Enter A feedback";
      header("Location: feedback.php");
    }

    if($result){
        $_SESSION['status'] = "Feedback submitted successfully";
        header("Location: feedback.php");
    }
    else {
        $_SESSION['status'] = "Failed to submit your Feedback. Try again!.";
        header("Location: feedback.php");
    }
        // fetch needed results
        $NewFeedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

  mysqli_close($db);
}
?>