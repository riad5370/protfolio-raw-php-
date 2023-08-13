<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete = "DELETE FROM educations WHERE id=$id";
$delte_result = mysqli_query($db_conn, $delete);
$_SESSION['edu_delete_success'] = 'deleted Successfull!';
header('location: add_edu.php');

?>