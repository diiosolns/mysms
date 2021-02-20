<style type="text/css">
    .sitein {
        border-radius: 20px !important;
    }
</style>

<div class="row">
    <div class="col-md-6">
        <div class="box box-info middle_pad " style="margin-top: 0px;">
            <div class="box-header">
                <h3 class="box-title"><b> Add a new contact</b></h3>
            </div><!-- /.box-header -->
            <!-- form start -->
             <form class="form-style-1" action="<?php echo base_url('Mysms/submitRecipient')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="body">Full Name</label>
                                <input type="text" name="name" class="form-control sitein" id="name" placeholder="Full name" required1="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="body">Phone number <b style="color: red;">&nbsp;&nbsp;&nbsp;*</b></label>
                                <input type="number" name="phone" class="form-control sitein" id="phone" placeholder="Eg. 255XXXXXXXXX" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                 <label for="body">Group</label>
                                 <input type="text" name="groupname" class="form-control sitein" id="groupname" placeholder="Enter group name" required1="">
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
                    <button type="submit" name="recipientBtn" value="ok" class="btn btn-info btn-md sitein"><b>Submit&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-save"></i></b></button>
                 </div>
            </form>
        </div>
    </div>


    <div class="col-md-6">
        <!-- ================== excel uploader ======================= -->
        <div class="box box-info middle_pad " style="margin-top: 15px;">
            <div class="box-header">
                <h3 class="box-title"><b> Upload an Excel File</b></h3>
            </div><!-- /.box-header -->
             <!-- form start -->
            <form action="<?php echo base_url('Mysms/recipientsUp')?>"  method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="body">Select an Excel File</label>
                                <input type="file" accept=".xls,.xlsx" class="form-control input-md sitein" id="excelFile" name="excelFile" placeholder="Choose Excel file to Upload"  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <br>
                                <button type="submit" name="uploadBtn" value="ok" class="btn btn-info btn-md sitein pull-right"><b><?php echo $this->lang->line('msg_save_tmonial'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-save"></i></b></button>
                            </div>
                        <div class="col-md-12" style="text-align: center;">
                            <b style="color: <?php echo $color;?>;"><?php echo $msg;?></b>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                </form>
                <div class="box-footer" style="text-align: right; margin-top: 30px;">
                    <label for="body">Sample excel file: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <a href="<?php echo base_url('uploads/mysms/recipients_sample.xlsx');?>"  class="btn btn-default btn-md sitein"><b>Dowload Sample&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-file"></i></b></a>
                </div>
            
        </div>
        <!-- ================== excel uploader ======================== -->
    </div>
</div>


                        


                    