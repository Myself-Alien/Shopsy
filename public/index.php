<?php
include('../includes/header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shopy || Online Shopping</title>
    <link href="../_dist/css/styles.css" rel="stylesheet">
    <link href="../_dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../_dist/js/bootstrap.min.js"></script>
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
                            <img src="../_dist/images/slider1.jpg" class="d-block w-100 " alt="...">
                            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center bottom-0">
                                <h1 class="">First slide label</h1>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="../_dist/images/slider2.jpg" class="d-block w-100 " alt="...">
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
    <script>
        const myCarouselElement = document.querySelector('#carouselExampleCaptions')

        const carousel = new bootstrap.Carousel(myCarouselElement, {
            interval: 4000,
            touch: false
        })
    </script>
</body>