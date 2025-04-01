<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventrix";

// Database Connection
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $purchase_id = $_POST['purchase_id'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = isset($_POST['payment_amount']) ? floatval($_POST['payment_amount']) : 0;

    // Fetch the current purchase details
    $check_sql = "SELECT DueAmount, PurchaseAmount, PaymentStatus FROM purchase WHERE PurchaseID = ?";
    $stmt_check = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($stmt_check, "i", $purchase_id);
    mysqli_stmt_execute($stmt_check);
    $result = mysqli_stmt_get_result($stmt_check);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $due_amount = $row['DueAmount'];
        $purchase_amount = $row['PurchaseAmount'];
        $current_status = $row['PaymentStatus'];

        // If status is changed to "Paid", set DueAmount to 0
        if ($payment_status === "Paid") {
            $due_amount = 0;
        } 
        

        // Update the purchase record in the database
        $update_sql = "UPDATE purchase SET PaymentStatus = ?, DueAmount = ? WHERE PurchaseID = ?";
        $stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($stmt, "sdi", $payment_status, $due_amount, $purchase_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success'] = "Payment status updated successfully!";
        } else {
            $_SESSION['error'] = "Failed to update payment status: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Purchase record not found!";
    }

    header("Location: page-list-purchase.php");
    exit();
}
?>
