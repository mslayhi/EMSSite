<?php
require_once "ServerConnection.php";
include_once "NewUserInsert.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

      body {
        font-family: Calibri, Helvetica, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f1d1bc;
      }

      .container {
        padding: 50px;
        background-color: #f1d1bc;
      }

      input[type=tel],
      input[type=email],
      input[type=text],
      input[type=password],
      textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        border-radius: 4px;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
      }

      div {
        padding: 10px 0;
      }

      hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
      }

      .registerbtn {
        background-color: #0066A2;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
      }

      .registerbtn:hover {
        background-color: #45a049;
      }

      input[type=submit] {
        background-color: #0066A2;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }
      .button {
        background-color: #0066A2;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        float: left;
        line-height: 12px;
        width: 120px;
        font-size: 8pt;
        margin-top: 20px;
        margin-left: 0px;
        position: absolute;
        top: -5px;
      }

      .button:hover {
        background-color: #02c8db;
      }

      .button:active {
        background-color: #88ef9e;
      }
      
    </style>
  </head>
  <body>
    <form action="NewUserInsert.php" method="POST">
      <div class="container">

      <button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">
        <span class="">Home Page</span>
        <span class="">
            <ion-icon name="main-page"></ion-icon>
        </span>
      </button>

      <?php 
      
      if(isset($_SESSION['Status']))
      {
          ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong><?= $_SESSION['Status']; ?></strong> <p>The users Personal Identifying number is: <?= $_SESSION['PII_ID']; ?> </p>
              </div>
          <?php 
          unset($_SESSION['Status']);
      }

      ?>
        <center>
          <h1> Insert New User</h1>
        </center>
        <hr>
        <label> First name </label>
        <input type="text" name="FirstName" placeholder="Firstname" size="15" required />
        <label> Lastname: </label>
        <input type="text" name="LastName" placeholder="Lastname" size="15" required />
        <label> DOB: </label>
        <input type="date" name="DOB" placeholder="Birth Date" size="15" required />
        <br>
        <label> Social Security Number: </label>
        <input type="text" name="SocialSecurity" placeholder="Expected pattern is ###-##-####" size=" 15"/>
        <div> Phone : </label>
          <input type="tel" name="TelNum" placeholder="phone #" size="10" / required>
          <br>
          <br>
          <br>
          <label for="address">Current Address :
          </label>
          <textarea cols="80" name="Address" rows="5" placeholder="Current Address" value="address" required></textarea>
          <label for="email">
            <b>Email</b>
          </label>
          <input type="email" placeholder="Enter Email" name="Email" required>
          <input type="submit" class="registerbtn" name="Register" Value="Create New User">
    </form>
  </body>
</html>
