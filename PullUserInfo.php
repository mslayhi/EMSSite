<?php
include_once 'ServerConnection.php';
include 'SearchModifyUser.php' ;

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

    // billing info
    $result=mysqli_query($conn,"SELECT 1 FROM BillingInfo WHERE CustomerID = $customerID");
    $sql = "";
    if (mysqli_num_rows($result) > 0){
        $sql = "
        UPDATE BillingInfo SET
        CardNumber = ?
        ,CardExpDate = ?
        ,CardCCVNum = ?
        WHERE CustomerID = ?;
        ";
    }else {
        $sql = "
        INSERT INTO BillingInfo (CardNumber, CardExpDate, CardCCVNum, CustomerID, BillInsertDate, BillUpdateDate)
        VALUES (?, ?, ?, ?, current_timestamp, current_timestamp);";
    }
  
    if($stmt = mysqli_prepare($conn, $sql)){

        mysqli_stmt_bind_param($stmt, "ssii", $CreditCardNum,$CardExpDate,$CardCCVNum,$customerID);

        $CreditCardNum = str_replace("-", "", $_POST["CardNumber"]);
        $CardCCVNum = $_POST["CardCCVNum"];
        $CardExpDate = $_POST["CardExpDate"];
        
        if(mysqli_stmt_execute($stmt)){
            
        } else{
            echo "Oops! Something went wrong. Please try again later. " . mysqli_error($conn);
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    header("location: UserProfile.php");
    exit;

}else{
    // get

    // customer info
    $sql = "SELECT FirstName, LastName, TelNum, CustEmail, StreetNumber, StreetName, City, Zipcode, State, Allergy  FROM CustomerInfo WHERE CustomerID = ? ";
    if($stmt = mysqli_prepare($conn, $sql)){
        
        mysqli_stmt_bind_param($stmt, "i", $customerID);

        if(mysqli_stmt_execute($stmt)){
            
            mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1){                    
                
                mysqli_stmt_bind_result($stmt, $FirstName, $LastName, $TelNum, $email, $StNum, $STName, $City, $PCode, $State, $Allergy);
                if(mysqli_stmt_fetch($stmt)){
                }
                
            } else{
                // email doesn't exist, display a generic error message
                echo  "Invalid email or password.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // billing info
    $sql = "SELECT CardNumber, CardExpDate, CardCCVNum  FROM BillingInfo WHERE CustomerID = ? ";
    if($stmt = mysqli_prepare($conn, $sql)){
    
        mysqli_stmt_bind_param($stmt, "i", $customerID);
        //$CustomerIDparam=$_SESSION["CustomerID"];

        if(mysqli_stmt_execute($stmt)){
            
            mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1){                    
                
                mysqli_stmt_bind_result($stmt, $CreditCardNum,$CardExpDate,$CardCCVNum);
                if(mysqli_stmt_fetch($stmt)){

                
                }
            } 
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
}


?>

