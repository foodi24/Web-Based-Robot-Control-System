<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo "Method Not Allowed";
    exit;
}

$text = trim($_POST["text_output"] ?? "");

if ($text === "") {
    http_response_code(400);
    echo "No text received.";
    exit;
}

$stmt = mysqli_prepare($conn, "INSERT INTO speech_output (text_output) VALUES (?)");

if (!$stmt) {
    http_response_code(500);
    echo "Database error: " . mysqli_error($conn);
    exit;
}

mysqli_stmt_bind_param($stmt, "s", $text);

if (mysqli_stmt_execute($stmt)) {
    echo "Text saved successfully.";
} else {
    http_response_code(500);
    echo "Database error: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
