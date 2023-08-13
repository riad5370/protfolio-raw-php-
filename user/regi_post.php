<?php
session_start();
require '../db.php';

$errors = [];
$filed_names = ['name'=>'name is required','email'=>'email required', 'password'=>'password required','confirm_password'=>'confirm password required'];

foreach($filed_names as $filed_name=>$message){
    if(empty($_POST[$filed_name])){
        $errors[$filed_name] = $message;
    }
}
if(count($errors) == 0){
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $_SESSION['invalid'] = 'invalid email address';
        header('location:register.php');
    }
    else if($_POST['password'] != $_POST['confirm_password']){
        $_SESSION['pass'] = 'password and confirm_password not match';
        header('location:register.php');
    }
    else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $select = "SELECT COUNT(*) as email_exists FROM users WHERE email='$email'";
        $select_result = mysqli_query($db_conn, $select);
        $after_email_assoc = mysqli_fetch_assoc($select_result);

        if($after_email_assoc['email_exists'] == 0){
            $uploaded_file = $_FILES['profile_photo'];
            $after_explode = explode('.', $uploaded_file['name']);
            $extension = end($after_explode);
            $allowed_extension = array('jpg', 'gif', 'png', 'webp');

            if(in_array($extension,$allowed_extension)){
                if($uploaded_file['size'] <= 10000000){
                    $query = "INSERT INTO users (name,email,password)VALUES('$name','$email','$password_hash')";
                    $query_result = mysqli_query($db_conn, $query);
                    $id = mysqli_insert_id($db_conn);
                    $file_name = $id.'.'.$extension;
                    $new_location = 'uploads/user/'.$file_name;
                    move_uploaded_file($uploaded_file['tmp_name'], $new_location);
                    $update = "UPDATE users SET profile_photo='$file_name' WHERE id=$id";
                    $update_result = mysqli_query($db_conn, $update);
                    $_SESSION['success'] = 'user register successfull!';
                    header('location: register.php');
                }
                else{
                    $_SESSION['size'] = 'size too long!';
                    header('location:register.php');  
                }
            }
            else{
                $_SESSION['extension'] = 'invalid extension';
                header('location:register.php');
            }



          
        }
        else{
            $_SESSION['email_exist'] = 'email already exists!';
            header('location:register.php');
        }

        
    }
}
else{
    $_SESSION['errors'] = $errors;
    header('location:register.php');
}

?>