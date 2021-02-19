<style type="text/css">
    /*========== pagination==========*/
    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
        border: 1px solid #4CAF50;
    }

    .pagination a:hover:not(.active) {background-color: #ddd;}

    .pagination a:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .pagination a:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
    /*=============end pagnation ===*/
</style>

<style type="text/css">
    .sitein {
        border-radius: 20px !important;
    }
</style>



                <!-- ====================== ADD  AN SMS ======================== -->
                        <div class="box box-info middle_pad " style="margin-top: 0px;">
                                <div class="box-header">
                                    <h3 class="box-title"><b> Schedule a new SMS</b></h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-style-1" action="<?php echo base_url('Mysms/smsSchedule')?>" method="post" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="body">Message/ SMS Text</label>
                                                    <textarea name="sms" rows="4" class="form-control sitein" id="date" placeholder="Write an SMS here !" required="" ></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12" style="text-align: center;">
                                                <b style="color: <?php echo $color;?>;"><?php echo $msg;?></b>
                                            </div>
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer" style="text-align: center;">
                                        <button type="submit" name="saveBtn" value="ok" class="btn btn-info btn-md sitein"><b>Save this SMS&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-save"></i></b></button>
                                    </div>
                                </form>
                            </div>

                        <!-- ========================= END SMS ADD ======================= -->


                                <div class="box box-info middle_pad " style="margin-top: 0px;">
                                                <div class="box-header">
                                                    <h3 class="box-title"><b><?php //echo $this->lang->line('msg_manage_tmonial'); ?> Stored & Scheduled SMS</b></h3>
                                                </div><!-- /.box-header -->
                                                <div class="col-md-12" style="text-align: center;">
                                                    <b style="color: <?php echo $color;?>;"><?php echo $msg;?></b>
                                                </div>
                                                <div class="box-body padding"  style1="overflow-x:scroll; white-space: nowrap;">
                                                <form action="<?php echo base_url('Mysms/smsSchedule')?>" method="post">
                                                    <table class="table table-striped">
                                                        <tbody><tr><!-- <?php //echo $this->lang->line('msg_'); ?> -->
                                                            <th style="width: 10px">#</th>
                                                            <th>SMS Text</th>
                                                            <th>No. SMS</th>
                                                            <th>Date</th>
                                                            <th>Options</th>
                                                        </tr>
                                                        <?php $index = 1;?>
                                                         <?php foreach ($smsRes->result() as $row): ?>
                                                                <tr>
                                                                    <td><?php echo $index;?></td>
                                                                    <td><?php echo $row->sms;?> </td>
                                                                    <td><?php echo $row->numsms;?> </td>
                                                                    <td><?php echo $row->date;?> </td>
                                                                    <td>
                                                                       <!--  <button type="submit" class="btn btn-default btn-xs " name="editBtn" value="<?php echo $row->id;?>" data-toggle="tooltip"  title="" data-original-title="Modify"><i class="fa fa-edit"></i></button> -->
                                                                        
                                                                        <button type="submit" class="btn btn-info btn-xs"  name="sendBtn" value="<?php echo $row->id;?>" data-toggle="tooltip" title="" data-original-title="Send"><i class="fa fa-share"></i></button> 
                                                                        <button type="submit" class="btn btn-default btn-xs"  name="editBtn" value="<?php echo $row->id;?>" data-toggle="tooltip" title="" data-original-title="Modify"><i class="fa fa-edit"></i></button>
                                                                        <button type="submit" class="btn btn-danger btn-xs " name="deleteBtn" value="<?php echo $row->id;?>" data-toggle="tooltip"  title="" data-original-title="Delete"><i class="fa fa-times"></i></button>
                                                                    </td>
                                                                </tr>
                                                           
                                                        <?php $index ++;?>
                                                        <?php endforeach; ?>
                                                         
                                                    </tbody></table>
                                                    </form>
                                                    <br><br><br>


                                                    <div class="row">
                                                        <div class="col-md-12 " >
                                                          <div  style="margin: auto; text-align: center; border-radius: 50%;">
                                                              <?php if (isset($links)) { ?>
                                                               <?php echo $links ?>
                                                              <?php } ?>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.box-body -->
                                            </div>