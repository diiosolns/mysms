   
<style type="text/css">
  

@media (min-width: 168px){

#page-wrapper {
   
    padding: 0 30px;
    min-height: 300px;
    border-left: 1px solid #2c3e50;
}
}

#page-wrapper {
    padding: 0 15px;
    border: none;
    
}

.date-picker{    
    border-color: #138871;
    color: #fff;
    background-color: #149077;
    margin-top: -7px;
    border-radius: 0px;
    margin-right: -15px;
}

#page-wrapper .breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #e0e7e8;
    border-radius: 0px;
    
}


@media (min-width: 768px){
.circle-tile {
    margin-bottom: 30px;
}
}

.circle-tile {
    margin-bottom: 15px;
    text-align: center;
}

.circle-tile-heading {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto -40px;
    border: 3px solid rgba(255,255,255,0.3);
    border-radius: 100%;
    color: #fff;
    transition: all ease-in-out .3s;
}

/* -- Background Helper Classes */

/* Use these to cuztomize the background color of a div. These are used along with tiles, or any other div you want to customize. */

 .dark-blue {
    background-color: #34495e;
}

.green {
    background-color: #16a085;
}

.blue {
    background-color: #2980b9;
}

.orange {
    background-color: #f39c12;
}

.red {
    background-color: #e74c3c;
}

.purple {
    background-color: #8e44ad;
}

.dark-gray {
    background-color: #7f8c8d;
}

.gray {
    background-color: #95a5a6;
}

.light-gray {
    background-color: #bdc3c7;
}

.yellow {
    background-color: #f1c40f;
}

/* -- Text Color Helper Classes */

 .text-dark-blue {
    color: #34495e;
}

.text-green {
    color: #16a085;
}

.text-blue {
    color: #2980b9;
}

.text-orange {
    color: #f39c12;
}

.text-red {
    color: #e74c3c;
}

.text-purple {
    color: #8e44ad;
}

.text-faded {
    color: rgba(255,255,255,0.7);
}



.circle-tile-heading .fa {
    line-height: 80px;
}

.circle-tile-content {
    padding-top: 50px;
}
.circle-tile-description {
    text-transform: uppercase;
}

.text-faded {
    color: rgba(255,255,255,0.7);
}

.circle-tile-number {
    padding: 5px 0 15px;
    font-size: 26px;
    font-weight: 700;
    line-height: 1;
}

.circle-tile-footer {
    display: block;
    padding: 5px;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.1);
    transition: all ease-in-out .3s;
}

.circle-tile-footer:hover {
    text-decoration: none;
    color: rgba(255,255,255,0.5);
    background-color: rgba(0,0,0,0.2);
}



.time-widget {
    margin-top: 5px;
    overflow: hidden;
    text-align: center;
    font-size: 1.75em;
}

.time-widget-heading {
    text-transform: uppercase;
    font-size: .5em;
    font-weight: 400;
    color: #fff;
}
#datetime{color:#fff;}
.tile-img {
    text-shadow: 2px 2px 3px rgba(0,0,0,0.9);
}

.tile {
    margin-bottom: 15px;
    padding: 15px;
    overflow: hidden;
    color: #fff;
}
.dashcolorbg{
    background-color: #fff;
    border: 1px solid #10C4EF;
    color: gray !important;
    border-radius: 15px;
}
</style>


 <?php
    $today = mdate('%d/%m/%Y');
    $thismonth = mdate('01/%m/%Y');
    $smstoday = modules::load('Mysms')->get_where_custom2('sms_logs', 'userid', $this->session->userdata('user_id'), 'udate', $today)->num_rows();
    $sentsmsRes = modules::load('Mysms')->get_where_custom1('sms_logs', 'userid', $this->session->userdata('user_id'));
    $scheduledsmsRes = modules::load('Mysms')->get_where_custom2('sms_smstxt', 'userid', $this->session->userdata('user_id'), 'status', "Saved");
    $grpRes = modules::load('Mysms')->get_col_where2('sms_recipient', 'groupname', 'userid', $this->session->userdata('user_id'));
    $senderidRes = modules::load('Mysms')->get_col_where3('sms_senderid', 'senderid', 'status', "Approved", 'userid', $this->session->userdata('user_id'));
?>

