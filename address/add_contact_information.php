<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$information_select = "SELECT * FROM contacts";
$information_select_result = mysqli_query($db_conn,$information_select);
$informations = mysqli_fetch_all($information_select_result,MYSQLI_ASSOC);

?>
<?php
require '../partial/dashboard_header.php';
?>
<div class="row ">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Information</h3>
            </div>
            <div class="card">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Info</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($informations as $key=>$information) : ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?=$information['address']?></td>
                            <td><?=$information['email']?></td>
                            <td><?=$information['city']?></td>
                            <td><?=$information['phone']?></td>
                            <td><?=$information['info']?></td>
                            <td>
                                <a href="status_info.php?id=<?=$information['id']?>" class="btn btn-<?=$information['status'] == 0?'secondary':'success'?>"><?=$information['status'] == 0?'deactive':'active'?></a>
                            </td>
                            <td>
                                <a href="edit_info.php?id=<?=$information['id']?>" class="btn btn-info">edit</a>
                                <a value="delete_information.php?id=<?=$information['id']?>" class="btn btn-danger del text-white">delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Information</h3>
            </div>
            <div class="card-body">
                <form action="information_post.php" method="post">
                    <div class="form-group">
                        <input type="text" name="address" placeholder="Address" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="Email...." class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" placeholder="City...." class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Phone...." class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea type="text" name="info" placeholder="Info...." class="form-control"></textarea>
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