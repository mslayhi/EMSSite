<?php
include_once 'ServerConnection.php';
?>
<?php

if(isset($_POST['comm_delete_btn']))
{
    $id = $_POST['delete_comm_id'];

    $query = "DELETE FROM Communication WHERE id='$id' ";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Data Deleted Successfully";
        header('Location: ModifyCommunication.php');
    }
    else
    {
        $_SESSION['status'] = "Data Not Deleted";
        header("Location: ModifyCommunication.php");
    }
    mysqli_close($db);

}

?>
