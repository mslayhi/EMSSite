<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmployeeInfo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .body{
            background-color: #f1d1bc;
            margin:100px 400px 100px 200px;
          }
          .button {
            background-color: #0066A2;
            color: white;
            padding: 12px 20px;
            font-size: small;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: left;
          }

          .button:hover {
            background-color: #02c8db;
          }

          .button:active {
            background-color: #88ef9e;
          }
          .table{
            border:1 px solid black;
          }
          .table-header{
            background-color:lightgreen;
            text-align: center;
          }
          .table-data{
            text-align: center;
          }
          .table-row:hover{
            background-color: #F0DFF2;
            color:crimson;
            cursor:pointer;
            transition:0.3s;
          }
        </style>
</head>
<body class = "body">
<button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">
        <span class="">Home Page</span>
        <span class="">
            <ion-icon name="main-page"></ion-icon>
        </span>
    </button>
    <center>
        <h2>Worked Hours Information</h2>
    </center>
    <hr>
    <br>

    <table class="table">
        <thead class="table-header" style="background-color: lightgreen;">
            <tr>
                <th>PII_ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>RegularHours</th>
                <th>OverTimeHours</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            include_once 'AccessWrkHrsProcessing.php';
            
            ?>
        </tbody>
    </table>
    <br>
    
</body>
</html>
