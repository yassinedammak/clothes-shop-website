<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  $problem_type = $_POST["problem-type"];
  
  $to = "Trendytech@gmail.com";
  $subject = "New contact form submission";
  $body = "Name: $name\nEmail: $email\nMessage: $message\nProblem Type: $problem_type";
  
  if (mail($to, $subject, $body)) {
    echo "success";
  } else {
    echo "error";
  }
}
?>
