<?php
session_start();
include 'config/db.php';
$prod_code=$_GET['prod_code'];
$sql="DELETE FROM `product` WHERE ProductCode='$prod_code'";
$result=mysqli_query($con,$sql);
if($result){
    $_SESSION['success'] = " Product Deleted Successfully."; //Alert message is generated in login page
        header("Location: page-list-product.php");
        exit();
}
else{
    echo "Something went wrong. Please try again." . mysqli_error($con);
}


?>