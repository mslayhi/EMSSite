<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
</head>
<style>
    .Submit {
        background-color: #0066A2;
        color: white;
        padding: 08px 10px;
        margin-right: 25px;
        font-size: small;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: left;
    }
    .Submit:hover {
        background-color: #02c8db;
    }
    .Submit:active {
        background-color: #88ef9e;
    }
    .number {
        background-color: lightgray;
        border:none;
        padding: 04px 04px;
        border-radius:4px;
    }
    .Shift {
        background-color: lightgray;
        border:none;
        padding: 04px 04px;
        border-radius:4px;
    }
    .time {
        background-color: lightgray;
        border:none;
        padding: 04px 04px;
        border-radius:4px;
    }
    .Checkbox {
        background-color: lightgray;
        border:none;
        height:15px;
        width:15px;
    }
    
</style>

<body>
    <div class = "left">
        <?php
            include 'EmployeeLookup.php';
        ?>
    </div>
    
    <div class = "right">
        <br>
        <center>
          <h2> Employee Schedule Processing</h2>
        </center>
        <hr>
        <br>
        <form action="ProcessSchedule.php" method = "POST">
            <div class="container">

                <label> EmployeeID :  </label>
                <input type = "number" name = "number" class = "number" placeholder = "ID# " min = "1" required />
                <br>
                <br>
                <div>
                    <label> Work Shift : </label>
                        <select id = "Shift" class = "Shift" name = "Shift" width = "15">
                            <option value = "1st" name = "First">1st</option>
                            <option value = "2nd" name = "Second">2nd</option>
                        </select>
                    <br>
                    <br>
                    <label> Start Time : </label>
                        <input type = "time" class = "time" name = "starttime" value = "00:00:00"/>
                    <label> End Time : </label>
                        <input type = "time" class = "time" name = "endtime" value = "00:00:00"/>
                </div>
                <br>
                <div>
                    <label class = "workdays">Work Days : </label>
                    <input type = "checkbox" class = "Checkbox" name = "Work_Days_list[]" value = "M" checked>
                    <label for = "M">Monday</label>
                    <input type = "checkbox" class = "Checkbox" name = "Work_Days_list[]" value = "T">
                    <label for = "T">Tuesday</label>
                    <input type = "checkbox" class = "Checkbox" name = "Work_Days_list[]" value = "W">
                    <label for = "W">Wednesday</label>
                    <input type = "checkbox" class = "Checkbox" name = "Work_Days_list[]" value = "Th">
                    <label for = "Th">Thursday</label>
                    <input type = "checkbox" class = "Checkbox" name = "Work_Days_list[]" value = "F">
                    <label for = "F">Friday</label><br>
                    <br>
                    <input type = "Submit" class = "Submit" name = "ProcessSchedule" value = "Add Schedule" >
                    <input type = "Submit" class = "Submit" name = "ProcessSchedule" value = "Update Schedule">
                    <input type = "Submit" class = "Submit" name = "ProcessSchedule" value = "Delete Schedule">
                </div>
                <br>
                <br>
            </div>
         </form>    
    </div>
</body>
</html>