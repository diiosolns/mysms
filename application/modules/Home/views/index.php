<!DOCTYPE html>

<html lang="en">
    <head>
     <!--  ============================ ANALYTICS=========================== -->
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132771817-2"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-132771817-2');
            </script>
     <!--  ============================ END ANALYTICS ====================== -->
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="author" content="sumit kumar"> 
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>diioLab</title> 
     <!--Web icon-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.ico') ?>" />
    <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
        <!-- Sub_menu -->
        <link href="<?php echo base_url('assets/css/diiocss/submenu.css');?>" rel="stylesheet" type="text/css" />
        <!-- home page slider and footer -->
        <link href="<?php echo base_url('assets/css/diiocss/home.css');?>" rel="stylesheet" type="text/css" />
         <!-- animate -->
        <link href="<?php echo base_url('assets/css/diiocss/animate.css');?>" rel="stylesheet" type="text/css" />


        <!-- <script src="https://use.fontawesome.com/07b0ce5d10.js"></script> -->
        <style type="text/css">
          .sitecolor1 {
            color: #10C4EF;
          }

          .sitecolor1bg {
            background-color: #10C4EF;
          } 

           .sitecolor2 {
            color: #FD037E;
          }

          .sitecolor2bg {
            background-color: #FD037E;
          } 

           .siteradius {
            border-radius: 20px !important;
          } 

           .mypadding {
              padding: 1% 4% 0 4%;
           }

           .card.hovercard .cardheader {
                 background: url("<?php echo base_url('assets/img/profilebg2.jpg');?>");
                /*background: url("../../img/profilebg3.jpg");*/
                background-size: cover;
                height: 135px;
            }

             .to-top {
                background-color: #f55353;
                 bottom: 20px;
               -o-transition: all 0.25s;
            }
           .to-top i {
                font-size: 18px;
                color: #fff;
            }
           .to-top.show-top {
               opacity: 0.6;
               visibility: visible;
            }
           .to-top:hover {
               opacity:1;
           }


          .fullwidth {
              margin-left: 0;
              margin-right: 0; 
              width: 100%;
          }

        .partialwidth {
           /* margin-left: 0;
            margin-right: 0; */
            width: 92%;
        }


        .diiosearch {
            /*width: 130px;*/
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            border-radius: 20px !important;
            background-color: white;
            /*background-image: url('searchicon.png');*/
            /*background-position: 10px 10px;*/ 
            background-repeat: no-repeat;
            padding: 5px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        .diiosearch:focus {
            width: 120%;
        }

        /*===== select ========*/
        /*the container must be positioned relative:*/
          .custom-select {
            position: relative;
            font-family: Arial;
            border-radius : 20px;
            height: 30px;
            font-size: 18px;
          }
          .custom-select select {
            display: none; /*hide original SELECT element:*/
             border-radius : 20px;
              padding-right: 0 2px 0 2px;
          }
          .select-selected {
            background-color: DodgerBlue;
             border-radius : 20px;
          }
          /*style the arrow inside the select element:*/
          .select-selected:after {
            position: absolute;
            content: "";
            top: 14px;
            right: 10px;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #fff transparent transparent transparent;
          }
          /*point the arrow upwards when the select box is open (active):*/
          .select-selected.select-arrow-active:after {
            border-color: transparent transparent #fff transparent;
            top: 7px;
          }
          /*style the items (options), including the selected item:*/
          .select-items div,.select-selected {
            color: #ffffff;
            padding: 8px 16px;
            border: 1px solid transparent;
            border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
            cursor: pointer;
            user-select: none;
          }
          /*style items (options):*/
          .select-items {
            position: absolute;
            background-color: DodgerBlue;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 99;
          }
          /*hide the items when the select box is closed:*/
          .select-hide {
            display: none;
          }
          .select-items div:hover, .same-as-selected {
            background-color: rgba(0, 0, 0, 0.1);
          }
       /* ===== end  select ===*/

       /*========== to top btn =========*/
         .diiototop {
              font-size: 20px;
              text-align: center;
              border: 2px solid #FD037E;
              border-radius: 50px;
              width: 50px;
              height: 50px;
              padding-top: 8px;
              background-color: #10C4EF;
              /*position: fixed;*/
             /* position: -webkit-sticky;
              position: sticky;
              top: 0;*/
         }
       /*==========end to top btn ======*/

        </style>

        <!-- =============== LARGE DROPDOWN (MORE)========= -->
          <style type="text/css">
           /* @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
          body {
            font-family: 'Open Sans', 'sans-serif';
          }*/
          .mega-dropdown {
            position: static !important;
          }
          .mega-dropdown-menu {
              padding: 20px 0px;
              width: 100%;
              box-shadow: none;
              -webkit-box-shadow: none;
          }
          .mega-dropdown-menu > li > ul {
            padding: 0;
            margin: 0;
          }
          .mega-dropdown-menu > li > ul > li {
            list-style: none;
          }
          .mega-dropdown-menu > li > ul > li > a {
            display: block;
            color: #222;
            padding: 3px 5px;
          }
          .mega-dropdown-menu > li ul > li > a:hover,
          .mega-dropdown-menu > li ul > li > a:focus {
            text-decoration: none;
          }
          .mega-dropdown-menu .dropdown-header {
            font-size: 18px;
            color: #ff3546;
            padding: 5px 60px 5px 5px;
            line-height: 30px;
          }

          .diioHover: hover {
            color: red;
             background: yellow;
          }

          /*.carousel-control {
            width: 30px;
            height: 30px;
            top: -35px;

          }
          .left.carousel-control {
            right: 30px;
            left: inherit;
          }*/
          /*.carousel-control .glyphicon-chevron-left, 
          .carousel-control .glyphicon-chevron-right {
            font-size: 12px;
            background-color: #fff;
            line-height: 30px;
            text-shadow: none;
            color: #333;
            border: 1px solid #ddd;
          }*/
          </style>
          <!-- =================== END MORE==================== -->

          <!-- =================== PAGE LOADER==================== -->
          <style>
            /* Center the loader */
            #loader {
              position: absolute;
              left: 50%;
              top: 50%;
              z-index: 1;
              width: 100px;
              height: 100px;
              margin: -75px 0 0 -75px;
              /*border: 5px solid #f3f3f3;*/
              border: 5px solid #fff;
              border-radius: 50%;
              border-top: 5px solid #10C4EF;
              border-bottom:  5px solid #10C4EF;
              width:90px;
              height: 90px;
              -webkit-animation: spin 1s linear infinite;
              animation: spin 1s linear infinite;
            }

            @-webkit-keyframes spin {
              0% { -webkit-transform: rotate(0deg); }
              100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }

            /* Add animation to "page content" */
            .animate-bottom {
              position: relative;
              -webkit-animation-name: animatebottom;
              -webkit-animation-duration: 1s;
              animation-name: animatebottom;
              animation-duration: 1s
            }

            @-webkit-keyframes animatebottom {
              from { bottom:-100px; opacity:0 } 
              to { bottom:0px; opacity:1 }
            }

            @keyframes animatebottom { 
              from{ bottom:-100px; opacity:0 } 
              to{ bottom:0; opacity:1 }
            }

            #myDiv {
              display: none;
              /*text-align: center;*/
            }
            </style>
            <!-- =================== END PAGE LOADER==================== -->

          <!-- ================== ADSENSE============ -->
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <script>
            (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-9403084860404709",
              enable_page_level_ads: true
            });
          </script>
          <!--  ================== END ADSENSE ======= -->

    </head>

