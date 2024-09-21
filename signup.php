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
        <div class="container pb-1 mt-2">
            <div class="col-md-4 offset-md-4 p-3 admin_box">
                <h2 class="text-center">Sign Up</h2>
                <form action="signup_action.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="fname" class="form-control no_radius" placeholder="First Name" required>
                        </div>
                        <div class="col">
                            <input type="text" name="lname" class="form-control no_radius" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control no_radius" placeholder="Email*" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control no_radius" placeholder="Password*" required>
                    </div>
                    Address
                    <div class="input-group mb-3">
                        <input type="text" name="street" class="form-control no_radius" placeholder="Street Address" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="city" class="form-control no_radius" placeholder="City" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="state" class="form-control no_radius" placeholder="State" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="country" class="form-control no_radius" placeholder="Country" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="zip" class="form-control no_radius" placeholder="Zip" required>
                    </div>
                    <div class="input-group mb-3">
                    <input type="file" class="form-control" id="user_image" name="user_image" accept="image/*" required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary no_radius my_btn_dark" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>