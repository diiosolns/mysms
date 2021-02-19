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
                                                    <h3 class="box-title"><b><?php //echo $this->lang->line('msg_manage_tmonial'); ?> SMS Pricing</b></h3>
                                                </div><!-- /.box-header -->
                                                <div class="col-md-12" style="text-align: center;">
                                                    <b style="color: <?php echo $color;?>;"><?php echo $msg;?></b>
                                                </div>
                                                <div class="box-body padding"  style1="overflow-x:scroll; white-space: nowrap;">
                                                <form action="<?php echo base_url('Mysms/smsPricing')?>" method="post">
                                                    <table class="table table-striped">
                                                        <tbody><tr><!-- <?php //echo $this->lang->line('msg_'); ?> -->
                                                            <th style="width: 10px">#</th>
                                                            <th>Country</th>
                                                            <th>SMS Count</th>
                                                            <th>Price/SMS ($)</th>
                                                            <th>Total Price ($)</th>
                                                        </tr>
                                                        <?php $index = 1;?>
                                                         <?php foreach ($priceRes->result() as $row): ?>
                                                                <tr>
                                                                    <td><?php echo $index;?></td>
                                                                    <td><?php echo $row->country;?> </td>
                                                                    <td><?php echo $row->qnty;?> </td>
                                                                    <td><?php echo $row->uprice;?> </td>
                                                                    <td><?php echo $row->tprice;?> </td>   
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