<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$query = "SELECT * FROM users";
$query_result = mysqli_query($db_conn, $query);
$query_assoc = mysqli_fetch_all($query_result, MYSQLI_ASSOC);

?>
<?php
require '../partial/dashboard_header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">view user list</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>si</th>
                            <th>name</th>
                            <th>email</th>
                            <th>photo</th>
                            <th>action</th>
                        </tr>
                        <?php foreach($query_assoc as $key=>$assoc): ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$assoc['name']?></td>
                                <td><?=$assoc['email']?></td>
                                <td>
                                    <img width="70" src="../uploads/user/<?=$assoc['profile_photo']?>" alt="">
                                </td>
                                <td>
                                    <a href="edit_user.php?id=<?=$assoc['id']?>" class="btn btn-sm btn-primary">edit</a>
                                    <a value="delete_user.php?id=<?=$assoc['id']?>" class="btn btn-sm btn-danger del text-white">delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require '../partial/dashboard_footer.php';
?>

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
    <?php if (isset($_SESSION['del'])) { ?>
        <script>
             Swal.fire(
            'Deleted!',
            '<?=$_SESSION['del']?>',
            'success'
            )
        </script>
    <?php } unset($_SESSION['del']); ?>