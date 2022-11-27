<?php
    include 'ProcessTimeRequest.php';
    if(isset($id)){
        $sql = "UPDATE TimeOffRequest SET Status = 'Deny' WHERE TimeOffRequest.ID = $id;";

        $result = mysqli_query($db, $sql);

        if(!$result){
            die("Invalid query: " .mysqli_error());
        }
    }

?>
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