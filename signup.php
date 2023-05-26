<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (empty($_POST['name'])|| empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password']) || empty($_POST['gender']) || empty($_POST['adresse'])) {
        $message = 'Please fill in all the required fields.';
    } elseif ($_POST['password'] !== $_POST['confirm_password']) {
        $message = 'Password and confirm password do not match.';
    } else {

        try {
            $db = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $n = $_POST['name'];
        $em = $_POST['email'];
        $pass = $_POST['password'];
        $confirm_pass = $_POST['confirm_password'];
        $gend = $_POST['gender'];
        $ag = $_POST['age'];
        $adr = $_POST['adresse'];

        $requete = $db->prepare('INSERT INTO Clients(nom,email,passwd,gender,age,adresse) VALUES(:nome, :mail, :pas, :g, :agg, :adr)');
        $requete->execute(array('nome' => $n, 'mail' => $em, 'pas' => $pass, 'g' => $gend, 'agg' => $ag, 'adr' => $adr));
        $message = "Ajout de la nouvelle entrée est terminée avec succès !";

        header("Location: confirmation.html");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-Up</title>
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
    <?php if (!empty($message)) { ?>
        <div class="message-container">
    <p style="color: red; font-size: 25px; text-align: center;"><?php echo $message; ?></p>
</div>

    <?php } ?>
	<div class="login-page">
		<div class="form">
			<form class="register-form" method="POST" action=""> 
				<h2>Sign Up</h2>
				<input type="text" name="name" placeholder="Name"  required/> 
				<input type="email" name="email" placeholder="Email"/> 
                <input type="age" name="age" placeholder="Age"/> 
                <input type="adresse" name="adresse" placeholder="adresse"/> 
				<input type="password" name="password" placeholder="Password"/> 
				<input type="password" name="confirm_password" placeholder="Confirm Password"/> 
				<select name="gender"> 
					<option value="" disabled selected>Gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
					<option value="other">Other</option>
				</select>
				<button type="submit">Sign Up</button> 
                
				<p class="message">Already registered? <a href=".\login.php">Log in</a></p>
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
