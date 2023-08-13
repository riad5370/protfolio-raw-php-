<?php
require '../db.php';

$id = $_GET['id'];

$update = "UPDATE banner_contents SET status=0";
$update_result = mysqli_query($db_conn, $update);

$update2 = "UPDATE banner_contents SET status=1 WHERE id=$id";
$update2_result = mysqli_query($db_conn, $update2);

header('location: add_banner.php');


?>