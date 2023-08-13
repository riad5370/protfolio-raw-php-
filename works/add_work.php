<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select = "SELECT* FROM works";
$select_results = mysqli_query($db_conn, $select);

?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Work</h3>
            </div>
            <div class="card-body">
                <form action="work_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="category" class="form-control" placeholder="category">
                    </div>
                    <div class="form-group">
                        <input type="text" name="project_name" class="form-control" placeholder="project name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="title">
                    </div>
                    <div class="form-group">
                        <input type="text" name="desp" class="form-control" placeholder="description">
                    </div>
                    <div class="form-group">
                        <input type="file" name="project_img" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img width="100" src="" id="blah" alt="">
                    </div>
                    <div class="form-group">
                        <input type="submit" style="width:120px;"  class="btn btn-outline-success" value="Add Work">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
require '../partial/dashboard_footer.php';
?>


<?php if(isset($_SESSION['project_img_extension'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['project_img_extension']?>',
        })
    </script>
<?php } unset($_SESSION['project_img_extension']); ?>

<?php if(isset($_SESSION['project_img_size'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['project_img_size']?>',
        })
    </script>
<?php } unset($_SESSION['project_img_size']); ?>

<?php if(isset($_SESSION['works_insert_success'])) { ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['works_insert_success']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['works_insert_success']); ?>


