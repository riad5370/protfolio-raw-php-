<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';
?>
<?php
require '../partial/dashboard_header.php';
?>
<div class="row">
<div class="col-lg-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Review</h3>
            </div>
            <div class="card-body">
                <form action="testimonial_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="avatar_info" class="form-control" placeholder="avatar info">
                    </div>
                    <div class="form-group">
                        <input type="text" name="content" class="form-control" placeholder="content">
                    </div>
                    <div class="form-group">
                        <input type="file" name="testmonial_image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img width="100" src="" alt="" id="blah">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
</div>


</div>
<?php
require '../partial/dashboard_footer.php';
?>
