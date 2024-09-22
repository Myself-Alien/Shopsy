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
                        <div id="errorMessages" class="text-danger mb-3"></div> <!-- Error message area -->
                        <form id="loginForm" action="login_action.php" method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="email" id="email" class="form-control no_radius" placeholder="Enter Email">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="pass" id="pass" class="form-control no_radius" placeholder="Enter Password">
                            </div>
                            <input type="submit" name="submit" id="submit" class="btn btn-primary no_radius my_btn_dark" value="Submit">
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
        const submitBtn = document.getElementById('submit');
        const loginForm = document.getElementById('loginForm');
        const errorMessagesDiv = document.getElementById('errorMessages');

        const validate = (e) => {
            // Clear previous error messages
            errorMessagesDiv.innerHTML = "";
            const email = document.getElementById('email');
            const password = document.getElementById('pass');
            let errorMessages = [];

            if (email.value === "") {
                errorMessages.push("Please enter your email address.");
                email.focus();
            }
            if (password.value === "") {
                errorMessages.push("Please enter your password.");
                if (errorMessages.length === 1) { // Only focus if email is not empty
                    password.focus();
                }
            }

            if (errorMessages.length > 0) {
                // Display error messages
                errorMessagesDiv.innerHTML = errorMessages.join("<br>");
                e.preventDefault(); // Prevent form submission
                return false;
            }

            return true; // Allow form submission
        }

        loginForm.addEventListener('submit', validate);
    </script>
</body>

</html>
