<?php
session_start();
include 'config/db.php';

if (isset($_POST['purchase_id'])) {
    $purchase_id = mysqli_real_escape_string($con, $_POST['purchase_id']);

    // Perform the deletion using PurchaseID
    $delete_sql = "DELETE FROM purchase WHERE PurchaseID = '$purchase_id'";
    if (mysqli_query($con, $delete_sql)) {
        $_SESSION['success'] = "Purchase record deleted successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete purchase record! " ;
    }
}

header("Location: page-list-purchase.php"); // Redirect to the purchase list page
exit();
?>