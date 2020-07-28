<?php

session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];

$conn = mysqli_connect('localhost', 'root', '', 'sms');
$check_email = "SELECT * FROM `users` WHERE email = '$email'";
$result = mysqli_query($conn, $check_email);
$rowcount = mysqli_num_rows($result);

if ($rowcount == 1) {
    $_SESSION['email_exists'] = "This E-Mail Address Already Register";
    header('Location: reg.php');
} else {
    if ($pass != $cpass) {
        $_SESSION['pass_not_match'] = "Password and Confirm Password Not Match";
        header('Location: reg.php');
    } else {
        $conn = mysqli_connect('localhost', 'root', '', 'sms');
        $sql = "INSERT INTO `users`(`name`, `email`, `pass`) VALUES('$name', '$email', '$pass')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['reg_success'] = "Registration Successfully! Please Login Now";
            header("Location: login.php");
        } else {
            $_SESSION['reg_error'] = "Error! Registration Not Successfully!";
            header("Location: reg.php");
        }
    }
}