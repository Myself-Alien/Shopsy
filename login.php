<?php
include('header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shopy || Login</title>
    <link href="_dist/css/styles.css" rel="stylesheet">
    <link href="_dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="_dist/js/bootstrap.min.js"></script>
</head>

<body class="login_page">
    <div class="container-fluid wrapp">
        <div class="container pt-5">
            <div class="col-md-4 offset-md-4 admin_box">
                <h2 class="text-center">Login</h2>
                <form action="login_action.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control no_radius" placeholder="Enter Email" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control no_radius" placeholder="Enter Password" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary no_radius my_btn_dark" value="Submit">
                </form>
            </div>
            <div class="col-md-4 offset-md-4 text-center mt-3">
                <button type="button" class="my_btn_color signup_btn"><a href="signup.php">Sign Up</a></button>
            </div>
        </div>
    </div>
</body>

</html>