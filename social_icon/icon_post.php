<?php
session_start();
require '../db.php';

$icon = $_POST['icon'];
$link = $_POST['link'];

$insert = "INSERT INTO icons (icon,link)VALUES('$icon','$link')";
$result = mysqli_query($db_conn, $insert);
$_SESSION['icon_inserted'] = 'icon added successfully!';
header('location:add_social_icon.php');
?>