<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$query = "DELETE FROM facts WHERE id=$id";
$result = mysqli_query($db_conn,$query);
$_SESSION['del'] = 'delete successful';
header('location: add_fact.php');

?>