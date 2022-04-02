<?php

include('DB.php');

$delPost = $_POST['id'];
$sql = "DELETE FROM blog WHERE postID='$delPost'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "Post deleted successfully";
    $_SESSION['status'] = "Success";
    echo '<script type = "text/javascript"> alert("Post is deleted successfully"); window.location.replace("blog-admin.php"); </script>';
    $conn->close();
} else {
    $_SESSION['msg'] = "Error deleting blog post: " . $conn->error;
    $_SESSION['status'] = "Fail";
}
?>
