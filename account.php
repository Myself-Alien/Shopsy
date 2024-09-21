<?php
session_start();
include('config/database.php');
include('header.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Shopy || Online Shopping</title>
</head>

<body class="login_page">
    <div class="container-fluid">
        <div class="container">
            <div class="col-md-8 offset-md-2 text-center mt-5 mb-5">
                <?php

                $stmt = $conn->prepare("SELECT fname, lname, email, street, city, state, country, zip, user_image FROM user_reg WHERE email = ?");
                $stmt->bind_param("s", $email);

                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $image_path = "_dist/user_image/" . $user['user_image'];
                } else {
                    echo "No user found.";
                }
                $stmt->close();
                $conn->close();
                ?>

                <?php if (isset($user)): ?>
                    <?php if (file_exists($image_path)): ?>
                        <img src="<?php echo htmlspecialchars($image_path); ?>" alt="User Image" style="max-width: 200px; max-height: 200px;">
                    <?php else: ?>
                        <p>No image available.</p>
                    <?php endif; ?>

                    <h1><?php echo htmlspecialchars($user['fname'] . ' ' . $user['lname']); ?></h1>
                    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                    <p>Address: <?php echo htmlspecialchars($user['street'] . ', ' . $user['city'] . ', ' . $user['state'] . ', ' . $user['country'] . ' ' . $user['zip']); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php 
include('footer.php');
?>
</body>

</html>