<?php
session_start();
include 'config/db.php';

if (isset($_POST['sale_id'])) {
    $sale_id = mysqli_real_escape_string($con, $_POST['sale_id']);


    $delete_sql = "DELETE FROM sales WHERE SaleID = '$sale_id'";
    if (mysqli_query($con, $delete_sql)) {
        $_SESSION['success'] = "Sale record deleted successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete sale record! " ;
    }
}

header("Location: page-list-sale.php"); 
exit();
?>