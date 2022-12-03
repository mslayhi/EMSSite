<?php
require_once "ServerConnection.php";
if(!$_SESSION['username']){
    echo"<script>location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name ="viewport" content="width = device-width", initial-scale="1.0">
        <title> Landing Page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>
    <body>
        <section>
            <header class="header">

            <h2> <a href="logout.php" class ="logo">Sign Out</a></h2>
                <div class ="navigation">
                <a href = "ModifyUser.php"> Modify Users</a>
                <a href = "NewLogin.php"> Create New User Login</a>
                <a href = "SearchDeleteUser.php"> Delete User</a>
                <!-- 
                <a href = "#"> Delete User</a>
                <a href = "#"> Update User</a> > 
                -->
                </div>

                
            </header>

            <div class ="content">
                   <div class info ="info">
                <h2> Employee Management System!</h2>
                <strong >Welcome Site Admins!</strong>
                <p>Now more than ever users want unified platforms, this projects name E.M.S is designed to be an advanced employee management system, whichever company that uses this software will have the ability to manage employees’ hours, and PTO, and allow the employee to view roles and responsibilities, and what benefits does the company provide for them. This website will enable department managers to access employee information and view their hours, PTO requests, and feedback all in one place. E.M.S will also allow Human Resources administrators access to all employee data and their feedback to the company. 
E.M.S requirements came about from company needs for such systems, it took what other similar systems did and where they lacked and enhanced them where possible</p> <br>
<h3 style="color:#F47174;"> Latest News and Announcements!</h3> 


                    <?php
                        include_once 'ServerConnection.php';

                        $sql = "SELECT Communication From Communication;";

                        $result = mysqli_query($db, $sql);
                        if(!$result){
                            die("Invalid query: " .mysqli_error());
                        }
                        echo "<table>";

                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                            <td> $row[Communication] </td>
                            
                        </tr>";

                        }
                        echo "</table>";

                    ?>                
                       
            </div>
            <div class="footer-container">
    <div class="footer">
        <div class="footer-heading footer-1">
            <h2>About US</h2>
            <a href="AboutUs.html">About</a>
        </div>
        <div class="footer-heading footer-2">
            <h2>Contact US</h2>
            <a href="Contactus.html">Contact</a>
        </div>
       
    </div>
   </div>
        </section>
    </body>
</html>
