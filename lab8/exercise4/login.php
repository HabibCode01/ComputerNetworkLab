<?php
require('db.php');
session_start();

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, stripslashes($_REQUEST['username']));
    $password = mysqli_real_escape_string($con, stripslashes($_REQUEST['password']));

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "Username not found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form">
        <h1>Log In</h1>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="post" name="login">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input name="submit" type="submit" value="Login">
        </form>
        <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
    </div>
</body>
</html>