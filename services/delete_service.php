<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM services WHERE id=$id";
$delete_result = mysqli_query($db_conn, $delete);
$_SESSION['service_deleted'] = 'delete successfull!';
header('location:add_service.php');
?>