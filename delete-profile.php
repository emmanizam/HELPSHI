<?php

session_start();
include 'DB.php';

$currUser = $_SESSION['emailSession'];
$delUser = $_POST['id'];

$sql = "DELETE FROM admin WHERE email='$delUser'";


if ($conn->query($sql) === TRUE) {
    
    $_SESSION['msg'] = "User deleted successfully";
    $_SESSION['status'] = "Success";
    if ($currUser == $delUser) {
        echo '<script type = "text/javascript"> alert("Account is deleted successfully");</script>';
        session_destroy();
        header("Location: index.php");
    }
    elseif ($currUser != $delUser) {
        echo '<script type = "text/javascript"> alert("Account is deleted successfully"); window.location.replace("users.php"); </script>';
        $conn->close();
    } 
} else {
    $_SESSION['msg'] = "Error deleting user account: " . $conn->error;
    $_SESSION['status'] = "Fail";
}
?>

