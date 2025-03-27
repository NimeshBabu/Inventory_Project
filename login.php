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
       
        
        // To check if the user already exists and if the password is correct
        $sql="SELECT * FROM `user` WHERE email='$email'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);

        if($num>0) {
            $row=mysqli_fetch_assoc($result);
                if(password_verify($pass, $row['password'])){    //extracts salt form stored hash and uses it to hash the entered password and then compares it with the stored hash
                    $_SESSION['success'] = "Logged in successfully!";
                    header("Location: dashboard_html.php");
                    exit();
                }
        
                else{                    
                    $_SESSION['error'] = "Invalid password! Please try again.";
                    header("Location: login.html");
                    exit();
                }
               
        }
        

        else {
            $_SESSION['error'] = "User does not exist! Please check your email.";
            header("Location: login.html");
            exit();
        }
    }
?>




        // $row=mysqli_fetch_assoc($result);
        // $hash=password_verify($pass, $row['password']);
        // echo "<br>";
        // echo $pass;
        // echo "<br>";
        // echo $row['password'];
        // echo "<br>";
        // if ($hash){
        //     echo "Password is correct";
        // }
        // else{
        //     echo "Password is incorrect";
        // }
        // echo "<br>";
        // $hash1=password_hash($pass, PASSWORD_DEFAULT);
        // echo $hash1;