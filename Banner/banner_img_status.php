<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$update = "UPDATE banner_images SET status=0";
$update_result = mysqli_query($db_conn, $update);

$update2 = "UPDATE banner_images SET status=1 WHERE id=$id";
$update2_result = mysqli_query($db_conn, $update2);
header('location:add_banner.php');
?>