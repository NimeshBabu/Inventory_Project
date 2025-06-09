<?php
session_start();
include 'config/db.php';

$prod_code = $_GET['prod_code'];

// Check if the product exists in purchase or sale tables
$check_query = "SELECT ProductCode FROM purchase WHERE ProductCode='$prod_code' 
                UNION 
                SELECT ProductCode FROM sales WHERE ProductCode='$prod_code'";

$check_result = mysqli_query($con, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    // If product exists in related records, show an alert
    $_SESSION['error'] = "Cannot delete! This product is linked to a purchase or sale record.";
} else {
    // Safe to delete the product
    $sql = "DELETE FROM `product` WHERE ProductCode='$prod_code'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $_SESSION['success'] = "Product Deleted Successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete product!";
    }
}

// Redirect back to product list page
header("Location: page-list-product.php");

exit();
?>
