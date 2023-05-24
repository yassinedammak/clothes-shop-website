<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "webproject";


$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logooo.png" >

    <link rel="stylesheet" href="./Acceuil.css">
    <title>Home</title>
</head>
<body>
<nav class="navbar">
        <div id="logo_container">
            <a class="loogoo" href="#top"><img src="download.png" alt="logo"></a>
        </div>
        <div id="center_elements">
            <span id="Acceuil"><a href="#top">Home</a></span>
            <span id="Contact"><a href="./contact.html">Contact</a></span>
            <span id="About"><a href="about.html">About Us</a></span>
        </div>
        <div class="right_elements">
                        <span id="Login"><a href=".\login.php">Login</a></span>
            <span id="Sign_up"> <a href=".\signup.php">Sign Up</a></span>
        </div>
    </nav>
          <span id="Login"><a href=".\login.php">Login</a></span>
          <span id="Sign_up"> <a href=".\signup.php">Sign Up</a></span>
        </div>
    </nav>
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
                <a class="fb" href="https://www.facebook.com" target="_blank"><img  src="facebook.png" alt="Facebook"></a>
                <a class="insta" href="https://www.instagram.com" target="_blank"><img  src="instagram.png" alt="Instagram"></a>
                <a class="ytb" href="https://www.youtube.com" target="_blank"><img  src="youtube.png" alt="YouTube"></a>
                <a class="twt" href="https://www.twitter.com" target="_blank"><img  src="twitter.png" alt="Twitter"></a>
                <span id="admin"><a href="admin.html">login admin</a></span>
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
<?php

mysqli_close($conn);
?>