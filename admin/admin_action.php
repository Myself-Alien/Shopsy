<?php
include('../config/database.php');

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['pass'];


    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

  
        if ($pass === $user['pass']) { 
            echo "Login successful!";
            session_start();
            //$_SESSION['$email'];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}


mysqli_close($conn);
?>
