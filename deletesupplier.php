<?php
session_start();
include 'config/db.php';
$pan=$_GET['pan'];

try {
    $sql="DELETE FROM `supplier` WHERE PANNo='$pan'";
    $result=mysqli_query($con,$sql);
    
    if($result){
        $_SESSION['success'] = "Supplier Deleted Successfully!"; 
        header("Location: page-list-suppliers.php");
        exit();
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1451) { // Foreign key constraint violation
        $_SESSION['error'] = "Cannot delete! This supplier is linked to a product.";
    } else {
        $_SESSION['error'] = "Failed to delete supplier record!";
    }
    header("Location: page-list-suppliers.php");
    exit();
}
?>