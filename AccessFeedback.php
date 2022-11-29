<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EmployeeInfo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            .body{
                margin: 100px 400px 100px 200px;
                background-color: #f1d1bc;
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
            .Provide-Feedback{
                padding: 50px 50px 50px 0px;
                font-size: 20px;
                font-weight: bold;
            }
            .Feedback{
                padding: 50px 50px 50px 0px;
            }
            .Submit {
                background-color: #0066A2;
                color: white;
                padding: 08px 10px;
                margin-right: 25px;
                font-size: small;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .Submit:hover {
                background-color: #02c8db;
            }
            .Submit:active {
                background-color: #88ef9e;
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
            <h2>Feedback Information</h2>
        </center>
        <hr>
        <br>
        <table class="table">
            <thead class="table-header">
                <tr>
                    <th>Feedback_Provider</th>
                    <th>Feedback</th>
                    <th>Replied?</th>
                </tr>
            </thead>
            <tbody>   
                <?php
                    include_once 'ServerConnection.php';
                    $sql = "SELECT ProviderID, Feedback, Reply FROM Feedback;";
                    $result = mysqli_query($db, $sql);
                    if(!$result){
                        die("Invalid query: " .mysqli_error());
                    }
                    while($row = $result->fetch_assoc()){
                        if($row['Reply'] == NULL){
                            $row['Reply'] = 'No';
                        }
                        else{
                            $row['Reply']  = 'Yes';
                        }
                        echo "<tr class = 'table-row'>
                        <td class = 'table-data'> $row[ProviderID] </td>
                        <td class = 'table-data'> $row[Feedback] </td>
                        <td class = 'table-data'> $row[Reply] </td>
                    </tr>";
                    }
                ?>
            </tbody>
        </table>
        <form action = "feedback.php" method = "GET">
            <div class = "Feedback">
                <lable class = "Provide-Feedback"> Want to provide Feedback?</lable>
                <input type = "Submit" class = "Submit" value = "Provide Feedback" name = "feedback">
            </div>
        </form>
        <br> 
    </body>
</html>