<div class="row" >
    <div class="col-lg-3 col-sm-12">
        <div class="circle-tile">
            <a href="<?php echo base_url('Mysms/smsSenderForm');?>">
                <div class="circle-tile-heading sitecolor1bg">
                   <i class="fa fa-comments fa-fw fa-3x"></i>
                </div>
            </a>
            <div class="circle-tile-content dashcolorbg" >
                <div class="circle-tile-description text-faded">
                    <b style="color: gray;">Sent SMS</b>
                </div>
                <div class="circle-tile-number text-faded" style="color: gray;">
                    <?php echo number_format($sentsmsRes->num_rows(),0);?>
                    <span id="sparklineA"> </span>
                    <a href="<?php echo base_url('Mysms/smsLogs');?>" class="btn btn-sm btn-default pull-right" style="margin-right: 10px;">View</a>
                </div>
            </div>
        </div>
    </div> 
    <div class="col-lg-3 col-sm-12">
        <div class="circle-tile">
            <a href="<?php echo base_url('Mysms/manageGroups');?>">
                <div class="circle-tile-heading sitecolor1bg">
                   <i class="fa fa-users fa-fw fa-3x"></i>
                </div>
            </a>
            <div class="circle-tile-content dashcolorbg" >
                <div class="circle-tile-description text-faded">
                    <b style="color: gray;">Contacts</b>
                </div>
                <div class="circle-tile-number text-faded" style="color: gray;">
                    <?php echo number_format(modules::load('Mysms')->get_where_custom1('sms_recipient', 'userid', $this->session->userdata('user_id'))->num_rows(),0); ?>
                    <span id="sparklineA"> </span>
                    <a href="<?php echo base_url('Mysms/manageGroups');?>" class="btn btn-sm btn-default pull-right" style="margin-right: 10px;">View</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-12">
        <div class="circle-tile">
            <a href="<?php echo base_url('Mysms/buyCredit');?>">
                <div class="circle-tile-heading sitecolor1bg">
                   <i class="fa fa-shopping-cart fa-fw fa-3x"></i>
                </div>
            </a>
            <div class="circle-tile-content dashcolorbg" >
                <div class="circle-tile-description text-faded">
                    <b style="color: gray;">Balance <small>(SMS)</small></b>
                </div>
                <div class="circle-tile-number text-faded" style="color: gray;">
                    <?php echo number_format($this->session->userdata('user_bundle'),0);?>
                    <span id="sparklineA"></span>
                    <a href="<?php echo base_url('Mysms/buyCredit');?>" class="btn btn-sm btn-default pull-right" style="margin-right: 10px;">Recharge</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-12" style="text-align: center;">
        <div style="padding-bottom: 20px;">
            <b style="font-size: 28px;">Tell Your Customers</b><br>
        <span style="font-size: 18px;">Create one sms and Send to Many.</span>
        </div>
        <a style="border-radius: 15px;" href="<?php echo base_url('/uploads/apk/MySMS.apk');?>" class="btn btn-warning btn-lg sitein downapk">
            <b style="font-size: 22px;"><i class="fa fa-download"></i> Download APK&nbsp;&nbsp;&nbsp;&nbsp;</b><br>
            <small>For android devices</small>
        </a>
    </div>

</div>



<div class="row" style="margin-top: 20px;">
    <div class="col-md-9">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">SMS Traffic</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
            </div>
            <!-- /.box-footer -->
          </div>
    </div>


    <div class="col-md-3">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Account Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">1</th>
                  <th>Sent SMS</th>
                  <th style="width: 40px"><span class="badge bg-light-blue"><?php echo number_format($sentsmsRes->num_rows(),0) ?></span></th>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Contacts</td>
                  <td><span class="badge bg-light-blue"><?php echo number_format(modules::load('Mysms')->get_where_custom1('sms_recipient', 'userid', $this->session->userdata('user_id'))->num_rows(),0); ?></span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Groups</td>
                  <td><span class="badge bg-light-blue"><?php echo number_format($grpRes->num_rows(),0) ?></span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Sender IDs</td>
                  <td><span class="badge bg-light-blue"><?php echo number_format($senderidRes->num_rows(),0) ?></span></td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>Balance</td>
                  <td><span class="badge bg-light-blue"><?php echo number_format($this->session->userdata('user_bundle'),0);?></span></td>
                </tr>
                <tr>
                  <td>6.</td>
                  <td>Scheduled SMS</td>
                  <td><span class="badge bg-light-blue"><?php echo number_format($scheduledsmsRes->num_rows(),0);?></span></td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-3">
        <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Custom Sender ID</b></h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="text-align: center; font-size: 18px;">
            Get for free a Sender ID to represent you. it will appear on subscriber’s mobile device screen the moment the message is delivered.
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="text-align: center; font-size: 18px;">
            <a href="<?php echo base_url('Mysms/senderIDRegistrationForm');?>" class="btn btn-md btn-info">Sender ID Registration</a>
        </div>
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-3">
        <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Send Bulk SMS</b></h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="text-align: center; font-size: 18px;">
            Our online SMS marketing platform provides businesses, community groups, and organisations with a bulk SMS solution!
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="text-align: center; font-size: 18px;">
            <a href="<?php echo base_url('Mysms/smsSenderForm');?>" class="btn btn-md btn-info">Start Sending SMS</a>
        </div>
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-3">
        <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>SMS in Low Prices</b></h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="text-align: center; font-size: 18px;">
            Get sms package for your business in low prices.<br> Continue to see our pricing list. You can contact us for more information.
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="text-align: center; font-size: 18px;">
            <a href="<?php echo base_url('Mysms/buyCredit');?>" class="btn btn-md btn-info">Recharge SMS</a>
        </div>
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-3">
        <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><b>Add Contacts</b></h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="text-align: center; font-size: 18px;">
            Organise your contacts into groups. You can upload all your conts at once using excel file. Use attached excel template to prepare your contacts.
        </div>
        <!-- /.box-body -->
        <div class="box-footer" style="text-align: center; font-size: 18px;">
            <a href="<?php echo base_url('Mysms/addRecipient');?>" class="btn btn-md btn-info">Add New Contacts</a>
        </div>
        </div>
        <!-- /.box -->
    </div>
</div>





<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-toggle").click(function(){
            $(this).hide();
            
           $("#user-profil").show();
            
           $("#hide-btn").show();
            
           $(".container-2").css("width", "85%");
            
             
        });
        
        $("#hide-btn").click(function(){
            $(this).hide();
            
           $("#user-profil").hide();
            
           $(".sidebar-toggle").show();
            
           $(".container-2").css("width", "100%");
            
             
        });
    });
</script>

   
 