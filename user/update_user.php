<?php
session_start();
require '../db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

if(empty($password)){
    $uploaded_file = $_FILES['profile_photo'];
    if($uploaded_file['name'] == ''){
        $update = "UPDATE users SET name='$name',email='$email' WHERE id=$id";
        $update_result = mysqli_query($db_conn, $update);
        $_SESSION['success'] = 'User updated!';
        header('location:edit_user.php?id=' . $id);
    }
    else{
        $after_explode = explode('.', $uploaded_file['name']);
        $extension = end($after_explode);
        $allowed_extension = array('jpg', 'png', 'gif', 'webp');
        
        if(in_array($extension,$allowed_extension)){
            if($uploaded_file['size'] <= 10000000){
                $select = "SELECT * FROM users WHERE id=$id";
                $select_result = mysqli_query($db_conn, $select);
                $assoc = mysqli_fetch_assoc($select_result);
                
                $delete_form = '../uploads/user/'.$assoc['profile_photo'];
                unlink($delete_form);

                $file_name = $id . '.' . $extension;
                $new_location = '../uploads/user/' . $file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update = "UPDATE users SET name='$name',email='$email',profile_photo='$file_name' WHERE id=$id";
                $update_result = mysqli_query($db_conn, $update);

                $_SESSION['success'] = 'User updated!';
                header('location:edit_user.php?id='.$id);
            }
            else{
                $_SESSION['size'] = 'size long too!';
                header('location:edit.php?='.$id);
            }
        }
        else{
            $_SESSION['extension'] = 'invalid extension';
            header('location: edit.php?id='.$id);
        }
    }
    
}
else{
    $uploaded_file = $_FILES['profile_photo'];
    if($uploaded_file['name'] == ''){
        if($_POST['password'] != $_POST['confirm_password']){
            $_SESSION['pass'] = 'password and confirm_password does not exit!';
            header('location:edit_user.php?id=' . $id);
        }
        else{
            $update = "UPDATE users SET name='$name',email='$email',password='$password_hash' WHERE id=$id";
            $update_result = mysqli_query($db_conn, $update);
            $_SESSION['success'] = 'User updated!';
            header('location:edit_user.php?id=' . $id);
        }
    }
    else{
        $after_explode = explode('.', $uploaded_file['name']);
        $extension = end($after_explode);
        $allowed_extension = array('jpg', 'png', 'gif', 'webp');

        if(in_array($extension,$allowed_extension)){
            if($uploaded_file['size'] <= 1000000){
                $select = "SELECT * FROM users WHERE id=$id";
                $select_result = mysqli_query($db_conn, $select);
                $assoc = mysqli_fetch_assoc($select_result);

                $delete_form = '../uploads/user/'.$assoc['profile_photo'];
                unlink($delete_form);
                $file_name = $id . '.' . $extension;
                $new_location = '../uploads/user/' . $file_name;
                move_uploaded_file($uploaded_file['tmp_name'], $new_location);

                $update = "UPDATE users SET name='$name',email='$email',password='$password_hash', profile_photo='$file_name' WHERE id=$id";
                $update_result = mysqli_query($db_conn, $update);

                $_SESSION['success'] = 'User updated!';
                header('location:edit_user.php?id='.$id);
            }
            else{
                $_SESSION['size'] = 'size long too!';
                header('location:edit.php?='.$id);
            }
        }
        else{
            $_SESSION['extension'] = 'invalid extension';
            header('location: edit.php?id='.$id);
        }
    }
    
}

?>