<!DOCTYPE html>
<html>

<head>
    <title>Shopy || Online Shopping</title>
    <link href="_dist/css/styles.css" rel="stylesheet">
    <link href="_dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="_dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid header_top">
        <div class="container">
            <div class="d-flex">
                <?php
                if (isset($_SESSION['fname'])) {
                   
                    $email = $_SESSION['fname'];
                    echo  "<div class='p-2 flex-grow-1'>" . ('Welcome, '  . $email) . "</div>";
                }
                ?>
                <div class="p-2">Privacy</div>
                <div class="p-2">Media</div>
                <div class="p-2">Media</div>
                <div class="p-2">Contact</div>
            </div>
        </div>
    </div>


    <div class="container-fluid menu_area">
        <div class="container">
            <div class="row pt-3 pb-3">
                <div class="col-md-4">
                    <h2 class="logo mb-0"><a href="index.php">Shopy</a></h2>
                </div>
                <div class="col-md-8">
                    <ul class="menu_area_menu mb-0 float-end">
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="">My Account</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            dfhgdf
        </div>
    </div>
</body>