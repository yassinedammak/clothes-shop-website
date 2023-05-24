<!DOCTYPE html>
<html>
<head>
	<title>Clothes Store Login/Sign-Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<nav class="navbar">
        <div id="logo_container">
            <img src="download.png" alt="logo">
        </div>
        <div id="center_elements">
            <span id="Acceuil"><a href="./Acceuil.php">Home</a></span>
            <span id="Contact"><a href="./contact.html">Contact</a></span>
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
				<p class="message">Not registered? <a href=".\signup.html">Create an account</a></p>
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
                <a href="https://www.facebook.com" target="_blank"><img  src="facebook .png" alt="Facebook"></a>
                <a href="https://www.instagram.com" target="_blank"><img  src="instagram (3).png" alt="Instagram"></a>
                <a href="https://www.youtube.com" target="_blank"><img  src="youtub.png" alt="YouTube"></a>
                <a href="https://www.twitter.com" target="_blank"><img  src="twitter.png" alt="Twitter"></a>
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
            &copy; 2023 - All rights reserved
        </div>
        
    </footer>
</body>
</html>