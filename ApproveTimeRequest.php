<?php
    include 'ProcessTimeRequest.php';
    //include 'ServerConnection.php';
    //echo $id;
    //if($_SERVER['REQUEST_METHOD'] == 'GET'){
        //if(!isset($_GET["id"])){
            //header('Location:ProcessTimeRequest.php');
        //}
        //$id = $_GET["id"];
    //}
    $id = $_POST["id"];
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        echo 'The captured id is:'.$id;
        $sql = "UPDATE TimeOffRequest SET Status = 'Pending' WHERE TimeOffRequest.ID = $id;";

        $result = mysqli_query($db, $sql);

        if(!$result){
            die("Invalid query: " .mysqli_error());
        }
    }else{
        echo 'Data not captured.';
    }

    
    //header("Location:ProcessTimeRequest.php");

    echo $id;
    //exit;
?>