<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'shoutbox';

$link = mysqli_connect($host, $user, $password, $database);

if (!$link) {
    die('Connection error: ' . mysqli_connect_error());
}
?>