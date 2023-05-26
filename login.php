<!DOCTYPE html>
<html>
<head>
	<title>Clothes Store Login/Sign-Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="logooo.png" >
	
</head>
<body>
	<nav class="navbar">
        <div id="logo_container">
            <img src="download.png" alt="logo">
        </div>
        <div id="center_elements">
            <span id="Acceuil"><a href="./Acceuil.php">Home</a></span>
            <span id="Contact"><a href="./contactt.php">Contact</a></span>
            <span id="About"><a href="about.html">About Us</a></span>
        </div>
        <div class="right_elements">
            <span id="Login"><a href=".\login.php">Login</a></span>
            <span id="Sign_up"> <a href=".\signup.php">Sign Up</a></span>
        </div>
    </nav>
	<div class="login-page">
		<div class="form">
			<form class="login-form" action="verification.php" method="POST"> 
				<h2>Log In</h2>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required> 
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

				<button type="submit" id='submit' value='LOGIN'>Log In</button> 
				<p class="message">Not registered? <a href=".\signup.php">Create an account</a></p>
                <?php
                if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
			</form>
		</div>
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