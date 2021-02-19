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
                                                    <h3 class="box-title"><b><?php //echo $this->lang->line('msg_manage_tmonial'); ?> Manage SMS Bundle Codes</b></h3>
                                                    <form action="<?php echo base_url('Mysms/manageCodes')?>" method="post">
                                                        <button type="submit" class="btn btn-info btn-xs pull-right " name="genBtn" value="OK" data-toggle="tooltip"  title="" data-original-title="Generate Codes"><i class="fa fa-edit"></i></button>
                                                    </form>
                                                </div><!-- /.box-header -->
                                                <div class="col-md-12" style="text-align: center;">
                                                    <b style="color: <?php echo $color;?>;"><?php echo $msg;?></b>
                                                </div>
                                                <div class="box-body padding"  style="overflow-x:scroll; white-space: nowrap;">
                                                <form action="<?php echo base_url('Mysms/manageCodes')?>" method="post">
                                                    <table class="table table-striped">
                                                        <tbody><tr><!-- <?php //echo $this->lang->line('msg_'); ?> -->
                                                            <th style="width: 10px">#</th>
                                                            <th>CODE</th>
                                                            <th>SMS COUNT</th>
                                                            <th>STATUS</th>
                                                            <th>LAST MODIFIED</th>
                                                            <th>TOOLS</th>
                                                        </tr>
                                                        <?php $index = 1;?>
                                                         <?php foreach ($codesRes->result() as $row): ?>
                                                                <tr>
                                                                    <td><?php echo $index;?></td>
                                                                    <td><?php echo $row->code;?> </td>
                                                                    <td><?php echo $row->smsnum;?> </td>
                                                                    <td><?php echo $row->status;?> </td>
                                                                    <td><?php echo $row->udate ;?> </td>
                                                                    <td>
                                                                        <button type="submit" class="btn btn-default btn-xs " name="editBtn" value="<?php echo $row->id;?>" data-toggle="tooltip"  title="" data-original-title="Modify"><i class="fa fa-edit"></i></button>
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