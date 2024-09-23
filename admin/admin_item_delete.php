<?php
include('../config/database.php');

// Assuming you have the id to delete from a GET or POST request
$id = $_GET['id']; // or $_POST['id'], depending on your form method

// Prepare the SQL statement
$sql = "DELETE FROM items WHERE id=?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the parameter
    $stmt->bind_param("i", $id); // "i" indicates that the parameter is an integer

    // Execute the statement
    if ($stmt->execute()) {
      echo "<script>
      alert('Item Delete Successfully!');
      window.location.href='admin_all_item.php';
      </script>";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Close the connection
$conn->close();
?>
