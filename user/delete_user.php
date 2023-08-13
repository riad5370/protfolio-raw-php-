<?php
session_start();
require '../db.php';

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id=$id";
$query_result = mysqli_query($db_conn, $query);
$_SESSION['del'] = 'delete successfull!';
header('location:view_user.php');
?>