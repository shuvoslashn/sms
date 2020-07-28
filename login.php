<?php
session_start();
if (isset($_SESSION['login_error'])) {
    $login_error = $_SESSION['login_error'];
}
if (isset($_SESSION['reg_success'])) {
    $reg_success = $_SESSION['reg_success'];
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

        <title>Login || SMS System</title>
    </head>

    <body>
        <div class="container pt-5">
            <div class="row">
                <!-- Column Two -->
                <div class="col-md-2">
                </div>

                <!-- Column Five -->
                <div class="offset-md-1 col-md-5">
                    <!-- Heading -->
                    <div class="heading border-bottom mb-3">
                        <h3>Admin Login</h3>
                        <?php if (isset($login_error)) {?>
                        <div class="alert alert-danger" role="alert">
                            <?=$login_error;?>
                        </div>
                        <?php }?>
                        <?php if (isset($reg_success)) {?>
                        <div class="alert alert-success" role="alert">
                            <?=$reg_success;?>
                        </div>
                        <?php }?>
                    </div>

                    <!-- Student List Table -->
                    <form action="clogin.php" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">E-Mail</label>
                            <input type="email" name="email" id="email" class="form-control px-3 rounded-pill"
                                placeholder="Enter Full E-Mail" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="pass">Password</label>
                            <input type="password" name="pass" id="pass" class="form-control px-3 rounded-pill"
                                placeholder="Enter Password" required>
                        </div>
                        <div class="form-btn pt-3">
                            <button type="submit" class="btn btn-primary px-5 py-2 mr-3 rounded-pill">Login</button>
                            Not a member! Please
                            <a href="reg.php">Signup</a>
                        </div>
                    </form>

                    <!-- Optional JavaScript -->
                    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>

</html>

<?php
unset($_SESSION['login_error']);
unset($_SESSION['reg_success']);
?>