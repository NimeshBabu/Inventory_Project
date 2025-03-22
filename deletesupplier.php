<?php
session_start();
include 'config/db.php';
$pan=$_GET['pan'];
$sql="DELETE FROM `supplier` WHERE PANNo='$pan'";
$result=mysqli_query($con,$sql);
if($result){
    $_SESSION['success'] = " Supplier Deleted Successfully."; //Alert message is generated in login page
        header("Location: page-list-suppliers.php");
        exit();
}
else{
    echo "Something went wrong. Please try again." . mysqli_error($con);
}


?>