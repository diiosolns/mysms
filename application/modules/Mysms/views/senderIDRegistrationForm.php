<style type="text/css">
    .sitein {
        border-radius: 20px !important;
    }
</style>
    <?php 
        $senderidRes = modules::load('Mysms')->get_where_custom1('sms_senderid', 'userid', $this->session->userdata('user_id'));
    ?>

<div class="row">
    <div class="col-md-8">
        <div class="box box-info middle_pad " style="margin-top: 0px;">
            <div class="box-header">
                <h3 class="box-title"><b> Sender ID Reistration</b></h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form class="form-style-1" action="<?php echo base_url('Mysms/senderIDRegSubmit')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $msg;?>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Sender ID Requester <span style="color: red;"> *</span></label>
                                <input type="text" name="requester" class="form-control sitein" id="requester" required="" >
                                <i>i.e. Company/ Organization/ Business/ Institution/ Social Group Name requesting Sender ID</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Representative Full Name <span style="color: red;"> *</span></label>
                                <input type="text" name="name" class="form-control sitein" id="name" required="" >
                                <i>Individual Name</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Requester Location <span style="color: red;"> *</span></label>
                                <input type="text" name="location" class="form-control sitein" id="location" required="" >
                                <i>E.g. Dodoma, Tanzania</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Representative Title <span style="color: red;"> *</span></label>
                                <input type="text" name="title" class="form-control sitein" id="title" required="" >
                                <i>E.g. Director, Officer, Owner e.t.c.</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Postal Box <span style="color: red;"> *</span></label>
                                <input type="text" name="address" class="form-control sitein" id="address" required="" >
                                <i>E.g. 32345</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Logo <span style="color: red;"> *</span></label>
                                <input type="file" name="logo" class="form-control sitein" id="logo" required="" >
                                <i>Formats: JPEG, PNG</i>
                            </div>
                        </div>

                        <div class="col-md-12"><hr></div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Sender ID <span style="color: red;"> *</span></label>
                                <input type="text" name="senderid" class="form-control sitein" id="senderid" required="" >
                                <i>Must have 11 Characters maximum</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Sender ID Owner <span style="color: red;"> *</span></label>
                                <input type="text" name="owner" class="form-control sitein" id="owner" required="" >
                                <i>i.e. Company/ Business/ Organization/ Institution/ Social Group owning Sender ID</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="body">Website/ Facebook/ Instagram <span style="color: red;"> *</span></label>
                                <input type="text" name="url" class="form-control sitein" id="url" required="" >
                                <i>Website link or account name</i>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="body">Sample SMS <span style="color: red;"> *</span></label>
                                <textarea name="sms" rows="6" class="form-control sitein" id="date" placeholder="Write an SMS here !" required="" ></textarea>
                            </div>
                        </div>
                    </div>  
                </div><!-- /.box-body -->
                <div class="box-footer" style="text-align: center;">
                    <button type="submit" name="senderidBtn" value="ok" class="btn btn-info btn-md sitein"><b>Submit Request&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-share"></i></b></button>
                </div>
            </form>
        </div>
    </div>






    <div class="col-md-4">
        <!-- approved -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Your Sender IDs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Sender ID</th>
                  <th>Progress</th>
                  <th style="width: 40px">Satus</th>
                </tr>
                <?php $index = 1;?>
                <?php foreach ($senderidRes->result() as $row1): if($row1->status == "Approved") { ?>
                <tr>
                  <td><?php echo $index;?>.</td>
                  <td><?php echo $row1->senderid;?></td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 100%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue"><?php echo $row1->status;?></span></td>
                </tr>
                <?php $index ++;?>
                <?php } endforeach; ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
        <!--  end approved -->

        <!-- approved -->
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Your Sender ID Requests</h3>
            </div>
            <!-- /.box-requests -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Sender ID</th>
                  <th>Progress</th>
                  <th style="width: 40px">Satus</th>
                </tr>
                <?php $index = 1;?>
                <?php foreach ($senderidRes->result() as $row1): if(!($row1->status == "Approved")) { ?>
                <tr>
                  <td><?php echo $index;?>.</td>
                  <td><?php echo $row1->senderid;?></td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow"><?php echo $row1->status;?></span></td>
                </tr>
                <?php $index ++;?>
                <?php } endforeach; ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
        <!--  end requests -->
    </div>
</div>

