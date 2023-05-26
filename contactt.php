<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = "yassin.dammak474@gmail.com";
$subject = "contact message to the clothes-shop";


$txt = "Name = " . $name . "\r\nEmail = " . $email . "\r\nMessage = " . $message;
$headers = "From: yassin.dammak473@gmail.com\r\n";

if (mail($to, $subject, $txt,$headers)) {
    $msg='email sent sucessfully';
    header("Location: contactt.php");
} else {
    $msg='Failed to send the email';
    header("Location: contactt.php");
}}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="icon" href="logooo.png" >
</head>
<body>
    <nav class="navbar">
        <div id="logo_container">
            <img src="download.png" alt="logo">
        </div>
        <div id="center_elements">
            <a href="./Acceuil.php">Home</a>
            <a href="./contactt.php">Contact</a>
            <a href="about.html">About Us</a>
        </div>
        <div class="right_elements">
            <span id="Login"><a href=".\login.php">Login</a></span>
<span id="Sign_up"> <a href=".\signup.php">Sign Up</a></span>
</div>
    </nav>
    <?php if (!empty($msg)) { ?>
        <div class="message-container">
    <p style="color: red; font-size: 25px; text-align: center;"><?php echo $msg; ?></p>
</div>

    <?php } ?>
    <div class="contact-container">
        <form class="contact-form" action="" method="POST">
            <h2>Contact Us</h2>
            <label for="n">Name:</label>
            <input type="text" name="name" id="name" required>
            <br>
            <label for="e">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="m">Message:</label>
            <textarea name="message" id="message" rows="4" required></textarea>
            <button type="submit">envoyer</button> 
            <input type="reset" value="reset">
        </form>
    </div>
    <footer>
        <div >
            <div class="row">
                <a class="fb" href="https://www.facebook.com" target="_blank"><img  src="facebook.png" alt="Facebook"></a>
                <a class="insta" href="https://www.instagram.com" target="_blank"><img  src="instagram.png" alt="Instagram"></a>
                <a class="ytb" href="https://www.youtube.com" target="_blank"><img  src="youtube.png" alt="YouTube"></a>
                <a class="twt" href="https://www.twitter.com" target="_blank"><img  src="twitter.png" alt="Twitter"></a>
            </div>
        </div>
  
    
        
        <div class="row">
        <ul>
        <li><a href="./contact.html">Contact us</a></li>
        <li><a href="./PrivacyPolicy.html">Privacy Policy</a></li>
        <li><a href="./termsandconditions.html">Terms & Conditions</a></li>
        </ul>
        </div>
        
        <div class="row">
        Copyright © 2023 - All rights reserved
        </div>
        
    </footer>
  
</body>
</html>