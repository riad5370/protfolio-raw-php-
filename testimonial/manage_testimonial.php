<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select_testimonial = "SELECT * FROM testimonials";
$select_testimonial_result = mysqli_query($db_conn, $select_testimonial);
?>
<?php
require '../partial/dashboard_header.php';
?>
<div class="row">
<div class="col-lg-10 offset-1">
        <div class="card">
            <div class="card-header">
                    <h3 class="card-title">Review list</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>name</th>
                        <th>info</th>
                        <th>content</th>
                        <th>image</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                        <?php foreach($select_testimonial_result as $key=>$testimonial) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$testimonial['name']?></td>
                                <td><?=$testimonial['avatar_info']?></td>
                                <td><?=$testimonial['content']?></td>
                                <td>
                                    <img width="100" src="../uploads/testimonial/<?=$testimonial['testmonial_image']?>" alt="">
                                </td>
                                <td>
                                    <a href="status_testimonial.php?id=<?=$testimonial['id']?>" class="btn btn-<?= $testimonial['status'] == 0?'secondary':'success' ?>"><?= $testimonial['status'] == 0?'deactive':'active' ?></a>
                                </td>
                                <td>
                                <a href="#" class="btn btn-primary">edit</a>
                                <a value="#" class="btn btn-danger del text-white">delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require '../partial/dashboard_footer.php';
?>
