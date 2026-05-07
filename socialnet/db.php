<?php

$host = "localhost";
$dbname = "socialnet";
$user = "socialuser";
$pass = "123456";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
