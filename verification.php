<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
    try {
        $db = new PDO('mysql:host=localhost;dbname=webproject;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    $username = $_POST['username']; 
    $pass = $_POST['password'];
    
    if($username !== "" && $pass !== "") {
        $requete = "SELECT count(*) FROM clients WHERE nom = '".$username."' AND passwd = '".$pass."'";
        $exec_requete = $db->query($requete);
        $reponse = $exec_requete->fetch();
        $count = $reponse[0];
        
        if($count != 0) { 
            $_SESSION['username'] = $username;
            header('Location: principal_user.php');
        } else {
            header('Location: login.php?erreur=1'); 
        }
    } else {
        header('Location: login.php?erreur=2');
    }
} else {
    header('Location: login.php');
}
$db = null; 
?>
