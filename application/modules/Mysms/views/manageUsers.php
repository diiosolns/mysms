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
                                                    <h3 class="box-title"><b><?php //echo $this->lang->line('msg_manage_tmonial'); ?> Manage SMS System Users</b></h3>
                                                    <form action="<?php echo base_url('Mysms/manageUsers')?>" method="post">
                                                        <button type="submit" class="btn btn-default btn-xs pull-right " name="emailBtn" value="OK" data-toggle="tooltip"  title="" data-original-title="Send an Email"><i class="fa fa-envelope"></i></button>
                                                    </form>
                                                </div><!-- /.box-header -->
                                                <div class="col-md-12" style="text-align: center;">
                                                    <b style="color: <?php echo $color;?>;"><?php echo $msg;?></b>
                                                </div>
                                                <div class="box-body padding"  style="overflow-x:scroll; white-space: nowrap;">
                                                <form action="<?php echo base_url('Mysms/manageUsers')?>" method="post">
                                                    <table class="table table-striped">
                                                        <tbody><tr><!-- <?php //echo $this->lang->line('msg_'); ?> -->
                                                            <th style="width: 10px">USERID</th>
                                                            <th>TOOLS/ OPTIONS</th>
                                                            <th>COUNTRY</th>
                                                            <th>SENDER</th>
                                                            <th>USERNAME</th>
                                                            <th>EMAIL ADDRESS</th>
                                                            <th>SMS BUNDLE</th>
                                                            <th>SMS CREDIT ($)</th>
                                                            <th>PHONE NUMBER</th>
                                                            <th>USER ROLE</th>
                                                            <th>LAST MODIFIED</th>
                                                            <th>TOOLS</th>
                                                        </tr>
                                                        <?php $index = 1;?>
                                                         <?php foreach ($sysusersRes->result() as $row): ?>
                                                                <tr>
                                                                    <td><?php echo $row->id;?></td>
                                                                    <td>
                                                                        <button type="submit" class="btn btn-success btn-xs"  name="paymentsBtn" value="<?php echo $row->id;?>" data-toggle="tooltip" title="" data-original-title="Payments"><i class="fa fa-shopping-cart"></i></button> 
                                                                        <button type="submit" class="btn btn-default btn-xs"  name="recipientsBtn" value="<?php echo $row->id;?>" data-toggle="tooltip" title="" data-original-title="Recipients"><i class="fa fa-users"></i></button>
                                                                        <button type="submit" class="btn btn-info btn-xs"  name="logsBtn" value="<?php echo $row->id;?>" data-toggle="tooltip" title="" data-original-title="SMS Logs"><i class="fa fa-comments"></i></button>
                                                                        <!-- <button type="submit" class="btn btn-default btn-xs " name="editBtn" value="<?php echo $row->id;?>" data-toggle="tooltip"  title="" data-original-title="Modify"><i class="fa fa-edit"></i></button>
                                                                        <button type="submit" class="btn btn-danger btn-xs " name="deleteBtn" value="<?php echo $row->id;?>" data-toggle="tooltip"  title="" data-original-title="Delete"><i class="fa fa-times"></i></button> -->
                                                                    </td>
                                                                    <td><?php echo $row->country;?> </td>
                                                                    <td><?php echo $row->sender;?> </td>
                                                                    <td><?php echo $row->username;?> </td>
                                                                    <td><?php echo $row->email;?> </td>
                                                                    <td><b><?php echo number_format($row->bundle, 0) ;?></b> </td>
                                                                    <td><b><?php echo number_format($row->credit, 4) ;?></b> </td>
                                                                    <td><?php echo $row->phone;?> </td>
                                                                    <td><?php echo $row->role;?> </td>
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