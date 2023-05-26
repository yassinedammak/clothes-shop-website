<?php
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: loginadmin.php');
    die();
}


try {
    $db = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name']; 

  
    if (empty($product_name) || empty($product_price) || empty($product_image)) {
        echo 'Product name, price, and image are required.';
        die();
    }

    
    $query = "INSERT INTO products (name, price, image) VALUES (:name, :price, :image)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name', $product_name);
    $stmt->bindParam(':price', $product_price);
    $stmt->bindParam(':image', $product_image);
    $stmt->execute();
    
    echo 'Product added successfully!';
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];

   
    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $product_id);
    $stmt->execute();

    echo 'Product deleted successfully!';
}


$query = "SELECT * FROM products";
$stmt = $db->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <div class="container">
        <h2>Admin Panel</h2>
        <form method="post" action="admin.php" enctype="multipart/form-data"> 
            <input type="text" name="product_name" placeholder="Product Name" required><br>
            <input type="number" name="product_price" placeholder="Product Price" required><br>
            <input type="file" name="product_image" required><br> 
            <input type="submit" name="add_product" value="Add Product">
        </form>

        <h3>Product List</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th> 
                <th>Action</th>
            </tr>
            <?php foreach ($products as $product) { ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><img src="uploads/<?php echo $product['image']; ?>" alt="Product Image" style="width: 100px;"></td> <!-- Display the image -->
                <td>
                    <form method="post" action="admin.php">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="submit" name="delete_product" value="Delete">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <a href="acceuil.php">Logout</a>
    </div>
</body>
</html>
