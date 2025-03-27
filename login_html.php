<?php
require "login.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTRIX </title>
    <link rel="shortcut icon" href="./assets/Logo.svg" />
    <link rel="stylesheet" href="./css/style-login.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
</head>


<body>
    <div id="alert-container"></div>

    <section class="container">
        <div class="form-banner login-banner">
            <i class="ri-arrow-left-line prev" onclick="goToLandingPage()"></i>
        </div>
        <div class="form-content">
            <div class="form login">
                <div class="form-title">
                    <img src="./assets/Logoup.svg" alt="logo">
                    <h3>"Inventory Made Easy. Business Made Better"</h3>
                </div>
                <form action="login.php" method="POST">
                    <div class="input-field">
                        <label for="login-email">E-mail :</label>
                        <input type="email" placeholder="Enter your E-mail" name="email" id="email" required>
                    </div>
                    <div class="input-field">
                        <label for="login-password"> Password :</label>
                        <input type="password" placeholder="Enter your password" name="password" id="password" required>
                        <i class="ri-eye-off-line"></i>
                    </div>
                    <button type="submit" class="login-btn">Continue</button>
                    
                </form>
            </div>
        </div>
    </section>
    <script src="./js/scripts.js"></script>
    <script src="./js/login_signup.js"></script>

</body>

</html>
