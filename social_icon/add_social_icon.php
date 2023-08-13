<?php
session_start();
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
require '../db.php';

$select = "SELECT * FROM icons";
$select_result = mysqli_query($db_conn, $select);
$after_assocs = mysqli_fetch_all($select_result, MYSQLI_ASSOC);
?>

<?php
require '../partial/dashboard_header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">View Icon</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                          <th>Si</th>    
                          <th>Icon</th>    
                          <th>Link</th>    
                          <th>Status</th>    
                          <th>Action</th>    
                        </tr>
                        <?php foreach ($after_assocs as $key=>$assoc) { ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$assoc['icon']?></td>
                                <td><?=$assoc['link']?></td>
                                <td>
                                    <a href="icon_status.php?id=<?=$assoc['id']?>" class="btn btn-sm btn-<?=($assoc['status'] == 0?'secondary':'success')?>"><?=($assoc['status'] == 0?'Deactive':'Active')?></a>
                                </td>
                                <td>
                                    <a value="icon_delete.php?id=<?=$assoc['id']?>" class="btn btn-danger text-white btn-sm del">Delete</a>
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
                    <h3 class="card-title">Add Social Icon</h3>
                </div>
                <div class="card-body">
                    <form action="icon_post.php" method="post">
                        <?php
                            $icons = [                          
                                'fa-search',                               
                                'fa-camera',                               
                                'fa-github-square',                        
                                'fa-phone',                              
                                'fa-twitter',                            
                                'fa-facebook', 
                                'fa-instagram',                          
                                'fa-github',                               
                                'fa-desktop',                            
                                'fa-laptop',                             
                                'fa-tablet',                             
                                'fa-mobile',                              
                                'fa-github-alt',                     
                                'fa-html5',                              
                                'fa-css3',                                 
                                'fa-youtube-square',                     
                                'fa-youtube',                              
                                'fa-windows',                              
                                'fa-skype',                             
                                'fa-yahoo',                              
                                'fa-google',                               
                                'fa-drupal',                             
                                'fa-joomla',                               
                                'fa-spotify',                            
                                'fa-codepen',                            
                                'fa-git-square',                         
                                'fa-git',                                  
                                'fa-wifi',                                
                                'fa-facebook-official',                   
                                'fa-pinterest-p',                         
                                'fa-whatsapp',                             
                                'fa-wikipedia-w',                          
                                'fa-chrome',                              
                                'fa-firefox',                                 
                              ];

                        ?>
                        <div class="form-group">
                            <?php foreach($icons as $icon) { ?>
                                <i style="margin-right:10px;font-size:20px" class="fa <?=$icon ?>"></i>
                            <?php } ?> 
                        </div>
                        <div class="form-group">
                            <input type="text" id="icon" name="icon" class="form-control" placeholder="Icon...">
                        </div>
                        <div class="form-group">
                            <input type="text" name="link" class="form-control" placeholder="link...">
                        </div>
                        <div class="form-group">
                            <input type="submit" class=" btn btn-success btn-sm form-control">
                        </div>
                    </form> 
                </div>
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
    })
</script>

<?php if(isset( $_SESSION['icon_inserted'])) {?>
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
        title: '<?=$_SESSION['icon_inserted']?>'
        })

    </script>
<?php } unset( $_SESSION['icon_inserted']) ?>

<?php if(isset($_SESSION['icon_limite'])){ ?>
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: '<?=$_SESSION['icon_limite']?>',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
<?php } unset($_SESSION['icon_limite'])?>

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

<?php if(isset($_SESSION['icon_delete'])){ ?>
    <script>
        Swal.fire(
            'Deleted!',
            '<?=$_SESSION['icon_delete']?>',
            'success'
            )
    </script>
<?php } unset($_SESSION['icon_delete']);?>  