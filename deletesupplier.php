<?php
session_start();
include 'config/db.php';
$pan=$_GET['pan'];
$sql="DELETE FROM `supplier` WHERE PANNo='$pan'";
$result=mysqli_query($con,$sql);
if($result){
    $_SESSION['success'] = "Supplier Deleted Successfully!"; 
        header("Location: page-list-suppliers.php");
        exit();
}
else {
    $_SESSION['error'] = "Failed to delete supplier record! " ;
}


header("Location: page-list-supplier.php"); 
exit();
?>

?>