<?php
session_start();
include("connections.php");
include("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Call registerUser function
    if (registerUser($username, $email, $password, $conn)) {
        // Registration successful
        // Redirect to login page
        header("Location: Login.php");
        exit();
    } else {
        // Registration failed
        // Handle error or show error message
        echo "Registration failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login-and-reg.css">
    <title>SignUp | Boostify</title>
</head>
<body>
    <header class="LSHeader">
        <div class="logo">
            <img src="/IM2_Booster/Images/Logo.svg">
            <h4>Boostify</h4>
        </div>
        <div class="LSright">
            <a href="Login.php"><button type="submit" class="LSLogin">Login</button></a>
        </div>
    </header>
    <div class="container">
        <div class="SignUp-container">
            <h1>Registration Form</h1>
            <form action="SignUp.php" method="POST"> <!-- Update the action to point to the same script -->
                <p>Username:</p>
                <input type="text" name="username" id="Username" placeholder="Username" required>
                <p>Email:</p>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <p>Password:</p>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button type="submit" id="submit" class="Register-btn">Register</button> <!-- Remove the surrounding <a> tag -->
                <div class="login">
                    <p>Already have an account? <a href="Login.php">Login here</a></p>
                </div>
            </form>
        </div>
    </div>
    <!--------------------------------------FOOTER------------------------------------------->
    <footer>
        <div class="row-footer">
            <div class="col-footer">
                <img src="/IM2_Booster/Images/Logo.svg" class="Footerlogo" height="70px">
                <p>Boostify, Inc. was founded in 2024 with the dual goals of offering top-notch piloting service and supporting the player base via our services offered. Boostify was born out of a deep combination of convenience and experiences as a gamer. </p>
            </div>
            <div class="col-footer">
            <h3>Office <div class="underline-office"><span></span></div></h3>
            <p>UNIT 2A, FLC Center</p>
            <p>888 Hernan Cortes Street</p>
            <p>Kasambagan, Mandaue City</p>
            <p>Cebu, Philippines, 6014</p>
            <p class="email-id">boostify@gmail.com</p>
            <h4>+63 0961-133-5861</h4>
            </div>
            <div class="col-footer">
            <h3>Links <div class="underline-links"><span></span></div></h3>
                <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>
                </ul>
            </div>
        <div class="col-footer">
            <h3>Newsletter <div class="underline-news"><span></span></div></h3>
            <form>
                <i class='bx bxs-envelope' ></i>
                <input type="email" id="email" name="email" autocomplete="email" placeholder="Enter your email address" required>
                <button type="submit"><i class='bx bx-right-arrow-alt' ></i></button>
            </form>
                <div class="icons">
                <a href= "https://www.facebook.com/glmodelsofficial" target="_blank" class="fa fa-facebook"></a>
                <i class='bx bxl-facebook-circle' ></i>
                <i class='bx bxl-twitter'></i>
                <a href="https://www.instagram.com/gl_models_official/" target="_blank" class="fa fa-instagram"></a>
                <i class='bx bxl-instagram-alt' ></i>
            </div>
         </div>
        </div>
        <hr>
        <p class="copyright">Boostify, Inc. @ 2024 - All Rights Reserved</p>
    </footer>
</body>
</html>