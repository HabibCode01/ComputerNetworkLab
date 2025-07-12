<?php
require('db.php');
include("auth.php");

$id = $_REQUEST['id'];

// Check if the current user is the one who submitted the record
$check_query = "SELECT submittedby FROM new_record WHERE id='" . $id . "'";
$check_result = mysqli_query($con, $check_query);
$check_row = mysqli_fetch_assoc($check_result);

if ($check_row['submittedby'] == $_SESSION['username']) {
    $query = "DELETE FROM new_record WHERE id='" . $id . "'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    header("Location: view.php");
    exit();
} else {
    die("You are not authorized to delete this record");
}
?>