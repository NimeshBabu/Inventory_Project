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
    // Validate input fields
    if (!isset($_POST['sale_id']) || !isset($_POST['payment_status'])) {
        $_SESSION['error'] = "Invalid request. Sale ID or Payment Status is missing.";
        header("Location: page-list-sale.php");
        exit();
    }

    $sale_id = intval($_POST['sale_id']);  // Ensure SaleID is an integer
    $payment_status = $_POST['payment_status'];

    // Fetch current sale details
    $check_sql = "SELECT DueAmount, SalesAmount, PaymentStatus FROM sales WHERE SaleID = ?";
    $stmt_check = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($stmt_check, "i", $sale_id);
    mysqli_stmt_execute($stmt_check);
    $result = mysqli_stmt_get_result($stmt_check);

    if ($row = mysqli_fetch_assoc($result)) {
        $due_amount = $row['DueAmount'];
        $sales_amount = $row['SalesAmount'];
        $current_status = $row['PaymentStatus'];

        // If "Paid" is selected, set DueAmount to 0
        if ($payment_status === "Paid") {
            $due_amount = 0;
        }

        // Ensure DueAmount is never greater than SalesAmount
        if ($due_amount > $sales_amount) {
            $_SESSION['error'] = "Due amount cannot exceed total sale amount!";
            header("Location: page-list-sale.php");
            exit();
        }

        // Update the sale record
        $update_sql = "UPDATE sales SET PaymentStatus = ?, DueAmount = ? WHERE SaleID = ?";
        $stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($stmt, "sdi", $payment_status, $due_amount, $sale_id);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['success'] = "Payment status updated successfully!";
        } else {
            $_SESSION['error'] = "Failed to update payment status: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error'] = "Sale record not found!";
    }

    header("Location: page-list-sale.php");
    exit();
}
?>