<body onload="myFunction()"  style="background-color: #F5F5F5;" >

<div id="loader" ></div>
<div  id="myDiv"  class="animate-bottom1"> <!-- ========== page loader div ===== -->
    
    <nav class="top-bar" style="background-color: #10C4EF;">
      <div class="container">
        <div class="row">
        <div class="col-sm-4 hidden-xs">
            <span class="nav-text">
               <!--  <i class="fa fa-phone" aria-hidden="true"></i>  +123 4567 8910 
                <i class="fa fa-envelope" aria-hidden="true"></i> sumi9xm@gmail.com</span> -->
                <!-- <img src="<?php base_url('assets/img/logo.png');?>"> -->
                <i class="fa fa-book" aria-hidden="true"></i>&nbsp;<a href="<?php base_url('Home');?>"> &nbsp;<b style="font-size: 18px; color: #fff;">diioLab</b></a>
            </div>
        <div class="col-sm-4 text-center">
            <a href="https://www.facebook.com/" target="_blank" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://twitter.com/signup?lang=en" target="_blank" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/accounts/login/" target="_blank" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/" target="_blank" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="https://plus.google.com/discover" target="_blank" class="social"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <!-- <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a> -->
        </div>
        <div class="col-sm-4 text-right hidden-xs">
                <ul class="tools">  

                <?php if ($this->session->userdata('logged_in')) { ?>

                  <li class="">
                  <a href="<?php echo base_url('Home/loginservices');?>" class="btn btn-md btn-pill btn-default" style='color: black;' ><b><?php echo $this->lang->line('msg_my_account'); ?></b></a>
                  </li>

                <?php } else { ?>
                  <li class="">
                  <button type="button" class="btn btn-md btn-pill btn-outline btn-default" data-toggle="modal" data-target="#modal-login"><?php echo $this->lang->line('msg_login'); ?></button>
                  </li>
                  <!-- <li class="">
                   <button type="button" class="btn btn-md btn-pill btn-default" data-toggle="modal" data-target="#modal-register"><?php //echo $this->lang->line('msg_register'); ?></button>
                  </li>  -->

                <?php } ?>
                
               
                <li class="dropdown">
                      <label style="color: #fff; font-size: 18px;" for=""><b><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('msg_language'); ?>:&nbsp;&nbsp;&nbsp;</i></b></label>
                      <select class="pull-right custom-select" onchange="javascript:window.location.href='<?php echo base_url(); ?>Home/switchLang/'+this.value;">
                          <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
                          <!-- <option value="kiswahili" <?php if($this->session->userdata('site_lang') == 'kiswahili') echo 'selected="selected"'; ?>>Kiswahili</option>  -->
                      </select>
                </li>
                                      
                </ul>
              </div>
        </div>
      </div>
    </nav>   <!--TOP-NAVBAR-END-->
    
    
