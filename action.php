<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$formcontent="User: $name\n Email: $email\n Message:\n $message";
$recipient = "tanzina3615@diu.edu.bd";
$mailheader = "$subject \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
header("location:contact.php")
?>