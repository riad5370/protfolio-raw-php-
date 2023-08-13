<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select = "SELECT * FROM abouts";
$select_result = mysqli_query($db_conn, $select);
$select_assoc = mysqli_fetch_assoc($select_result);

?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit About Info</h3>
            </div>
            <div class="card-body">
                <form action="update_about.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$select_assoc['id']?>">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="<?=$select_assoc['title']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desp" id="" class="form-control"><?=$select_assoc['desp']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="about_img" class="form-control mb-2" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                        <img width="100px" src="../uploads/about/<?=$select_assoc['about_img']?>" id="blah" alt="">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="update" class="btn btn-sm btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
require '../partial/dashboard_footer.php';
?>

<?php if(isset( $_SESSION['about_update'])) {?>
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
        title: '<?=$_SESSION['about_update']?>'
        })

    </script>
<?php } unset( $_SESSION['about_update']) ?>

<?php if(isset($_SESSION['about_img_extension'])) {?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?=$_SESSION['about_img_extension']?>',
            })
    </script>
<?php } unset($_SESSION['about_img_extension']) ?>

<?php if(isset($_SESSION['about_img_size'])) {?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?=$_SESSION['about_img_size']?>',
            })
    </script>
<?php } unset($_SESSION['about_img_size']) ?>