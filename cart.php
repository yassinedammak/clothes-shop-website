<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css" media="screen"  />
    <title>Cart</title>
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
          
          <span id="Cart">
            <a href="./cart.html">
              <img src="./cart-icon.webp" alt="Cart">
              <?php
                session_start();

                if(isset($_SESSION['cart'])){
                  $count = count($_SESSION['cart']);
                  echo "<b id=\"cart_count\">$count</b>";
                }else{

                  echo "<b id=\"cart_count\">0</b>";

                }



              ?>
            </a>
          </span>
          <span id="Login"><a href=".\Acceuil.php">Logout</a></span>
            
        </div>
    </nav>
    <div id="content">
 <!-- tester si l'utilisateur est connecté -->
 <?php
 
 if(isset($_GET['deconnexion']))
 { 
 if($_GET['deconnexion']==true)
 { 
 session_unset();
 header("location:login.php");
 }
 }
 else if($_SESSION['username'] !== ""){
 $user = $_SESSION['username'];
 ?>
 <div class="message">Welcome <span class="username"><?php echo $user; ?></span>, You are connected.</div>
 <?php
}
?>
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
        Copyright © 2023 - All rights reserved
        </div>
        
    </footer>

</body>
</html>
