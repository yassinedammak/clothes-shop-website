<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = $_POST['name'];
    $em = $_POST['email'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];
    $gend = $_POST['gender'];
    $ag = $_POST['age'];
    $adr = $_POST['adresse'];
    if (empty($n)|| empty($ag) || empty($em) || empty($pass) || empty($confirm_pass) || empty($gend)) {
        $response = array('success' => false, 'message' => 'Please fill in all the required fields.');
        echo json_encode($response);
    } elseif ($pass !== $confirm_pass) {
        $response = array('success' => false, 'message' => 'Password and confirm password do not match.');
        echo json_encode($response);
    } else {

        try {
            $db = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        // After successful insertion in the database
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
	<script src="signup.js"></script>
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
			<form class="register-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
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
    <?php if (isset($message)) { ?>
        <script>
            alert("<?php echo $message; ?>");
        </script>
    <?php } ?>
	<footer>
        <div>
            <div class="row">
                <a href="https://www.facebook.com" target="_blank"><img src="facebook .png" alt="Facebook"></a>
                <a href="https://www.instagram.com" target="_blank"><img src="instagram (3).png" alt="Instagram"></a>
                <a href="https://www.youtube.com" target="_blank"><img src="youtub.png" alt="YouTube"></a>
                <a href="https://www.twitter.com" target="_blank"><img src="twitter.png" alt="Twitter"></a>
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
