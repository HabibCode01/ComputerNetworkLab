<?php
$servername = "localhost";
$username = "";
$password = "root";
$dbname = "Lab_7";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>