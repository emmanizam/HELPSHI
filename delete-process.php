<?php
session_start();
include('DB.php');

$del_user = $_SESSION['emailSession'];
$sql = "DELETE FROM admin WHERE email='$del_user'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Record deleted successfully";
    $_SESSION['status'] = "Success";
    header("Location: index.php");
    $conn->close();
} else {
    $_SESSION['msg'] = "Error deleting record: " . $conn->error;
    $_SESSION['status'] = "Fail";
}