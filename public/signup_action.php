<?php
include('../config/database.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];

    $stmt = $conn->prepare("INSERT INTO `user_reg`(`fname`, `lname`, `email`, `pass`, `street`, `city`, `state`, `country` ,`zip`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssss", $fname, $lname, $email, $pass, $street, $city, $state, $country, $zip);

    if ($stmt->execute()) {
        echo "<script>
            alert('Signup Successful!');
            window.location.href='login.php';
            </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
