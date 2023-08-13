<?php
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:../login.php');
}
?>
<?php 
require 'dashboard_header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-9 m-auto">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title">Welcome, <strong><?= $_SESSION['name'];?></strong></h3>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus cum rerum aut molestias, repudiandae, officia tempora sed fugiat distinctio esse dolores dolor impedit laboriosam necessitatibus perspiciatis laudantium culpa, ad aspernatur dignissimos facere rem aliquam explicabo. Temporibus vitae nam adipisci voluptatum iusto vel officia, voluptates, delectus aspernatur earum commodi possimus esse.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require 'dashboard_footer.php';
?>
<?php if (isset($_SESSION['login_success_alert'])) { ?>
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
    title: 'Signed in successfully'
    })

</script>
<?php } unset( $_SESSION['login_success_alert'])?>
