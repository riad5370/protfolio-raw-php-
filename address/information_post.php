<?php
session_start();
require '../db.php';

$address = mysqli_real_escape_string($db_conn,$_POST['address']);
$email = mysqli_real_escape_string($db_conn,$_POST['email']);
$city = mysqli_real_escape_string($db_conn,$_POST['city']);
$phone = mysqli_real_escape_string($db_conn,$_POST['phone']);
$info = mysqli_real_escape_string($db_conn,$_POST['info']);




$information_insert = "INSERT INTO contacts (address,email,city,phone,info)VALUES('$address','$email','$city','$phone','$info')";
$information_insert_result = mysqli_query($db_conn,$information_insert);
$_SESSION['success']  = 'inserted!';
header('location: add_contact_information.php');

?>