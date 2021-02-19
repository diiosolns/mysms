<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/tabs.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/tabstyles.css');?>" />
<script src="<?php echo base_url('assets/js/modernizr.custom.js');?>"></script>
<!--  search inputs top -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="<?php echo base_url('assets/js/myJs/profilesch.js');?>" type="text/javascript"></script> 


<!-- =============== ABOUT diioLab ============ -->
<div class="row" style="padding: 20px 50px 20px 50px; background-color: #fff;">
  <div class="col-md-12" style="text-align: center;">
    <h1><b class="sitecolor1"><?php echo $this->lang->line('msg_about_diioLab'); ?></b></h1>
    <p style="font-size: 20px;"><?php echo $this->lang->line('msg_about_simple_text'); ?></p>
      <b style="font-size: 24px;"><a href="<?php echo base_url('Home/aboutUs');?>"><?php echo $this->lang->line('msg_read_more'); ?><i class="fa fa-arrow-circle-right"></i></a></b>
    <hr>
  </div>
</div>
<!-- =============== END ABOUT diioLab ============ -->


<!-- =============== diioLab SERVICES ============ -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="http://cdn.bootcss.com/animate.css/3.5.1/animate.min.css"> -->
<div class="row" style="text-align: center;">
  
  <h1><b class="sitecolor1"><?php echo $this->lang->line('msg_services_home'); ?></b></h1>
  <br><br>
  <div class="col-md-3 wow animated fadeInLeft" style="text-align: center;">
  <a href="<?php echo base_url('Home/mobile');?>">
    <span><i  class="fa  fa-comments fa-fw fa-5x sitecolor2"></i></span>
    <h3 style="color: gray;"><?php echo $this->lang->line('msg_live_chart'); ?></h3>
    <hr>
  </a>
  </div>

  <div class="col-md-3 animated swing infinite" style="text-align: center;">
  <a href="<?php echo base_url('Home/ourServices');?>">
    <span><i  class="fa fa-laptop fa-fw fa-5x sitecolor2"></i></span>
    <h3 style="color: gray;"><?php echo $this->lang->line('msg_photos_videos'); ?></h3>
    <hr>
  </a>
  </div>

  <div  class="col-md-3 wow animated swing infinite"  style="text-align: center;">
  <a href="<?php echo base_url('Home/ourServices');?>">
    <span><i class="fa fa-shopping-cart fa-fw fa-5x sitecolor2"></i></span>
    <h3 style="color: gray;"><?php echo $this->lang->line('msg_browse_profile'); ?></h3>
    <hr>
  </a>
  </div>

  <div class="col-md-3 wow animated fadeInRight" style="text-align: center;">
  <a href="<?php echo base_url('Home/ourServices');?>">
    <span><i class="fa fa-book fa-fw fa-5x sitecolor2"></i></span>
    <h3 style="color: gray;"><?php echo $this->lang->line('msg_partner_appointments'); ?></h3>
    <hr>
  </a>
  </div>

        <hr>
        <b style="font-size: 24px; padding: 0 100px 0 100px"><a style=" padding: 5px 100px 5px 100px" class="btn btn-default " href="<?php echo base_url('Home/ourServices');?>"><?php echo $this->lang->line('msg_read_more'); ?><i class="fa fa-arrow-circle-right"></i></a></b>
        <hr>


</div>
<!-- =============== END diioLab SERVICES ============ -->
