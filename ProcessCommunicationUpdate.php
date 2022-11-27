<?php
include_once 'ServerConnection.php';
?>
<?php

if(isset($_POST['update_comm_data']))
{
    $ID = $_POST['ID'];
    $Communication = $_POST['Communication'];
    

    $query = "UPDATE Communication SET Communication='$Communication' WHERE ID ='$ID' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Updated Successfully";
        header("Location: UpdateCommunication.php");
    }
    else
    {
        $_SESSION['status'] = "Not Updated";
        header("Location: UpdateCommunication.php");
    }
    mysqli_close($db);

}

?>


