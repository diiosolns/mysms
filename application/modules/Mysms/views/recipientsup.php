<!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url('assets/css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.css');?>" rel="stylesheet" type="text/css" />
        <!-- Sub_menu -->
        <link href="<?php echo base_url('assets/css/diiocss/submenu.css');?>" rel="stylesheet" type="text/css" />
        

<!-- XXXXXXXXXXXXXXXXXXXX  MILESTONE ADD FORM XXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                           <div class="box">
                           <form action="<?php echo base_url('Mysms/recipientsUp')?>"  method="post" enctype="multipart/form-data">
                                <div class="box-header">
                                    
                                    <div class="col1-md-3 pull-left" style="padding-top: 10px;">
                                        <input type="file" accept=".xls,.xlsx" class="form-control input-sm" id="excelFile" name="excelFile" placeholder="Choose Excel file to Upload"  required>
                                    </div>
                                     <div class="col1-md-2 pull-left" style="padding-top: 10px;">
                                        <button class="btn btn-info btn-sm pull-left" name="uploadBtn" value="ok" type="submit"><b>Upload</b> &nbsp;&nbsp;<li class="fa  fa-upload"></li></button>
                                    </div>
                                </div><!-- /.box-header -->
                            </form>
                            
                            <div class="box-body no-padding" style1="overflow-y:scroll; white-space: nowrap;">
                            	<b><?php echo $msg;?></b>
                            	<hr>
                            </div>
                                 
                            </div>
    <!-- XXXXXXXXXXX ./ end project  MILESTONE ADD FORM XXXXXXXXXXX -->'
    