<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$database = "webproject";

// Establish a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Fetch products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal_user.css" media="screen"  />
    <title>Home</title>
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
        <div class="right_elements">
          <span id="Cart">
            <a href="./cart.html">
              <img src="./cart-icon.webp" alt="Cart">
            </a>
          </span>
                        <span id="Login"><a href=".\Acceuil.php">Logout</a></span>
            
        </div>
    </nav>
    <div id="content">
 <!-- tester si l'utilisateur est connecté -->
 <?php
 session_start();
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
 
 </div>
    <div class="carousel">
        <div class="carousel-container">
          <div class="carousel-item">
            <img src="image1.jpg" alt="Slide 1">
          </div>
          <div class="carousel-item">
            <img src="image2.jpg" alt="Slide 2">
          </div>
          <div class="carousel-item">
            <img src="image3.jpg" alt="Slide 3">
          </div>
        </div>
        <button class="carousel-button carousel-button-prev">&#8249;</button>
        <button class="carousel-button carousel-button-next">&#8250;</button>
      </div>
      <div class="audio-container">
        <audio id="audio-player" controls autoplay>
          <source src=".\687374__oldmansmusic__glimmer-of-hope-freesound-mix.wav" type="audio/wav">
        </audio>
        <button id="stop-button">Stop music</button>
        <br>
        <button id="play-button">Play music</button>
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="about.js"></script>
      
      
      
      <div class="Products-container">
    <div class="OnSale_products">
    <?php
            // Loop through each product and display as a component
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $image = $row['image'];
                $price = $row['price'];
                ?>

                <div class="product_card">
                    <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                    <div class="info">
                        <div class="name"><?php echo $name; ?></div>
                        <div class="price"><?php echo $price; ?></div>
                        <button class="add_to_cart" data-name="<?php echo $name; ?>" data-price="<?php echo $price; ?>">Add to Cart</button>
                    </div>
                </div>

                <?php
            }
            ?>
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
        Copyright © 2023 - All rights reserved
        </div>
        
    </footer>

<script src="Acceuil.js"></script>

</body>
</html>
