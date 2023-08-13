<?php
session_start();
require '../db.php';

$icon = mysqli_real_escape_string($db_conn,$_POST['icon']);
$title = mysqli_real_escape_string($db_conn, $_POST['title']);
$desp = mysqli_real_escape_string($db_conn,$_POST['desp']);

$insert = "INSERT INTO services(icon,title,desp)VALUES('$icon','$title','$desp')";
$insert_result = mysqli_query($db_conn, $insert);
$_SESSION['service_added_success'] = 'added successfull!';
header('location:add_service.php');
?>