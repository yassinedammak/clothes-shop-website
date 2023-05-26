
<?php
session_start();

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
// Retrieve the product IDs associated with the user from the cart table
$userID = $_SESSION['userid'];
$query = "SELECT * FROM cart WHERE userId = '$userID'";
$result = mysqli_query($conn, $query);

// Create arrays to store the product IDs and quantities
$product_ids = array();
$product_qnts = array(); // Initialize an empty array

while ($row = mysqli_fetch_assoc($result)) {
    $product_ids[] = $row['id_prod'];
    $product_qnts[] = $row['Quantity'];
}

$count = array_sum($product_qnts);
$_SESSION['count'] = $count;

// Fetch the products from the product table using the product IDs
$products_query = "SELECT * FROM products WHERE id IN (" . implode(',', $product_ids) . ")";
if (!empty($product_ids)) {
    $products_result = mysqli_query($conn, $products_query);
}

// Check if the "remove" button is clicked
if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];
  
  // Delete the product from the cart table
  $delete_query = "DELETE FROM cart WHERE id_prod = '$remove_id' AND userId = '$userID'";
  $delete_result = mysqli_query($conn, $delete_query);
  
  // Redirect back to the cart page to reflect the changes
  header("Location: cart.php");
  exit();
}
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
  $productId = $_POST['product_id'];
  $quantity = $_POST['quantity'];
 // Update the quantity in the database
 $updateQuery = "UPDATE cart SET Quantity = '$quantity' WHERE id_prod = '$productId' AND userId = '".$_SESSION['userid']."'";
 $updateResult = mysqli_query($conn, $updateQuery);

 if ($updateResult) {
  header("Location: cart.php");
  exit();

 } else {
     // Failed to update quantity
     echo "error";
 }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css" media="screen"  />
    <title>Cart</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    // Event delegation for minus-btn and plus-btn
    $(document).on('click', '.minus-btn', function() {
        var input = $(this).siblings(".qty-input");
        var productId = input.data("product-id");
        var quantity = parseInt(input.val());
        if (quantity > 1) {
            quantity--;
            input.val(quantity);
            updateQuantity(productId, quantity);
        }
    });

    $(document).on('click', '.plus-btn', function() {
        var input = $(this).siblings(".qty-input");
        var productId = input.data("product-id");
        var quantity = parseInt(input.val());
        quantity++;
        input.val(quantity);
        updateQuantity(productId, quantity);
    });

    function updateQuantity(productId, quantity) {
        $.ajax({
            url: "update_quantity.php",
            type: "POST",
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function(response) {
                // Handle success response if needed
            },
            error: function(xhr, status, error) {
                // Handle error if needed
            }
        });
    }
});
</script>


</head>
<body>
    <nav class="navbar">
        <div id="logo_container">
            <img src="download.png" alt="logo">
        </div>
        <div id="center_elements">
            <span id="Acceuil"><a href="./principal_user.php">Home</a></span>
            <span id="Contact"><a href="./contactuser.php">Contact</a></span>
            <span id="About"><a href="about.html">About Us</a></span>
        </div>
        <div class="right_elements">
          
          <span id="Cart">
            <a href="./cart.php">
              <img src="./cart-icon.webp" alt="Cart">
              <?php
                
                if(isset($_SESSION['cart'])){
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
    </div>
    <form action="cart.php" method="get" class="cart-items">
        <div class="Products">
            <div class="OnSale_products">
                <?php
                $total_price = 0;

                if (!empty($product_ids)) {
                    while ($row = mysqli_fetch_assoc($products_result)) {
                        $name = $row['name'];
                        $image = $row['image'];
                        $price = $row['price'];
                        $quantity = $product_qnts[array_search($row['id'], $product_ids)];
                        $subtotal = $price * $quantity;
                        $total_price += $subtotal;
                        ?>

                        
                <div class="product_card">
                    <img src="<?php echo $image; ?>" alt="<?php echo $name; ?>">
                    <div class="info">
                        <div class="name"><?php echo $name; ?></div>
                        <div class="price"><?php echo $price; ?></div>
                        <div class="quantity">
    <button type="button" class="minus-btn" data-product-id="<?php echo $row['id']; ?>">-</button>
    <input type="text" class="qty-input" value="<?php echo $quantity; ?>" data-product-id="<?php echo $row['id']; ?>">
    <button type="button" class="plus-btn" data-product-id="<?php echo $row['id']; ?>">+</button>
</div>


<div class="buttons">
<button type="submit" class="btn">Save For Later</button>
<button type="submit" class="btn2" name="remove" value="<?php echo $row['id']; ?>">Remove</button>
</div>
</div>
</div>

<?php
}
    }else{
      echo "<h1> Cart is Empty. </h1> ";
    }
    echo "<h2>Total Price: " . $total_price . "</h2>";

?>
</div>
</div>
</form>



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
