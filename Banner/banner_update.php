<?php
session_start();
require '../db.php';

$id = $_POST['id'];
$sub_title = mysqli_real_escape_string($db_conn, $_POST['sub_title']);
$title = mysqli_real_escape_string($db_conn, $_POST['title']);
$desp = mysqli_real_escape_string($db_conn, $_POST['desp']);

$update = "UPDATE banner_contents SET sub_title='$sub_title',title='$title', desp='$desp' WHERE id=$id";
$update_result = mysqli_query($db_conn,$update);

$_SESSION['update_success'] = 'Update successfully!';
header('location: add_banner.php');
?>