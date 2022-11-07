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
            //include 'ServerConnection.php';
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
                  <label> EmployeeID :  </label>
                  <input type="number" name="EmployeeID" placeholder="ID # from above " min="1"  required />
                  <br>
                  <br>
                  <div>
                  <label> Work Shift : </label>
                        <select id = "Shift" name="Shift" width = "15">
                              <option value="1st" name="First">1st</option>
                              <option value="2nd" name="Second">2nd</option>
                        </select>
                  <br>
                  <br>
                  <label> Start Time : </label>
                  <input type="time" name="starttime" />
                  <label> End Time : </label>
                  <input type="time" name="endtime" />
                  </div>
                  <br>
                  <div>
                        <label>Work Days : </label>
                        <input type = "checkbox" name = "Work_Days_list[]" value = "M">
                        <label for = "M">Monday</label>
                        <input type = "checkbox" name = "Work_Days_list[]" value = "T">
                        <label for = "T">Tuesday</label>
                        <input type = "checkbox" name = "Work_Days_list[]" value = "W">
                        <label for = "W">Wednesday</label>
                        <input type = "checkbox" name = "Work_Days_list[]" value = "Th">
                        <label for = "Th">Thursday</label>
                        <input type = "checkbox" name = "Work_Days_list[]" value = "F">
                        <label for = "F">Friday</label><br>
                  <br>
                  <input type="Submit" name="ProcessSchedule" value = "Add Schedule" >
                  <input type="Submit" name="ProcessSchedule" value = "Update Schedule">
                  <input type="Submit" name="ProcessSchedule" value = "Delete Schedule">
            </div>
         </form>    
        <br>
        <br>
      <div>
      </div>
</body>
</html>