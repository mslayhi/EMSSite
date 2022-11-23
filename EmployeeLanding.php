<?php
require_once "ServerConnection.php";

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
            <header>

                <h2> <a href="#" class ="logo">E M S</a></h2>
                <div class ="navigation">
                <a href = "Paystub.php"> Paystub</a>
                <a href = "AccessWrkHrs.php">  Access Hours</a>
                <a href = "TimeRequest.php"> Time Request</a>
                <a href = "feedback.php"> Feedback</a>
                </div>

            
            </header>

            <div>
                <button type="button" class="signout-button" onclick="location.href='logout.php'">
                    <span>Sign Out</span>
                </button>
            </div>

            <div class ="content">
                    <div class info ="info">
                <h2> Employee Management System!</h2>
                <strong >Welcome Employees!</strong>
                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis, nostrum inventore aperiam perspiciatis quas totam autem adipisci esse. Incidunt at corporis repellat neque, quaerat qui cum! Quibusdam aperiam accusamus accusantium! Impedit, perspiciatis quam. Nulla temporibus aliquam corporis recusandae obcaecati ex nostrum officiis nesciunt, reiciendis facere, consectetur quos sed dolorum? Voluptatem quas velit quo corporis, distinctio ad consequuntur omnis temporibus mollitia perspiciatis veniam minus, unde possimus rerum. Quia doloremque sit, dolorem ipsam odio aspernatur totam ex nostrum error nihil neque vel. Voluptatem iure quisquam accusantium quam eaque laudantium quis cumque, incidunt ab. Magnam eos dolore, recusandae blanditiis necessitatibus neque. Qui, ipsam.</p>
            </div>

            <footer class="footer">
    <h1 > </h1>
        <p><a href ="AboutUs.html">AboutUS</a></p>
      <p><a href ="Contactus.html ">Contact US</a></p>
      
    </footer>
        </section>
        <link rel="Footer" href="Footer.html">
    </body>
</html>
