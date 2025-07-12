<!DOCTYPE html>
<html>
<head>
    <title>Exercise 2.3: POST Method</title>
</head>
<body>
    <h1>Exercise 2.3: POST Method</h1>
    <?php
    if(isset($_POST['name'])) {
        echo "<p>Hi, " . htmlspecialchars($_POST['name']) . "</p>";
    }
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="name" placeholder="Your Name">
        <input type="submit" value="Submit">
    </form>
</body>
</html>