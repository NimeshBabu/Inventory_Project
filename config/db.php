<?php



// To connect to the database
$con=mysqli_connect("localhost","root","","inventrix");

if (!$con){
    die("Sorry we failed to connect: ".mysqli_connect_error()); 
}


?>

