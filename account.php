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
        <?php 
        $sql = "SELECT id, fname, lname, email, pass, user_image FROM user_reg WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $pass = $row['pass'];
            $user_image = $row['user_image'];
        } else {
            echo "No User Found!";
        }
        
        mysqli_close($conn);
        ?>
        <h3><?php echo "Name : "."$fname" . " " . "$lname"; ?></a></h3>
        <img src="<?php echo ($user_image); ?>" alt="Profile" class="st_profile_img">
        </div>
    </div>
</body>