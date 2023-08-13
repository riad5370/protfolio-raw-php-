<?php
session_start();
require '../db.php';

$id = $_POST['id'];



$category = mysqli_real_escape_string($db_conn,$_POST['category']);
$project_name = mysqli_real_escape_string($db_conn,$_POST['project_name']);
$title = mysqli_real_escape_string($db_conn,$_POST['title']);
$desp = mysqli_real_escape_string($db_conn,$_POST['desp']);

$uploaded_file = $_FILES['project_img'];

if($uploaded_file['name']==''){
    $update = "UPDATE works SET category='$category',project_name='$project_name',title='$title',desp='$desp' WHERE id=$id";
    $update_result = mysqli_query($db_conn,$update);
    $_SESSION['success'] = 'update successfull!';
    header('location:manage_work.php');
}
else{
    $after_exploade = explode('.',$uploaded_file['name']);
    $extension = end($after_exploade);
    $allowed_extension = array('jpg','png','gif','webp');
    if(in_array($extension,$allowed_extension)){
        if($uploaded_file['size'] <= 1000000){
            $select = "SELECT * FROM works WHERE id=$id";
            $select_result = mysqli_query($db_conn,$select);
            $after_assoc = mysqli_fetch_assoc($select_result);
            $delete_form = '../uploads/work/'.$after_assoc['project_img'];
            unlink($delete_form);
            $file_name = 'work-'.rand().'.'.$extension;
            $new_location = '../uploads/work/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'],$new_location);

            $update = "UPDATE works SET category='$category',project_name='$project_name',title='$title',desp='$desp', project_img = '$file_name' WHERE id=$id";
            $update_result = mysqli_query($db_conn,$update);
            $_SESSION['success'] = 'work content updated!';
            header('location:manage_work.php');
             
        }
        else{
            $_SESSION['size'] = 'file size too long!';
            header('location:edit_work.php');
        }
    }
    else{
        $_SESSION['extension'] = 'Invalid Image Extension!';
        header('location:edit_work.php');
    }
}
?>