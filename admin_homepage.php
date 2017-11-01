<?php

require('Connection.php');
session_start();

if(!isset($_SESSION['user_login']))
    header('Location:admin_login.php');
?>
<!DOCTYPE html>
<html>
<head>
 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v3.12.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-124x128.jpg" type="image/x-icon">
  <meta name="description" content="Management Homepage">
  <title>Management Homepage</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/mobirise/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <script src="js/jquery.min.js"></script>
  
  
</head>
<body id="body">
<script type="text/javascript">
$(document).ready(function() {
$("body").on
("contextmenu", function(e){
return false;
});
$("#body").bind('cut copy paste',function(e){
	e.preventDefault();
});
});
</script>
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--transparent mbr-navbar--sticky mbr-navbar--auto-collapse" id="menu-5">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"><a href="index.html"><img src="assets/images/logo-124x128.jpg" class="mbr-navbar__brand-img mbr-brand__img" alt="logo" title="logo"></a></span>
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-info" href="">&nbsp; BANDARI HOSPITAL</a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active mbr-buttons--only-links"><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-success" href="index.html">HOME</a></li><li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-success" href="admin_login.php">MANAGEMENT</a></li>  <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-success" href="staff_login.php">STAFF</a></li></ul>                            
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-after-navbar" id="features1-d" style="background-color: rgb(255, 255, 255);">
    
    <div class="mbr-section__container mbr-section__container--std-top-padding mbr-section__container--sm-bot-padding mbr-section-title container" style="padding-top: 62px;">
        <div class="mbr-header mbr-header--center mbr-header--wysiwyg row">
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="mbr-header__text">BANDARI HOSPITAL MANAGEMENT</h3>
                
            </div>
        </div>
    </div>
    <div class="mbr-section__container container">
        <div class="mbr-section__row row">
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="admin_profile.php" class="mbri-user mbr-iconfont mbr-iconfont-features1" style="font-size: 100px; color: rgb(122, 198, 115);"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 31px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">Profile</h3>
                    </div>
                </div>
                
                
            </div>
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="add_staff.php" class="mbri-edit mbr-iconfont mbr-iconfont-features1" style="font-size: 100px; color: rgb(65, 168, 95);"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 31px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">Add Staff</h3>
                    </div>
                </div>
                
                
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="display_staff.php" class="mbri-edit2 mbr-iconfont mbr-iconfont-features1" style="font-size: 100px; color: rgb(65, 168, 95);"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 31px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">Edit Staff</h3>
                    </div>
                </div>
                
                
            </div>
            
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="delete_staff.php" class="mbri-trash mbr-iconfont mbr-iconfont-features1" style="font-size: 100px; color: rgb(235, 107, 86);"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 31px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">Delete Staff</h3>
                    </div>
                </div>
                
                
            </div>
            
            
            
        </div>
    </div>
</section>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="features1-e" style="background-color: rgb(255, 255, 255);">
    
    
    <div class="mbr-section__container container mbr-section__container--std-top-padding" style="padding-top: 93px;">
        <div class="mbr-section__row row">
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="staff_contacts.php" class="mbri-mobile2 mbr-iconfont mbr-iconfont-features1" style="font-size: 100px; color: rgb(65, 168, 95);"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">Staff's Contacts</h3>
                    </div>
                </div>
                
                
            </div>
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="reports.php" class="mbri-file mbr-iconfont mbr-iconfont-features1" style="font-size: 100px; color: rgb(65, 168, 95);"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text"> Reports</h3>
                    </div>
                </div>
                
                
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="changepassword.php" class="mbri-lock mbr-iconfont mbr-iconfont-features1" style="font-size: 100px; color: rgb(0, 168, 133);"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">Change Password</h3>
                    </div>
                </div>
                
                
            </div>
            
            <div class="mbr-section__col col-xs-12 col-md-3 col-sm-6">
                <div class="mbr-section__container mbr-section__container--center mbr-section__container--middle">
                    <figure class="mbr-figure"><a href="logoutadmin.php" class="mbri-logout mbr-iconfont mbr-iconfont-features1" style="font-size: 100px; color: rgb(65, 168, 95);"></a></figure>
                </div>
                <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                    <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                        <h3 class="mbr-header__text">Logout</h3>
                    </div>
                </div>
                
                
            </div>
            
            
            
        </div>
    </div>
</section>

<footer class="mbr-section mbr-section--relative mbr-section--fixed-size" id="footer1-4" style="background-color: rgb(68, 68, 68);">
    
    <div class="mbr-section__container container">
        <div class="mbr-footer mbr-footer--wysiwyg row" style="padding-top: 12.3px; padding-bottom: 49.2px;">
            <div class="col-sm-12">
                <p class="mbr-footer__copyright">Copyright (c) 2017 The Bandari Hospital. Development By TechHub Technologies</p>
            </div>
        </div>
    </div>
</footer>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/mobirise/js/script.js"></script>
  
  
</body>
</html>