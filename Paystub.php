<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paystub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .body{
            background-color: #f1d1bc;
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
            margin-left: 0px;
            position: absolute;
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
<body class = "body" style="margin:100px 300px 100px 100px;">
    <button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">
        <span class="">Home Page</span>
        <span class="">
            <ion-icon name="main-page"></ion-icon>
        </span>
    </button>
    <h2><center>Payment Information</center></h2>
    <br>
    <table class="table" style = "border: 1px solid black">
        <thead class="table-header" style="background-color: lightgreen;">
            <tr >
                <th>UserName</th>
                <th>Pay Period</th>
                <th>Pay Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'ServerConnection.php';

            $username = $_SESSION['username'];

            $sql = "SELECT PayPeriod, PayDate FROM paystub JOIN login ON paystub.PII_ID = login.PII_ID
                WHERE login.UserName = '$username';";
            $result = mysqli_query($db, $sql);
            if(!$result){
                die("Invalid query: " .mysqli_error());
            }
            $row = $result->fetch_assoc();

            if(!empty($row)){
                echo "<tr class = 'table-row' >
                <td class = 'table-data'>$username</td>
                <td class = 'table-data'> $row[PayPeriod] </td>
                <td class = 'table-data'> $row[PayDate] </td>
            </tr>";
            }
            else{
                echo '<strong style = "color:crimson"> No payment information available for: </strong><strong style = "color:crimson">'.$username. '</strong>';
                echo "<br>";
            }
            ?>
        </tbody>
        <br>
    </table>
    <br>
    
</body>
</html>
