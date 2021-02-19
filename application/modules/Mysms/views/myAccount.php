<style type="text/css">
    .sitein {
        border-radius: 20px !important;
    }
</style>

                        <div class="box box-info middle_pad " style="margin-top: 0px;">
                                <div class="box-header">
                                    <h3 class="box-title"><b> My account</b></h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-style-1" action="<?php echo base_url('Mysms/myAccount')?>" method="post" enctype="multipart/form-data">
                                    <div class="box-body">
                                         <div class="row">
                                             <div class="col-md-6">
                                                <h3>My Profile</h3>
                                                <div style="font-size: 110%; background-color: lightgray; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; border-radius: 20px;">
                                                    <span> <b>Country : </b> <?php echo $this->session->userdata('user_country');?></span> <br>
                                                    <span> <b>Username : </b> <?php echo $this->session->userdata('user_username');?></span> <br>
                                                    <span> <b>E-mail : </b> <?php echo $this->session->userdata('user_email');?></span> <br>
                                                    <span> <b>Sender ID : </b> <?php echo $this->session->userdata('user_senderid');?></span> <br>
                                                    <span> <b>SMS Qnty : </b> <?php echo $this->session->userdata('user_bundle');?></span> <br>
                                                    <span> <b>SMS Credit : </b> $<?php echo $this->session->userdata('user_credit');?></span> <br>
                                                </div>
                                                 
                                             </div>

                                              <div class="col-md-6">
                                                <h3>Change Password</h3>
                                                <div class="form-group">
                                                    <!-- <label for="body">Current Password <b style="color: red;">&nbsp;&nbsp;&nbsp;*</b></label> -->
                                                    <input type="Password" name="pwrd1" class="form-control sitein" id="phone" placeholder="Current Password" disabled1="" required="">
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label for="body">New Password <b style="color: red;">&nbsp;&nbsp;&nbsp;*</b></label> -->
                                                    <input type="Password" name="pwrd2" class="form-control sitein" id="phone" placeholder="New Password" disabled1="" required="">
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label for="body">Confirm Password <b style="color: red;">&nbsp;&nbsp;&nbsp;*</b></label> -->
                                                    <input type="Password" name="cpwrd2" class="form-control sitein" id="phone" placeholder="Confirm Password" disabled1="" required="">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="changeBtn" value="<?php echo $this->session->userdata('user_id');?>" class="btn btn-info btn-md sitein"><b>Change Password&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-save"></i></b></button>
                                                </div>
                                                
                                              </div>
                                         </div>
                                              
                                    </div><!-- /.box-body -->

                                    <div class="box-footer" style="text-align: center;">
                                        <b style="color: <?php echo $color;?>"><?php echo $msg;?></b>
                                    </div>
                                </form>
                            </div>