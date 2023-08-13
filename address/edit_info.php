<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM contacts WHERE id=$id";
$select_result = mysqli_query($db_conn,$select);
$select_assoc = mysqli_fetch_assoc($select_result);

?>

<?php
require '../partial/dashboard_header.php';
?>

<div class="row">
<div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Information</h3>
            </div>
            <div class="card-body">
                <form action="info_update.php" method="post">
                    <input type="hidden" name="id" value="<?=$select_assoc['id']?>">
                    <div class="form-group">
                        <input type="text" name="address" value="<?=$select_assoc['address']?>" placeholder="Address" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" value="<?=$select_assoc['email']?>" placeholder="Email...." class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" value="<?=$select_assoc['city']?>" placeholder="Email...." class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" value="<?=$select_assoc['phone']?>" placeholder="Phone...." class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="info" placeholder="Info...." class="form-control"><?=$select_assoc['info']?></textarea>
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