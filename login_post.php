<?php
session_start();
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];


$select = "SELECT COUNT(*) as email_exists FROM users WHERE email='$email'";
$select_result = mysqli_query($db_conn, $select);
$after_email_assoc = mysqli_fetch_assoc($select_result);

if($after_email_assoc['email_exists'] == 1){
    $select_password = "SELECT * FROM users WHERE email='$email'";
    $password_result = mysqli_query($db_conn, $select_password);
    $password_assoc = mysqli_fetch_assoc($password_result);
    if(password_verify($password, $password_assoc['password'])){
        $_SESSION['login_success'] = 'login successfull!';
        $_SESSION['login_success_alert'] = 'login successfull!';
        $_SESSION['name'] = $password_assoc['name'];
        $_SESSION['id'] = $password_assoc['id'];
        header('location:partial/dashboard.php');
    }
    else{
        $_SESSION['wrong'] = 'wrong password!';
        header('location:login.php');
    }
}
else{
    $_SESSION['email_exist'] = 'email does not exists!';
    header('location:login.php');
}
?>