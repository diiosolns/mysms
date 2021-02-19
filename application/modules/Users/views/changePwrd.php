
					<!-- CHANGE PASSWORD -->
					<div class="col-md-6">
	                      <div style="margin-top: 0px; padding-top: 0px;" class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title"><b>Change Password</b></h3>
                                </div> 
                                 <div class="col-md-12">
                                 	<!--  alert message ..... -->
                                         <?php echo $err;?>
                                        <!-- ... end alert...  --> 
                                 </div>
                                  <form action="<?php echo base_url('Users/ChangePassword')?>" method="post">
                                        <div class="box-body">
                                      
                                        <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Current Password</label>
                                                    <input class="form-control input-sm" name="cpword" value="" placeholder="Enter Current Password"  type="password" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input class="form-control input-sm" name="password" value="" placeholder="Enter New Password"  type="password" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input class="form-control input-sm" name="password2" value="" placeholder="Re-Enter New Password"  type="password" required="">
                                                </div>
                                              </div>
                                        </div>
                                        
                                         <div class="col-md-12">
                                         <br>
                                         <?php //echo $err;?>
                                        </div>
                                         </div>  

                                          <!-- <input class="form-control input-lg" placeholder=".input-lg" type="text">
                                            <br>
                                            <input class="form-control" placeholder="Default input" type="text">
                                            <br>
                                            <input class="form-control input-sm" placeholder=".input-sm" type="text"> -->
                                          <button type="submit" name="changeBtn" value="ok" class="btn btn-info btn-sm pull-right">&nbsp;&nbsp;&nbsp;&nbsp;CONFIRM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li class="fa  fa-save"></li></button>
                                          <hr>
                                        </div><!-- /.box-body -->
                                       </form>  
                                  </div>
							</div>

							
							
					<!-- PROFILE DETAILS -->
					<div class="col-md-6">
	                      <div style="margin-top: 0px; padding-top: 0px;" class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title"><b>User Profile Details</b></h3>
                                </div> 
                                 
                                        <div class="box-body " style="padding: 0 40px 0 40px;">
                                       <?php foreach ($userres->result() as $row): ?>
                                        <div class="row well well-sm">
	                                        <div class="col-md-6">
	                                           <b>FULL NAME : </b>
	                                        </div>
	                                         <div class="col-md-6">
	                                           <b><?php echo $row->fname.' '.$row->sname.' '.$row->lname;?> </b>
	                                        </div>

                                          <div class="col-md-6">
                                             <b>GENDER : </b>
                                          </div>
                                           <div class="col-md-6">
                                             <b><?php echo $row->gender;?> </b>
                                          </div>

                                          <div class="col-md-6">
                                             <b>TITLE : </b>
                                          </div>
                                           <div class="col-md-6">
                                             <b><?php echo $row->Title;?> </b>
                                          </div>

	                                        <div class="col-md-6">
	                                           <b>USER NAME : </b>
	                                        </div>
	                                         <div class="col-md-6">
	                                           <b><?php echo $row->username;?> </b>
	                                        </div>

	                                        <div class="col-md-6">
	                                           <b>USER CATEGORY : </b>
	                                        </div>
	                                         <div class="col-md-6">
	                                           <b><?php echo $row->role;?> </b>
	                                        </div>

	                                        <div class="col-md-6">
	                                           <b>PHONE NUMBER : </b>
	                                        </div>
	                                         <div class="col-md-6">
	                                           <b><?php echo $row->phone_number_cug ;?> </b>
	                                        </div>

                                          <div class="col-md-6">
                                             <b>ALT-PHONE NUMBER : </b>
                                          </div>
                                           <div class="col-md-6">
                                             <b><?php echo $row->phone_number_opt;?> </b>
                                          </div>
                                          <div class="col-md-6">
                                             <b>E-MAIL : </b>
                                          </div>
                                           <div class="col-md-6">
                                             <b><?php echo $row->email;?> </b>
                                          </div>

                                        </div>
                                        <hr>

                                        <?php endforeach; ?> 
                                       </div><!-- /.box-body -->
                                      
                                  </div>
							</div>