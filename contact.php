<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = "yassin.dammak474@gmail.com";
$subject = "This is the subject line";


$txt = "Name = " . $name . "\r\nEmail = " . $email . "\r\nMessage = " . $message;
$headers = "From: yassin.dammak473@gmail.com\r\n";

if (mail($to, $subject, $txt,$headers)) {
    echo "<h1>Mail sent successfully</h1>";
    header("Location: contact.html");
} else {
    echo "<h1>Failed to send the email</h1>";
}}

?>

