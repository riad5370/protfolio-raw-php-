<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select_message = "SELECT * FROM messages ORDER BY created_at DESC";
$select_message_result = mysqli_query($db_conn,$select_message);
$posts = mysqli_fetch_all($select_message_result,MYSQLI_ASSOC);

?>
<?php
require '../partial/dashboard_header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Message List</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>si</th>
                        <th>name</th>
                        <th>email</th>
                        <th>message</th>
                        <th>action</th>
                    </tr>
                    <?php foreach($posts as $key=>$message) : ?>

                        <tr class="<?=$message['status'] == 0?'bg-info':''?>">
                            <td><?= $key+1 ?></td>
                            <td><?= $message['name'] ?></td>
                            <td><?= $message['email'] ?></td>
                            <td><?= $message['message'] ?><br><br><?= $message['created_at'] ?></td>
                            <td>
                                <a href="single_view_message.php?id=<?=$message['id']?>" class="btn btn-info">view</a>
                                <a value="delete_message.php?id=<?=$message['id']?>" class="btn btn-danger del">delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
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