<!--====================== NAVBAR MENU START===================-->
    
  
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header" style="background-color: #191919;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <!--  <a class="navbar-brand" href="#"><img src="https://lh3.googleusercontent.com/-N4NB2F966TU/WM7V1KYusRI/AAAAAAAADtA/fPvGVNzOkCo7ZMqLI6pPITE9ZF7NONmawCJoC/w185-h40-p-rw/logo.png"></a> -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <div class="row">
      <div class="col-md-9">
        <ul class="nav navbar-nav navbar-left">
          <li class=""><a href="<?php echo base_url('Home');?>"><b><?php echo $this->lang->line('msg_home'); ?></b></a></li>
          <!-- <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="<?php //echo base_url('Artical/articalPage');?>"><b>ARTICALS </b><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php //echo base_url('Artical/articalPage');?>">diioLab Articals</a></li>
              <li><a href="#">Artical - 2</a></li>
              <li><a href="#">Artical - 3</a></li>
            </ul>
          </li> -->
          <li><a href="<?php echo base_url('Home/aboutUs');?>"><b style1="color: #15C5EF;"><?php echo $this->lang->line('msg_about_us'); ?></b></a></li>

          <!-- <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>NEWS</b> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php //echo base_url('Profile');?>">All Profiles</a></li>
              <li><a href="#">News - 2</a></li>
              <li><a href="#">News - 3</a></li>
            </ul>
          </li> -->
          <li><a href="<?php echo base_url('Home/ourServices');?>"><b><?php echo $this->lang->line('msg_profiles_title'); ?></b></a></li>
          <!-- <li><a href="<?php echo base_url('Artical/articalPage');?>"><b><?php echo $this->lang->line('msg_blog'); ?></b></a></li> -->
          <li><a href="<?php echo base_url('Home/FAQ');?>"><b><?php echo $this->lang->line('msg_faq'); ?></b></a></li>
            
          <li><a href="<?php echo base_url('Home/contactUs');?>"><b style="color: #FF017E;"><?php echo $this->lang->line('msg_contact_us'); ?></b></a></li>
          <?php if ($this->session->userdata('logged_in')) { ?>
            <li class="hidden-md hidden-lg" ><a href="<?php echo base_url('Home/loginservices');?>"><b style="color: ;"><?php echo $this->lang->line('msg_myaccount'); ?></b></a></li>
          <?php } else { ?>
            <li class="hidden-md hidden-lg"><a href="" data-toggle="modal" data-target="#modal-login"><b style="color: ;"><?php echo $this->lang->line('msg_login'); ?></b></a></li>
            <li class="hidden-md hidden-lg"><a href="" data-toggle="modal" data-target="#modal-register" ><b style="color: ;"><?php echo $this->lang->line('msg_register'); ?></b></a></li>
          <?php } ?>
            <li class="  hidden-md hidden-lg">
                  <label style="color: #fff;" for=""><b><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('msg_language'); ?>:&nbsp;&nbsp;&nbsp;</i></b></label>
                  <select class="pull-right custom-select" onchange="javascript:window.location.href='<?php echo base_url(); ?>Home/switchLang/'+this.value;">
                  <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
                  <!-- <option value="kiswahili" <?php if($this->session->userdata('site_lang') == 'kiswahili') echo 'selected="selected"'; ?>>Kiswahili</option>  -->
                  </select>
            </li>
        </ul>
      </div>

       <div class="col-md-3">
           <form class="navbar-form navbar-right" action="<?php echo base_url('Home/searchResults');?>" method="post" enctype="multipart/form-data">
            <div class="input-group">  
              
              <input type="text" name="search" class="form-control diiosearch" style="" placeholder="<?php echo $this->lang->line('msg_search'); ?>" required="">    
              <div class="input-group-btn">
                <button class="btn btn-info " name="searchBtn" value="ok" type="submit"  style="border-radius: 50%;">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>  
            </div>
                
             <!--  <span class="cart-heart  hidden-sm hidden-xs"> 
                  <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
              </span> 
              <span class="cart-heart  hidden-md hidden-lg">          
                  <a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-globe" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-usd" aria-hidden="true"></i></a>
              </span>    -->

          </form>
      </div>
      
    </div>
      
     
        
    </div>
  </div>
