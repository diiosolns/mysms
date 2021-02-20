<style type="text/css">
    .sitein {
        border-radius: 20px !important;
    }
</style>
    <?php 
        $grpRes = modules::load('Mysms')->get_col_where2('sms_recipient', 'groupname', 'userid', $this->session->userdata('user_id'));
        $senderidRes = modules::load('Mysms')->get_col_where3('sms_senderid', 'senderid', 'status', "Approved", 'userid', $this->session->userdata('user_id'));
        $allRecipients =  modules::load('Mysms')->get_where_custom1('sms_recipient', 'userid', $this->session->userdata('user_id'))->num_rows(); 
    ?>

<div class="row">
    <div class="col-md-8">
        <div class="box box-info middle_pad " style="margin-top: 0px;">
            <div class="box-header">
                <h3 class="box-title"><b> Send SMS</b></h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-style-1" action="<?php echo base_url('Mysms/sendSMS')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $msg;?>
                            <?php if($grpRes->num_rows() == 0) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info-circle"></i> Warning!</h4> <a href="<?php echo base_url('Mysms/senderIDRegistrationForm');?>" class="btn btn-info btn-md pull-right">Sender ID Registration</a>
                                You will not be able to send SMS because you do not have a Sender ID yet. Start by requesting Sender ID registration. 
                            </div>
                            <?php } ?>
                            <?php if($allRecipients == 0) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-info-circle"></i> Warning!</h4>  <a href="<?php echo base_url('Mysms/addRecipient');?>" class="btn btn-info btn-md pull-right">Add New Contacts</a>
                                You will not be able to send SMS because you do not have contacts yet. Start by adding new contacts. 
                            </div>
                            <?php } ?>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Sender ID</label>
                                <select name="senderid" class="form-control sitein" required="">
                                    <option value="">Select your sender ID</option>
                                    <?php foreach ($senderidRes->result() as $senderid): ?>
                                    <option value="<?php echo $senderid->senderid;?>"><?php echo $senderid->senderid;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Group</label>
                                    <select name="groupname" class="form-control sitein" required="">
                                    <option value="empty">Select a Group</option>
                                    <option value="all">All</option>
                                    <?php foreach ($grpRes->result() as $row): ?>
                                    <option value="<?php echo $row->groupname;?>"><?php echo $row->groupname;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Date-Time</label>
                                <input type="text" name="datetime" class="form-control sitein" id="groupname" value ="<?php echo mdate('%d/%m/%Y %H:%i:%s');?>" disabled="" ="">
                            </div>
                        </div>
                        <!--  <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Recipients/ Receivers <b style="color: red;">&nbsp;&nbsp;&nbsp;*</b></label>
                                <input type="number" name="phone" class="form-control sitein" id="phone" placeholder="&nbsp;&nbsp;&nbsp;ALL ( <?php echo  $allRecipients;?> Contacts )" disabled="">
                            </div>
                        </div> -->
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Total # of SMS <b style="color: red;">&nbsp;&nbsp;&nbsp;*</b></label>
                                <input type="text" name="qnty" class="form-control sitein" id="phone" placeholder="&nbsp;&nbsp;&nbsp; ( <?php echo  $allRecipients;?> SMS to be sent )" disabled="">
                            </div>
                        </div> -->
                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="body">Message/ SMS Text</label>
                                <textarea name="sms" rows="6" class="form-control sitein" id="sms" placeholder="Write an SMS here !" required="" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox pull-right">
                                <label class="">
                                    <div class="icheckbox_minimal checked1" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" name="include_name" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <b>Include recipient name</b>
                                </label>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                 <label for="body">Type <b style="color: red;">&nbsp;&nbsp;&nbsp;*</b></label>
                                <select name="type" class="form-control sitein" required="">
                                    <option value="University">University</option>
                                    <option value="College">College</option>
                                    <option value="Diploma">Diploma</option>
                                </select>
                            </div>
                        </div> -->                 
                    </div>  
                </div><!-- /.box-body -->
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" name="senderBtn" value="ok" class="btn btn-info btn-md sitein"><b>Send an SMS&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-share"></i></b></button>
                </div>
            </form>
        </div>
    </div>


    <div class="col-md-4">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">SMS Couter</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">1</th>
                  <th>SMS Count</th>
                  <th style="width: 40px" id="sms_count">0</th>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Chars used</td>
                  <td><span class="badge bg-green" id="chars_used">0</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Chars remaining</td>
                  <td><span class="badge bg-green" id="chars_remaining">160</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Chars per SMS</td>
                  <td><span class="badge bg-green">160</span></td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>Encoding</td>
                  <td><span class="badge bg-green">GSM_7BIT</span></td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>

          <div style="text-align: center;">
              <a href="<?php echo base_url('/uploads/apk/MySMS.apk');?>" class="btn btn-warning btn-lg sitein downapk">
                <b style="font-size: 22px;"><i class="fa fa-download"></i> Download APK&nbsp;&nbsp;&nbsp;&nbsp;</b><br>
                <small>For android devices</small>
              </a>
          </div>
    </div>
</div>







<script type="text/javascript">
     $(document).ready(function () { 
        $("#sms").on("change", function() { 
            var txt = $("#sms").val(); 
            var n = txt.length;
            var sms_count = Math.ceil(n / 153);
            var chars_remaining = 160 - (n % 153);
            var chars_used = (n % 153);
            //alert(chars_used); 
            document.getElementById("sms_count").innerHTML = sms_count;
            document.getElementById("chars_used").innerHTML = chars_used;
            document.getElementById("chars_remaining").innerHTML = chars_remaining;
        });  
      });
</script>