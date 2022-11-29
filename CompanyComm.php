<?php
// Include config file
include "ServerConnection.php";
include "AnnouncementInsert.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
      body {
        font-family: Calibri, Helvetica, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
         margin: 0;
         background-color: #f1d1bc;
      }
      #wrapper {
      min-height:100%;
      position:fixed;
      width:100%;
      height:100%;
      left:0;
      top:0;
      }
      .container {
        padding: 50px;
        background-color: #f1d1bc;
      }

     
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
<div id="wrapper">

    
    
  <form action="AnnouncementInsert.php" method="POST">
  <div class="container">

    <?php
      if(isset($_SESSION['status']))
      {
        echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);
      }
    ?>
  <button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">
        <span class="">Home Page</span>
        <span class="">
            <ion-icon name="main-page"></ion-icon>
        </span>
      </button>

      <center>
          <h1> Manage Company Communications</h1>
        </center>
        <hr>
       <div class="row">
      <div class="col-25">
        <label for="announcement">Announcement</label>
      </div>
      <div class="col-75">
        <textarea id="Communication" name="Communication" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>
    </div>


    <input type="submit" class="registerbtn" name="Register" Value="Add to Landing Page">

  </form>
</div>
</body>
</html>
