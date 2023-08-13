<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM educations WHERE id=$id";
$select_result = mysqli_query($db_conn, $select);
$assoc = mysqli_fetch_assoc($select_result);
?>

<?php
require '../partial/dashboard_header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Education</h3>
            </div>
            <div class="card-body">
                <form action="edu_update.php" method="post">
                    <input type="hidden" name="id" value="<?=$assoc['id']?>">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="<?=$assoc['title']?>" placeholder="title....">
                    </div>
                    <div class="form-group">
                        <input type="number" name="percentage" class="form-control" value="<?=$assoc['percentage']?>" placeholder="Percentage....">
                    </div>
                    <div class="form-group">
                        <input type="number" name="year" class="form-control" value="<?=$assoc['year']?>" placeholder="Year....">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn btn-sm btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
require '../partial/dashboard_footer.php';
?>