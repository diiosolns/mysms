<style type="text/css">
    .sitein {
        border-radius: 20px !important;
    }
</style>
    <?php 
        $grpRes = modules::load('Mysms')->get_col_where2('sms_recipient', 'groupname', 'userid', $this->session->userdata('user_id'));
       //$allRecipients =  modules::load('Mysms')->get_where_custom1('sms_recipient', 'userid', $this->session->userdata('user_id'))->num_rows(); 
    ?>

                        <div class="box box-info middle_pad " style="margin-top: 0px;">
                                <div class="box-header">
                                    <h3 class="box-title"><b> Send SMS</b></h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-style-1" action="<?php echo base_url('Mysms/sendSMS')?>" method="post" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="body">Sender ID</label>
                                                     <select name="senderid" class="form-control sitein" required="">
                                                        <option value="<?php echo $this->session->userdata('user_senderid');?>"><?php echo $this->session->userdata('user_senderid');?></option>
                                                        <option value="<?php echo $this->session->userdata('user_senderid');?>"><?php echo $this->session->userdata('user_senderid2');?></option>
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
                                                    <textarea name="sms" rows="6" class="form-control sitein" id="date" placeholder="Write an SMS here !" required="" ></textarea>
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

                                            <div class="col-md-12" style="text-align: center;">
                                                <b style="color: <?php echo $color;?>;"><?php echo $msg;?></b>
                                            </div>
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer" style="text-align: center;">
                                        <button type="submit" name="senderBtn" value="ok" class="btn btn-info btn-md sitein"><b>Send an SMS&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-share"></i></b></button>
                                    </div>
                                </form>
                            </div>