<?php

include_once 'ServerConnection.php';

$sql = "SELECT workedhours.PII_ID, FirstName, LastName, RegularHours, OverTimeHours FROM 
        workedhours JOIN personal_identifying_info ON workedhours.PII_ID = personal_identifying_info.PII_ID;";
        $result = mysqli_query($db, $sql);
            if(!$result){
                die("Invalid query: " .mysqli_error());
            }
            while($row = $result->fetch_assoc()){
                echo "<tr>
                <td> $row[PII_ID] </td>
                <td> $row[FirstName] </td>
                <td> $row[LastName] </td>
                <td> $row[RegularHours] </td>
                <td> $row[OverTimeHours] </td>
            </tr>";
            }





?>