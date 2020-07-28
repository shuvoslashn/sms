<?php

session_start();

if (!isset($_SESSION['login_success'])) {
    $_SESSION['login_error'] = "Please Login First";
    header('Location: login.php');
}

$id = $_GET['id'];
echo "Student id : $id";

$conn = mysqli_connect('localhost', 'root', '', 'sms');
$sql = "SELECT * FROM `students` WHERE id = $id";
$result = mysqli_query($conn, $sql);
$std = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <title>Edit Data</title>
    </head>

    <body>
        <div class="container pt-5">
            <div class="row">
                <!-- Column Two -->
                <div class="col-md-2">
                    <a href="index.php" class="btn btn-info px-4 rounded-pill">Edit Students</a>
                </div>

                <!-- Column Five -->
                <div class="offset-md-1 col-md-5">
                    <!-- Heading -->
                    <div class="heading border-bottom mb-3">
                        <h3>Edit Student</h3>
                    </div>

                    <!-- Student List Table -->
                    <form action="update.php?id=<?php echo $id ?>" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control rounded-pill"
                                placeholder="Enter Full Name" value="<?php echo $std['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="age">Age</label>
                            <input type="text" name="age" id="age" class="form-control rounded-pill"
                                placeholder="Enter Age" value="<?php echo $std['age']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="roll">Roll</label>
                            <input type="text" name="roll" id="roll" class="form-control rounded-pill"
                                placeholder="Enter Roll" value="<?php echo $std['roll']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control rounded-pill"
                                placeholder="Enter Phone Number" value="<?php echo $std['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control rounded-pill"
                                placeholder="Enter Parmanent Address" value="<?php echo $std['address']; ?>">
                        </div>
                        <div class="form-btn pt-3">
                            <button type="submit" class="btn btn-primary px-5 rounded-pill">Update</button>
                        </div>
                    </form>

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

</html>