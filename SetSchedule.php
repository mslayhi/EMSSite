<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
</head>
<stye>

</style>
<body>
    <div class = "left">
        <?php
            include 'ServerConnection.php';
            include 'EmployeeLookup.php';
        ?>
    </div>
    
    <div class = "right">
        <br>
        <br>
        <center>
          <h2> Employee Schedule Processing</h2>
        </center>
        <hr>
        <br>
        <br>
        <form action="ProcessSchedule.php" method="POST">
            <div class="container">
                  <label> Enter EmployeeID:  </label>
                  <input type="number" name="EmployeeID" placeholder="ID # from above " min="1" required />
                  <br>
                  <br>
                  <br>
                  <input type="Submit" class="AddSchedule" name="AddSchedule" value = "Add Schedule" >
                  <input type="Submit" class="AddSchedule" name="AddSchedule" value = "Update Schedule">
                  <input type="Submit" class="AddSchedule" name="AddSchedule" value = "Delete Schedule">
            </div>
         </form>
        
        <br>
        <br>
      <div>
      </div>
</body>
</html>