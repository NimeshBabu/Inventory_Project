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
    $due_amount=$_POST['due_amount'];
    
    
    $select_sql = "SELECT 
                p.ProductCode,
                p.ProductName,
                s.`Supplier-PAN` AS Supplier_PAN, 
                p.Cost,
                p.Price,
                p.Cost * $quantity AS PurchaseAmount
            FROM product p
            JOIN supplier s ON p.`Supplier-PAN` = s.`Supplier-PAN`
            WHERE p.ProductCode = '$product_code'";

    $result = mysqli_query($conn, $select_sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $purchase_amount = $row['PurchaseAmount'];
        $supplier_pan = $row['Supplier_PAN'];

        // Insert into the purchase table
        $sql = "INSERT INTO `purchase` (`Date`, `ProductCode`, `Quantity`, `PaymentStatus`, `PurchaseAmount`, `DueAmount`, `Supplier-PAN`) 
        VALUES ('$date', '$product_code', '$quantity', '$pay_status', '$purchase_amount', '$due_amount', '$supplier_pan')";


   
    if (mysqli_query($conn, $sql)) {
        $update_sql = "UPDATE `product` SET Quantity = Quantity + $quantity WHERE ProductCode = '$product_code'";
        mysqli_query($conn, $update_sql);
        $_SESSION['success'] = "Purchase record added & stock updated successfully!"; //Alert message is generated in login page
        header("Location: page-list-purchase.php");
        exit();
        }

        else {
        $_SESSION['error'] = "Something went wrong! Please try again.";
        header("Location: page-add-purchase.php");
        exit();
        }   
    }



 }
?>