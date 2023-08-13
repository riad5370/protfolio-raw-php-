<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM icons WHERE id=$id";
$delete_result = mysqli_query($db_conn, $delete);

$_SESSION['icon_delete'] = 'icon deleted!';
header('location:add_social_icon.php');
?>