<?php
session_start(); 

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

} else {
    echo "<div class='container-fluid log_top_clr'>";
    echo "<div class='container'>";
    echo "<div class='col-md-12 log_top_msg'>";
    echo "<span class='blink'>Login and Continue Shopping</span>"; 
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
include('config/database.php');
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopy || Online Shopping</title>
    <link href="_dist/css/styles.css" rel="stylesheet">
    <link href="_dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="_dist/js/bootstrap.bundle.min.js"></script> 
</head>
<body class="login_page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 no-pad">
                <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="_dist/images/slider1.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center bottom-0 slider_caption black">
                                <h1 class="black">Shop Latest Trends!</h1>
                                <p class="black">Limited Time Offers - Grab Them Before They're Gone!</p>
                                <button class="my_btn_dark p-2">Shop Now</button>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="_dist/images/slider2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center bottom-0 slider_caption">
                                <h1 class="black">New Arrivals Daily</h1> 
                                <p class="black">Unbeatable Deals Just a Click Away – Don’t Miss Out!</p>
                                <button class="my_btn_dark p-2">Shop Now</button>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container pt-3 pb-4">
            <h2 class="text-center pb-2">Our Products</h2>
            <div class='row'>
            <?php
            $sql = "SELECT * FROM items";
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die('Query failed: ' . mysqli_error($conn));
            }
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                   
                   echo "<div class='col-md-3 mb-4'>";
                    echo "<div class='card product_card no_radius'>";
                    echo "<img src='_dist/uploads/" . htmlspecialchars($row['item_img'], ENT_QUOTES, 'UTF-8') . "' alt='" .htmlspecialchars($row['item_name'], ENT_QUOTES, 'UTF-8') . "' class='card-img-top item_img' />";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . htmlspecialchars($row['item_name'], ENT_QUOTES, 'UTF-8') . "</h5>";
                    echo "<p class='card-text Item_price'>" ."<span>"."₹"."</span>". htmlspecialchars($row['item_price'], ENT_QUOTES, 'UTF-8') . "</p>";
                    echo "<a href='cart.php?id' class='btn btn-primary float-start no_radius w-100 cart_btn'><i class='bi bi-cart4'></i> Add to Cart</a>";
                    //echo "<a href='#' class='btn btn-primary float-end'>Buy Now</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo '<p class="text-center">No items found.</p>';
            }
            mysqli_close($conn);
            ?>
        </div>
        </div>
    </div>
    <script>
        const myCarouselElement = document.querySelector('#carouselExampleCaptions');
        const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 4000,
            touch: false
        });
    </script>
</body>
</html>