</nav>


<!-- ============= PAGE MIDDLE CONTENT ========== -->
  <?php 
     $this->load->view($middle_m.'/'.$middle_f);
   ?>        

<!-- ============= END MIDDLE CONTENTS =========== -->


<!-- ============== PAGE BEFORE FOOTER ============ -->
 <?php 
     $this->load->view($bfooter_m.'/'.$bfooter_f);
   ?> 
<!-- =============== END BEFORE FOOTER ============ -->




    



<!--  ================ FOOTER START================== -->
    
    <footer class="footer">
    <div class="container">
      <!--  ====LARGE DEVICES===== -->
        <div class="row hidden-xs hidden-sm">
          <div class="col-md-12" style="text-align: center;">
            <span><b class="title"><?php echo $this->lang->line('msg_sign_up_as'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
            <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#modal-login"> <i class="glyphicon glyphicon-book"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $this->lang->line('msg_student'); ?></b> &nbsp;&nbsp;&nbsp;</button>
            <!-- <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#modal-register"> <i class="glyphicon glyphicon-book"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $this->lang->line('msg_student'); ?></b> &nbsp;&nbsp;&nbsp;</button> -->
            <span><b class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <?php echo $this->lang->line('msg_or'); ?> - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
            <button type="button" class="btn btn-lg btn-info"  data-toggle="modal" data-target="#modal-register_others"> <i class="glyphicon glyphicon-user"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $this->lang->line('msg_others_p'); ?></b> &nbsp;&nbsp;&nbsp;</button>
          </div>
        </div>
      <!-- =====END LARGE ===== -->

      <!--  ====SMALL DEVICES===== -->
       <div class="row hidden-md hidden-lg">
          <div class="col-md-12" style="text-align: center;">
           <!--  <span><b class="title"><?php echo $this->lang->line('msg_sign_up_as'); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span> -->
            <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#modal-login"> <i class="glyphicon glyphicon-book"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $this->lang->line('msg_student'); ?></b> &nbsp;&nbsp;&nbsp;</button>
            <!-- <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#modal-register"> <i class="glyphicon glyphicon-book"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $this->lang->line('msg_student'); ?></b> &nbsp;&nbsp;&nbsp;</button> -->
            <br><span><b class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- <?php echo $this->lang->line('msg_or'); ?> - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span><br>
            <button type="button" class="btn btn-lg btn-info"  data-toggle="modal" data-target="#modal-register_others"> <i class="glyphicon glyphicon-user"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php echo $this->lang->line('msg_others_p'); ?></b> &nbsp;&nbsp;&nbsp;</button>
          </div>
        </div>
      <!-- =====END SMALL ===== -->

        <div class="row" style="padding: 100px 0 20px 0;">
          <div  class="col-md-12" style="text-align: center; font-size: 18px; color: #fff;" >
            <a href="<?php echo base_url('Home');?>"><b style="color: #fff;"><?php echo $this->lang->line('msg_home'); ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo base_url('Home/aboutUs');?>"><b style="color: #fff;"><?php echo $this->lang->line('msg_about_us'); ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo base_url('Home/ourServices');?>"><b style="color: #fff;"><?php echo $this->lang->line('msg_profiles_title'); ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- <a href="<?php echo base_url('Artical/articalPage');?>"><b style="color: #fff;"><?php echo $this->lang->line('msg_blog'); ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
            <a href="<?php echo base_url('Home/FAQ');?>"><b style="color: #fff;"><?php echo $this->lang->line('msg_faq'); ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo base_url('Home/contactUs');?>"><b style="color: #FF017E;"><?php echo $this->lang->line('msg_contact_us'); ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </div>




        <!-- <div class="row">
        <div class="col-sm-3" style="text-align: justify;" >
            <h4 class="title">diioLab</h4>
            <p><?php //echo $this->lang->line('msg_this_site_text'); ?></p>
            <ul class="social-icon">
            <a href="https://www.facebook.com/" target="_blank" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://twitter.com/signup?lang=en" target="_blank" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.instagram.coms/accounts/login/" target="_blank" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/" target="_blank" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="https://plus.google.com/discover" target="_blank" class="social"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
            </ul>
            </div>
        <div class="col-sm-3 center">
            <h4 class="title"><?php //echo $this->lang->line('msg_profile_types'); ?></h4>
            <span class="acount-icon">          
              <a href="<?php //echo base_url('Profile/profileList/');?>type/PROFESSIONAL"><i class="fa fa-user" aria-hidden="true"></i> <?php //echo $this->lang->line('msg_professionals'); ?></a>
              <a href="<?php //echo base_url('Profile/profileList/');?>type/INTERPRENOUR"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php //echo $this->lang->line('msg_entrepreneurs'); ?></a>
              <a href="<?php //echo base_url('Profile/profileList/');?>type/OTHERS"><i class="fa fa-tasks" aria-hidden="true"></i> <?php //echo $this->lang->line('msg_others'); ?></a>         
            </span>
        </div>
        <div class="col-sm-3">
            <h4 class="title"> <?php //echo $this->lang->line('msg_profile_category'); ?></h4>
            <div class="category">
              <a href="<?php //echo base_url('Profile/profileList/');?>cat/Teacher"><?php //echo $this->lang->line('msg_teacher'); ?></a>
              <a href="<?php //echo base_url('Profile/profileList/');?>cat/Doctor"><?php //echo $this->lang->line('msg_doctor'); ?></a>
              <a href="<?php //echo base_url('Profile/profileList/');?>cat/Psychologist"><?php //echo $this->lang->line('msg_psychologist'); ?></a>
            </div>
        </div>
        <div class="col-sm-3" style="text-align: center;">
            <h4 class="title"><?php //echo $this->lang->line('msg_social_media'); ?></h4>
            <p><b><?php //echo $this->lang->line('msg_visit_our_pages'); ?></b></p>
            <ul class="social-icon">
            <a href="https://www.facebook.com/" target="_blank" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://twitter.com/signup?lang=en" target="_blank" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://www.instagram.com/accounts/login/" target="_blank" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.youtube.com/" target="_blank" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a href="https://plus.google.com/discover" target="_blank" class="social"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            </ul>
            <h4 class="title"><?php //echo $this->lang->line('msg_our_contacts'); ?></h4>
            <ul style="text-align: left;" >
               <b><?php //echo $this->lang->line('msg_pobox'); ?></b><br>
               <b><?php //echo $this->lang->line('msg_phone'); ?></b><br>
               <b><?php //echo $this->lang->line('msg_email'); ?></b><br>
            </ul>
            </div>
        </div> -->



        <hr>
        <a href="javascript:;" class="to-top diiototop pull-right"><i class="fa fa-chevron-up"></i></a>

        <div class="row text-center"><!-- <a href="<?php echo base_url('Home/ourPrivacy');?>"><?php echo $this->lang->line('msg_mdl_privacy'); ?></a> | <a href="<?php echo base_url('Home/ourTerms');?>"><?php echo $this->lang->line('msg_mdl_terms'); ?></a> --><br> © diioLab  (2018 - <?php echo mdate('%Y'); ?>) - <?php echo $this->lang->line('msg_all_rights_reserved'); ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('msg_developer'); ?>: Diio (+255-684-670-270 | +255-684-544-167)<!-- 2017. by Dionizi France (+255-752-194-092 | +255-684-544-167) --></div>
        </div>
        
        
    </footer>

</div>  <!-- ===== end page loader div ===== -->
    
   


<!-- jQuery 2.0.2 -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/ajax/jquery.min.js');?>" type="text/javascript"></script>
       <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/AdminLTE/app.js');?>" type="text/javascript"></script>
        <!--  scroll to top -->
        <script src="<?php echo base_url('assets/js/scrolltotop.js');?>" type="text/javascript"></script>
        <!--  wow for animation -->
        <script src="<?php echo base_url('assets/js/myjs/wow.js');?>" type="text/javascript"></script>
        <!--  search inputs top -->
        <!-- <script src="<?php //echo base_url('assets/js/myJs/profilesch.js');?>" type="text/javascript"></script> -->
        <!-- submit a form without refresh  -->
        <script type="text/javascript">
            $("#signup_btn").click(function (e) {
                  e.preventDefault();
                  // code
                }
        </script>

        <!-- Popover -->
        <script>

          $(document).ready(function(){
              $('[data-toggle="popover"]').popover(); 
          });
        </script>

        <script>
            function SignIn(){
              //Login form
            $('#login').on('submit', function(form){
                  form.preventDefault();
                  var url = '<?php echo base_url('Home/login')?>';
                  var username = $('#login_username').val();
                  var password = $('#login_password').val();
                  if (username != '' && password != '') {
                    $.ajax({
                      url: url,
                      method: "POST",
                      data: {username:username, password:password},
                      success: function(data){
                        if(data=='go'){
                          $('#loginModal').hide();
                          /*window.location="<?php //echo base_url('Admin')?>";*/
                          window.location="<?php echo base_url('Home/loginservices')?>";
                        }else{
                          $('#loginErr').html(data);
                          $('#loginErr').show();
                        }
                      }
                    });
                    }else{
                      alert('Both username and password are required');
                    }
              });
            };

            //End of Login form scripts

            function SignUpSTD(){
              //Login form
            $('#stdReg').on('submit', function(form){
                  form.preventDefault();
                  var url = '<?php echo base_url('Users/userReg')?>';
                  //alert(url);
                    $.ajax({
                      url: url,
                      method: "POST",
                      success: function(data){
                        alert('data');
                        if(data=='go'){
                          $('#loginModal').hide();
                          window.location="<?php echo base_url('Home/loginservices')?>";
                        }else{
                          $('#stdRegErr').html(data);
                          $('#stdRegErr').show();
                        }
                      }
                    });
                 
              });
            };

             function SignUpOther(){
              //Login form
            $('#otherReg').on('submit', function(form){
                  form.preventDefault();
                  var url = '<?php echo base_url('Users/userReg')?>';
                  
                    $.ajax({
                      url: url,
                      method: "POST",
                      success: function(data){
                        if(data=='go'){
                          $('#loginModal').hide();
                          window.location="<?php echo base_url('Home/loginservices')?>";
                        }else{
                          $('#otherRegErr').html(data);
                          $('#otherRegErr').show();
                        }
                      }
                    });
                 
              });
            };


            function resetPwrd(){
              //Login form
            $('#reset').on('submit', function(form){
                  form.preventDefault();
                  var url = '<?php echo base_url("Users/resetPWRD")?>';
                  
                    $.ajax({
                      url: url,
                      method: "POST",
                      success: function(data){

                        if(data=='go'){
                          /*alert('yes');*/
                         $('#resetErrorMsg2').html('Your password has been reset Successifully. Login into your email to get your new password.');
                         $('#resetErrorMsg2').show();
                        }else{
                         /* alert(data);*/
                          $('#resetErrorMsg').html(data);
                          $('#resetErrorMsg').show();
                        }
                      }
                    });
                 
              });
            };

            //End of signup form scripts
        </script> 

       <!--  =============== TOP DROPDOWN========= -->
        <script type="text/javascript">
          $(document).ready(function(){
            $(".dropdown").hover(            
                function() {
                    $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
                    $(this).toggleClass('open');        
                },
                function() {
                    $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
                    $(this).toggleClass('open');       
                }
            );
        });
        </script>
       <!--  ==========END DROPDOWN============ -->

       <!--  ========== PAGE LOADER============ -->
       <script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 3000);
        }

        function showPage() {
          document.getElementById("loader").style.display = "none";
          document.getElementById("myDiv").style.display = "block";
        }
        </script>
       <!--  ==========END PAGE LOADER============ -->
        

