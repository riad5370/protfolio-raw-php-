<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select = "SELECT * FROM educations";
$select_result = mysqli_query($db_conn, $select);
$after_assocs = mysqli_fetch_all($select_result,MYSQLI_ASSOC);
?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Education List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Si</th>
                        <th>Title</th>
                        <th>Percentage</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($after_assocs as $key=>$assoc) { ?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$assoc['title']?></td>
                        <td><?=$assoc['percentage']?></td>
                        <td><?=$assoc['year']?></td>
                        <td>
                            <a href="edu_edit.php?id=<?=$assoc['id']?>" class="btn btn-sm btn-success">Edit</a>
                            <a value="edu_delete.php?id=<?=$assoc['id']?>" class="btn btn-sm btn-danger del text-white">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Education</h3>
            </div>
            <div class="card-body">
                <form action="edu_post.php" method="post">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="title....">
                    </div>
                    <div class="form-group">
                        <input type="number" name="percentage" class="form-control" placeholder="Percentage....">
                    </div>
                    <div class="form-group">
                        <input type="number" name="year" class="form-control" placeholder="Year....">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add Edu" class="btn btn-sm btn-success form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
require '../partial/dashboard_footer.php';
?>

<?php if(isset( $_SESSION['education_added_success'])) {?>
    <script>
         const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '<?=$_SESSION['education_added_success']?>'
        })

    </script>
<?php } unset( $_SESSION['education_added_success']) ?>

<script>
    $('.del').click(function(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var link = $(this).attr('value');
            window.location.href = link;
        }
        })
    })
</script>
<?php if (isset($_SESSION['edu_delete_success'])) { ?>
    <script>
        Swal.fire(
      'Deleted!',
      '<?=$_SESSION['edu_delete_success']?>',
      'success'
        )
    </script>
<?php } unset($_SESSION['edu_delete_success']) ?>

<?php if (isset($_SESSION['education_update_success'])) { ?>
    <script>
       Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['education_update_success']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['education_update_success']) ?>


