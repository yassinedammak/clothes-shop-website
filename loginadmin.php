<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


$user = $_POST['user'];
$pass = $_POST['pass'];


if (empty($user) || empty($pass)) {
    echo 'Username and password are required.';
    die();
}


$query = "SELECT * FROM admins WHERE username = :user";
$stmt = $db->prepare($query);
$stmt->bindParam(':user', $user);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin && $pass === $admin['password']) {
    
    session_start();
    $_SESSION['username'] = $admin['username'];
    header('Location: admin.php');
    die();
} else {
   
    echo 'Invalid username or password.';
    die();
}
?>
