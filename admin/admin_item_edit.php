<?php
include('../config/database.php');
$id = $_GET['id'];
$Record = mysqli_query($conn, "SELECT * FROM `items` WHERE id= $id");
$data = mysqli_fetch_array($Record);

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
                    <li class="list-group-item"><a href="admin_all_item.php"><i class="bi bi-card-checklist"></i> All Iteam</a></li>
                    <div class="text-success">
                        <hr>
                    </div>
                    <li class="list-group-item"><a href="#"><i class="bi bi-person-badge-fill"></i> Manage Users</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col mt-3 add_item_sec">
                        <h3>Edit Iteam</h3>
                        <form action="admin_add_item_action.php" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="item_name" placeholder="Item Name" required>
                            </div>
                            <div class="input-group mb-3">
                                <textarea class="form-control" placeholder="Item Decription" style="height: 100px" name="item_dec" required></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="Item Price"  name="item_price" required>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" name="item_category" required>
                                    <option selected>Item Category</option>
                                    <option value="mobile">Mobile</option>
                                    <option value="laptop">Laptop</option>
                                    <option value="camera">Camera</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="item_image" name="item_image" accept="image/*" required>
                            </div>
                            <div class="input-group mb-3">
                                <input type="submit" class="btn btn-primary no_radius my_btn_dark" name="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="copyright" align="center">© 2023 - <?php echo date('Y'); ?> www.shopping.com - All Rights Reserved.
            </footer>
        </div>
    </div>
</body>

</html>