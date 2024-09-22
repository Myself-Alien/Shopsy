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
            <div class="col-md-8 offset-md-2 admin_box">
                <div class="row g-0">
                    <div class="col-md-6 p-4">
                        <h2 class="text-center black">Login</h2>
                        <form action="login_action.php" method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="email" id="email" class="form-control no_radius" placeholder="Enter Email" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="pass" is="pass" class="form-control no_radius" placeholder="Enter Password" required>
                            </div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary no_radius my_btn_dark" value="Submit">
                        </form>
                    </div>
                    <div class="col-md-6 admin_box_extra">
                       <div class="h-100 align-items-center justify-content-center admin_box_side">
                        <div class="row">
                            <div class="col-12 pb-1 nacc_text">A New User?</div>
                            <div class="col-12">
                            <button type="button" class="my_btn_color signup_btn"><a href="signup.php">Sign Up</a></button>
                            </div> 
                        </div>
                        
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const emailEl = document.querySelector('#email');
        const passwordEl = document.querySelector('#pass');

    </script>
</body>
</html>