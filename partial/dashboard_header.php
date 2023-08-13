<?php
require '../db.php';
if(!isset($_SESSION['login_success'])){
  header('location:../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin Panel</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="../backend/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<!-- Theme style -->
<link rel="stylesheet" href="../backend/css/style.css">
<link rel="stylesheet" href="../backend/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://kit.fontawesome.com/2cd9069c69.css" crossorigin="anonymous">

<link rel="stylesheet" href="../backend/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="../backend/css/themify-icons/themify-icons.css">
<link rel="stylesheet" href="../asset/css/flaticon.css">
<!-- Chartist CSS -->
<link rel="stylesheet" href="../backend/plugins/chartist-js/chartist.min.css">
<link rel="stylesheet" href="../backend/plugins/chartist-js/chartist-init.css">
<link rel="stylesheet" href="../backend/plugins/chartist-js/chartist-plugin-tooltip.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="index.html" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><img src="dist/img/logo-n.png" alt=""></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><img src="dist/img/logo.png" alt=""></span> </a> 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
      </ul>
      <div class="pull-left search-box">
        <form action="#" method="get" class="search-form">
          <div class="input-group">
            <input name="search" class="form-control" placeholder="Search..." type="text">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
            </span></div>
        </form>
        <!-- search form --> </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 new messages</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left"><img src="dist/img/img1.jpg" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                    <h4>Alex C. Patton</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="dist/img/img3.jpg" class="img-circle" alt="User Image"> <span class="profile-status offline pull-right"></span></div>
                    <h4>Nikolaj S. Henriksen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">10:15 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="dist/img/img2.jpg" class="img-circle" alt="User Image"> <span class="profile-status away pull-right"></span></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">8:45 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left"><img src="dist/img/img4.jpg" class="img-circle" alt="User Image"> <span class="profile-status busy pull-right"></span></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">12:15 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">View All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                    <h4>Alex C. Patton</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle blue"><i class="fa fa-coffee"></i></div>
                    <h4>Nikolaj S. Henriksen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">1:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle green"><i class="fa fa-paperclip"></i></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">11:10 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">Check all Notifications</a></li>
            </ul>
          </li>

          <?php
            $user_id = $_SESSION['id'];
            $select = "SELECT * FROM users WHERE id=$user_id";
            $select_result = mysqli_query($db_conn, $select);
            $after_assoc = mysqli_fetch_assoc($select_result);
          ?>
        
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="../uploads/user/<?=$after_assoc['profile_photo']?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?=$after_assoc['name'];?></span></a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="dist/img/img1.jpg" class="img-responsive" alt="User"></div>
                <p class="text-left">Florence Douglas <small>florence@gmail.com</small> </p>
                <div class="view-link text-left"><a href="#">View Profile</a> </div>
              </li>
              <li><a href="#"><i class="icon-profile-male"></i> My Profile</a></li>
              <li><a href="#"><i class="icon-wallet"></i> My Balance</a></li>
              <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="icon-gears"></i> Account Setting</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="../uploads/user/<?=$after_assoc['profile_photo']?>" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p><?=$after_assoc['name']?></p>
          <a href="#"><i class="fa fa-cog"></i></a> <a href="#"><i class="fa fa-envelope-o"></i></a> <a href="#"><i class="fa fa-power-off"></i></a> </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PERSONAL</li>
        <li class="active"> <a href="../partial/dashboard.php"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        </li>
        <li class="treeview"> <a href="#"><i class="fa fa-bullseye"></i> <span>User</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="../user/view_user.php">user list</a></li>
            <li><a href="../user/register.php">user add</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Banner</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="../Banner/add_banner.php">Add Banner</a></li>
            <li><a href="../social_icon/add_social_icon.php">Add Social Icon</a></li>
          </ul>
        </li>

        <li> <a href="../about/edit_about.php"> <i class="fa fa-bullseye"></i> <span>About Info</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Education</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="../education/add_edu.php">Add Education</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Services</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="../services/add_service.php">Add Service</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Works/Protfolio</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="../works/add_work.php">Add work</a></li>
            <li><a href="../works/manage_work.php">manage work</a></li>
          </ul>
        </li>
        
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Fact</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="../fact/add_fact.php">Add Fact</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Testimonial</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="../testimonial/add_testimonial.php">Add testimonial</a></li>
            <li><a href="../testimonial/manage_testimonial.php">Manage testimonial</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Brand</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/protfolio/brand/add_brand.php">Add brand</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>Inbox</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/protfolio/inbox/view_message.php" class="text-white">Message</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>address</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/protfolio/address/add_contact_information.php" class="text-white">information</a></li>
          </ul>
        </li>


      </ul>
    </div>
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content"> 