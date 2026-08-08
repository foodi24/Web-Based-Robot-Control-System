<?php

include "db.php";

$sql = "SELECT state FROM robot_state WHERE id=1";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

echo $row['state'];

?>