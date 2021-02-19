<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIC | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
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
                SIC <!-- (OPERATIONAL INFRASRUCTURE DATABASEDIIO NOC ESCALLATION TOOL) -->
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav   class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">SIC</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
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
                                            <a href="<?php echo base_url('#')?>">
                                                <i class="fa fa-warning danger"></i>  <?php echo $this->session->userdata('storeNum');?> Incomming Refueling Requests
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('#')?>">
                                                <i class="fa fa-warning danger"></i> <?php echo $this->session->userdata('pendingExp');?> Pending Refueling Requests
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('#')?>">
                                                <i class="fa fa-wrench warning"></i> <?php echo $this->session->userdata('pendingInc');?> Pending Spare Requests
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('#')?>">
                                                <i class="fa fa-tasks info"></i> <?php echo $this->session->userdata('pendingProd');?> Ongoing Planned Activities
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('#')?>">
                                                <i class="fa fa-tasks warning"></i> <?php echo $this->session->userdata('pendingOrders');?> Open Access Requests
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('#')?>">
                                                <i class="ion ion-bag success"></i> Tshs. <?php echo $this->session->userdata('salesAmount');?>/= Approved Access Requests
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('#')?>">
                                                <i class="ion ion-bag success"></i> <?php echo $this->session->userdata('productNum');?> Incomming PM
                                            </a>
                                        </li>

                                        <!-- <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li> -->
                                    </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 156.25px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                                </li>
                                <li class="footer"><a href="<?php echo base_url('Admin');?>">Go To Dashboard</a></li>
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
                                        <?php echo $this->session->userdata('user_name');?> - Administrator
                                        <small>Member SIC</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="<?php echo base_url('Access/newAccessRequest')?>">Access</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="<?php echo base_url('Pm/pmActivityRecording')?>">PM</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="<?php echo base_url('Genservice/gsActivityRecording')?>">DG </a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('Users/changePassword')?>" class="btn btn-default btn-flat">Profile</a>
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
                    <form action="#" method="get" class="sidebar-form">
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
                            <a href="<?php echo base_url('Home');?>">
                                <i class="fa fa-home"></i>
                                <span>DASHBOARD</span>
                               
                            </a>
                            <ul class="treeview-menu">
                               
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span>ENERGY</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('Luku/newRequest');?>"><i class="fa fa-angle-double-right"></i> LUKU</a></li>
                                <li><a href="<?php echo base_url('Fuel/newFuelRequest')?>"><i class="fa fa-angle-double-right"></i> FUEL</a></li>
                                    <!--sub tabs-->
                                        <!-- <li><a href="#"><i class="fa fa-angle-double-right"></i> Fuel Request</a></li> -->
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Tanesco/newRequest');?>"><i class="fa fa-angle-double-right"></i> TANESCO ISSUE</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-key"></i>
                                <span>ACCESS</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="<?php echo base_url('Access/newAccessRequest')?>"><i class="fa fa-angle-double-right"></i> Create New Request</a></li>
                                <li><a href="<?php echo base_url('Access/filteredAccessRecords')?>"><i class="fa fa-angle-double-right"></i> Access Request Records</a></li>
                                <li><a href="<?php echo base_url('Access/newPlannedActivity')?>"><i class="fa fa-angle-double-right"></i> Planned Activities</a></li>
                                <!-- <li><a href="<?php //echo base_url('Access/filteredPlannedActivity')?>"><i class="fa fa-angle-double-right"></i> View Planned Activities</a></li> -->
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Access/accessRequestsDownloader')?>"><i class="fa fa-angle-double-right"></i> Access Reports</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>PM</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('Pm/pmActivityRecording')?>"><i class="fa fa-angle-double-right"></i> Record PM Activity</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Pm/filteredPmRecords');?>"><i class="fa fa-angle-double-right"></i> View PM Records</a></li>
                                <li><a href="<?php echo base_url('Pm/pmDownloader')?>"><i class="fa fa-angle-double-right"></i> PM Reports</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gears"></i>
                                <span>DG SERVICE</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="<?php echo base_url('Genservice/gsActivityRecording')?>"><i class="fa fa-angle-double-right"></i> Record Service Data</a></li>
                                <li><a href="<?php echo base_url('Genservice/filteredGsRecords');?>"><i class="fa fa-angle-double-right"></i> View Service Data</a></li>
                                <li><a href="<?php echo base_url('Genservice/gsDownloader')?>"><i class="fa fa-angle-double-right"></i> Service Reports</a></li>

                            </ul>
                        </li>

                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-gears"></i>
                                <span>SPARE</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('Spare/newSpareRquest')?>"><i class="fa fa-angle-double-right"></i> Request New Spare</a></li>
                                <li><a href="<?php echo base_url('Spare/availabbleSpares');?>"><i class="fa fa-angle-double-right"></i> Available Requests</a></li>
                                <li><a href="<?php echo base_url('Spare/approveSpares');?>"><i class="fa fa-angle-double-right"></i> Request Approval</a></li>
                                <li><a href="<?php echo base_url('Spare/procurementApproval')?>"><i class="fa fa-angle-double-right"></i> Procurement Approval</a></li>
                                <li><a href="<?php echo base_url('Spare/updateAvailabilitty')?>"><i class="fa fa-angle-double-right"></i> Update Availability</a></li>
                                <li><a href="<?php echo base_url('Spare/updateClosure')?>"><i class="fa fa-angle-double-right"></i> Close Request</a></li>
                                <li><a href="<?php echo base_url('Spare/spareReport')?>"><i class="fa fa-angle-double-right"></i> Spare Reports</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-phone"></i>
                                <span>CALLOUT</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url('Callout/availableCallouts')?>"><i class="fa fa-angle-double-right"></i> Available Callouts</a></li>
                                <li><a href="<?php echo base_url('Callout/filteredCallouts')?>"><i class="fa fa-angle-double-right"></i> Callout Records</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Callout/downCallouts')?>"><i class="fa fa-angle-double-right"></i> Callout Reports</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-signal"></i>
                                <span>SITE</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="<?php echo base_url('Site/manageSiteInfo')?>"><i class="fa fa-angle-double-right"></i> Manage Site Information</a></li>
                            </ul>
                        </li>

                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>USER ACCOUNTS</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                               <li><a href="<?php echo base_url('Users/manageUsers')?>"><i class="fa fa-angle-double-right"></i> Create User Account</a></li>
                                <li><a href="<?php echo base_url('Users/manageUsers')?>"><i class="fa fa-angle-double-right"></i> Manage User Accounts</a></li>
                                <li><a href="<?php echo base_url('Users/changePassword')?>"><i class="fa fa-angle-double-right"></i> Change Password</a></li>
                            </ul>
                        </li>









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







                   <!--  xxxxxxxxxxxx  HEADER MENU XXXXXXXXXXXXX -->
                   <nav style="margin-bottom: 0;" class="navbar navbar-default">
                      <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">OPTIONS</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <!-- <a class="navbar-brand" href="#">Brand</a> -->
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
                            <li><a href="<?php echo base_url('Home');?>"><i class="fa fa-home" style="color:blue;"></i> DASHBOARD</a></li>  
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ENERGY <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              <li role="separator" class="divider"></li>
                                <li class="dropdown-submenu">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">LUKU</a>
                                     <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('Luku/newRequest');?>">New Request</a></li>
                                        <li><a href="<?php echo base_url('Luku/updateClosure');?>">Update Closure</a></li>
                                        <li><a href="<?php echo base_url('Luku/aprooveRequests');?>">Update Aprooval</a></li>
                                        <li><a href="<?php echo base_url('Luku/manageReports');?>">Manage Reports</a></li>
                                    </ul>
                                 </li>      
                                <li class="dropdown-submenu">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">FUEL</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('Fuel/newFuelRequest')?>">New Request</a></li>
                                        <li><a href="<?php echo base_url('Fuel/closeFuelRequests');?>">Update Closure</a></li>
                                        <li><a href="<?php echo base_url('Fuel/aprooveRequests');?>">Update Aprooval</a></li>
                                        <li><a href="<?php echo base_url('Fuel/downFuelRequests');?>">Manage Reports</a></li>
                                    </ul>
                                 </li> 
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-submenu">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">TANESCO ISSUE</a>
                                    <ul class="dropdown-menu">
                                       <li><a href="<?php echo base_url('Tanesco/newRequest');?>">New Request</a></li>
                                       <li><a href="<?php echo base_url('Tanesco/updateClosure');?>">Update Closure</a></li>
                                       <li><a href="<?php echo base_url('Tanesco/aprooveRequests');?>">Update Aprooval</a></li>
                                       <!-- <li><a href="<?php //echo base_url('Tanesco/manageReports');?>">Manage Reports</a></li> -->
                                    </ul>
                                 </li> 
                              </ul>
                            </li>



                             <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ACCESS <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Access/newAccessRequest')?>"><i class="fa fa-angle-double-right"></i> Create New Request</a></li>
                                <li><a href="<?php echo base_url('Access/filteredAccessRecords')?>"><i class="fa fa-angle-double-right"></i> Access Request Records</a></li>
                                <li><a href="<?php echo base_url('Access/newPlannedActivity')?>"><i class="fa fa-angle-double-right"></i> Planned Activities</a></li>
                                <!-- <li><a href="<?php //echo base_url('Access/filteredPlannedActivity')?>"><i class="fa fa-angle-double-right"></i> View Planned Activities</a></li> -->
                                <li role="separator" class="divider"></li> 
                                <li><a href="<?php echo base_url('Access/accessRequestsDownloader')?>"><i class="fa fa-angle-double-right"></i> Access Reports</a></li>                        
                              </ul>
                            </li>

                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PM <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Pm/pmActivityRecording')?>"><i class="fa fa-angle-double-right"></i> Record PM Activity</a></li>
                                <li><a href="<?php echo base_url('Pm/filteredPmRecords');?>"><i class="fa fa-angle-double-right"></i> View PM Records</a></li>
                                <li role="separator" class="divider"></li> 
                                <li><a href="<?php echo base_url('Pm/pmDownloader')?>"><i class="fa fa-angle-double-right"></i> PM Reports</a></li>                       
                              </ul>
                            </li>

                             <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DG SERVICE <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Genservice/gsActivityRecording')?>"><i class="fa fa-angle-double-right"></i> Record Service Data</a></li>
                                <li><a href="<?php echo base_url('Genservice/filteredGsRecords');?>"><i class="fa fa-angle-double-right"></i> View Service Data</a></li>
                                <li role="separator" class="divider"></li>                          
                                <li><a href="<?php echo base_url('Genservice/gsDownloader')?>"><i class="fa fa-angle-double-right"></i> Service Reports</a></li>
                              </ul>
                            </li>

                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SPARE <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Spare/newSpareRquest')?>"><i class="fa fa-angle-double-right"></i> Request New Spare</a></li>
                                <li><a href="<?php echo base_url('Spare/availabbleSpares');?>"><i class="fa fa-angle-double-right"></i> Available Requests</a></li>
                                <li><a href="<?php echo base_url('Spare/approveSpares');?>"><i class="fa fa-angle-double-right"></i> Request Approval</a></li>
                                <li><a href="<?php echo base_url('Spare/procurementApproval')?>"><i class="fa fa-angle-double-right"></i> Procurement Approval</a></li>
                                <li><a href="<?php echo base_url('Spare/updateAvailabilitty')?>"><i class="fa fa-angle-double-right"></i> Update Availability</a></li>
                                <li><a href="<?php echo base_url('Spare/updateClosure')?>"><i class="fa fa-angle-double-right"></i> Close Request</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Spare/spareReport')?>"><i class="fa fa-angle-double-right"></i> Spare Reports</a></li>
                              </ul>
                            </li>

                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CALLOUT <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo base_url('Callout/availableCallouts')?>"><i class="fa fa-angle-double-right"></i> Available Callouts</a></li>
                                    <li><a href="<?php echo base_url('Callout/filteredCallouts')?>"><i class="fa fa-angle-double-right"></i> Callout Records</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?php echo base_url('Callout/downCallouts')?>"><i class="fa fa-angle-double-right"></i> Callout Reports</a></li>
                              </ul>
                            </li>

                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SITE <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Site/manageSiteInfo')?>"><i class="fa fa-angle-double-right"></i> Manage Site Information</a></li>
                              </ul>
                            </li>
                           
                           <!--  <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MAINTAINANCE <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              <li role="separator" class="divider"></li>
                                <li class="dropdown-submenu">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">SCHEDULED CORRECTIVE MAINT.</a>
                                     <ul class="dropdown-menu">
                                        <li><a href="#">Monthly PM</a></li>
                                        <li><a href="#">Airconditioner</a></li>
                                        <li><a href="#">Battery Bank</a></li>
                                        <li><a href="#">Tower</a></li>
                                        <li><a href="#">Diesel Generator</a></li>
                                    </ul>
                                 </li>  
                                 <li role="separator" class="divider"></li>    
                                <li class="dropdown-submenu">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">PREVENTIVE MAINATAINANCE</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Diesel Generator</a></li>
                                        <li><a href="#">Battery Bank</a></li>
                                        <li><a href="#">Rectifier</a></li>
                                        <li><a href="#">Shelter</a></li>
                                        <li><a href="#">Airconditioner</a></li>
                                        <li><a href="#">Fence</a></li>
                                        <li><a href="#">Tower</a></li>
                                        <li><a href="#">Aviation Light</a></li>
                                        <li><a href="#">AVR</a></li>
                                        <li><a href="#">Alarms</a></li>
                                        <li><a href="#">Hybrids</a></li>
                                    </ul>
                                 </li> 
                              </ul>
                            </li> -->

                           

                                
                          </ul>
                          <!-- <form class="navbar-form navbar-left">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                          </form> -->
                          <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MORE <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Users/changePassword')?>"><i class="fa fa-angle-double-right"></i>My Account</a></li>
                                <li><a href="<?php echo base_url('Users/manageUsers')?>"><i class="fa fa-angle-double-right"></i> Manage Accounts</a></li>
                                <li><a href="<?php echo base_url('Users/changePassword')?>"><i class="fa fa-angle-double-right"></i>Change Password</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('Home');?>" style="color: red;"><b>Exit</b></a></li>
                              </ul>
                            </li>
                          </ul>

















                          
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>
                    <!-- XXXXXXXXXXXX ./ END HEADER MENU XXXXXXX -->
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/js/AdminLTE/app.js');?>" type="text/javascript"></script>

    </body>
</html>