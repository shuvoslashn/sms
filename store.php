<?php

function valid($data) {
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
$sql = "INSERT INTO `students`(`name`, `age`, `roll`, `address`, `phone`) VALUES('$name', '$age', '$roll', '$address', '$phone')";
if(mysqli_query($conn, $sql)) {
    header("Location: index.php");
}
else {
    echo "Data Not Insert !";
}


?>
