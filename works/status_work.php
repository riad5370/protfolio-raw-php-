<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM works WHERE id=$id";
$select_result = mysqli_query($db_conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['status']==1){
    $update = "UPDATE works SET status=0 WHERE id=$id";
    $update_result = mysqli_query($db_conn,$update);
    header('location: manage_work.php');
}
else{
    $update1 = "UPDATE works SET status=1 WHERE id=$id";
    $update1_result = mysqli_query($db_conn,$update1);
    header('location: manage_work.php');
}

?>