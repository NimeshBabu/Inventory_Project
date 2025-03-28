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
    $supplier=$_POST['supplier'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $pan=$_POST['pan'];



    $sql="SELECT * FROM `supplier` WHERE PANNo='$pan'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    if($num>0) {
        $_SESSION['error'] = "'" .$supplier. "' already exists! ";
        header("Location: page-add-supplier.php");
        exit();    
    }

    $sql="INSERT INTO `supplier` (`Supplier-PAN`, `Supplier`, `Email`, `PhoneNo`, `Address`, `PANNo`) VALUES ('$supplier-$pan','$supplier', '$email', '$phone', '$address', '$pan')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] =  $supplier." Added Successfully!"; 
        header("Location: page-list-suppliers.php");
        exit();
        }
        
        else {
        $_SESSION['error'] = "Something went wrong! Please try again.";
        header("Location: page-add-supplier.php");
        exit();
        }   

 }
?>