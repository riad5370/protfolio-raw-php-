<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete_info = "DELETE FROM contacts WHERE id=$id";
$delete_info_result = mysqli_query($db_conn,$delete_info);
$_SESSION['del'] = 'Information Deleted!';
header('location: add_contact_information.php');


?>