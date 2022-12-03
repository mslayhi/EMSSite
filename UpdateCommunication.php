

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<button type="button" class="button" onclick="location.href='RedirectLandingPage.php'">
        <span class="">Home Page</span>
        <span class="">
            <ion-icon name="main-page"></ion-icon>
        </span>
    </button>
    <center>
        <h2>Announcement Information</h2>
    </center>
    <hr>
    <br>

    <table class="table" style = "border: 1px solid black">
        <thead class="table-header" style="background-color: lightgreen;">
            <tr>
                <th>ID</th>
                <th>Communication</th>
            </tr>
        </thead>
        <tbody>
            <style>
         
     
         body{
                background-color: #f1d1bc;
                margin: 100px 400px 100px 200px;
            }
            .container{
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
          

        </style>
            <?php
            include_once 'ServerConnection.php';

            $sql = "SELECT ID, Communication  From Communication;";

            $result = mysqli_query($db, $sql);
            if(!$result){
                die("Invalid query: " .mysqli_error());
            }
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td> $row[ID] </td>
                <td> $row[Communication] </td>
            </tr>";
            }
            
            ?>
        </tbody>
    </table>
    <br>
    
</body>
</html>


<div class="container">
                    <div class="card-header">
                        <h4>Update Announcements Below</h4>
                    </div>
                    <div class="card-body">

                        <form action="ProcessCommunicationUpdate.php" method="POST">

                            <div class="form-group mb-3">
                                <label for="">ID</label>
                                <input type="text" name="ID" class="form-control" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Updated Announcement</label>
                                <input type="text" name="Communication" class="form-control" >
                            </div>
                        
                            <div class="form-group mb-3">
                                <button type="submit" name="update_comm_data" class="btn btn-primary">Update Announcement</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
