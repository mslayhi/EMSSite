<?php
require "ServerConnection.php";
include "PullUserInfo.php";
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
      }

      .container {
        padding: 50px;
        background-color:#DCDCDC;
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
    </style>
  </head>
  <body>
    <form action="PullUserInfo.php" method="POST">
      <div class="container">

      <button type="button" class="" onclick="location.href='RedirectLandingPage.php'">
        <span class="">Home Page</span>
        <span class="">
            <ion-icon name="main-page"></ion-icon>
        </span>
      </button>

      <?php

      if(isset($_SESSION['Error']))
      {
          ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong><?= $_SESSION['Error']; ?></strong>
              </div>
          <?php 
          unset($_SESSION['Error']);
      }


      ?>

        <center>
          <h1> Modify User</h1>
        </center>
        <hr>
        <label> Personal Identifying Number: </label>
        <input type="number" name="PII_ID" placeholder="PII_ID #" min="0" required />
        <br>
        <br>
          <input type="submit" class="registerbtn" name="SearchForUser" value="Search User" >
    </form>
  </body>
</html>
