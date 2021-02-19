<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/tabs.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/tabstyles.css');?>" />
<script src="<?php echo base_url('assets/js/modernizr.custom.js');?>"></script>
<!--  search inputs top -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="<?php echo base_url('assets/js/myJs/profilesch.js');?>" type="text/javascript"></script> 
<style type="text/css">
    .servBox  {
        padding-top: 10px;
        background-color: #fff;
        margin-bottom: 50px;
        margin-left: 5px;
        margin-right: 5px
        /*height : 400px;*/
        /*margin-left: 10px;*/
    }


</style>

<!-- =============== diioLab SERVICES ============ -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css"> -->
<div class="row" style="text-align: center; widows: 100%;">
  
  <h1><b class="sitecolor1"><?php echo $this->lang->line('msg_services_home'); ?></b></h1>
  <br>
  <div class="col-md-2 wow animated fadeInLeft" style="text-align: center;"></div>
  <div class="servBox col-md-2 wow animated fadeInLeft" style="text-align: center; border-color : blue; ">
  <a href="<?php echo base_url('Mysms');?>">
    <span><i  class="fa  fa-comments fa-fw fa-5x sitecolor2"></i></span>
    <h3 style="color: gray;"><?php echo $this->lang->line('msg_live_chart'); ?></h3>
    <h3 style="color: gray;">Send SMS anywhere!</h3>
    <hr>
  </a>
  </div>

  <div class="servBox col-md-2 animated fadeInUp" style="text-align: center;">
  <a href="<?php echo base_url('Home/loginservices');?>">
    <span><i  class="fa fa-laptop fa-fw fa-5x sitecolor2"></i></span>
    <h3 style="color: gray;"><?php echo $this->lang->line('msg_photos_videos'); ?></h3>
    <h3 style="color: gray;"><br></h3>
    <h3 style="color: gray;"><br></h3>
    <hr>
  </a>
  </div>

  <div  class="servBox col-md-2 wow animated fadeInUp padding"  style="text-align: center;">
  <a href="<?php echo base_url('Home/loginservices');?>">
    <span><i class="fa fa-shopping-cart fa-fw fa-5x sitecolor2"></i></span>
    <h3 style="color: gray;"><?php echo $this->lang->line('msg_browse_profile'); ?></h3>
    <h3 style="color: gray;"><br></h3>
    <hr>
  </a>
  </div>

  <div class="servBox col-md-2 wow animated fadeInRight" style="text-align: center;">
  <a href="<?php echo base_url('Home/loginservices');?>">
    <span><i class="fa fa-book fa-fw fa-5x sitecolor2"></i></span>
    <h3 style="color: gray;"><?php echo $this->lang->line('msg_partner_appointments'); ?></h3>
    <h3 style="color: gray;"><br></h3>
    <h3 style="color: gray;"><br></h3>
    <hr>
  </a>
  </div>

  <div class="col-md-2 wow animated fadeInRight" style="text-align: center;"></div>


</div>
<!-- =============== END diioLab SERVICES ============ -->
