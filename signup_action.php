<?php
include('config/database.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    //$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $zip = $_POST['zip'];

    $target_dir = "_dist/user_image/";
    $filename = basename($_FILES["user_image"]["name"]);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $target_file)) {
        chmod($target_file, 0755);
        $stmt = $conn->prepare("INSERT INTO `user_reg`(`fname`, `lname`, `email`, `pass`, `street`, `city`, `state`, `country` ,`zip`, `user_image`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssssssss", $fname, $lname, $email, $pass, $street, $city, $state, $country, $zip,$filename);
    
        if ($stmt->execute()) {
            echo "<script>
                alert('Signup Successful!');
                window.location.href='login.php';
                </script>";
        } 
    }
    else
    {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>