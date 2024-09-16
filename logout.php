<?php 
session_start(); 

session_unset(); 

echo "Redirect Please Wait";
header("Location: ../index.php");
exit();
?>