<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
  header('location: /New folder/protfolio/login.php');
}
?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="login-box">
  <div class="login-box-body">

  <?php if(isset($_SESSION['success'])) { ?>
    <div class="alert alert-success"><?=$_SESSION['success']?></div>
  <?php } ?>

  <?php if(isset($_SESSION['size'])) { ?>
    <div class="alert alert-warning"><?=$_SESSION['size']?></div>
  <?php } unset($_SESSION['size']) ?>

  <?php if(isset($_SESSION['extension'])) { ?>
    <div class="alert alert-warning"><?=$_SESSION['extension']?></div>
  <?php } unset($_SESSION['extension']) ?>
  
  <?php if(isset($_SESSION['email_exist'])) { ?>
    <div class="alert alert-warning"><?=$_SESSION['email_exist']?></div>
  <?php } ?>

    <h3 class="login-box-msg">Sign Up</h3>
    <form action="regi_post.php" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" name="name" class="form-control sty1" placeholder="Name">

        <?php if(isset($_SESSION['errors']['name'])) { ?>
          <div class="alert alert-danger"><?=$_SESSION['errors']['name']?></div>
        <?php } ?>

      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control sty1" placeholder="Email">

        <?php if(isset($_SESSION['errors']['email'])) { ?>
          <div class="alert alert-danger"><?=$_SESSION['errors']['email']?></div>
        <?php } ?>
        <?php if(isset($_SESSION['invalid'])) { ?>
          <div class="alert alert-danger"><?=$_SESSION['invalid']?></div>
        <?php } ?>

      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control sty1" placeholder="Password">
        
        <?php if(isset($_SESSION['errors']['password'])) { ?>
          <div class="alert alert-danger"><?=$_SESSION['errors']['password']?></div>
        <?php } ?>

      </div>
      <div class="form-group has-feedback">
        <input type="password" name="confirm_password" class="form-control sty1" placeholder="Conform Password">

        <?php if(isset($_SESSION['errors']['confirm_password'])) { ?>
          <div class="alert alert-danger"><?=$_SESSION['errors']['confirm_password']?></div>
        <?php } ?>

        <?php if(isset($_SESSION['pass'])) { ?>
          <div class="alert alert-danger"><?=$_SESSION['pass']?></div>
        <?php } ?>

      </div>
      <div class="form-group has-feedback">
        <input type="file" name="profile_photo" class="form-control sty1" placeholder="Photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"><br>
        <img width="70" src="" id="blah" alt="">
      </div>
      <div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign UP</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
  </div>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<?php
require '../partial/dashboard_footer.php';
?>

<?php
unset($_SESSION['errors']);
unset($_SESSION['pass']);
unset($_SESSION['invalid']);
unset($_SESSION['success']);
unset($_SESSION['email_exist']);
?>