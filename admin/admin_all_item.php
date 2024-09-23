<?php
include('../config/database.php');

if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link href="../_dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_dist/css/styles.css" rel="stylesheet">
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
                <h3>All Items</h3>
                <?php
                $sql = "SELECT * FROM items";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die('Query failed: ' . mysqli_error($conn));
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='row m-1'>";
                        echo "<div class='card mb-3'>";
                        echo "<div class='row g-0'>";
                        echo "<div class='col-md-1'>";
                        echo "<div class='card-body'>";
                        echo htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-md-2'>";
                        echo "<div class='card-body admin_all_img'>";
                        echo "<img src='../_dist/uploads/" . htmlspecialchars($row['item_img'], ENT_QUOTES, 'UTF-8') . "' alt='" . htmlspecialchars($row['item_name'], ENT_QUOTES, 'UTF-8') . "' class='w-100'>";
                        echo "</div>";
                        echo "</div>";

                        echo "<div class='col-md-3'>";
                        echo "<div class='card-body'>";
                        echo htmlspecialchars($row['item_name'], ENT_QUOTES, 'UTF-8');
                        echo "</div>";
                        echo "</div>";
                        //echo "<div class='col-md-4'>";
                        //echo "<div class='card-body'>";
                        //echo htmlspecialchars($row['item_dec'], ENT_QUOTES, 'UTF-8');
                        //echo "</div>";
                        //echo "</div>";
                        echo "<div class='col-md-2'>";
                        echo "<div class='card-body'>";
                        echo htmlspecialchars($row['item_price'], ENT_QUOTES, 'UTF-8');
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='col-md-2'>";
                        echo "<div class='card-body'>";
                        echo htmlspecialchars($row['item_cate'], ENT_QUOTES, 'UTF-8');
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='col-md-2'>";
                        echo "<div class='card-body'>";
                        echo "<button type='button' class='btn btn-danger delete_btn'><a href='admin_item_delete_action.php?id=" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "'>Delete</a></button>  <button type='button' class='btn btn-info delete_btn'><a href='admin_item_edit.php?id=".$row['id']."'>Edit</a></button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo 'No items found.';
                }
                ?>
            </div>
        </div>

    </div>
    <footer class="copyright" align="center">© 2023 - <?php echo date('Y'); ?> www.shopping.com - All Rights Reserved.
    </footer>
</body>

</html>