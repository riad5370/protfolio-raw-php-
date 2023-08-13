<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM works WHERE id=$id";
$select_result = mysqli_query($db_conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);

$delete_form = '../uploads/work/'.$after_assoc['project_img'];

unlink($delete_form);

$delete = "DELETE FROM works WHERE id=$id";
$delete_result = mysqli_query($db_conn,$delete);
$_SESSION['del'] = 'delete successfully!';
header('location: manage_work.php');

?>