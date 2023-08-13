<?php
session_start();
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$message_insert = "INSERT INTO messages(name,email,message)VALUES('$name','$email','$message')";
$message_insert_result = mysqli_query($db_conn ,$message_insert);
$_SESSION['message'] = 'Message sent success!';
header('location: ../index.php#contact');
?>