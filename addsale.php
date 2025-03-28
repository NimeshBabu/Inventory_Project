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
    $select_sql = "SELECT ProductCode, ProductName, Quantity, Price * $quantity AS SaleAmount FROM product WHERE ProductCode = '$product_code'";
    $result = mysqli_query($conn, $select_sql);

    if ($row = mysqli_fetch_assoc($result)) {
        $sale_amount = $row['SaleAmount'];
        $available_stock = $row['Quantity'];

        if ($available_stock >= $quantity) {  // Ensure enough stock is available
            // Insert into sales table
            $sql = "INSERT INTO `sales` (`Date`, `ProductCode`, `Quantity`, `PaymentStatus`, `SalesAmount`, `Biller`, `Customer`, `ShippingAddress`) 
                    VALUES ('$date', '$product_code', '$quantity', '$pay_status', '$sale_amount', '$biller', '$customer', '$ship_add')";

            if (mysqli_query($conn, $sql)) {
                // Update Product Quantity
                $update_sql = "UPDATE `product` SET Quantity = Quantity - $quantity WHERE ProductCode = '$product_code'";
                mysqli_query($conn, $update_sql);

                $_SESSION['success'] = "Sales record added & stock updated successfully!";
                header("Location: page-list-sale.php");
                exit();
            } else {
                $_SESSION['error'] = "Something went wrong! Please try again.";
                header("Location: page-add-sale.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "Not enough stock available!";
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
