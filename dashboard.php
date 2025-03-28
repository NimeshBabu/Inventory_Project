<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login_html.php");
    exit();
}



$servername = "localhost";
$username = "root";
$password = "";
$database = "inventrix";

// Connect to database
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

// Get total products
$sql_total_products = "SELECT COUNT(*) as total_products FROM product";
$result_total_products = mysqli_query($conn, $sql_total_products);
$total_products = mysqli_fetch_assoc($result_total_products)['total_products'];

// Get total purchases
$sql_total_purchases = "SELECT COUNT(*) as total_purchases FROM purchase";
$result_total_purchases = mysqli_query($conn, $sql_total_purchases);
$total_purchases = mysqli_fetch_assoc($result_total_purchases)['total_purchases'];

// Get total suppliers
$sql_total_suppliers = "SELECT COUNT(*) as total_suppliers FROM supplier";
$result_total_suppliers = mysqli_query($conn, $sql_total_suppliers);
$total_suppliers = mysqli_fetch_assoc($result_total_suppliers)['total_suppliers'];

// Get total sales
$sql_total_sales = "SELECT COUNT(*) as total_sales FROM sales";
$result_total_sales = mysqli_query($conn, $sql_total_sales);
$total_sales = mysqli_fetch_assoc($result_total_sales)['total_sales'];

// Get top products in html


// Get current month's income
$sql_income = "SELECT SUM(SalesAmount) as total_income 
    FROM sales 
    WHERE MONTH(Date) = MONTH(CURRENT_DATE())
    AND YEAR(Date) = YEAR(CURRENT_DATE())";
$result_income = mysqli_query($conn, $sql_income);
$income = mysqli_fetch_assoc($result_income)['total_income'] ?? 0;

// Get current month's expenses
$sql_expenses = "SELECT SUM(PurchaseAmount) as total_expenses 
    FROM purchase 
    WHERE MONTH(Date) = MONTH(CURRENT_DATE())
    AND YEAR(Date) = YEAR(CURRENT_DATE())";
$result_expenses = mysqli_query($conn, $sql_expenses);
$expenses = mysqli_fetch_assoc($result_expenses)['total_expenses'] ?? 0;

// Get user email from session
$user_email = $_SESSION['email'] ?? 'user@example.com';



// Close connection
mysqli_close($conn);
?>