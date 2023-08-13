<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$delete_message = "DELETE FROM messages WHERE id=$id";
$delete_message_result = mysqli_query($db_conn, $delete_message);
$_SESSION['del'] = 'message deleted!';
header('location: view_message.php');

?>