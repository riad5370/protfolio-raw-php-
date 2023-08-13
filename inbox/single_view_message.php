<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$update = "UPDATE messages SET status=1 WHERE id=$id";
$update_result = mysqli_query($db_conn,$update);

$select = "SELECT * FROM messages WHERE id=$id";
$select_result = mysqli_query($db_conn,$select);
$select_assoc = mysqli_fetch_assoc($select_result);

?>
<?php
require '../partial/dashboard_header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Message</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>name</td>
                        <td><?=$select_assoc['name']?></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><?=$select_assoc['email']?></td>
                    </tr>
                    <tr>
                        <td>message</td>
                        <td><?=$select_assoc['message']?></td>
                    </tr>
                    
                </table>

                <a href="view_message.php" class="btn">back</a>
            </div>
        </div>
    </div>
</div>




<?php
require '../partial/dashboard_footer.php';
?>