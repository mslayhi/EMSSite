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
        width: 100%;
        padding: 120px;
        background-color: #DCDCDC;
        /* padding: 15px; */
        margin: 10px 50px 22px 0;
        margin-left: -100px;
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
       float: right;
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
    <div class = "form">
      <form action = "feedbackInsert.php" method = "POST">
        <div class="container">
          <center>
            <h1> FEEDBACK FORM</h1>
          </center>
          <hr>
          <div>
            <label> <strong>Please provide your feedback in the text area below :</strong> </label>

        </div>
        <div class="col-75">
          <textarea id="FeedBack" name="FeedBack" placeholder="Write something..." style="height:100px" style="width:100%" required></textarea>
        </div>
        <input type="submit" class="registerbtn" name="Register" value="Submit Feedback">
        <button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">
          <span class="">Home Page</span>
          <span class="">
              <ion-icon name="main-page"></ion-icon>
          </span>
        </button>
      </form>
    </div>
  </body>
</html>