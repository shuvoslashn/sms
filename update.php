<?php
session_start();

if (!isset($_SESSION['login_success'])) {
    $_SESSION['login_error'] = "Please Login First";
    header('Location: login.php');
}

$id = $_GET['id'];
echo "Student id : $id";

function valid($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = valid($_POST['name']);
$age = valid($_POST['age']);
$roll = valid($_POST['roll']);
$address = valid($_POST['address']);
$phone = valid($_POST['phone']);

$conn = mysqli_connect('localhost', 'root', '', 'sms');
$sql = "UPDATE `students` SET `name`='$name',`age`='$age',`roll`='$roll',`address`='$address',`phone`='$phone' WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    $_SESSION['update_success'] = "Data Update Successfully";
    header("Location: view.php?id=$id");
} else {
    $_SESSION['update_error'] = "Data Can't Update Successfully";
    header("Location: view.php?id=$id");
}