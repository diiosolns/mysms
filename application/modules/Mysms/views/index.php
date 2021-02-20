<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>diioLab | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
         <!--Web icon-->
         <link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.ico') ?>" />
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
        <!-- jQuery 2.0.2 -->
        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script> 
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        
        <style type="text/css">
          .sitecolor1 {
            color: #10C4EF;
          }

          .sitecolor1bg {
            background-color: #10C4EF;
          } 

           .sitecolor2 {
            color: #FD037E;
          }

          .sitecolor2bg {
            background-color: #FD037E;
          } 
          .downapk{
            /*background-color: #333333 !important;*/
          }
      </style>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header  class="header">
            <a href="<?php echo base_url('Home');?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                diioLab <!-- () -->
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav   class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">diioLab</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a href="<?php echo base_url('Mysms/smsSenderForm');?>" class="btn btn-md btn-info" style="margin-top: 10px; margin-left: 20px;"><b>Send SMS </b>&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-envelope"></i></a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                    <!-- ========================= notifications ============== -->
                    <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning"><?php echo 5;?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"><b>You have 0 notifications</b></li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <div style="padding-top: 0 20px 0 20px; margin-left: 10px;" class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                        <li>
                                            <a href="<?php echo base_url('Mysms/smsLogs')?>">
                                                <i class="fa fa-comments sitecolor2bg"></i>  <?php echo $this->session->userdata('storeNum');?> SMS today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Mysms/smsLogs')?>">
                                                <i class="fa fa-comments sitecolor1bg"></i> <?php echo $this->session->userdata('pendingExp');?> SMS this month 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Mysms/manageGroups')?>">
                                                <i class="fa fa-users warning"></i> <?php echo $this->session->userdata('pendingInc');?> Recipients 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Mysms/buyCredit')?>">
                                                <i class="fa fa-shopping-cart info"></i> <?php echo $this->session->userdata('pendingProd');?> SMS credit 
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('Mysms/smsOffers')?>">
                                                <i class="fa fa-tasks warning"></i> <?php echo $this->session->userdata('pendingOrders');?> Offers 
                                            </a>
                                        </li>
                                    </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 156.25px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                                <li class="footer"><a href="<?php echo base_url('Mysms');?>">Go To Dashboard</a></li>
                            </ul>
                        </li>
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php //echo base_url('assets//img/avatar3.png');?>" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php //echo base_url('assets//img/avatar2.png');?>" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../../img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        -->

                        <!-- Tasks: style can be found in dropdown.less -->
                        <!-- <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="<?php //echo base_url('Admin');?>">Dashiboard</a>
                                </li>
                            </ul>
                        </li>  -->
                       <!-- ==================== end notifications =========== -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata('user_name');?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                <?php $profileurl = "assets/img/users/".$this->session->userdata('user_img');?>
                                   <img src="<?php echo base_url($profileurl);?>" class="img-circle" alt="user image"/>
                                    <p>
                                        <?php echo $this->session->userdata('user_name');?> - User
                                        <small>Member diioLab</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="<?php echo base_url('Mysms/buyCredit')?>">Credit</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="<?php echo base_url('Mysms/manageGroups')?>">Recipients</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="<?php echo base_url('Mysms/smsSenderForm')?>">Send</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('Mysms/myAccount')?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('Home/logout');?>" class="btn btn-default btn-flat">Log out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>



        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                        <?php $profileurl = "assets/img/users/".$this->session->userdata('user_img');?>
                            <img src="<?php echo base_url($profileurl);?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $this->session->userdata('user_name');?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>



                    <!-- search form -->
                    <form action="<?php echo base_url('Mysms/search')?>" method="post" class="sidebar-form" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->



                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="">
                            <a href="<?php echo base_url('Mysms');?>">
                                <i class="fa fa-home"></i>
                                <span>DASHBOARD</span>
                               
                            </a>
                            <ul class="treeview-menu">
                               
                            </ul>
                        </li>

                        <li><a href="<?php echo base_url('Mysms/smsSenderForm');?>"><i class="fa fa-comments" ></i> Send SMS </a></li>  
                        <li><a href="<?php echo base_url('Mysms/addRecipient');?>"><i class="fa fa-user" ></i> Add New Contacts </a></li> 
                        <li><a href="<?php echo base_url('Mysms/manageGroups');?>"><i class="fa fa-users" ></i> Manage Contacts </a></li> 
                        <li><a href="<?php echo base_url('Mysms/senderIDRegistrationForm');?>"><i class="fa fa-file" ></i> Sender ID Registration </a></li> 

                        <!-- <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>OUTAGE</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php //echo base_url('Luku/newRequest');?>"><i class="fa fa-angle-double-right"></i> LUKU</a></li>
                                <li><a href="<?php //echo base_url('Fuel/newFuelRequest')?>"><i class="fa fa-angle-double-right"></i> FUEL</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php //echo base_url('Tanesco/newRequest');?>"><i class="fa fa-angle-double-right"></i> TANESCO ISSUE</a></li>
                            </ul>
                        </li> -->
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-comments"></i>
                                <span>Manage SMS</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('Mysms/smsSenderForm')?>"><i class="fa fa-angle-double-right"></i> Send SMS</a></li>
                                <li><a href="<?php echo base_url('Mysms/smsSchedule')?>"><i class="fa fa-angle-double-right"></i> Schedule SMS</a></li>
                                <li><a href="<?php echo base_url('Mysms/smsLogs')?>"><i class="fa fa-angle-double-right"></i> SMS logs</a></li>
                            </ul>
                        </li>
                        <!-- <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Recipients</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php //echo base_url('Mysms/addRecipient')?>"><i class="fa fa-angle-double-right"></i> Add Recipient</a></li>
                                <li><a href="<?php //echo base_url('Mysms/manageGroups')?>"><i class="fa fa-angle-double-right"></i> Manage Recipients</a></li>
                            </ul>
                        </li> -->
                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Financial</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('Mysms/buyCredit')?>"><i class="fa fa-angle-double-right"></i> Purchase credit</a></li>
                                <li><a href="<?php echo base_url('Mysms/smsPricing')?>"><i class="fa fa-angle-double-right"></i> SMS Pricing</a></li>
                                <li><a href="<?php echo base_url('Mysms/smsInvoice')?>"><i class="fa fa-angle-double-right"></i> Invoices</a></li>
                                <li><a href="<?php echo base_url('Mysms/smsOffers')?>"><i class="fa fa-angle-double-right"></i> Offers</a></li>
                            </ul>
                        </li>
                       <!-- <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Account</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php //echo base_url('Mysms/myAccount')?>"><i class="fa fa-angle-double-right"></i> My account</a></li>
                                <li><a href="<?php //echo base_url('Mysms/myAccount')?>"><i class="fa fa-angle-double-right"></i> Change Password</a></li>
                            </ul>
                        </li> -->

                        <li><a href="<?php echo base_url('Home/logout');?>"><i class="fa fa-sign-out" "></i> Logout </a></li>  


                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>




            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  <!--   <h1>
                        Page Header
                        <small>Event Escallation Tool</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">This Page</li>
                    </ol> --><!-- <hr> -->

                </section>

                <!-- Main content -->
                <section style=" padding-top: 0px;" class="content">    
                  <!--  XXXXXX CALL VARYING FILE HERE XXXXXXXX -->
                  <?php 
                      $this->load->view($middle_m.'/'.$middle_f);
                    ?>                            
                </section><!-- /.content -->



            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <!-- <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  -->
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/AdminLTE/app.js');?>" type="text/javascript"></script>

    </body>
</html>