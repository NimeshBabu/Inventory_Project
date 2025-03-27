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
    $sale_id = $_POST['sale_id'];
    $payment_status = $_POST['payment_status'];

    // Update payment status
    $sql = "UPDATE sales SET PaymentStatus = ? WHERE SaleID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $payment_status, $sale_id);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Payment status updated.";
    } else {
        $_SESSION['error'] = "Failed to update payment status: " . mysqli_error($conn);
    }

    header("Location: page-list-sale.php");
    exit();
}
?>