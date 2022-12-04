<?php
require "ServerConnection.php";
if(!$_SESSION['username']){
    echo"<script>location.href='index.php'</script>";
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Contact us Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>

    <style>
        .body{
            background-color: #f1d1bc;
            margin: 100px 300px 100px 100px;
        }
        .button {
            background-color: #0066A2;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            line-height: 12px;
            width: 120px;
            font-size: 8pt;
            top: 80px;
            margin-left: 0px;
            position: absolute;
            
        }

        .button:hover {
            background-color: #02c8db;
        }

        .button:active {
            background-color: #88ef9e;
        }
    </style>

    <body class="body">
        <div class="content">
            <button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">

                <span class="">Home Page</span>
        
                <span class="">
        
                    <ion-icon name="main-page"></ion-icon>
        
                </span>
        
            </button>
        </div>
        <br>
        <br>
        <br>

        <section class="service">
            
            <div id="service">
                <div class="box">
                    <!-- Form -->
                    <img src="Direction.jpg"width="25" height="25"
                         alt= "color_image">
                    <br>
                     
                    <!-- Displaying text at
                        the center of the box-->
                    <p class="center">
                        You may visit us or mail us at
                    </p>
                    <br>
                    <p class="center">
                        1234 N O Connor, OldTown, MN-54454
                    </p>
     
                </div>
                <br>
                <br>
                <br>
                <div class="box">
                     
                    <!-- Email -->
                    <img src="Email.jpg"width="25" height="25"
                         alt= "color_image">
                    <br>
                     
                        <!-- Displaying text at
                        the center of the box-->
                    <p class="center">
                        Use this Email to send us about the problem faced
                    </p>
                    <br>
                    <p class="center">
                        CustomerSupport@esm.com
                    </p>
     
                </div>
                <br>
                <br>
                <br>
                <div class="box">
                    <img src="Phone.jpg" width="25" height="25"
                         alt= "color_image">
                    <br>
                     
                    <!-- Displaying text at
                        the center of the box-->
                    <p class="center">
                        Toll Free Number:+1800 200-EMS
                    </p>
     
                </div>
            </div>
        </section>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>

</html>

<!-- we found an similar idea of what we wnated and was able to use some of the code from https://www.geeksforgeeks.org/design-a-contact-us-page-using-html-and-css/ -->