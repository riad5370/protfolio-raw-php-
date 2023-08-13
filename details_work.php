<?php
require 'db.php';
if(!isset($_SESSION['login_success'])){ 
    header('location: /New folder/protfolio/login.php');
}
$id = $_GET['id'];

//works-part
$select = "SELECT * FROM works WHERE id=$id";
$select_works = mysqli_query($db_conn,$select);
$after_assocs = mysqli_fetch_assoc($select_works);

?>


<?php
require 'Frontend-partial/frontend_header.php';
?>
<section class="breadcrumb-area breadcrumb-bg d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="breadcrumb-content text-center">
                                <h2><?=$after_assocs['project_name'] ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- portfolio-details-area -->
            <section class="portfolio-details-area pt-120 pb-120">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="single-blog-list">
                                <div class="blog-list-thumb mb-35">
                                    <img src="uploads/work/<?=$after_assocs['project_img'] ?>" alt="img">
                                </div>
                                <div class="blog-list-content blog-details-content portfolio-details-content">
                                    <h2><?=$after_assocs['title'] ?></h2>
                                    <p><?=$after_assocs['desp'] ?></p>
                                    <div class="blog-list-meta">
                                        <ul>
                                            <li class="blog-post-date">
                                                <h3>Share On</h3>
                                            </li>
                                            <li class="blog-post-share">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="avatar-post mt-70 mb-60">
                                <?php
                                        $id = $after_assocs['user_id'];
                                        $select_user = "SELECT * FROM users WHERE id=$id";
                                        $select_user_result = mysqli_query($db_conn, $select_user);
                                        $select_user_assoc = mysqli_fetch_assoc($select_user_result);


                                    ?>
                                    <ul>
                                        <li>
                                            <div class="post-avatar-img">
                                                <img src="uploads/user/<?=$select_user_assoc['profile_photo']?>" alt="img">
                                            </div>
                                            <div class="post-avatar-content">
                                                <h5><?=$select_user_assoc['name']?></h5>
                                                <p>Vehicula dolor amet consectetur adipiscing elit. Cras sollicitudin, tellus vitae
                                                    condimem
                                                    egestliberos dolor auctor
                                                    tellus.</p>
                                                <div class="post-avatar-social mt-15">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    <?php
    require 'Frontend-partial/frontend_footer.php';
    ?>