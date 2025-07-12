<!DOCTYPE html>
<html lang="en">
<head>
 Usr: <title>Lab 6 Q1</title>
</head>
<body>
    <?php
        $name = "Ahmad Nur Habib bin Mohd Sidek";
        $matricNumber = "CI230083";
        $course = "Multimedia Computing";
        $year = "Year 2";
        $address = "1-1, Jalan Murni 1,Taman Temiang Murni, Muar, Johor";
    ?>
    <table>
        <tr><td>Name</td><td><?php echo $name; ?></td></tr>
        <tr><td>Matric Number</td><td><?php echo $matricNumber; ?></td></tr>
        <tr><td>Course</td><td><?php echo $course; ?></td></tr>
        <tr><td>Year of Study</td><td><?php echo $year; ?></td></tr>
        <tr><td>Address</td><td><?php echo $address; ?></td></tr>
    </table>
</body>
</html>