<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->config->item('app_name') .' | '. $title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="description" content="Xown CMS">
        <meta name="author" content="Tobi Taiwo|ttobi4@gmail.com">
        
        <link type="text/css" href="<?php echo base_url(); ?>assets/material-icon/material-icons.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/themify-icons/themify-icons.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/codeprettifier/prettify.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/iCheck/skins/minimal/blue.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jqueryui-1.10.3.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/enquire.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/velocityjs/velocity.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/velocityjs/velocity.ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/wijets/wijets.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/codeprettifier/prettify.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-switch/bootstrap-switch.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/iCheck/icheck.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/nanoScroller/js/jquery.nanoscroller.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/application.js"></script>
        
          <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/demo.js"></script>
    </head>

    <body class="animated-content">

        <header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="logo-area">
                <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
                    <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                        <span class="icon-bg">
                            <i class="ti ti-menu"></i>
                        </span>
                    </a>
                </span>
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Xown CMS</a>
            </div><!-- logo-area -->
            <ul class="nav navbar-nav toolbar pull-right">
                <li class="dropdown toolbar-icon-bg">
                    <a href="#" class="hasnotifications dropdown-toggle" data-toggle='dropdown'><span class="icon-bg"><i class="ti ti-bell"></i></span><span class="badge badge-deeporange">2</span></a>
                    <div class="dropdown-menu notifications arrow">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="scroll-pane">
                            <ul class="media-list scroll-content">
                                <li class="media notification-success">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.4 successfully pushed</h4>
                                            <span class="notification-time">8 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-info">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.3 successfully pushed</h4>
                                            <span class="notification-time">24 mins ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-teal">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.2 successfully pushed</h4>
                                            <span class="notification-time">16 hours ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-indigo">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-check"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Update 1.0.1 successfully pushed</h4>
                                            <span class="notification-time">2 days ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-danger">
                                    <a href="#">
                                        <div class="media-left">
                                            <span class="notification-icon"><i class="ti ti-arrow-up"></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="notification-heading">Initial Release 1.0</h4>
                                            <span class="notification-time">4 days ago</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="#">See all notifications</a>
                        </div>
                    </div>
                </li>
            </ul>
        </header>

        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-default">
                    <div class="static-sidebar">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="userinfo">
                                        <div class="avatar">
                                            <img src="" class="img-responsive img-circle">
                                        </div><br/>
                                        <div class="info">
                                            <span class="username">Toyosi Owolabi</span>
                                            <span class="useremail">toyosi.owolabi@xownsolutions.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget stay-on-collapse" id="widget-sidebar">
                                <nav role="navigation" class="widget-body">
                                    <ul class="acc-menu">
                                        <li><?php echo anchor(site_url('welcome'), '<i class="ti ti-home"></i><span>Dashboard</span>');?></li>
                                        <li><a href="javascript:;"><i class="fa fa-wrench"></i><span>Settings</span></a>
                                            <ul class="acc-menu">
                                                <li><a href="javascript:;"><span>Blood Group</span></a>
                                                    <ul class="acc-menu">
                                                        <li><?php echo anchor(site_url('bloodgroup'), 'View All');?></li>
                                                        <li><?php echo anchor(site_url('bloodgroup/create'), 'Add New');?></li>
                                                    </ul>
                                                </li>
                                                <li><a href="javascript:;"><span>Genotype</span></a>
                                                    <ul class="acc-menu">
                                                        <li><?php echo anchor(site_url('genotype'), 'View All');?></li>
                                                        <li><?php echo anchor(site_url('genotype/create'), 'Add New');?></li>
                                                    </ul>
                                                </li>
                                                <li><a href="javascript:;"><span>Region</span></a>
                                                    <ul class="acc-menu">
                                                        <li><?php echo anchor(site_url('region'), 'View All');?></li>
                                                        <li><?php echo anchor(site_url('region/create'), 'Add New');?></li>
                                                    </ul>
                                                </li>
                                                <li><a href="javascript:;"><span>Provider Type</span></a>
                                                    <ul class="acc-menu">
                                                        <li><?php echo anchor(site_url('providertype'), 'View All');?></li>
                                                        <li><?php echo anchor(site_url('providertype/create'), 'Add New');?></li>
                                                    </ul>
                                                </li>
                                                <li><a href="javascript:;"><span>Provider Category</span></a>
                                                    <ul class="acc-menu">
                                                        <li><?php echo anchor(site_url('providercategory'), 'View All');?></li>
                                                        <li><?php echo anchor(site_url('providercategory/create'), 'Add New');?></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:;"><i class="fa fa-sort-amount-asc"></i><span>Registration</span></a>
                                            <ul class="acc-menu">
                                                <li><a href="javascript:;"><span>Enrollee</span></a>
                                                    <ul class="acc-menu">
                                                        <li><?php echo anchor(site_url('enrollee'), 'View All');?></li>
                                                        <li><?php echo anchor(site_url('enrollee/create'), 'Add New');?></li>
                                                    </ul>
                                                </li>
                                                <li><a href="javascript:;"><span>Provider</span></a>
                                                    <ul class="acc-menu">
                                                        <li><?php echo anchor(site_url('provider'), 'View All');?></li>
                                                        <li><?php echo anchor(site_url('provider/create'), 'Add New');?></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
										<li><a href="javascript:;"><i class="fa fa-user"></i><span>Customer</span></a>
                                            <ul class="acc-menu">
                                                <li><?php echo anchor(site_url('customer'), 'View All');?></li>
                                                <li><?php echo anchor(site_url('customer/create'), 'Add New');?></li>
                                            </ul>
                                        </li>
										<li><a href="#"><i class="ti ti-receipt"></i><span>Capitation</span></a></li>
                                        <li><a href="#"><i class="fa fa-line-chart"></i><span>Claims</span></a></li>
                                        <li><a href="#"><i class="fa fa-id-card-o"></i><span>Policy</span></a></li>
                                        <li><a href="javascript:;"><i class="fa fa-hospital-o"></i><span>Health Plan</span></a>
                                            <ul class="acc-menu">
                                                <li><?php echo anchor(site_url('plan'), 'View All');?></li>
                                                <li><?php echo anchor(site_url('plan/create'), 'Add New');?></li>
                                            </ul>
                                        </li>
										<li><a href="javascript:;"><i class="ti ti-ticket"></i><span>Billing</span></a>
                                            <ul class="acc-menu">
                                               <li><?php echo anchor(site_url('invoice'), 'Invoicing'); ?></li>
												<li><a href="#"><span>Receipts</span></a></li>
												<li><a href="#"><span>Debit Notes</span></a></li>
                                            </ul>
                                        </li>
										<li><a href="javascript:;"><i class="fa fa-address-book-o"></i><span>User Management</span></a>
                                            <ul class="acc-menu">
                                                <li><a href="#"><span>Role Management</span></a></li>
												<li><a href="#"><span>Menu - Role Management</span></a></li>
												<li><a href="#"><span>Users</span></a></li>
                                            </ul>
                                        </li>
										<li><a href="javascript:;"><i class="ti ti-pie-chart"></i><span>Reports</span></a>
                                            <ul class="acc-menu">
                                                <li><a href="#"><span>ID Generation</span></a></li>
												<li><a href="#"><span>Other Reports</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            <div class="container-fluid">
                                <?php echo $body; ?>
                            </div> <!-- .container-fluid -->
                        </div> <!-- #page-content -->
                    </div>
                    <footer role="contentinfo">
                        <div class="clearfix">
                            <ul class="list-unstyled list-inline pull-left">
                                <li><h6 style="margin: 0;">&copy; <?php echo date('Y'); ?>xCare.by Xown Solutions Ltd</h6></li>
                            </ul>
                            <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                        </div>
                    </footer>

                </div>
            </div>
        </div>

    </body>
</html>
