<?php
session_start();
include('config/database.php'); // Include your database connection
include('header.php'); // Include your header

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shopy || Cart</title>
    <link href="_dist/css/styles.css" rel="stylesheet">
    <link href="_dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="login_page">
<div class="container pt-1 pb-4">
<?php
    
    // Check if 'id' is set in the URL for adding to cart
    if (isset($_GET['id'])) {
        $item_id = intval($_GET['id']); // Get the item ID from the URL
    
        // Fetch item details from the database
        $result = mysqli_query($conn, "SELECT * FROM items WHERE id = $item_id");
        if (mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);
    
            // Initialize the cart in the session if it doesn't exist
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
    
            // Add item to cart
            if (isset($_SESSION['cart'][$item_id])) {
                $_SESSION['cart'][$item_id]['quantity'] += 1; // Increment quantity if item already in cart
            } else {
                $_SESSION['cart'][$item_id] = [
                    'item_name' => $item['item_name'],
                    'item_price' => $item['item_price'],
                    'item_img' => $item['item_img'],
                    'quantity' => 1 // Start with quantity of 1
                ];
            }
    
            echo "<h6 class='mt-3'>Items Added to Cart!</h6>";
        } else {
            echo "Item not found!";
        }
    }
    
    // Remove item from cart if 'remove_id' is set in the URL
    if (isset($_GET['remove_id'])) {
        $remove_id = intval($_GET['remove_id']);
        if (isset($_SESSION['cart'][$remove_id])) {
            unset($_SESSION['cart'][$remove_id]);
            echo "<h6>Item removed from cart!</h6>";
        } else {
            echo "<h6>Item not found in cart!</h6>";
        }
    }
    
    // Display the cart contents
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        //echo "<h1>Your Cart</h1>";
        echo "<ul class='list-group'>";
    
        foreach ($_SESSION['cart'] as $item_id => $item) {
            if (isset($item['item_name'], $item['item_price'], $item['item_img'], $item['quantity'])) {
                echo "<div class='row border border-dark-subtle p-3 mb-3'>";
                echo "<div class='col-md-3'><img src='_dist/uploads/" . htmlspecialchars($item['item_img'], ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($item['item_name'], ENT_QUOTES, 'UTF-8') . "' class='img-fluid cart_img'></div>";
                echo "<div class='col-md-3 middle'>";
                echo "<h5>" . htmlspecialchars($item['item_name'], ENT_QUOTES, 'UTF-8') . "</h5>";
                echo "</div>";
                echo "<div class='col-md-2 middle'>";
                echo "<p>Quantity: " . htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8') . "</p>";
                echo "</div>";
                echo "<div class='col-md-2 middle'>";
                echo "<p>Price: ₹" . htmlspecialchars($item['item_price'], ENT_QUOTES, 'UTF-8') . "</p>";
                echo "</div>";
                echo "<div class='col-md-2 middle'>";
                echo "<a href='?remove_id=" . htmlspecialchars($item_id, ENT_QUOTES, 'UTF-8') . "' class='btn btn-danger my_btn_red no_radius'>Remove</a>"; // Remove item link
                echo "</div>";
                echo "</div>";
    
            }
        }
    
        echo "</ul>";
        echo "<a href='index.php' class='btn btn-primary mt-3 my_btn_dark no_radius'><i class='bi bi-arrow-left'></i>  Continue Shopping</a>";
    } else {
        echo "<h1>Your cart is empty.</h1>";
        echo "<a href='index.php' class='btn btn-primary mt-3 my_btn_dark no_radius'>Start Shopping</a>";
    }
    
    
    ?>
</div>
<?php 
include('footer.php'); // Include your footer 
?>
</body>
</html>
