<?php
include('config/database.php');

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = $_POST['pass'];

    // Query to find user with the provided email
    $sql = "SELECT * FROM user_reg WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user record
        $user = mysqli_fetch_assoc($result);

        // Compare plain text password
        if ($pass === $user['pass']) { // 'password' should be replaced with the actual column name in your database
            session_start();
            $_SESSION['email'] = $email; // Correctly assign the session variable
            header("Location: index.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}

// Close the connection
mysqli_close($conn);
