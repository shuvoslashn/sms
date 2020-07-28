<?php

session_start();

$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'sms');
$sql = "DELETE FROM `students` WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    $_SESSION['delete_success'] = "Data Delete Successfully";
    header("Location: index.php");
} else {
    $_SESSION['delete_error'] = "Error! Data Can't Delete";
    header("Location: index.php");
}