</body>
</html>






<!-- ===================== MODALS ==================== -->
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx- -->
<style type="text/css">
    
.modal-content {
    -webkit-border-radius: 0;
    -webkit-background-clip: padding-box;
    -moz-border-radius: 0;
    -moz-background-clip: padding;
    border-radius: 6px;
    background-clip: padding-box;
    -webkit-box-shadow: 0 0 40px rgba(0,0,0,.5);
    -moz-box-shadow: 0 0 40px rgba(0,0,0,.5);
    box-shadow: 0 0 40px rgba(0,0,0,.5);
    color: #000;
    background-color: #fff;
    border: rgba(0,0,0,0);
}
.modal-message .modal-dialog {
    width: 300px;
}
.modal-message .modal-body, .modal-message .modal-footer, .modal-message .modal-header, .modal-message .modal-title {
    background: 0 0;
    border: none;
    margin: 0;
    padding: 0 30px;
    text-align: center!important;
}

.modal-message .modal-title {
    font-size: 17px;
    color: #737373;
    margin-bottom: 3px;
}

.modal-message .modal-body {
    color: #737373;
}

.modal-message .modal-header {
    color: #fff;
    margin-bottom: 10px;
    padding: 15px 0 8px;
}
.modal-message .modal-header .fa, 
.modal-message .modal-header 
.glyphicon, .modal-message 
.modal-header .typcn, .modal-message .modal-header .wi {
    font-size: 30px;
}

