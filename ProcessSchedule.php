<?php
include 'SetSchedule.php';
//include 'ServerConnection.php';

$workDays = '';
$username = $_SESSION['username'];
$employeeID = $_POST['EmployeeID'];
$shift = $_POST['Shift'];
$startTime = $_POST['starttime'];
$endTime = $_POST['endtime'];

If(isset($_POST)){
    if($_POST['ProcessSchedule'] == 'Add Schedule'){
        //echo 'You are adding schedule!';

        //addSchedule($employeeID);
    }
    else if($_POST['ProcessSchedule'] == 'Update Schedule'){
        //echo 'You are updating schedule';

        //updateSchedule($employeeID);
    }
    else if($_POST['ProcessSchedule'] == 'Delete Schedule'){
        //echo 'you are deleting schedule';

       // deleteSchedule($employeeID);
    }
    //echo $_SESSION['username'];
    
    $daysCount = 1;
    foreach($_POST['Work_Days_list'] as $selected){
        if($daysCount < count($_POST['Work_Days_list'])){
            $workDays = $workDays . $selected . ',';
            $daysCount = $daysCount+1;
        }else{
            $workDays = $workDays . $selected;
        }
        
        }
    /*
    echo 'Creator: '.$_SESSION['username']. "</br>";
    echo 'EmployeeId: '.$employeeID."</br>";
    echo 'Shift: '.$shift."</br>";
    echo 'Start Time: '.$startTime. "</br>";
    echo 'End Time: '.$endTime. "</br>";
    echo 'Work Days: '.$workDays. "</br>";
    */     
}
/*
function addSchedule($employeeID){
    /*
    $sql = "SELECT "
    $sql = "INSERT INTO schedule (UserID,SchedulerID,WorkDays,Shift,StartTime,EndTime)
    VALUES ('$sanitized_FirstName', '$sanitized_LastName', '$sanitized_DOB', '$sanitized_SSN', '$sanitized_Address', '$sanitized_TelNum', '$sanitized_email')";
    
    $result1 = mysqli_query($db, $sql1);
    
    return;
}
//to be completed
function updateSchedule($employeeID){
    return;
}
//to be completed
function deleteSchedule($employeeID){
    return;

}
*/
?>