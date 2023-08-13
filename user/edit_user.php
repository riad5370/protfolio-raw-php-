<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
  header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id=$id";
$query_result = mysqli_query($db_conn, $query);
$assoc = mysqli_fetch_assoc($query_result);

?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="login-box">
  <div class="login-box-body">

  <?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success"><?=$_SESSION['success']?></div>
  <?php } unset($_SESSION['success']) ?>

  <?php if(isset($_SESSION['size'])) { ?>
    <div class="alert alert-success"><?=$_SESSION['size']?></div>
  <?php } unset($_SESSION['size']) ?>

  <?php if(isset($_SESSION['extension'])) { ?>
    <div class="alert alert-success"><?=$_SESSION['extension']?></div>
  <?php } unset($_SESSION['extension']); ?>

  <?php if(isset($_SESSION['email_exist'])) { ?>
    <div class="alert alert-warning"><?=$_SESSION['email_exist']?></div>
  <?php } ?>

    <h3 class="login-box-msg">User Edit</h3>
    <form action="update_user.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$assoc['id']?>">
      <div class="form-group has-feedback">
        <input type="text" name="name" value="<?=$assoc['name']?>" class="form-control sty1" placeholder="Name">
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" value="<?=$assoc['email']?>" class="form-control sty1" placeholder="Email">

        <?php if(isset($_SESSION['invalid'])) { ?>
          <div class="alert alert-danger"><?=$_SESSION['invalid']?></div>
        <?php } ?>

      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control sty1" placeholder="Password">
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="confirm_password" class="form-control sty1" placeholder="Conform Password">

        <?php if(isset($_SESSION['pass'])) { ?>
          <div class="alert alert-danger"><?=$_SESSION['pass']?></div>
        <?php } unset($_SESSION['pass']) ?>

      </div>
      <div class="form-group has-feedback">
        <input type="file" name="profile_photo" class="form-control sty1" placeholder="Photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"><br>
        <img src="../uploads/user/<?=$assoc['profile_photo']?>" id="blah" width="70" alt="">

      </div>
      <div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
  </div>
  <!-- /.login-box-body --> 
</div>

<?php
require '../partial/dashboard_footer.php';
?>