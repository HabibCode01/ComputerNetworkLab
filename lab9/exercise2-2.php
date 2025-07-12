<!DOCTYPE html>
<html>
<head>
    <title>Exercise 2.2: GET Method</title>
</head>
<body>
    <h1>Exercise 2.2: GET Method</h1>
    <?php
    if(isset($_GET['name'])) {
        echo "<p>Hi, " . htmlspecialchars($_GET['name']) . "</p>";
    }
    ?>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="name" placeholder="Your Name">
        <input type="submit" value="Submit">
    </form>
</body>
</html>