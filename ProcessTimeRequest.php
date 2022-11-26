<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeOffRequest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
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
          .container{
            padding: 100px 50px 100px 50px;
    
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
<body>
    <div class = "container">
        <button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">
            <span class="">Home Page</span>
            <span class="">
                <ion-icon name="main-page"></ion-icon>
            </span>
        </button>
        <center>
            <h2>Time Off Request Information</h2>
        </center>
        <hr>
        <br>

        <table class="table">
            <thead class="table-header">
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>TimeOffType</th>
                    <th>RequestReason</th>
                    <th>StartDate</th>
                    <th>EndDate</th>
                    <th>RequestStatus</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                include 'ServerConnection.php';
                //$id = 0;
                $sql = "SELECT ID , concat(FirstName,' ', LastName) as Employee, TimeOffType, RequestReason, StartDate, EndDate, Status From TimeOffRequest
                    JOIN personal_identifying_info ON TimeOffRequest.PII_ID = personal_identifying_info.PII_ID;";

                $result = mysqli_query($db, $sql);
                if(!$result){
                    die("Invalid query: " .mysqli_error());
                }
                while($row = $result->fetch_assoc()){
                    //$id = $row['ID'];
                    echo 'The ID of for this row is: '.$row['ID'];
                    echo "<tr class = 'table-row'>
                    <td class = 'table-data'> $row[ID] </td>
                    <td class = 'table-data'> $row[Employee] </td>
                    <td class = 'table-data'> $row[TimeOffType] </td>
                    <td class = 'table-data'> $row[RequestReason] </td>
                    <td class = 'table-data'> $row[StartDate] </td>
                    <td class = 'table-data'> $row[EndDate] </td>
                    <td class = 'table-data'> $row[Status] </td>
                    <td class = 'table-data'>
                        <a class = 'btn btn-primary btn-sm' href = 'ApproveTimeRequest.php?id = $row[ID]'>Aprove </a>
                        <a class = 'btn btn-danger btn-sm' href = 'DenyTimeRequest.php?id = $row[ID]'>Deny </a>
                    </td>
                </tr>";
                }
                
                ?>
            </tbody>
        </table>
        <br>
    </div>
</body>
</html>
