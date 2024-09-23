<?php
include('../config/database.php');

// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert to integer for safety
    $Record = mysqli_query($conn, "SELECT * FROM `items` WHERE id= $id");

    // Check if the record exists
    if (mysqli_num_rows($Record) == 0) {
        echo "No item found with this ID.";
        exit;
    }

    $data = mysqli_fetch_array($Record);
} else {
    echo "No item ID provided.";
    exit;
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $id = intval($_POST['id']);
        $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
        $item_cate = mysqli_real_escape_string($conn, $_POST['item_category']); // Changed to item_cate
        $item_price = floatval($_POST['item_price']);

        $image_loc = $_FILES['item_img']['tmp_name'];
        $image_name = $_FILES['item_img']['name'];
        $img_des = "../_dist/uploads/" . basename($image_name);

        // Check if image upload is successful
        if (move_uploaded_file($image_loc, $img_des)) {
            // Prepare the update query
            $update_query = "UPDATE `items` SET `item_name`='$item_name', `item_cate`='$item_cate', `item_price`='$item_price', `item_img`='$img_des' WHERE id= $id"; // Changed item_category to item_cate
            
            if (mysqli_query($conn, $update_query)) {
                echo "<script>
                    alert('Item edited successfully!');
                    window.location.href='admin_all_item.php';
                    </script>";
            } else {
                echo "Error updating record: " . mysqli_error($conn) . " SQL: $update_query";
            }
        } else {
            echo "Error uploading image.";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link href="../_dist/css/styles.css" rel="stylesheet">
    <link href="../_dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../_dist/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid wrapp">
        <div class="row">
            <nav class="navbar navbar-expand-lg admin_top">
                <div class="container-fluid admin_text">
                    <h1>Admin Area</h1>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-2 admin_option">
                <ul class="list-group pt-3">
                    <li class="list-group-item"><a href="admin_dashboard.php"><i class="bi bi-speedometer"></i> Dashboard</a></li>
                    <div class="text-success p-0">
                        <hr>
                    </div>
                    <li class="list-group-item"><a href="admin_add_item.php"><i class="bi bi-clipboard-data-fill"></i> Add Item</a></li>
                    <div class="text-success">
                        <hr>
                    </div>
                    <li class="list-group-item"><a href="admin_all_item.php"><i class="bi bi-card-checklist"></i> All Item</a></li>
                    <div class="text-success">
                        <hr>
                    </div>
                    <li class="list-group-item"><a href="#"><i class="bi bi-person-badge-fill"></i> Manage Users</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col mt-3 add_item_sec">
                        <h3>Edit Item</h3>
                        <form action="admin_item_edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <input type="text" value="<?php echo htmlspecialchars($data['item_name']); ?>" class="form-control" name="item_name" placeholder="Item Name" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" value="<?php echo htmlspecialchars($data['item_price']); ?>" placeholder="Item Price" name="item_price" required>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" name="item_category" required>
                                    <option value="" disabled>Select Item Category</option>
                                    <option value="mobile" <?php if ($data['item_cate'] == 'mobile') echo 'selected'; ?>>Mobile</option>
                                    <option value="laptop" <?php if ($data['item_cate'] == 'laptop') echo 'selected'; ?>>Laptop</option>
                                    <option value="camera" <?php if ($data['item_cate'] == 'camera') echo 'selected'; ?>>Camera</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="item_image" name="item_img" accept="image/*" required>
                            </div>
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
                            <div class="input-group mb-3">
                                <button class="bg-danger my-3 fw-bold form-control text-white" name="update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="copyright" align="center">© 2023 - <?php echo date('Y'); ?> www.shopping.com - All Rights Reserved.</footer>
        </div>
    </div>
</body>

</html>
