<?php
include 'SetSchedule.php';

//initialize variables the values of which are used as data for schedule table
$workDays = '';
$username = $_SESSION['username'];
$employeeID = $_POST['number'];
$shift = $_POST['Shift'];
$startTime = $_POST['starttime'];
$endTime = $_POST['endtime'];
$SchedulerID = '';

If(isset($employeeID)){

    /*this formats the data for WorkDays column of Schedule table. The basic idea is to separate each days
    by comma and treat it as a single varchar entry for the data*/
    $daysCount = 1;
    foreach($_POST['Work_Days_list'] as $selected){
        if($daysCount < count($_POST['Work_Days_list'])){
            $workDays = $workDays . $selected . ',';
            $daysCount = $daysCount+1;
        }else{
            $workDays = $workDays . $selected;
        }
        
    }
    
    //this captures the userID of the manager who has logged into the system
    $sql = "SELECT UserID FROM Manager JOIN Login ON Manager.PII_ID = Login.PII_ID WHERE Login.UserName = '$username';";
    $result = mysqli_query($db, $sql);

    if(!$result){
        die('Invalid query: '.mysqli_error());
    }

    $row = $result->fetch_assoc();
    $SchedulerID = $row['UserID'];
    //check if schedule table has userID that is equal to employeeID
    $sql_check_schedule = "SELECT UserID FROM Schedule WHERE UserID = $employeeID;";
    //Check if employee table has userID that is equal to employeeID
    $sql_check_employee = "SELECT UserID FROM Employee WHERE UserID = $employeeID;";
    $result_check_schedule = mysqli_query($db, $sql_check_schedule);
    $result_check_employee = mysqli_query($db, $sql_check_employee);
    $row_check_schedule = $result_check_schedule->fetch_assoc();
    $row_check_employee = $result_check_employee->fetch_assoc();

    if($_POST['ProcessSchedule'] == 'Add Schedule'){
        //if data in Schedule table for selected employeeID already exist, display the following message.
        if($row_check_schedule!=NULL){
            echo "<Strong style = 'color: crimson'>".'Schedule for EmployeeID '.$employeeID. ' already exist! Data not added!'."</Strong>";
        //if data in Schedule table for selected employeeID do not exist and data in Employee table for that employeeID exist, then insert data in the Schedule table.
        }else if($row_check_schedule==NULL and $row_check_employee!=NULL){
            $sql_insert = "INSERT INTO Schedule (UserID, SchedulerID, WorkDays, Shift, StartTime, EndTime)
             VALUES ($employeeID, $SchedulerID, '$workDays', '$shift', '$startTime', '$endTime');";
             $result = mysqli_query($db, $sql_insert);
             if($result){
                echo "<Strong style = 'color: green'>".'Schedule for EmployeeID '. $employeeID . ' added successfully!'."</Strong>";
              }
              else {
                echo "<Strong style = 'color:crimson'>".'Schedule creation failed. Please try again!'."</Strong>";
              }
        }
        //If no data for selected employeeID exist in Employee table, then display the following message.
        else if($row_check_employee == NULL){
            echo "<Strong style = 'color: red'>".'Please select the corret EmployeeID!'."</Strong>";
            
        }
    }
    else if($_POST['ProcessSchedule'] == 'Update Schedule'){
        //if nothing for selected employeeID exist in Schedule table, then display this message.
        if ($row_check_schedule == NULL){
            echo "<Strong style = 'color: crimson'>".'Employee with EmployeeID '.$employeeID. ' not found in Schedule!'."</Strong>";

        }else{
            $sql_update = "UPDATE Schedule SET SchedulerID = $SchedulerID , WorkDays = '$workDays', Shift = '$shift', 
            StartTime = '$startTime', EndTime = '$endTime' WHERE Schedule.UserID = $employeeID;";
            $result_update = mysqli_query($db, $sql_update);
            if($result_update){
                echo "<Strong style = 'color: green'>".'Schedule for EmployeeID '. $employeeID . ' updated successfully!'."</Strong>";
              }else{
                echo "<Strong style = 'color: crimson'>".'Schedule update failed. Please try again!'."</Strong>";
              }
            }
        }
    
    else if($_POST['ProcessSchedule'] == 'Delete Schedule'){
        //if nothing for selected employeeID exist in Schedule table, then display this message.
        if($row_check_schedule == NULL){
            echo "<Strong style = 'color: crimson'>".'Employee with EmployeeID '.$employeeID. ' not found in Schedule! Delete failed!'."</Strong>";
        }else{
            $sql_delete = "DELETE FROM Schedule WHERE UserID = $employeeID;";
            $result_delete = mysqli_query($db, $sql_delete);
            if($result_delete){
                echo "<Strong style = 'color: green'>".'Schedule for EmployeeID '. $employeeID . ' deleted successfully!'."</Strong>";
            }else{
                echo "<Strong style = 'color: crimson'>".'Schedule deletion failed. Please try again!'."</Strong>";
            }
        }
    }
}

?>