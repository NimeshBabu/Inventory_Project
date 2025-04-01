<?php
include './config/db.php'; // Ensure this file connects to your database

if(isset($_POST['product_code'])) {
    $productCode = $_POST['product_code'];
    $query = "SELECT Quantity FROM product WHERE ProductCode = ?";
    
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $productCode);
    $stmt->execute();
    $stmt->bind_result($quantity);
    $stmt->fetch();
    
    echo ($quantity !== null) ? $quantity : "0"; // Return stock quantity or 0
    $stmt->close();
}
$con->close();
?>
