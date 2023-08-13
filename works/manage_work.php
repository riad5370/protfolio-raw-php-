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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View Work</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Si</th>
                        <th>Category</th>
                        <th>Project Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_results as $key=>$work) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$work['category']?></td>
                            <td><?=$work['project_name']?></td>
                            <td><?=$work['title']?></td>
                            <td>
                                <?= substr($work['desp'],0,20) ?>
                                <span style="cursor: pointer;" class="abc" value='<?= substr($work['desp'],20) ?>'><i style="color: blue;">read more</i></span>
                            </td>
                            <td>
                                <img width="70" src="../uploads/work/<?=$work['project_img']?>" alt="">
                            </td>
                            <td><a href="status_work.php?id=<?=$work['id']?>" class="btn btn-sm btn-<?=$work['status']==1?'success':'secondary'?>"><?=$work['status']==1?'Active':'Deactive'?></a></td>
                            <td class="btn-group">
                                <a href="edit_work.php?id=<?=$work['id']?>" class="btn btn-sm btn-primary mx-1">Edit</a>
                                <a value="delete_work.php?id=<?=$work['id']?>" class="btn btn-sm btn-danger del text-white">Delete</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
require '../partial/dashboard_footer.php';
?>

<script>
    $('.abc').click(function(){
        var data = $(this).attr('value');
        $(this).html(data);
    });
</script>

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
    });
</script>
<?php if(isset($_SESSION['del'])) { ?>
    <script>
        Swal.fire(
        'Deleted!',
        '<?=$_SESSION['del']?>',
        'success'
    )
    </script>
<?php } unset($_SESSION['del'])?>


<?php if(isset($_SESSION['success'])) { ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['success']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['success']); ?>


