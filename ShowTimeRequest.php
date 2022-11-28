<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TimeOffRequest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
          .body{
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
          .container{
            padding: 100px 100px 100px 100px;
    
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
          .label{
            padding-right:50px;
            float:left;
          }
          .number {
            background-color: lightgray;
            border:none;
            padding: 04px 04px;
            margin-right: 25px;
            border-radius:4px;
            float:left;
          }
          .Approve {
            background-color: blue;
            color: white;
            padding: 08px 10px;
            margin-right: 25px;
            margin-left: 25px;
            font-size: small;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: left;
          }
          .Approve:hover {
              background-color: #02c8db;
          }
          .Approve:active {
              background-color: #88ef9e;
          }
          .Deny {
            background-color: red;
            color: white;
            padding: 08px 10px;
            margin-right: 25px;
            margin-left: 25px;
            font-size: small;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: left;
          }
          .Deny:hover {
              background-color: #02c8db;
          }
          .Deny:active {
              background-color: #88ef9e;
          }
          
        </style>
</head>
<body class = "body">
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
                </tr>
            </thead>
            <tbody>
                
                <?php
                include 'ServerConnection.php';
                //get required field to populate data in the columns of html table defined above.
                $sql = "SELECT ID , concat(FirstName,' ', LastName) as Employee, TimeOffType, RequestReason, StartDate, EndDate, Status From TimeOffRequest
                    JOIN personal_identifying_info ON TimeOffRequest.PII_ID = personal_identifying_info.PII_ID;";

                $result = mysqli_query($db, $sql);
                if(!$result){
                    die("Invalid query: " .mysqli_error());
                }
                //until there is data, populate in the table.
                while($row = $result->fetch_assoc()){
                    echo "<tr class = 'table-row'>
                    <td class = 'table-data'> $row[ID] </td>
                    <td class = 'table-data'> $row[Employee] </td>
                    <td class = 'table-data'> $row[TimeOffType] </td>
                    <td class = 'table-data'> $row[RequestReason] </td>
                    <td class = 'table-data'> $row[StartDate] </td>
                    <td class = 'table-data'> $row[EndDate] </td>
                    <td class = 'table-data'> $row[Status] </td>
                </tr>";
                }                
                ?>
            </tbody>
        </table>
        <br>
        <br>
        <div class = "processing">
          <!-- This form captures the ID of whom the time off request has to be processed. Manager can
          either approve or deny the request by selecting the ID and clicking Approve or Deny buttons. -->
        <form action="ProcessTimeRequest.php" method = "POST">
            <div>
              <label class = "label"> <strong>Process Time Off Request for :  </strong></label>
              <input type = "number" name = "number" class = "number" placeholder = "ID# " min = "1" style = "width:80px" required />
              <input type = "Submit" class = "Approve" name = "ProcessTimeRequest" value = "Approve Request" >
              <input type = "Submit" class = "Deny" name = "ProcessTimeRequest" value = "Deny Request">
              </div>
         </form>    
    </div>
    </div>
     
</body>
</html>
