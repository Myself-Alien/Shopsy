<?php
include('../config/database.php');

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $item_dec = $_POST['item_dec'];
    $item_price = $_POST['item_price'];
    $item_category = $_POST['item_category'];

    $target_dir = "../_dist/uploads/";
    $filename = basename($_FILES["item_image"]["name"]);
$target_file = $target_dir . $filename;

if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
    chmod($target_file, 0755);

    $stmt = $conn->prepare("INSERT INTO `items`(`item_name`, `item_dec`, `item_price`, `item_cate`, `item_img`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $item_name, $item_dec, $item_price, $item_category, $filename); // Save just the filename

    if ($stmt->execute()) {
        echo "<script>
        alert('Item Added Successfully!');
        window.location.href='admin_add_item.php';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Sorry, there was an error uploading your file.";
}
}

$conn->close();
