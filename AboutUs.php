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
        <title>About Us</title>
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
            top: 27px;
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
            <div class="header">

                <button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">

                    <span class="">Home Page</span>
            
                    <span class="">
            
                        <ion-icon name="main-page"></ion-icon>
            
                    </span>
            
                </button>
            </div>

            <div class="info">
                    <h2 class="SectionTitle">Our Mission</h2>
                    <div>&nbsp;</div>
                    <p><i>Our objective is to design a comprehensible and coherent employee management system to help a business run more smoothly.</i></p>
                    <h2 class="SectionTitle">Our vision</h2>
                    <div>&nbsp;</div>
                    <p><i>Some of the goals of an employee management system include assisting in raising employee productivity, figuring out how to attract and retain talent through feedback, and lowering the administrative burden on HR professionals with an easy-to-understand application </i></p>
            </div>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        </div>
    </body>

</html>