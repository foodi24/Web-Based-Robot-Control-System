<?php

$host = "sql312.infinityfree.com";
$user = "if0_42412300";
$pass = "0rAPYCHG3N8";
$dbname = "if0_42412300_control";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
