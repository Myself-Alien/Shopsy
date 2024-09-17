<?php
session_start();
include('config/database.php');
include('header.php');

// Check if the product_id is provided
if (isset($_GET['id'])) {
    $product_id = (int)$_GET['id'];
    $quantity = 1; // Fixed quantity for simplicity

    // Initialize the cart if not already done
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add or update the product in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    echo "Product added to cart!";
} else {
    echo "Product ID is missing!";
}
?>
<!DOCTYPE html>
<html
<head>
    <title>Shopy || Online Shopping</title>
    <link href="_dist/css/styles.css" rel="stylesheet">
    <link href="_dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="_dist/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>