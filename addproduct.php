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
    $prod_name=$_POST['prod_name'];
    $prod_code=$_POST['prod_code'];
    $supplier_pan=$_POST['supplier-pan'];
    $cost=$_POST['cost'];
    $price=$_POST['price'];
    $image=$_POST['image'];
    $desc=$_POST['desc'];
    $quantity=$_POST['quantity'];

    
    $sql="SELECT * FROM `product` WHERE ProductCode='$prod_code'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    if($num>0) {
        $_SESSION['error'] = "'" .$prod_name . "' already exists in the inventory! ";
        header("Location: page-add-product.php");
        exit();    
    }

    $sql="INSERT INTO `product` (`ProductCode`, `ProductName`, `Supplier-PAN`, `Cost`, `Price`, `Description`, `Url`, `Quantity`) 
          VALUES ('$prod_code', '$prod_name', '$supplier_pan', '$cost', '$price', '$desc', '$image', '$quantity')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] =  $prod_name . " Added Successfully!";
        header("Location: page-list-product.php");
        exit();
    } else {
        $_SESSION['error'] = "Something went wrong! Please try again.";
        header("Location: page-add-product.php");
        exit();
    }   
 }
?>