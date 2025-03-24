<?php
session_start();
include 'config/db.php';
$prod_code=$_GET['prod_code'];
$sql="DELETE FROM `product` WHERE ProductCode='$prod_code'";
$result=mysqli_query($con,$sql);
if($result){
    $_SESSION['success'] = "Product Deleted Successfully!"; 
        header("Location: page-list-product.php");
        exit();
}
else {
    $_SESSION['error'] = "Failed to delete product! " ;
}


header("Location: page-list-product.php"); 
exit();
?>

?>