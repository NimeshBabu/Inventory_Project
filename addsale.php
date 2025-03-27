<?php
 session_start();
 $servername="localhost";
 $username="root";
 $password="";
 $database="inventrix";

 // To connect to the database
 $conn=mysqli_connect($servername,$username,$password,$database);
 if (!$conn){
     die("Sorry we failed to connect: ".mysqli_connect_error()); 
 }

 if ($_SERVER['REQUEST_METHOD']=='POST'){     
    $date = $_POST['dob'];  
    $product_code=$_POST['product_code'];
    $quantity=$_POST['quantity'];
    $pay_status=$_POST['pay_status'];
    $biller=$_POST['biller'];
    $customer=$_POST['customer'];
    $ship_add=$_POST['ship_add'];
    
    if ($quantity <= 0) {
        $_SESSION['error'] = "Invalid quantity! Please enter a valid amount.";
        header("Location: page-add-sale.php");
        exit();
    }

    
    $select_sql = "SELECT 
                p.ProductCode,
                p.ProductName,
                p.Price * $quantity AS SaleAmount,
                p.Cost
            FROM product p
            WHERE p.ProductCode = '$product_code'";

    $result = mysqli_query($conn, $select_sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $sale_amount = $row['SaleAmount'];
        $available_stock = $row['Quantity'];

        if ($available_stock <= $quantity) {

        // Insert into the purchase table
        $sql = "INSERT INTO `sales` (`Date`, `ProductCode`, `Quantity`, `PaymentStatus`, `SalesAmount`, `Biller`, `Customer`, `ShippingAddress`) 
                       VALUES ('$date', '$product_code', '$quantity', '$pay_status', '$sale_amount', '$biller', '$customer', '$ship_add')";

   
    if (mysqli_query($conn, $sql)) {
        $update_sql = "UPDATE `product` SET Quantity = Quantity - $quantity WHERE ProductCode = '$product_code'";
        mysqli_query($conn, $update_sql);
        $_SESSION['success'] = "Sales record added & stock updated successfully!"; 
        header("Location: page-list-sale.php");
        exit();
        }

        else {
        $_SESSION['error'] = "Something went wrong! Please try again.";
        header("Location: page-add-sale.php");
        exit();
        }   
    }

    else {
        $_SESSION['error'] = "Not enough stock available!";
        header("Location: page-add-sale.php");
        exit();
    }

    }
 }
?>