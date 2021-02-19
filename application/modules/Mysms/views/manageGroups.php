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


                                <div class="box box-info middle_pad " style="margin-top: 0px;">
                                                <div class="box-header">
                                                    <h3 class="box-title"><b><?php //echo $this->lang->line('msg_manage_tmonial'); ?> Manage Phone number Groups</b></h3>
                                                    <div class="pull-right">
                                                        <a href="<?php echo base_url('Mysms/addRecipient')?>" class="btn btn-info btn-xs "   data-toggle="tooltip"  title="" data-original-title="Add Recipients"><i class="fa fa-plus"></i></a>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                </div><!-- /.box-header -->
                                                <div class="col-md-12" style="text-align: center;">
                                                    <b style="color: <?php echo $color;?>;"><?php echo $msg;?></b>
                                                </div>
                                                <div class="box-body padding"  style1="overflow-x:scroll; white-space: nowrap;">
                                                <form action="<?php echo base_url('Mysms/manageGroups')?>" method="post">
                                                    <table class="table table-striped">
                                                        <tbody><tr><!-- <?php //echo $this->lang->line('msg_'); ?> -->
                                                            <th style="width: 10px">#</th>
                                                            <th>Group Name</th>
                                                            <th>Qnty</th>
                                                            <th>Tools</th>
                                                        </tr>
                                                        <?php $index = 1;?>
                                                         <?php foreach ($groupRes->result() as $row): ?>
                                                                <tr>
                                                                    <td><?php echo $index;?></td>
                                                                    <td><?php echo $row->groupname;?> </td>
                                                                    <td><span class="badge badge-pill badge-success"><?php echo modules::load('Mysms')->get_where_custom2('sms_recipient', 'groupname', $row->groupname, 'userid', $this->session->userdata('user_id'))->num_rows();;?></span> </td>
                                                                    <td>
                                                                        <button type="submit" class="btn btn-default btn-xs " name="viewBtn" value="<?php echo $row->groupname;?>" data-toggle="tooltip"  title="" data-original-title="View Recipients"><i class="fa fa-eye"></i></button>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <button type="submit" class="btn btn-success btn-xs"  name="downBtn" value="<?php echo $row->groupname;?>" data-toggle="tooltip" title="" data-original-title="Download"><i class="fa fa-download"></i></button> 
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <button type="submit" class="btn btn-danger btn-xs " name="deleteBtn" value="<?php echo $row->groupname;?>" data-toggle="tooltip"  title="" data-original-title="Delete"><i class="fa fa-times"></i></button>
                                                                       <!--  <button type="submit" class="btn btn-success btn-xs"  name="activateBtn" value="<?php echo $row->id;?>" data-toggle="tooltip" title="" data-original-title="Activate"><i class="fa fa-unlock"></i></button> 
                                                                        <button type="submit" class="btn btn-warning btn-xs"  name="suspendBtn" value="<?php echo $row->id;?>" data-toggle="tooltip" title="" data-original-title="Suspend"><i class="fa fa-lock"></i></button> -->
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