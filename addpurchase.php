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
    $date=$_POST['dob'];      
    $product_code=$_POST['product_code'];
    $quantity=$_POST['quantity'];
    $pay_status=$_POST['pay_status'];
    


    // $sql="SELECT * FROM `purchase` WHERE PANNo='$pan' ";
    // $result=mysqli_query($conn,$sql);
    // $num=mysqli_num_rows($result);

    // if($num>0) {
    //     $_SESSION['error'] = $supplier. " already exists! ";
    //     header("Location: page-add-supplier.html");
    //     exit();    
    // }

    $sql="INSERT INTO `purchase` (`Date`, `ProductCode`, `Quantity`, `PaymentStatus`) VALUES ('$date', '$product_code', '$quantity', '$pay_status')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Purchase added."; //Alert message is generated in login page
        header("Location: page-list-purchase.php");
        exit();
        }
        
        else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: page-add-purchase.html");
        exit();
        }   

 }
?>