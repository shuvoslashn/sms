<?php
session_start();
$email = $_POST['email'];
$pass = $_POST['pass'];

$conn = mysqli_connect('localhost', 'root', '', 'sms');
$sql = "SELECT * FROM `users` WHERE email = '$email' AND pass = '$pass'";
$result = mysqli_query($conn, $sql);
$rowcount = mysqli_num_rows($result);

if ($rowcount == 1) {
    $_SESSION['login_success'] = true;
    header('Location: index.php');
} else {
    $_SESSION['login_error'] = "Wrong Email or Password";
    header('Location: login.php');
}