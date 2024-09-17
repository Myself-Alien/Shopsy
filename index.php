<?php
session_start(); // Start the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    echo "<div class='container-fluid log_top_clr'>";
    echo "<div class='container'>";
    echo "<div class='col-md-12 log_top_msg'>";
    echo "<blink class='blink'>Login and Continue Shopping</blink>";
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
    <script src="_dist/js/bootstrap.min.js"></script>
</head>

<body>
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
                            <img src="_dist/images/slider1.jpg" class="d-block w-100 " alt="...">
                            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center bottom-0">
                                <h1 class="">First slide label</h1>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="_dist/images/slider2.jpg" class="d-block w-100 " alt="...">
                            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center bottom-0">
                                <h1>First slide label</h1>
                                <p>Some representative placeholder content for the second slide.</p>
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
            <div class="row">
            <div class="col-md-3">
                <div class="card no_radius">
                    <img src="_dist/uploads/img35.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <a href="#" class="btn btn-primary float-start">Add to Cart</a><a href="#" class="btn btn-primary float-end">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card no_radius">
                    <img src="_dist/uploads/img35.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary float-start">Add to Cart</a><a href="#" class="btn btn-primary float-end">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card no_radius">
                    <img src="_dist/uploads/img35.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary float-start">Add to Cart</a><a href="#" class="btn btn-primary float-end">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card no_radius">
                    <img src="_dist/uploads/img35.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary float-start">Add to Cart</a><a href="#" class="btn btn-primary float-end">Buy Now</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script>
        const myCarouselElement = document.querySelector('#carouselExampleCaptions')

        const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 4000,
            touch: false
        })
    </script>
</body>