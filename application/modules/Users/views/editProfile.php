                              <div style="margin-top: 0px; padding-top: 0px;" class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title"><b>Edit User Credentials</b></h3>
                                </div> 

                                  <form action="<?php echo base_url('Users/manageUsers')?>" method="post">
                                        <div class="box-body">
                                        <?php foreach ($editres->result() as $row): ?>
                                        <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control input-sm" name="fname" value="<?php echo $row->fname;?>" placeholder="Enter Full Name"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Sur Name</label>
                                                    <input class="form-control input-sm" name="sname" value="<?php echo $row->sname;?>" placeholder="Enter Sur Name"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control input-sm" name="lname" value="<?php echo $row->lname;?>" placeholder="Enter Last Name"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control input-sm" name="gender" id="" required="">
                                                    <option value="<?php echo $row->gender;?>"><?php echo $row->gender;?> </option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                             </div>
                                        </div>

                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input class="form-control input-sm" name="title" value="<?php echo $row->Title;?>" placeholder="Enter User Title"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Mobile Phone Number</label>
                                                    <input class="form-control input-sm" name="phone1" value="<?php echo $row->phone_number_cug;?>" placeholder="Enter Mobile Phone Number"  type="number" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Alt-Mobile Phone Number</label>
                                                    <input class="form-control input-sm" name="phone2" value="<?php echo $row->phone_number_opt;?>" placeholder="Enter Altenutive Mobile Phone Number"  type="number" >
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>E-mail Address</label>
                                                    <input class="form-control input-sm" name="email" value="<?php echo $row->email;?>" placeholder="Enter Your Email Address"  type="email" required="">
                                                </div>
                                              </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Username (One word)</label>
                                                    <input class="form-control input-sm" name="username" value="<?php echo $row->username;?>" placeholder="Enter Username"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Default Password</label>
                                                    <input class="form-control input-sm" name="password" value="<?php echo $row->password;?>" placeholder="Enter User Default Password"  type="password" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input class="form-control input-sm" name="password2" value="" placeholder="Confirm User Default Password"  type="password" required="">
                                                </div>
                                              </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>User Category</label>
                                                <select class="form-control input-sm" name="role" id="" required="">
                                                    <option value="<?php echo $row->role;?>"><?php echo $row->role;?></option>
                                                    <option value="admin">Admin</option>
                                                    <option value="fs">Field Supervisor</option>
                                                    <option value="ft">Field Technician</option>
                                                    <option value="office">Office Person</option>
                                                </select>
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
                                          <button type="submit" name="modifyBtn" value="<?php echo $row->user_ID;?>" class="btn btn-info btn-sm pull-right">&nbsp;&nbsp;&nbsp;&nbsp;UPDATE USER &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li class="fa  fa-save"></li></button>
                                          <hr>
                                    <?php endforeach; ?> 
                                        </div><!-- /.box-body -->
                                       </form>  
                                  </div>