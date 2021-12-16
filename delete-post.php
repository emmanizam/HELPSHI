<?php

include('DB.php');

$delPost = $_GET['id'];
$sql = "DELETE FROM blog WHERE postID='$delPost'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Post deleted successfully";
    $_SESSION['status'] = "Success";
    header("Location: blog-admin.php");
    $conn->close();
} else {
    $_SESSION['msg'] = "Error deleting blog post: " . $conn->error;
    $_SESSION['status'] = "Fail";
}
?>
