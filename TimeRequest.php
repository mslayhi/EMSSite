<?php
require_once "ServerConnection.php";
//include_once "TimeReq.php";
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
        width: 100%;
        padding: 50px;
        background-color: #DCDCDC;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        border-radius: 4px;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #F5F5F5;
      }

      input[type=text],
      textarea {
        width: 93%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        border-radius: 4px;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #F5F5F5;
      }

      div {
        padding: 10px 0;
      }

      hr {
        border: 1px solid #d8bca9;
        margin-bottom: 25px;
      }

      .registerbtn {
        background-color: #0066A2;
        color: white;
        padding: 16px 20px;
        margin: 0px 60px 0px 0px;
        border: none;
        cursor: pointer;
        width: 200px;
        opacity: 0.9;
        font-size: 10pt;
      }

      .registerbtn:hover {
        background-color: #45a049;
      }

      .adjust-line-height {
        line-height: 15px;
      }

      input[type=submit] {
        background-color: #0066A2;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
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
       line-height: 15px;
       width: 200px;
       font-size: 10pt;
       cursor:pointer;
       margin-left: 10px;
       position: relative;
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
    <form action = "TimeReq.php" method = '$_REQUEST'>
      <div class="container">
        <center>
          <h1> TIME-OFF REQUEST</h1>
        </center>
        <hr>
        <div>
          <label> Type of Time-off : </label>
          <div class="timeoff">
            <label>
              <input type="radio" name="TimeOffType" value="paid" required>
              <span>paid</span>
            </label>
          </div>
          <div class="timeoff">
            <label>
              <input type="radio" name="TimeOffType" value="unpaid" required>
              <span>unpaid</span>
            </label>
            <br>

        <label for="Date">Beginning Date:</label>
        <input type="date" id="startDate" name="startDate">
        <label for="Date">Return to Work:</label>
        <input type="date" id="endDate" name="endDate">
       
        <fieldset>
          <legend>Please select your reason for request:</legend>
          <div class="radio">
            <label>
              <input type="radio" name="RequestReason" value="juryduty" required>
              <span>Jury Duty</span>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="RequestReason" value="bereavement" required>
              <span>Bereavement</span>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="RequestReason" value="maternity/paternityleave" required>
              <span>Maternity/Paternity</span>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="RequestReason" value="sick" required>
              <span>Sick</span>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="RequestReason" value="other" required>
              <span>Other</span>
            </label>
          </div>
      </div>
      <div class="col-75">
        <textarea id="OtherReason" name="OtherReason" placeholder="If Selected Other, please specify:" style="height:100px" style="width:100%"></textarea>
      </div>
      <input type="submit" class="registerbtn" name="Register" value="Submit Time Off Request">
      <button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">
        <span class="">Cancel</span>
        <span class="">
            <ion-icon name="main-page"></ion-icon>
        </span>
      </button>
    </form>
  </body>
</html>
