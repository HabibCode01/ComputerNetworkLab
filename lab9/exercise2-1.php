<!DOCTYPE html>
<html>
<head>
    <title>Exercise 2.1: Self-Referencing Form</title>
</head>
<body>
    <h1>Exercise 2.1: Self-Referencing Form</h1>
    <?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        echo "<p>Enter name: <b>$name</b></p>";
    }
    ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="name" placeholder="Your Name">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>