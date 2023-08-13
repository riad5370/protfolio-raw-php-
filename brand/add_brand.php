<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select_brand = "SELECT * FROM brands";
$select_brand_result = mysqli_query($db_conn,$select_brand);
$brand_assoc = mysqli_fetch_all($select_brand_result,MYSQLI_ASSOC);

?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="row">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Brand Img</h3>
            </div>
            <div class="card-body">
                <table class="table table_bordered">
                    <tr>
                        <th width="200">Si</th>
                        <th width="">img</th>
                        <th>action</th>
                    </tr>
                    <?php foreach($brand_assoc as $si=>$brand) : ?>
                    <tr>
                        <td><?=$si+1?></td>
                        <td>
                            <img width="150" src="../uploads/brand/<?=$brand['brand_img']?>" alt="">
                        </td>
                        <td>
                            <a value="delete_brand.php?id=<?=$brand['id']?>" class="btn btn-danger del text-white">delete</a>
                        </td>
                    </tr>
                    <?php endforeach  ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Brand Img</h3>
            </div>
            <div class="card-body">
                <form action="brand_post.php" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                        <label for="">Image Add</label>
                        <input type="file" name="brand_img" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <br>
                        <img src="" alt="" id="blah">
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

<?php if(isset($_SESSION['extension'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['extension']?>',
        })
    </script>
<?php } unset($_SESSION['extension']) ?>

<?php if(isset($_SESSION['size'])) { ?>
    <script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?=$_SESSION['size']?>',
        })
    </script>
<?php } unset($_SESSION['size']) ?>

<?php if(isset($_SESSION['success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '<?=$_SESSION['success']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['success'])?>

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
   <?php if(isset($_SESSION['del'])){ ?>
    <script>
        Swal.fire(
            'Deleted!',
            '<?=$_SESSION['del']?>',
            'success'
            )
    </script>
    <?php } unset($_SESSION['del']);?>