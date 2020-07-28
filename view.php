<?php
session_start();

if (!isset($_SESSION['login_success'])) {
    $_SESSION['login_error'] = "Please Login First";
    header('Location: login.php');
}

$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '', 'sms');
$sql = "SELECT * FROM `students` WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $std = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <title>View Student's Info</title>
    </head>

    <body>
        <div class="container pt-5">
            <div class="row">
                <!-- Column Two -->
                <div class="col-md-2">
                    <a href="index.php" class="btn btn-info px-4 rounded-pill">All Students</a>
                </div>

                <!-- Column Ten -->
                <div class="col-md-10">
                    <!-- Heading -->
                    <div class="heading border-bottom mb-3">
                        <h3><?=$std['name'] . "'s Details"?></h3>
                        <?php if (isset($_SESSION['update_success'])) {?>
                        <div class="alert alert-success" role="alert">
                            <?=$_SESSION['update_success'];?>
                        </div>
                        <?php }?>

                        <?php if (isset($_SESSION['update_success'])) {?>
                        <div class="alert alert-success" role="alert">
                            <?=$_SESSION['update_error'];?>
                        </div>
                        <?php }?>
                    </div>

                    <!-- Single Student Table -->
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <td><?php echo $std['name']; ?></td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td><?php echo $std['age']; ?></td>
                        </tr>
                        <tr>
                            <th>Roll</th>
                            <td><?php echo $std['roll']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $std['phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $std['address']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

</html>

<?php
unset($_SESSION['update_success']);
unset($_SESSION['update_error']);
?>