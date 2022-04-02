<?php
session_start();
include('DB.php');

$email = $_POST['email'];
$password = $_POST['password'];
//to prevent from mysqli injection
$sql = "select * from admin where email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    $_SESSION["emailSession"] = $email;
    $_SESSION["useremail"] = $email;
    $_SESSION["userpassword"] = $password;
    echo '<script type = "text/javascript"> alert("Login Successful!");
    window.location.replace("dashboard.php"); </script>';

}
else {
// $_SESSION['loginErr'] = "error";
    $_SESSION['status'] = "Fail";
    $_SESSION['msg'] = "Invalid " . ucfirst($table)  . " email or Password";
    echo '<script type = "text/javascript"> alert("Login Unsuccessful!");
    window.location.replace("login.php"); </script>';
}
?>
