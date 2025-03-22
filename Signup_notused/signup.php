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
        $email=$_POST['email'];
        $pass=$_POST['password'];
       
        
        // To check if the user already exists
        $sql="SELECT * FROM `user` WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);

        if($num>0) {
            $_SESSION['error'] = "User already exists! Please log in or sign up with a different email.";
            header("Location: signup.html");
            exit();    
        }
        
        // Hashing the password before storing it in the database
        $hash=password_hash($pass, PASSWORD_DEFAULT);
        $sql="INSERT INTO `user` (`email`, `password`) VALUES ('$email', '$hash')";
        if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Account created successfully! Please log in."; //Alert message is generated in login page
        header("Location: login.html");
        exit();
        }
        
        else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: signup.html");
        exit();
        }     
    }
?>