.modal-message .modal-footer {
    margin: 25px 0 20px;
    padding-bottom: 10px;
}

.modal-backdrop.in {
    zoom: 1;
    filter: alpha(opacity=75);
    -webkit-opacity: .75;
    -moz-opacity: .75;
    opacity: .75;
}
.modal-backdrop {
    background-color: #fff;
}
.modal-message.modal-success .modal-header {
    color: #53a93f;
    border-bottom: 3px solid #a0d468;
}

.modal-message.modal-info .modal-header {
    color: #57b5e3;
    border-bottom: 3px solid #57b5e3;
}

.modal-message.modal-danger .modal-header {
    color: #d73d32;
    border-bottom: 3px solid #e46f61;
}

.modal-message.modal-warning .modal-header {
    color: #f4b400;
    border-bottom: 3px solid #ffce55;
}

</style>

<!-- ===================== LOGIN MODAL STARTS ============== -->
    <!--Info Modal Templates-->
    <div id="modal-login" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-login"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size: 24px;"><?php echo $this->lang->line('msg_login'); ?></b>
                </div>
                <div class="modal-title"></div>

                <div class="modal-body">
                     <form id="login" action="<?php echo base_url('Home/login')?>" method="post">
                              <div class="form-group">
                                  <label for="username" class="control-label"><?php echo $this->lang->line('msg_mdl_username'); ?></label>
                                  <input type="text" class="form-control" id="login_username" name="username" value="" required="" title="Please enter you username" placeholder="<?php echo $this->lang->line('msg_mdl_username'); ?>">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label"><?php echo $this->lang->line('msg_mdl_password'); ?></label>
                                  <input type="password" class="form-control" id="login_password" name="password" value="" required="" title="Please enter your password" placeholder="<?php echo $this->lang->line('msg_mdl_password'); ?>">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username oR password</div>
                             <!--  <div class="checkbox">
                                  <label>
                                      <input type="checkbox" name="remember" id="remember"> <?php echo $this->lang->line('msg_mdl_remember'); ?>
                                  </label>
                              </div> -->
                              <button type="submit" onclick="SignIn()" name="loginBtn" value="ok" class="btn btn-info btn-block"><?php echo $this->lang->line('msg_mdl_login'); ?></button>
                              <br>
                              <a href="" data-dismiss="modal" data-toggle="modal" data-target="#modal-rmb" class=""><b><?php echo $this->lang->line('msg_mdl_forgot_pwrd'); ?></b></a>
                              <!-- <a href="<?php echo base_url('Home/ourPrivacy'); ?>"   class=""><b><?php echo $this->lang->line('msg_mdl_privacy'); ?></b></a> | <a href="<?php echo base_url('Home/ourTerms'); ?>"  class=""><b><?php echo $this->lang->line('msg_mdl_terms'); ?></b></a>
                              <br>
                              <a href="" data-dismiss="modal" data-toggle="modal" data-target="#modal-register" class=""><b><?php echo $this->lang->line('msg_mdl_dont_have_account'); ?></b></a> -->
                          </form>
                </div>

                <div class="modal-footer">
                  <div id="loginErr" style="color: red;"> <b></b> </div>
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button> -->
                </div>
                
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Info Modal Templates-->
<!-- ====================== END LOGIN MODAL ================ -->

