<?php

include "db.php";

if(isset($_POST['state'])){

    $state = $_POST['state'];

    $sql = "UPDATE robot_state SET state='$state' WHERE id=1";

    if(mysqli_query($conn,$sql)){
        echo "Command Updated Successfully";
    } else {
        echo "Error";
    }

}

?>
