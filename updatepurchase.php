<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventrix";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $purchase_id = $_POST['purchase_id'];
    $payment_status = $_POST['payment_status'];

    // Update payment status
    $sql = "UPDATE purchase SET PaymentStatus = ? WHERE PurchaseID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $payment_status, $purchase_id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Payment status updated successfully!";
    } else {
        $_SESSION['error'] = "Failed to update payment status: " . mysqli_error($conn);
    }

    header("Location: page-list-purchase.php");
    exit();
}
?>