<!-- ===================== FORGOT PASSWORD ============== -->
    <!--Info Modal Templates-->
    <div id="modal-rmb" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-login"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size: 24px;"><?php echo $this->lang->line('msg_reset_pwrd'); ?></b>
                </div>
                <div class="modal-title"></div>

                <div class="modal-body">
                     <form id="reset" action="<?php echo base_url('Users/resetPWRD')?>" method="post">
                              <div class="form-group">
                                  <label for="username" class="control-label"><?php echo $this->lang->line('msg_mdl_username'); ?></label>
                                  <input type="email" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="<?php echo $this->lang->line('msg_mdl_username'); ?>">
                                  <span class="help-block"></span>
                              </div>
                              <button type="submit" onclick="resetPwrd()" name="resetBtn" value="ok" class="btn btn-info btn-block"><?php echo $this->lang->line('msg_mdl_remember_me'); ?></button>
                              <br>
                          </form>
                </div>

                <div class="modal-footer">
                    <div id="resetErrorMsg" class="alert1 alert-error1 hide1" style="color: red;"></div>
                    <div id="resetErrorMsg2" class="alert1 alert-error1 hide1" style="color: blue;"></div>
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button> -->
                </div>
                
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Info Modal Templates-->
<!-- ====================== END FORGOT PASSWORD ================ -->


