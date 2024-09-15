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
                    <li class="list-group-item"><a href="admin_dashboard.php">Dashboard</a></li>
                    <li class="list-group-item"><a href="admin_add_item.php">Add Item</a></li>
                    <li class="list-group-item"><a href="admin_all_item.php">All Iteam</a></li>
                    <li class="list-group-item">Manage Users</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="row mt-3">
                    <h3>Dashboard</h3>
                    <div class="col-md-4 no_underline">
                        <a href="admin_all_item.php">
                            <div class="card no_radius">
                                <img src="../_dist/images/checklist.gif" class="card-img-top" alt="...">
                                <div class="card-body admin_block_border">
                                    <h3 class="card-title text-center">All Items</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 no_underline">
                        <a href="admin_add_item.php">
                            <div class="card no_radius">
                                <img src="../_dist/images/notebook.gif" class="card-img-top" alt="...">
                                <div class="card-body admin_block_border">
                                    <h3 class="card-title text-center">Add Items</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 no_underline">
                        <a href="">
                            <div class="card no_radius">
                                <img src="../_dist/images/social-care.gif" class="card-img-top" alt="...">
                                <div class="card-body admin_block_border">
                                    <h3 class="card-title text-center">Manage Users</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            <footer class="copyright" align="center">© 2023 - <?php echo date('Y'); ?> www.shopping.com - All Rights Reserved.
            </footer>
        </div>
    </div>
</body>

</html>