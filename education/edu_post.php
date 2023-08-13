<?php
session_start();
require '../db.php';

$title = $_POST['title'];
$percentage = $_POST['percentage'];
$year = $_POST['year'];

$insert = "INSERT INTO educations(title,percentage,year)VALUES('$title','$percentage','$year')";
$insert_result = mysqli_query($db_conn, $insert);
$_SESSION['education_added_success'] = 'Added Successfull!';
header('location:add_edu.php');
?>