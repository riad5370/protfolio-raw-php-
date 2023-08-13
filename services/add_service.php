<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select = "SELECT * FROM services";
$select_results = mysqli_query($db_conn, $select);

?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View Service</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Si</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($select_results as $key=>$result) { ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><?=$result['icon']?></td>
                            <td><?=$result['title']?></td>
                            <td>

                                <?=substr($result['desp'], 0, 20)?>
                                <span style="cursor:pointer;" class="abc" value="<?=substr($result['desp'],21)?>"><i style="color:blue;">Read More</i></span>
                                
                                <!-- <?=substr($result['desp'],0,20)?>
                                <span style="cursor:pointer;" class="abc" value="<?=substr($result['desp'],20)?>"><?=(strlen($result['desp'])>=20)?'<i style="color:blue;">Read More</i>':''?></span> -->
                          
                            </td>
                            <td>
                                <a href="service_status_post.php?id=<?=$result['id']?>" class="btn btn-sm btn-<?=$result['status'] == 1?'success':'secondary'?>"><?=$result['status'] == 1?'Active':'Deactive'?></a>
                            </td>
                            <td>
                                <a href="edit_service.php?id=<?=$result['id']?>" class="btn btn-sm btn-outline-success">Edit</a>
                                <a value="delete_service.php?id=<?=$result['id']?>" class="btn btn-sm btn-outline-danger del">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Service</h3>
            </div>
            <div class="card-body">
                <div>
                    <?php
                        $icons = [                             
                            'fa-book',                                                        
                            'fa-phone', 
                            'fa-phone-square',                       
                            'fa-twitter',                            
                            'fa-facebook',                           
                            'fa-github',                            
                            'fa-desktop',                            
                            'fa-laptop',                             
                            'fa-tablet',                             
                            'fa-mobile',                      
                            'fa-microphone',                
                            'fa-html5',                              
                            'fa-css3',                       
                            'fa-ticket',                               
                            'fa-file',                     
                            'fa-youtube',                    
                            'fa-instagram', 
                            'fa-brands fa-react', 
                            'fa-brands fa-php',
                            'fa-brands fa-free-code-camp',
                            'fa-solid fa-lightbulb-on',
                            'fa-solid fa-pen-to-square',
                            'fa-solid fa-headset',                   
                           
                          ];
                    ?>

                    <?php foreach($icons as $icon) { ?>
                        <i style="margin:5px; font-size:20px" class="fa <?= $icon;?>"></i>
                    <?php } ?>

                </div>
                <form action="service_post.php" method="post">
                    <div class="form-group">
                        <input type="text" id="icon" name="icon" class="form-control mt-2" placeholder="Icon..">
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Title..">
                    </div>
                    <div class="form-group">
                        <textarea name="desp" id="" class="form-control" cols="10" rows="0" placeholder="Description.."></textarea>
                        <!-- <textarea type="text" name="desp" class="form-control" placeholder="Description.."> -->
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-success" placeholder="Title..">
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
        var data = $(this).attr('class');
        $('#icon').attr('value',data);
    })
</script>
<!-- readmore -->
<script>
    $('.abc').click(function(){
        var data = $(this).attr('value');
        $(this).html(data);
    })
</script>
<!-- readmore -->

<?php if(isset($_SESSION['service_added_success'])) { ?>
<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: '<?=$_SESSION['service_added_success']?>',
    showConfirmButton: false,
    timer: 1500
    })
</script>
<?php } unset($_SESSION['service_added_success']) ?>

<?php if(isset($_SESSION['service_update_success'])) { ?>
<script>
    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: '<?=$_SESSION['service_update_success']?>',
    showConfirmButton: false,
    timer: 1500
    })
</script>
<?php } unset($_SESSION['service_update_success']) ?>

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
<?php if (isset($_SESSION['service_deleted'])) { ?>
    <script>
        Swal.fire(
      'Deleted!',
      '<?=$_SESSION['service_deleted']?>',
      'success'
        )
    </script>
<?php } unset($_SESSION['service_deleted']) ?>

<?php if(isset($_SESSION['limit'])) {?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?=$_SESSION['limit']?>',
            })
    </script>
<?php } unset($_SESSION['limit']) ?>