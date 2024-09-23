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
<body>
<div class="container">
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
    
            echo "<h1>Item added to cart!</h1>";
        } else {
            echo "Item not found!";
        }
    }
    
    // Remove item from cart if 'remove_id' is set in the URL
    if (isset($_GET['remove_id'])) {
        $remove_id = intval($_GET['remove_id']);
        if (isset($_SESSION['cart'][$remove_id])) {
            unset($_SESSION['cart'][$remove_id]);
            echo "<h1>Item removed from cart!</h1>";
        } else {
            echo "<h1>Item not found in cart!</h1>";
        }
    }
    
    // Display the cart contents
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<h1>Your Cart</h1>";
        echo "<ul class='list-group'>";
    
        foreach ($_SESSION['cart'] as $item_id => $item) {
            if (isset($item['item_name'], $item['item_price'], $item['item_img'], $item['quantity'])) {
                echo "<li class='list-group-item'>";
                echo "<div class='row'>";
                echo "<div class='col-md-2'><img src='_dist/uploads/" . htmlspecialchars($item['item_img'], ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($item['item_name'], ENT_QUOTES, 'UTF-8') . "' class='img-fluid'></div>";
                echo "<div class='col-md-8'>";
                echo "<h5>" . htmlspecialchars($item['item_name'], ENT_QUOTES, 'UTF-8') . "</h5>";
                echo "<p>Price: ₹" . htmlspecialchars($item['item_price'], ENT_QUOTES, 'UTF-8') . "</p>";
                echo "<p>Quantity: " . htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8') . "</p>";
                echo "</div>";
                echo "<div class='col-md-2'>";
                echo "<a href='?remove_id=" . htmlspecialchars($item_id, ENT_QUOTES, 'UTF-8') . "' class='btn btn-danger'>Remove</a>"; // Remove item link
                echo "</div>";
                echo "</div>";
                echo "</li>";
            }
        }
    
        echo "</ul>";
        echo "<a href='index.php' class='btn btn-primary mt-3'>Continue Shopping</a>";
    } else {
        echo "<h1>Your cart is empty.</h1>";
        echo "<a href='index.php' class='btn btn-primary'>Start Shopping</a>";
    }
    
    
    ?>
</div>
<?php 
include('footer.php'); // Include your footer 
?>
</body>
</html>
