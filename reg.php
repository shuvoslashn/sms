<?php
session_start();
if (isset($_SESSION['pass_not_match'])) {
    $pass_not_match = $_SESSION['pass_not_match'];
}
if (isset($_SESSION['reg_error'])) {
    $reg_error = $_SESSION['reg_error'];
}
if (isset($_SESSION['email_exists'])) {
    $email_exists = $_SESSION['email_exists'];
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

        <title>Signup || SMS System</title>
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
                        <h3>Registration Here</h3>
                        <?php if (isset($pass_not_match)) {?>
                        <div class="alert alert-danger" role="alert">
                            <?=$pass_not_match;?>
                        </div>
                        <?php }?>

                        <?php if (isset($reg_error)) {?>
                        <div class="alert alert-danger" role="alert">
                            <?=$reg_error;?>
                        </div>
                        <?php }?>

                        <?php if (isset($email_exists)) {?>
                        <div class="alert alert-warning" role="alert">
                            <?=$email_exists;?>
                        </div>
                        <?php }?>
                    </div>

                    <!-- Student List Table -->
                    <form action="creg.php" method="POST">
                        <div class="form-group">
                            <label class="font-weight-bold" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control px-3 rounded-pill"
                                placeholder="Enter Full E-Mail" required>
                        </div>
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
                        <div class="form-group">
                            <label class="font-weight-bold" for="cpass">Confirm Password</label>
                            <input type="password" name="cpass" id="cpass" class="form-control px-3 rounded-pill"
                                placeholder="Enter Confirm Password" required>
                        </div>
                        <div class="form-btn pt-3">
                            <button type="submit" class="btn btn-primary px-5 py-2 mr-3 rounded-pill">Signup</button>
                            Already have an account! Please
                            <a href="login.php">Login</a>
                        </div>
                    </form>
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
unset($_SESSION['pass_not_match']);
unset($_SESSION['reg_error']);
unset($_SESSION['email_exists']);
?>