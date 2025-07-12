<?php
require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['shout'])) {
    $shout = mysqli_real_escape_string($link, $_POST['shout']);
    
    $query = "INSERT INTO shouts (shout_text) VALUES ('$shout')";
    mysqli_query($link, $query);
}

header("Location: index.php");
exit();
?>