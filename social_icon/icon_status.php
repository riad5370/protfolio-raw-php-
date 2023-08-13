<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM icons WHERE id=$id";
$select_result = mysqli_query($db_conn, $select);
$after_assocs = mysqli_fetch_assoc($select_result);

if($after_assocs['status'] == 1){
    $count = "SELECT COUNT(*) deactive FROM icons WHERE status=1";
    $count_result = mysqli_query($db_conn, $count);
    $after_count_assoc = mysqli_fetch_assoc($count_result);
    
    if($after_count_assoc['deactive'] == 2){
        $_SESSION['icon_limite'] = 'Minimum 2 item can be active';
        header('location: add_social_icon.php');
    }
    else{
        $update1 = "UPDATE icons SET status=0 WHERE id=$id";
        $update_result1 = mysqli_query($db_conn, $update1);
        header('location: add_social_icon.php');
    }
}
else{
    $count = "SELECT COUNT(*) as active FROM icons WHERE status=1";
    $result_count = mysqli_query($db_conn, $count);
    $count_assoc = mysqli_fetch_assoc($result_count);

    if($count_assoc['active'] == 4){
        $_SESSION['icon_limite'] = 'maximum 4 item can be active';
        header('location: add_social_icon.php');
    }
    else{
        $update2 = "UPDATE icons SET status=1 WHERE id=$id";
        $update_result2 = mysqli_query($db_conn, $update2);
        header('location: add_social_icon.php');  
    }
    
   
}

?>