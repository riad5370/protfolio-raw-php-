<?php
session_start();
require '../db.php';

$category = mysqli_real_escape_string($db_conn, $_POST['category']);
$project_name = mysqli_real_escape_string($db_conn, $_POST['project_name']);
$title = mysqli_real_escape_string($db_conn, $_POST['title']);
$desp = mysqli_real_escape_string($db_conn, $_POST['desp']);
$user_id = $_SESSION['id']; 

$uploaded_file = $_FILES['project_img'];
$after_exploade = explode('.',$uploaded_file['name']);
$extension = end($after_exploade);
$allowed_extension = array('jpg','png','gif','webp');

if(in_array($extension,$allowed_extension)){
    if($uploaded_file['size'] <= 10000000){
        $name = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,5).rand(100,1000);
        $file_name = $name.'.'.$extension;
        $new_location = '../uploads/work/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);

        $insert = "INSERT INTO works(user_id,category,project_name,title,desp,project_img)VALUES('$user_id','$category','$project_name','$title','$desp','$file_name')";
        $insert_result = mysqli_query($db_conn,$insert);
        $_SESSION['works_insert_success'] = 'Inserted!';
        header('location: add_work.php');
    }
    else{
        $_SESSION['project_img_size'] = 'Image size too long!';
        header('location: add_work.php'); 
    }
}
else{
    $_SESSION['project_img_extension'] = 'Invalid Image Extension!';
    header('location: add_work.php');
}


?>

