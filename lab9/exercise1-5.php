<!DOCTYPE html>
<html>
<head>
    <title>Exercise 1.5: Type Declarations</title>
</head>
<body>
    <h1>Exercise 1.5: Type Declarations</h1>
    <h3>Without Strict Type</h3>
    <?php
    function addNumbers(int $a, int $b) {
        return $a + $b;
    }
    echo addNumbers(5, "5"); // Output: 10
    ?>

    <h3>With Strict Type (Error)</h3>
    <?php
    // Uncomment to see the error
    /*
    declare(strict_types=1);
    function addNumbersStrict(int $a, int $b) {
        return $a + $b;
    }
    echo addNumbersStrict(5, "5"); // TypeError
    */
    ?>
    <p><em>Note: Strict mode error is commented out for demonstration.</em></p>
</body>
</html>