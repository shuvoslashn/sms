<?php
session_start();

if (!isset($_SESSION['login_success'])) {
    $_SESSION['login_error'] = "Please Login First";
    header('Location: login.php');
}

$conn = mysqli_connect('localhost', 'root', '', 'sms');
$sql = "SELECT * FROM `students`";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

        <title>SMS System</title>
    </head>

    <body>
        <div class="container pt-5">
            <div class="row">
                <!-- Column Two -->
                <div class="col-md-2">
                    <a href="insert.php" class="btn btn-info px-4 rounded-pill">Add New</a><br><br>
                    <a href="logout.php" class="btn btn-warning px-4 rounded-pill">Logout</a>
                </div>

                <!-- Column Ten -->
                <div class="col-md-10">
                    <!-- Heading -->
                    <div class="heading border-bottom mb-3">
                        <h3>Students List</h3>
                        <!-- Delete Successfully -->
                        <?php if (isset($_SESSION['delete_success'])) {?>
                        <div class="alert alert-success" role="alert">
                            <?=$_SESSION['delete_success'];?>
                        </div>
                        <?php }?>

                        <!-- Delete Error Message -->
                        <?php if (isset($_SESSION['delete_error'])) {?>
                        <div class="alert alert-danger" role="alert">
                            <?=$_SESSION['delete_error'];?>
                        </div>
                        <?php }?>
                    </div>

                    <!-- Student List Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Roll</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($rows = mysqli_fetch_assoc($result)) {?>
                            <tr>
                                <td><?php echo $rows['name'] ?></td>
                                <td><?php echo $rows['age'] ?></td>
                                <td><?php echo $rows['roll'] ?></td>
                                <td>
                                    <a href="view.php?id=<?php echo $rows['id'] ?>"
                                        class="btn btn-primary mr-2 rounded-pill">View</a>
                                    <a href="edit.php?id=<?php echo $rows['id'] ?>"
                                        onclick="return confirm('Are You Sure?');"
                                        class="btn btn-warning mr-2 rounded-pill">Edit</a>
                                    <a href="delete.php?id=<?php echo $rows['id'] ?>"
                                        onclick="return confirm('Are You Sure?');"
                                        class="btn btn-danger rounded-pill">Delete</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
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
}

unset($_SESSION['delete_success']);
unset($_SESSION['delete_error']);
// unset($_SESSION['login_success']);

?>