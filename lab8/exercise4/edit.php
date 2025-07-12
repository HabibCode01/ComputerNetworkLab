<?php
require('db.php');
include("auth.php");

$id = $_REQUEST['id'];
$query = "SELECT * FROM new_record WHERE id='" . $id . "'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
$row = mysqli_fetch_assoc($result);

$status = "";

if (isset($_POST['new']) && $_POST['new'] == 1) {
    $id = $_REQUEST['id'];
    $trn_date = date("Y-m-d H:i:s");
    $name = mysqli_real_escape_string($con, $_REQUEST['name']);
    $age = mysqli_real_escape_string($con, $_REQUEST['age']);
    $submittedby = $_SESSION["username"];
    
    $update = "UPDATE new_record SET 
               trn_date='" . $trn_date . "', 
               name='" . $name . "', 
               age='" . $age . "', 
               submittedby='" . $submittedby . "' 
               WHERE id='" . $id . "'";
    
    if (mysqli_query($con, $update)) {
        $status = "Record Updated Successfully. <br/>
                  <a href='view.php'>View Updated Record</a>";
    } else {
        $status = "Error updating record: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form">
        <p><a href="dashboard.php">Dashboard</a> 
        | <a href="insert.php">Insert New Record</a> 
        | <a href="logout.php">Logout</a></p>
        
        <h1>Update Record</h1>
        <?php if ($status): ?>
            <p style="color:#FF0000;"><?php echo $status; ?></p>
        <?php endif; ?>
        
        <div>
            <form name="form" method="post" action="">
                <input type="hidden" name="new" value="1">
                <input name="id" type="hidden" value="<?php echo $row['id']; ?>">
                <p><input type="text" name="name" placeholder="Enter Name" 
                       required value="<?php echo $row['name']; ?>" /></p>
                <p><input type="text" name="age" placeholder="Enter Age" 
                       required value="<?php echo $row['age']; ?>" /></p>
                <p><input name="submit" type="submit" value="Update" /></p>
            </form>
        </div>
    </div>
</body>
</html>