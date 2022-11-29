<?php

    include_once 'ServerConnection.php';

    $username = $_SESSION['username'];
    $role = '';
    $sql = '';

    $sql_check_role = "SELECT Role FROM Login WHERE UserName = '$username';";
    $result_check_role = mysqli_query($db, $sql_check_role);
    if(!$result_check_role){
        die("Invalid query: ".mysqli_error());
    }
    $row_check_role = $result_check_role->fetch_assoc();
    $role = $row_check_role['Role'];

    if($role!='Manager'){
        $sql = "SELECT workedhours.PII_ID, FirstName, LastName, RegularHours, OverTimeHours FROM 
            workedhours JOIN personal_identifying_info ON workedhours.PII_ID = personal_identifying_info.PII_ID
            JOIN Login ON workedhours.PII_ID = Login.PII_ID WHERE Login.UserName = '$username';";
    }else{
        $sql = "SELECT workedhours.PII_ID, FirstName, LastName, RegularHours, OverTimeHours FROM 
            workedhours JOIN personal_identifying_info ON workedhours.PII_ID = personal_identifying_info.PII_ID;";
    }

    $result = mysqli_query($db, $sql);
        if(!$result){
            die("Invalid query: " .mysqli_error());
        }
        while($row = $result->fetch_assoc()){
            echo "<tr class = 'table-row'>
            <td class = 'table-data'> $row[PII_ID] </td>
            <td class = 'table-data'> $row[FirstName] </td>
            <td class = 'table-data'> $row[LastName] </td>
            <td class = 'table-data'> $row[RegularHours] </td>
            <td class = 'table-data'> $row[OverTimeHours] </td>
        </tr>";
        }





?>