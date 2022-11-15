<?php
include_once 'ServerConnection.php';
// include 'SearchModifyUser.php' ;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{    
     $PiiID = trim($_POST['PII_ID']);
     $creator = $_SESSION['username'];
     $Creator_ID = "";

    // save
    // User

    $result=mysqli_query($db,"SELECT 1 FROM personal_identifying_info WHERE PII_ID = $PiiID");
    $sql = "";

    if (mysqli_num_rows($result) > 0){

        $sql = "
            UPDATE personal_identifying_info SET
                FirstName = ?
                ,LastName = ?
                ,DateOfBirth = ?
                ,SSN = ?
                ,Address = ?
                ,PhoneNo = ?
                ,Email = ?
            WHERE PII_ID = ? ";

    }else {
        $sql = "
        INSERT INTO personal_identifying_info (FirstName, LastName, DateOfBirth, SSN, Address, PhoneNo, Email)
        VALUES (?, ?, ?, ?, ?, ?, ?);";
    }
    
    if($stmt = mysqli_prepare($db, $sql)){
 
        mysqli_stmt_bind_param($stmt, "isssssss", $PiiID,$FirstName,$LastName,$DOB,$SSN,$Address,$TelNum,$email);
        $FirstName = trim($_POST["FirstName"]);
        $LastName = trim($_POST["LastName"]);
        $DOB = trim($_POST["DOB"]);
        $SSN = trim($_POST["SocialSecurity"]);
        $Address = trim($_POST["Address"]);
        $TelNum = trim($_POST["TelNum"]);
        $email = trim($_POST["Email"]);
     

        if(mysqli_stmt_execute($stmt)){
    
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    header("location: ModifyUsers.php");
    exit;

}else{
    // get
    // customer info


    $sql = "SELECT  FirstName, LastName, DateOfBirth, SSN, Address, PhoneNo, Email  FROM personal_identifying_info WHERE PII_ID = ? ";
    if($stmt = mysqli_prepare($db, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $PiiID);

        if(mysqli_stmt_execute($stmt)){
            
            mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1){                    
                
                mysqli_stmt_bind_result($stmt, $PiiID,$FirstName,$LastName,$DOB,$SSN,$Address,$TelNum,$email);
                if(mysqli_stmt_fetch($stmt)){
                }
                
            } else{
                // display a generic error message
                echo  "Invalid Information.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

}


?>

