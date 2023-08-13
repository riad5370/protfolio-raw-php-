<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="asset/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="asset/css/animate.min.css">
        <link rel="stylesheet" href="asset/css/magnific-popup.css">
        <link rel="stylesheet" href="asset/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="asset/css/flaticon.css">
        <link rel="stylesheet" href="asset/css/slick.css">
        <link rel="stylesheet" href="asset/css/aos.css">
        <link rel="stylesheet" href="asset/css/default.css">
        <link rel="stylesheet" href="asset/css/style.css">
        <link rel="stylesheet" href="asset/css/responsive.css">
    </head>
    <body class="theme-bg">
         <!-- preloader -->
         <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                <a href="index.php">
                                    <img width="100" src="uploads/logo/riad.png" alt="" />
                                </a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="uploads/logo/riad (4).png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="index.php#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index.php">
                        <img width="100" src="uploads/logo/riad.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p><?=$select_contact_assoc['address']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?=$select_contact_assoc['phone']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?=$select_contact_assoc['email']?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                <?php foreach($select_icon_result as $icon) { ?>
                    <a href="<?=$icon['link']?>"><i class="<?=$icon['icon']?>"></i></a>
                <?php } ?>
                </div>
                
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>