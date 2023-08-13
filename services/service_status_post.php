<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM services WHERE id=$id";
$select_result = mysqli_query($db_conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);



if($after_assoc['status'] == 1){
    $count = "SELECT COUNT(*) as active FROM services WHERE status=1";
    $result = mysqli_query($db_conn,$count);
    $after_assocs = mysqli_fetch_assoc($result);

   if($after_assocs['active'] <= 2){
    $_SESSION['limit'] = 'minimum 2 item need to be active!';
    header('location: add_service.php');
   }
   else{
    $update1 = "UPDATE services SET status=0 WHERE id=$id";
    $update1_result = mysqli_query($db_conn,$update1);
    header('location: add_service.php');
   }
}
else{
   $count = "SELECT COUNT(*) as active FROM services WHERE status=1";
   $count_result = mysqli_query($db_conn,$count);
   $after_assocs = mysqli_fetch_assoc($count_result);
   
   if($after_assocs['active'] == 4){
    $_SESSION['limit'] = 'maximum 4 item can be active!';
    header('location:add_service.php');
   }
   else{
    $update2 = "UPDATE services SET status=1 WHERE id=$id";
    $update2_result = mysqli_query($db_conn,$update2);
    header('location: add_service.php');
   }
}

?>
