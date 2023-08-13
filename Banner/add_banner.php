<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select = "SELECT * FROM banner_contents";
$select_result = mysqli_query($db_conn, $select);
$after_assocs = mysqli_fetch_all($select_result,MYSQLI_ASSOC);

$select_image = "SELECT * FROM banner_images";
$select_image_result = mysqli_query($db_conn, $select_image);

?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
                <?php if(isset($_SESSION['update_success'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['update_success']?></div>
                <?php } unset($_SESSION['update_success']) ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Banner List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Si</th>
                            <th>sub_title</th>
                            <th>title</th>
                            <th>description</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($after_assocs as $key=>$assoc) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$assoc['sub_title']?></td>
                                <td><?=$assoc['title']?></td>
                                <td><?=$assoc['desp']?></td>
                                <td>
                                    <a href="banner_status.php?id=<?=$assoc['id']?>" class="btn-sm btn btn-<?=($assoc['status'] == 0?'secondary':'success')?>"><?=($assoc['status'] == 0?'Deactive':'Active')?></a>
                                </td>
                                <td>
                                    <a href="banner_edit.php?id=<?=$assoc['id']?>" class="btn btn-success btn-sm">Edit</a>
                                    <a value="banner_delete.php?id=<?=$assoc['id']?>" class="btn btn-danger btn-sm del text-white">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <?php if(isset($_SESSION['banner_added'])) { ?>
                    <div class="alert alert-success"><?=$_SESSION['banner_added']?></div>
                <?php } unset($_SESSION['banner_added']) ?>

                <div class="card-header">
                    <h3 class="card-title">Add Banner Content</h3>
                </div>
                <div class="card-body">
                    <form action="banner_post.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="sub_title" placeholder="Sub-Titile.......">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Titile........">
                        </div>
                        <div class="form-group">
                            <!-- <textarea name="desp" id="" cols="30" rows="10" class="form-control" placeholder="Description......"></textarea> -->
                            <input type="text" class="form-control" name="desp" placeholder="Description......">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mt-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View banner image</h3>
                </div>
                <div class="card-body">
                   <table class="table table-striped">
                        <tr>
                            <th>si</th>
                            <th>image</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                        <?php foreach($select_image_result as $key=>$image) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td>
                                    <img width="70px" src="../uploads/banner/<?=$image['banner_image']?>" alt="">
                                </td>
                                <td>
                                    <a href="banner_img_status.php?id=<?=$image['id']?>" class="btn-sm btn btn-<?=($image['status'] == 0?'secondary':'success')?>"><?=($image['status'] == 0?'deactive':'active')?></a>
                                </td>
                                <td>
                                    <a href="banner_img_delete.php?id=<?=$image['id']?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php }?>
                   </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="card-title">Add Banner Image</h3>
                </div>
                <div class="card-body">
                    <form action="banner_img_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control mb-2" name="banner_image" placeholder="banner image.." onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                            <img src="" width="70px" id="blah" alt="">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success">
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

<?php if(isset( $_SESSION['banner_image_added'])) {?>
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
        title: '<?=$_SESSION['banner_image_added']?>'
        })

    </script>
<?php } unset( $_SESSION['banner_image_added']) ?>

<?php if(isset($_SESSION['invalid_extension'])) {?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?=$_SESSION['invalid_extension']?>',
            })
    </script>
<?php } unset($_SESSION['invalid_extension']) ?>

<?php if(isset($_SESSION['invalid_image_size'])) {?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?=$_SESSION['invalid_image_size']?>',
            })
    </script>
<?php } unset($_SESSION['invalid_image_size']) ?>



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
            window.location.href= link;
        }
        }) 
        });    
    </script>
    <?php if(isset($_SESSION['delete'])){ ?>
        <script>
            Swal.fire(
                'Deleted!',
                '<?=$_SESSION['delete']?>',
                'success'
                )
        </script>
    <?php } unset($_SESSION['delete']);?>  


    <?php if(isset($_SESSION['banner_image_delete'])) { ?>
        <script>
             const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '<?=$_SESSION['banner_image_delete']?>'
        })
        </script>
    <?php } unset($_SESSION['banner_image_delete'] ) ?>