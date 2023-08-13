<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$fact_select = "SELECT * FROM facts";
$fact_select_result = mysqli_query($db_conn,$fact_select);
$facts = mysqli_fetch_all($fact_select_result,MYSQLI_ASSOC);

?>

<?php
    require '../partial/dashboard_header.php';
?>
<div class="row">
    <div class="col-lg-7">
    <div class="card">
            <div class="card-header">
                <h3 class="card-title">fact</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>si</th>
                        <th>icon</th>
                        <th>title</th>
                        <th>count</th>
                        <th>action</th>
                    </tr>
                    <?php foreach($facts as $si=>$fact) : ?>
                    <tr>
                        <td><?=$si+1?></td>
                        <td><?=$fact['icon']?></td>
                        <td><?=$fact['title']?></td>
                        <td><?=$fact['count']?></td>
                        <td>
                            <a value="delete_fact.php?id=<?=$fact['id']?>" class="btn btn-danger del text-white">delete</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">add fact</h3>
            </div>
            <div class="card-body">
                <form action="fact_post.php" method="post">

                <?php
                        $fonts = array (
                            //'fa-facebook-f',
                            'fa flaticon-award',
                            'fa flaticon-like',
                            'fa flaticon-event',
                            'fa flaticon-woman'
                          );  
                    ?>
                    <div class="form-group">
                        <?php foreach($fonts as $icon) { ?>
                            <i style="margin-right:10px;font-size:30px" class="fa <?=$icon?>"></i>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <input type="text" id="icon" name="icon" placeholder="fact icon" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="title" placeholder="fact title" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="number" name="count" placeholder="fact count" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success mt-2" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
    require '../partial/dashboard_footer.php';
?>
<script>
    $('.fa').click(function(){
        var icon = $(this).attr('class');
        $('#icon').attr('value',icon);
    });
</script>

<?php if(isset($_SESSION['success'])) { ?>
<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: '<?=$_SESSION['success']?>',
    showConfirmButton: false,
    timer: 1500
    })
</script>
<?php } unset($_SESSION['success']) ?>
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