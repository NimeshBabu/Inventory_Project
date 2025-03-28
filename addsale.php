<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "inventrix";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if connection failed
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['dob'];  
    $product_code = $_POST['product_code'];
    $quantity = $_POST['quantity'];
    $pay_status = $_POST['pay_status'];
    $biller = $_POST['biller'];
    $customer = $_POST['customer'];
    $ship_add = $_POST['ship_add'];

    // Validate quantity
    if ($quantity <= 0) {
        $_SESSION['error'] = "Invalid quantity! Please enter a valid amount.";
        header("Location: page-add-sale.php");
        exit();
    }

    // Get product details
    $select_sql = "SELECT ProductCode, ProductName, Quantity, Price FROM product WHERE ProductCode = ?";
    $stmt = mysqli_prepare($conn, $select_sql);
    mysqli_stmt_bind_param($stmt, "s", $product_code);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $sale_amount = $row['Price'] * $quantity;
        $available_stock = $row['Quantity'];

        if ($available_stock >= $quantity) {
            // Start transaction
            mysqli_begin_transaction($conn);
            
            try {
                // Insert into sales table
                $insert_sql = "INSERT INTO `sales` (`Date`, `ProductCode`, `Quantity`, `PaymentStatus`, `SalesAmount`, `Biller`, `Customer`, `ShippingAddress`) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $insert_sql);
                mysqli_stmt_bind_param($stmt, "ssisssss", $date, $product_code, $quantity, $pay_status, $sale_amount, $biller, $customer, $ship_add);
                mysqli_stmt_execute($stmt);

                // Update Product Quantity
                $update_sql = "UPDATE `product` SET Quantity = Quantity - ? WHERE ProductCode = ?";
                $stmt = mysqli_prepare($conn, $update_sql);
                mysqli_stmt_bind_param($stmt, "is", $quantity, $product_code);
                mysqli_stmt_execute($stmt);

                mysqli_commit($conn);
                $_SESSION['success'] = "Sales record added & stock updated successfully!";
                header("Location: page-list-sale.php");
                exit();
            } catch (Exception $e) {
                mysqli_rollback($conn);
                $_SESSION['error'] = "Something went wrong! Please try again.";
                header("Location: page-add-sale.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Not enough stock available! Available stock: " . $available_stock;
            header("Location: page-add-sale.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid Product Code!";
        header("Location: page-add-sale.php");
        exit();
    }
}
?>
