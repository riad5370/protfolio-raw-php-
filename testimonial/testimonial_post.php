
<?php
session_start();
require '../db.php';

$name = $_POST['name'];
$avatar_info = $_POST['avatar_info'];
$content = $_POST['content'];


$uploaded_file = $_FILES['testmonial_image'];
$after_explode = explode('.', $uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','webp','gif');

if(in_array($extension, $allowed_extension)){
    if($uploaded_file['size'] <= 100000000){
       $names = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 6) . rand(100, 1000);
       $file_name = $names.'.'.$extension;
       $new_location = '../uploads/testimonial/'.$file_name;
       move_uploaded_file($uploaded_file['tmp_name'], $new_location);

       $insert_testimonial = "INSERT INTO testimonials(name,avatar_info,content,testmonial_image)VALUES('$name','$avatar_info','$content','$file_name')";
       $insert_result = mysqli_query($db_conn, $insert_testimonial);

       $_SESSION['insert'] = 'inserted!';
       header('location: add_testimonial.php');
    }
    else{
       $_SESSION['size']  = 'file size too long!';
       header('location: add_testimonial.php');
    }
}
else{
   $_SESSION['extension'] = 'invalid extension!';
   header('location: add_testimonial.php');
}


?>
