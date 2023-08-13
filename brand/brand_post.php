<?php
session_start();
require '../db.php';



$uploaded_file = $_FILES['brand_img'];
$after_explode = explode('.',$uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','gif','webp','png');
if(in_array($extension,$allowed_extension)){
    if($uploaded_file['size'] <= 1000000){
        $name = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 5) . rand(100, 1000);
        $file_name = $name.'.'.$extension;
        $new_location = '../uploads/brand/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'],$new_location);

        $brand_insert = "INSERT INTO brands(brand_img)VALUES('$file_name')";
        $brand_img_result = mysqli_query($db_conn,$brand_insert);
        $_SESSION['success'] = "inserted!";
        header('location: add_brand.php');
    }
    else{
        $_SESSION['size']  = 'file size too long!';
        header('location: add_brand.php');
    }
}
else{
    $_SESSION['extension'] = 'invalid extension!';
    header('location: add_brand.php');
}

// $brand_insert = "INSERT INTO brands(brand_img)VALUES('$brand_img')";
// $brand_img_result = mysqli_query

?>