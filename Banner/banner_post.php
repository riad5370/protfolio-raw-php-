<?php
session_start();
require '../db.php';

$sub_title = mysqli_real_escape_string($db_conn, $_POST['sub_title']);
$title = mysqli_real_escape_string($db_conn, $_POST['title']);
$desp = mysqli_real_escape_string($db_conn, $_POST['desp']);

$insert = "INSERT INTO banner_contents(sub_title,title,desp)VALUES('$sub_title','$title','$desp')";
$insert_result = mysqli_query($db_conn, $insert);

$_SESSION['banner_added'] = 'Banner Added!';
header('location: add_banner.php');
?>
