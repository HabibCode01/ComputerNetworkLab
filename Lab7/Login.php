<?php
session_start();
include 'db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE matric='$matric'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['matric'] = $matric;
            header("Location: display.php");
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; }
        form { max-width: 300px; margin: 0 auto; }
        input { margin: 5px; padding: 5px; width: 100%; }
    </style>
</head>
<body>
    <form method="post">
        Matric: <input type="text" name="matric"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login