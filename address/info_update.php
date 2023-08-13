<?php
session_start();
require '../db.php';

$id = $_POST['id'];

$address = mysqli_real_escape_string($db_conn,$_POST['address']);
$email = mysqli_real_escape_string($db_conn,$_POST['email']);
$city = mysqli_real_escape_string($db_conn,$_POST['city']);
$phone = mysqli_real_escape_string($db_conn,$_POST['phone']);
$info = mysqli_real_escape_string($db_conn,$_POST['info']);

$information_update = "UPDATE contacts SET address='$address',email='$email',city='$city',phone='$phone',info='$info' WHERE id=$id"; 
$information_insert_result = mysqli_query($db_conn,$information_update);
$_SESSION['success'] = 'updated!';
header('location: edit_info.php?id='.$id);

?>