<?php
require('db.php');

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, stripslashes($_REQUEST['username']));
    $email = mysqli_real_escape_string($con, stripslashes($_REQUEST['email']));
    $password = mysqli_real_escape_string($con, stripslashes($_REQUEST['password']));
    $confirm_password = mysqli_real_escape_string($con, stripslashes($_REQUEST['confirm_password']));
    $trn_date = date("Y-m-d H:i:s");

    if ($password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password, trn_date) 
                  VALUES ('$username', '$email', '$hashed_password', '$trn_date')";
        
        if (mysqli_query($con, $query)) {
            $success = "You are registered successfully. <a href='login.php'>Login here</a>";
        } else {
            $error = "Registration failed. Username or email may already exist.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form">
        <h1>Registration</h1>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php else: ?>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <input type="submit" name="submit" value="Register">
            </form>
        <?php endif; ?>
        <p>Already have an account? <a href='login.php'>Login Here</a></p>
    </div>
</body>
</html>