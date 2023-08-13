<?php
session_start();
require '../db.php';

$id = $_GET['id'];

   $update = "UPDATE contacts SET status=0";
   $update_result = mysqli_query($db_conn,$update);



    $update2 = "UPDATE contacts SET status=1 WHERE id=$id";
    $update_result2 = mysqli_query($db_conn,$update2);
    header('location: add_contact_information.php');


?>