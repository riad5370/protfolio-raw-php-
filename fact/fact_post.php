<?php
session_start();
require '../db.php';

$icon = $_POST['icon'];
$title = $_POST['title'];
$count = mysqli_real_escape_string($db_conn,$_POST['count']);

$insert = "INSERT INTO facts(icon,title,count)VALUES('$icon','$title','$count')";
$insert_result = mysqli_query($db_conn,$insert);

$_SESSION['success'] = 'fact added successfull!';
header('location: add_fact.php');

?>