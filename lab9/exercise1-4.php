<!DOCTYPE html>
<html>
<head>
    <title>Exercise 1.4: Function Arguments</title>
</head>
<body>
    <h1>Exercise 1.4: Function Arguments</h1>
    <?php
    function familyName($name, $year) {
        echo "$name born in $year <br>";
    }
    familyName("Candy", "1975");
    familyName("Azrin", "1978");
    familyName("Bernard", "1983");
    ?>
</body>
</html>