<!-- ====================== REFIGSTER MODAL STARTS ============ -->
     <!--OTHERS REGISTRATION-->
    <div id="modal-register_others" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-login"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size: 24px;"><?php echo $this->lang->line('msg_register'); ?></b>
                </div>
                <div class="modal-title"></div>

                <div class="modal-body">
                     <form id="otherReg" action="<?php echo base_url('Users/userReg')?>" method="post">
                              <!-- <div class="form-group">
                                  <input type="text" class="form-control" id="name" name="name" value="" required="" title="Full name" placeholder="<?php echo $this->lang->line('msg_mdl_name'); ?>">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Username" placeholder="<?php echo $this->lang->line('msg_mdl_username'); ?>">
                                  <span class="help-block"></span>
                              </div> -->
                              <div class="form-group">
                                  <!-- <label for="username" class="control-label">Username</label> -->
                                  <input type="email" class="form-control" id="email" name="email" value="" required="" title="E-mail" placeholder="E-mail">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <!-- <label for="username" class="control-label">Username</label> -->
                                  <input type="text" class="form-control" id="country" name="country" value="" required="" title="Country" placeholder="Country">
                                  <span class="help-block"></span>
                              </div>

                              <div class="form-group">
                                  <!-- <label for="username" class="control-label">Username</label> -->
                                  <input type="text" class="form-control" id="senderid" name="senderid" value="" required="" title="Sender ID" placeholder="Sender ID">
                                  <span class="help-block"></span>
                              </div>

                              <!-- <div class="form-group">
                                  <label for="username" class="control-label">Email Adress</label>
                                  <input type="email" class="form-control" id="email" name="email" value=""  title="Please enter you username" placeholder="<?php //echo $this->lang->line('msg_mdl_email'); ?>">
                                  <span class="help-block"></span>
                              </div>
                               <div class="form-group">
                                  <label for="username" class="control-label">Email Adress</label>
                                  <input type="number" class="form-control" id="phone" name="phone" value=""  title="Please enter Phone #" placeholder="<?php //echo $this->lang->line('msg_mdl_phone'); ?>">
                                  <span class="help-block"></span>
                              </div> -->


                              <!-- <div class="form-group">
                                 <select class="form-control" id="sex" name="sex" value=""  title="Please enter sex">
                                   <option value="Male"><?php echo $this->lang->line('msg_mdl_male'); ?></option>
                                   <option value="Female"><?php echo $this->lang->line('msg_mdl_female'); ?></option>
                                 </select>
                                  <span class="help-block"></span>
                              </div> -->
                             <!--  <div class="form-group">
                                  <label for="password" class="control-label"><?php echo $this->lang->line('msg_mdl_bdate'); ?></label>
                                  <input type="date" class="form-control" id="bdate" name="bdate" value="" required="" placeholder="<?php echo $this->lang->line('msg_mdl_bdate'); ?>">
                                  <span class="help-block"></span>
                              </div> -->
                              <div class="form-group">
                                  <!-- <label for="password" class="control-label">Password</label> -->
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" placeholder="<?php echo $this->lang->line('msg_mdl_password'); ?>">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <!-- <label for="password" class="control-label">Confirm Password</label> -->
                                  <input type="password" class="form-control" id="cpassword" name="cpassword" value="" required="" placeholder="<?php echo $this->lang->line('msg_mdl_cpassword'); ?>">
                                  <span class="help-block"></span>
                              </div>

                              <div id="regErrorMsg" class="alert alert-error hide">Registration Complete.!</div>
                             
                              <button type="submit" name="regBtn" value="OK" onclick="SignUpOther1()" class="btn btn-info btn-block"><?php echo $this->lang->line('msg_mdl_register'); ?></button>
                              <br>
                              <!-- <a href="<?php echo base_url('Home/ourPrivacy'); ?>"   class=""><b><?php echo $this->lang->line('msg_mdl_privacy'); ?></b></a> | <a href="<?php echo base_url('Home/ourTerms'); ?>"  class=""><b><?php echo $this->lang->line('msg_mdl_terms'); ?></b></a>
                              <br> -->
                              <a href="" data-dismiss="modal" data-toggle="modal" data-target="#modal-login" class=""><b><?php echo $this->lang->line('msg_mdl_arlead_registered'); ?></b></a>
                          </form>
                </div>

                <div class="modal-footer">
                  <div id="otherRegErr" style="color: red;"></div>
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button> -->
                </div>
                
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End OTHERS-->
<!-- ====================== END REGISTER MODAL ================ -->







<!-- xxxxxxxxxxxxxxxxxxxxxxxx other modals xxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="buttons-preview">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal-success">Success</button>
    <button class="btn btn-info" data-toggle="modal" data-target="#modal-info">Info</button>
    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Danger</button>
    <button class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">Warning</button>
</div>
 -->
 <!--Success Modal Templates-->
    <div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-check"></i>
                </div>
                <div class="modal-title">Success</div>
                <div class="modal-body">You have done great!</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Success Modal Templates-->
        <!--Danger Modal Templates-->
    <div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="glyphicon glyphicon-fire"></i>
                </div>
                <div class="modal-title">Alert</div>

                <div class="modal-body">You've done bad!</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Danger Modal Templates-->




    <!--Danger Modal Templates-->
    <div id="modal-warning" class="modal modal-message modal-warning fade" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-warning"></i>
                </div>
                <div class="modal-title">Warning</div>

                <div class="modal-body">Is something wrong?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
                </div>
            </div> <!-- / .modal-content -->
        </div> <!-- / .modal-dialog -->
    </div>
    <!--End Danger Modal Templates-->



    <!-- ========== animate script========= -->
    <script type="text/javascript">
      new WOW().init();
    </script>