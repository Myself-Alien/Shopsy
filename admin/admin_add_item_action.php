<?php
include('../config/database.php');

if (isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $item_dec = $_POST['item_dec'];
    $item_price = $_POST['item_price'];
    $item_category = $_POST['item_category'];

    $target_dir = "../_dist/uploads/";
    $target_file = $target_dir . basename($_FILES["item_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {

        $stmt = $conn->prepare("INSERT INTO `items`(`item_name`, `item_dec`, `item_price`, `item_cate`, `item_img`) VALUES (?, ?, ?, ?, ?)");

        $stmt->bind_param("sssss", $item_name, $item_dec, $item_price, $item_category, $target_file);

        if ($stmt->execute()) {
            echo "<script>
            alert('Item Add Successfully!');
            window.location.href='admin_add_item.php';
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } 
    else {
        echo "Sorry, there was an error uploading.";
    }
}

$conn->close();
