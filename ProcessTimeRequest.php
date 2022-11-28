<?php
    include 'ShowTimeRequest.php';
    //capture id from different file
    $id = $_POST['number'];
    //define a variable
    $check_status = '';

    //check the status of time off request
    $sql_check_status = "SELECT Status FROM TimeOffRequest WHERE TimeOffRequest.ID = $id;";
    $result_check_status = mysqli_query($db, $sql_check_status);

    if(!$result_check_status){
        die("Invalid query: " .mysqli_error());
    }
    $row_check_status = $result_check_status->fetch_assoc();
    $check_status = $row_check_status['Status'];
    
    //if the status of time off request is Pending then process the time off request.
    if($check_status == 'Pending'){
        if(isset($id) && ($_POST['ProcessTimeRequest'] == 'Approve Request')){
            //approve the time off request
            $sql = "UPDATE TimeOffRequest SET Status = 'Approved' WHERE TimeOffRequest.ID = $id;";
    
            $result = mysqli_query($db, $sql);
    
            if(!$result){
                die("Invalid query: " .mysqli_error());
            }
        } else if(isset($id) && ($_POST['ProcessTimeRequest'] == 'Deny Request')){
            //deny the time off request
            $sql = "UPDATE TimeOffRequest SET Status = 'Denied' WHERE TimeOffRequest.ID = $id;";
    
            $result = mysqli_query($db, $sql);
    
            if(!$result){
                die("Invalid query: " .mysqli_error());
            }
        }
        else{
            echo 'Sorry something went wrong. Please try again';
        }
    } 
?>
<!-- This refresh the page instantaneously. -->
<script type='text/javascript'>
  
    // JavaScript anonymous function
    (() => {
        if (window.localStorage) {

            // If there is no item as 'reload'
            // in localstorage then create one &
            // reload the page
            if (!localStorage.getItem('reload')) {
                localStorage['reload'] = true;
                window.location.reload();
            } else {

                // If there exists a 'reload' item
                // then clear the 'reload' item in
                // local storage
                localStorage.removeItem('reload');
            }
        }
    })(); // Calling anonymous function here only
</script>