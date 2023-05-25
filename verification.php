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

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Retrieve the username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform the login authentication
    // Assuming you have a clients table with 'id', 'nom', and 'passwd' columns
    $query = "SELECT id_client FROM clients WHERE nom='$username' AND passwd='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) >= 1) {
        // Login successful, retrieve the user ID and store it in the session
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $row['id_client'];
        $_SESSION['username'] = $username;

        // Redirect to the principal_user.php page
        header('Location: principal_user.php');
        exit();
    } else {
        // User or password incorrect, redirect back to the login page with an error code
        header('Location: login.php?erreur=1');
        exit();
    }
} else {
    // Invalid request, redirect back to the login page
    header('Location: login.php');
    exit();
}
