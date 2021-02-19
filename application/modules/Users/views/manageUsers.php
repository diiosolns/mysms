
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                            <!--  -->
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab"><b>Available Users</b></a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab"><b>Add New User</b></a></li>
                                    <!-- <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            Dropdown <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                            <li role="presentation" class="divider"></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                        </ul>
                                    </li> -->
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">

                                    <div class="tab-pane active" id="tab_1">
                                         <!--  alert message ..... -->
                                         <?php echo $err;?>
                                        <!-- ... end alert...  --> 
                                         <form action="<?php echo base_url('Users/manageUsers')?>" method="post">    
                                        <div class="box-body no-padding">
                                            <table class="table table-striped">
                                                <tbody><tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>FULL NAME</th>
                                                    <th>USERNAME</th>
                                                    <th>USER ROLE</th> 
                                                    <th >PROFILE IMAGE</th>
                                                    <th>PHONE NUMBER</th>
                                                    <th>TOOLS</th>
                                                    <th>TITLE</th>
                                                </tr>
                                                <?php $index = 1;?>
                                                 <?php foreach ($usersres->result() as $row): ?>
                                                        <tr>
                                                            <td><?php echo $index;?></td>
                                                            <td><?php echo $row->fname.' '.$row->sname.' '.$row->lname;?> </td>
                                                            <td><?php echo $row->username;?> </td>
                                                            <td><?php echo $row->role;?></td>
                                                            <td><?php echo $row->img;?></td>
                                                            <td><?php echo $row->phone_number_cug;?></td>
                                                            <td>
                                                                <button type="submit" class="btn btn-default btn-xs " name="editBtn" value="<?php echo $row->user_ID;?>" data-toggle="tooltip"  title="" data-original-title="Modify"><i class="fa fa-edit"></i></button>
                                                                <!-- <button type="submit" class="btn btn-success btn-xs " name="acceptBtn" value="<?php echo $row->id;?>" data-toggle="tooltip"  title="" data-original-title="Accept"><i class="fa fa-save"></i></button>
                                                                <button type="submit" class="btn btn-warning btn-xs"  name="rejectBtn" value="<?php echo $row->id;?>" data-toggle="tooltip" title="" data-original-title="Reject"><i class="fa fa-minus"></i></button> -->
                                                                <?php if(!($row->role == 'admin')) {?>
                                                                <button type="submit" class="btn btn-danger btn-xs"  name="deleteBtn" value="<?php echo $row->user_ID;?>" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></button>
                                                                <?php }?>
                                                            </td>
                                                            <td><?php echo $row->Title;?></td>
                                                        </tr>
                                                <?php $index ++;?>
                                                <?php endforeach; ?> 
                                            </tbody></table>
                                        </div><!-- /.box-body -->
                                        </form>
                                    </div><!-- /.tab-pane -->

                                    <div class="tab-pane " id="tab_2">
                                         <!--  alert message ..... -->
                                         <?php echo $err;?>
                                        <!-- ... end alert...  --> 
                                        <form action="<?php echo base_url('Users/manageUsers')?>" method="post">
                                        <div class="box-body">
                                       
                                        <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control input-sm" name="fname" value="" placeholder="Enter First Name"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Sur Name</label>
                                                    <input class="form-control input-sm" name="sname" value="" placeholder="Enter Sur Name"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control input-sm" name="lname" value="" placeholder="Enter Last Name"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control input-sm" name="gender" id="" required="">
                                                    <option value="empty">Select Gender </option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                             </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input class="form-control input-sm" name="title" value="" placeholder="Enter User Title"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Mobile Phone Number</label>
                                                    <input class="form-control input-sm" name="phone1" value="" placeholder="Enter Mobile Phone Number"  type="number" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Alt-Mobile Phone Number</label>
                                                    <input class="form-control input-sm" name="phone2" value="" placeholder="Enter Altenutive Mobile Phone Number"  type="number" >
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>E-mail Address</label>
                                                    <input class="form-control input-sm" name="email" value="" placeholder="Enter Your Email Address"  type="email" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Username (One word)</label>
                                                    <input class="form-control input-sm" name="username" value="" placeholder="Enter Username"  type="text" required="">
                                                </div>
                                              </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label>Default Password</label>
                                                    <input class="form-control input-sm" name="password" value="" placeholder="Enter User Default Password"  type="password" required="">
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
                                                    <option value="empty">Select User Category </option>
                                                    <option value="admin">Admin</option>
                                                    <option value="PrM">PrM</option>
                                                    <option value="NOC">NOC</option>
                                                    <option value="FOE">FOE</option>
                                                    <option value="SLM">SLM</option>
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
                                          <button type="submit" name="regBtn" value="ok" class="btn btn-info btn-sm pull-right">&nbsp;&nbsp;&nbsp;&nbsp;SUBMIT USER &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li class="fa  fa-save"></li></button>
                                          <hr>
                                        </div><!-- /.box-body -->
                                       </form>  

                                        
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->

                            </div><!-- nav-tabs-custom -->
         