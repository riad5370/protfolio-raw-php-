<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM banner_contents WHERE id=$id";
$select_result = mysqli_query($db_conn, $select);
$assoc = mysqli_fetch_assoc($select_result);

?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="container">
    <div class="row">
    <div class="col-lg-6 m-auto">
            <div class="card">
                <?php if(isset($_SESSION['banner_added'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['banner_added']?></div>
                <?php } unset($_SESSION['banner_added']) ?>

                <div class="card-header">
                    <h3 class="card-title">Edit Banner Content</h3>
                </div>
                <div class="card-body">
                    <form action="banner_update.php" method="post">
                        <input type="hidden" name="id" value="<?=$assoc['id']?>">
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?=$assoc['sub_title']?>" name="sub_title" placeholder="Sub-Titile.......">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?=$assoc['title']?>" name="title" placeholder="Titile........">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?=$assoc['desp']?>"  name="desp" placeholder="Description......">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require '../partial/dashboard_footer.php';
?>