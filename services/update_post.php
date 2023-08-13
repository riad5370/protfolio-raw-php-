<?php
session_start();
require '../db.php';

$id = $_POST['id'];

$icon = mysqli_real_escape_string($db_conn, $_POST['icon']);
$title = mysqli_real_escape_string($db_conn, $_POST['title']);
$desp = mysqli_real_escape_string($db_conn, $_POST['desp']);

$update = "UPDATE services SET icon='$icon', title='$title', desp='$desp' WHERE id=$id";
$update_result = mysqli_query($db_conn, $update);
$_SESSION['service_update_success'] = 'Update successfull!';
header('location:add_service.php');
?>