<?php
session_start();
require '../db.php';

$id = $_POST['id'];
$title = mysqli_real_escape_string($db_conn, $_POST['title']);
$desp = mysqli_real_escape_string($db_conn, $_POST['desp']);

$uploaded_file = $_FILES['about_img'];

if($uploaded_file['name'] == ''){
    $update = "UPDATE abouts SET title='$title', desp='$desp' WHERE id=$id";
    $update_result = mysqli_query($db_conn, $update);
    $_SESSION['about_update'] = 'Update Successfull!';
    header('location:edit_about.php');
}
else{
    $after_exploade = explode('.', $uploaded_file['name']);
    $extension = end($after_exploade);
    $allowed_extension = array('jpg', 'png', 'gif', 'webp');
    if(in_array($extension, $allowed_extension)){
        if($uploaded_file['size'] <= 10000){
            $select = "SELECT * FROM abouts WHERE id=$id";
            $select_result = mysqli_query($db_conn, $select);
            $select_assoc = mysqli_fetch_assoc($select_result);
            $delete_form = '../uploads/about/'.$select_assoc['about_img'];
            unlink($delete_form);

            $file_name = $id . '.' . $extension;
            $new_location = '../uploads/about/' . $file_name;
            move_uploaded_file($uploaded_file['tmp_name'], $new_location);

            $update = "UPDATE abouts SET title='$title',desp='$desp',about_img='$file_name' WHERE id=$id";
            $update_result = mysqli_query($db_conn, $update);
            $_SESSION['about_update'] = 'Update Successfull!';
            header('location:edit_about.php');
        }
        else{
            $_SESSION['about_img_size'] = 'image size too long!';
            header('location: edit_about.php');
        }
    }
    else{
        $_SESSION['about_img_extension'] = 'invalid image extension!';
        header('location:edit_about.php');
    }
}

?>