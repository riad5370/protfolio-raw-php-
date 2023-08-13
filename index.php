<?php
session_start();
require 'db.php';

//banner
$select = "SELECT * FROM banner_contents WHERE status=1";
$select_result = mysqli_query($db_conn,$select);
$after_assoc = mysqli_fetch_assoc($select_result);

$select_img = "SELECT * FROM banner_images WHERE status=1";
$select_img_result = mysqli_query($db_conn,$select_img);
$after_assoc_img = mysqli_fetch_assoc($select_img_result);

//banner_icon
$select_icon = "SELECT * FROM icons WHERE status=1";
$select_icon_result = mysqli_query($db_conn,$select_icon);

//about
$select = "SELECT * FROM abouts";
$select_result = mysqli_query($db_conn,$select);
$select_result_assoc = mysqli_fetch_assoc($select_result);

//education
$select_edu = "SELECT * FROM educations WHERE status=1";
$select_edu_result = mysqli_query($db_conn,$select_edu);

//service
$select_service = "SELECT * FROM services WHERE status=1";
$select_service_result = mysqli_query($db_conn, $select_service);

// fact area
$fact_select = "SELECT * FROM facts";
$fact_select_result = mysqli_query($db_conn,$fact_select);
$facts = mysqli_fetch_all($fact_select_result,MYSQLI_ASSOC);

//works-part
$select = "SELECT * FROM works WHERE status=1";
$select_works = mysqli_query($db_conn,$select);

//testimonial
$select_testimonial = "SELECT * FROM testimonials WHERE status=1";
$select_testimonial_result = mysqli_query($db_conn, $select_testimonial);

//brand_area
$select_brand_img = "SELECT * FROM brands";
$select_brand_img_result = mysqli_query($db_conn,$select_brand_img);

//contact
$select_contact = "SELECT * FROM contacts WHERE status=1";
$select_contact_result = mysqli_query($db_conn,$select_contact);
$select_contact_assoc = mysqli_fetch_assoc($select_contact_result);

?>

<?php
require 'Frontend-partial/frontend_header.php';
?>
            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?=$after_assoc['sub_title']?></h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?=$after_assoc['title']?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?=$after_assoc['desp']?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <?php foreach($select_icon_result as $icon) { ?>
                                            <li><a href="<?=$icon['link']?>"><i class="<?=$icon['icon']?>"></i></a></li>
                                        <?php } ?>
                
                                    </ul>
                                </div>
                                <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="uploads/banner/<?=$after_assoc_img['banner_image']?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img width="550" src="/New folder/protfolio/uploads/about/<?=$select_result_assoc['about_img']?>" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2><?=$select_result_assoc['title']?></h2>
                            </div>
                            <div class="about-content">
                                <p><?=$select_result_assoc['desp']?></p>
                                <h3>Education:</h3>
                            </div>
                            <!-- Education Item -->
                            <?php foreach($select_edu_result as $education) { ?>
                                <div class="education">
                                    <div class="year"><?=$education['year']?></div>
                                    <div class="line"></div>
                                    <div class="location">
                                        <span><?=$education['title']?></span>
                                        <div class="progressWrapper">
                                            <div class="progress">
                                                <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?=$education['percentage']?>%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach($select_service_result as $select_service) { ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                    <i class="<?=$select_service['icon']?>"></i>
                                    <h3><?=$select_service['title']?></h3>
                                    <p><?=$select_service['desp']?></p>
                                </div>
                            </div>
                        <?php } ?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($select_works as $work) { ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="uploads/work/<?=$work['project_img']?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?=$work['category']?></span>
									<h4><a href="details_work.php?id=<?=$work['id']?>"><?=$work['project_name']?></a></h4>
									<a href="details_work.php?id=<?=$work['id']?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php foreach($facts as $fact) : ?>
                                <div class="col-xl-2 col-lg-3 col-sm-6">
                                    <div class="fact-box text-center mb-50">
                                        <div class="fact-icon">
                                            <i class="<?=$fact['icon']?>"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h2><span class="count"><?=$fact['count']?></span></h2>
                                            <span><?=$fact['title']?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                            <?php foreach($select_testimonial_result as $testimonial) { ?>
                            <div class="single-testimonial text-center">
                                <div class="testi-avatar round-img">
                                    <img width="100" src="uploads/testimonial/<?= $testimonial['testmonial_image']; ?>" alt="img">
                                </div>
                                <div class="testi-content">
                                    <h4><span>“</span><?=$testimonial['content']?><span>”</span></h4>
                                    <div class="testi-avatar-info">
                                        <h5><?=$testimonial['name']?></h5>
                                        <span><?=$testimonial['avatar_info']?></span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php foreach($select_brand_img_result as $brand_imge) : ?>
                            <div class="col-xl-2">
                                <div class="single-brand">
                                    <img src="/New folder/protfolio/uploads/brand/<?=$brand_imge['brand_img']; ?>" alt="img">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p><?=$select_contact_assoc['info']?> </p>
                                <h5>OFFICE IN <span><?=$select_contact_assoc['city']?></span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?=$select_contact_assoc['address']?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?=$select_contact_assoc['phone']?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?=$select_contact_assoc['email']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                            <?php if(isset($_SESSION['message'])){ ?>
                            <div class="alert alert-success"><?=$_SESSION['message']?></div>
                            <?php } unset($_SESSION['message'])?>

                            <div class="contact-form">
                                <form action="inbox/message_post.php" method="post">
                                    <input type="text" name="name" placeholder="your name *">
                                    <input type="email" name="email" placeholder="your email *">
                                    <textarea name="message" id="message" placeholder="your message *"></textarea>
                                    <button class="btn">BUY TICKET</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

    <?php
        require 'Frontend-partial/frontend_footer.php';
    ?>
