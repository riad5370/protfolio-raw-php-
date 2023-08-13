<?php
session_start();
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM services WHERE id=$id";
$select_result = mysqli_query($db_conn, $select);
$after_assocs = mysqli_fetch_assoc($select_result);

?>
<?php
require '../partial/dashboard_header.php';
?>
<div class="row justify-content-center">
<div class="col-lg-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Service</h3>
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
                <form action="update_post.php" method="post">
                    <input type="hidden" name="id" value="<?=$after_assocs['id']?>">
                    <div class="form-group">
                        <input type="text" id="icon" name="icon" value="<?=$after_assocs['icon']?>" class="form-control mt-2" placeholder="Icon..">
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" value="<?=$after_assocs['title']?>" class="form-control" placeholder="Title..">
                    </div>
                    <div class="form-group">
                        <textarea name="desp" id="" class="form-control" cols="10" rows="0" placeholder="Description.."><?=$after_assocs['desp']?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Service" class="btn btn-sm btn-outline-success" placeholder="Title..">
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

