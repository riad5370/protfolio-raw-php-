<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM works WHERE id=$id";
$select_results = mysqli_query($db_conn, $select);
$after_assocs = mysqli_fetch_assoc($select_results);

?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="row">
    <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Work</h3>
            </div>
            <div class="card-body">
                <form action="update_work.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$after_assocs['id']?>">
                    <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="category" class="form-control" placeholder="category" value="<?=$after_assocs['category']?>">
                    </div>
                    <div class="form-group">
                        <label for="">project name</label>
                        <input type="text" name="project_name" class="form-control" placeholder="project name" value="<?=$after_assocs['project_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">title</label>
                        <input type="text" name="title" value="<?=$after_assocs['title']?>" class="form-control" placeholder="title">
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <textarea type="text" name="desp" class="form-control" placeholder="description"><?=$after_assocs['desp']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="project_img" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img width="100" src="../uploads/work/<?=$after_assocs['project_img']?>" id="blah" alt="">
                    </div>
                    <div class="form-group">
                        <input type="submit" style="width:120px;"  class="btn btn-outline-success" value="Update Work">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
require '../partial/dashboard_footer.php';
?>


<?php if(isset($_SESSION['extension'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['extension']?>',
        })
    </script>
<?php } unset($_SESSION['extension']); ?>

<?php if(isset($_SESSION['size'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['size']?>',
        })
    </script>
<?php } unset($_SESSION['size']); ?>



