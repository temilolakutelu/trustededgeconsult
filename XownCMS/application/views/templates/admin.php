<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->config->item('app_name') . ' | ' . $title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="description" content="Xown CMS">
        <meta name="author" content="webteam@xownsolutions.com">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/914c709366.css">
        <link type="text/css" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css" rel="stylesheet">
        <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/minimal/blue.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
         <link type="text/css" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.css" rel="stylesheet">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
         
        <script src="https://code.jquery.com/jquery-1.10.2.min.js" integrity="sha256-C6CB9UYIS9UJeqinPHWTHVqh/E1uhG5Twh+Y5qFQmYg=" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js" integrity="sha256-lnH4vnCtlKU2LmD0ZW1dU7ohTTKrcKP50WA9fa350cE=" crossorigin="anonymous"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jqueryui-1.10.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/enquire.js/2.0.0/enquire.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/wijets/wijets.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-switch/bootstrap-switch.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.8.4/javascripts/jquery.nanoscroller.min.js"></script>
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
                <a class="navbar-brand" href="<?php echo base_url(); ?>">LMU</a>
            </div><!-- logo-area -->
        </header>

        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-default">
                    <div class="static-sidebar">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="widget-body">
                                    
                                    <div class="userinfo">
                                        <div class="info" style="padding: 0px;">
                                         
                                          <?php 


                                            $login = $this->session->userdata('logged_in');
                                           
                                           // print_r($login);
                                            $email = $login['email'];
                                            $first_name = $login['firstname'];
                                            $role_type = $login['roleID'];


                                            ?>
                                          
                                            <span class="username">ADMIN USER</span>
                                            <span class="useremail"><?= strtoupper($first_name); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget stay-on-collapse" id="widget-sidebar">
                                <nav role="navigation" class="widget-body">
                                    <ul class="acc-menu">
                                        <li><?php echo anchor(site_url('welcome/dashboard'), '<i class="ti ti-home"></i><span>Dashboard</span>'); ?></li>
                                        
                                        <?php if ($role_type == 1) { ?>
                                                <li><a href="<?= site_url('settings'); ?>"><i class="fa fa-envelope"></i> <span>Mail Settings</span></a></li>
                                                <?php 
                                            } ?>
                                          <li><a href="<?= site_url('page'); ?>"><i class="fa fa-edit"></i> <span>Webpage Management</span></a></li>
                                          <li><a href="<?= site_url('register'); ?>"><i class="fa fa-list-alt"></i> <span>Registered</span></a></li>
                                          <li><a href="<?= site_url('banner'); ?>"><i class="fa fa-picture-o"></i> <span>Banner Management</span></a></li>
                                        <li><a href="<?= site_url('training'); ?>"><i class="fa fa-university"></i> <span>Trainings</span></a></li>
                                        <li><a href="<?= site_url('testimonials'); ?>"><i class="fa fa-gift"></i> <span>Testimonials</span></a></li>
                                        <li><a href="<?= site_url('post_job'); ?>"><i class="fa fa-briefcase"></i> <span>Post Job</span></a></li>
                                        <li><a href="<?= site_url('cv'); ?>"><i class="fa fa-briefcase"></i> <span>Candidates CV</span></a></li>
                                        <li><a href="<?= site_url('staff_profile'); ?>"><i class="fa fa-group"></i> <span>Staff Profile Mgt.</span></a></li>
                                        <li><a href="<?= site_url('video'); ?>"><i class="fa fa-play"></i> <span>Video Management</span></a></li>
                                        <li><a href="<?= site_url('gallery_category'); ?>"><i class="fa fa-object-group"></i> <span>Gallery Category</span></a></li>
                                        <li><a href="<?= site_url('photos'); ?>"><i class="fa fa-picture-o"></i> <span>Photo Gallery</span></a></li>
                                        <li><a href="<?= site_url('subscription'); ?>"><i class="fa fa-user"></i> <span> Newsletter Subscription</span></a></li>
                                        <li><a href="<?= site_url('feedback'); ?>"><i class="fa fa-user"></i> <span> Customer/Trainees' Feedback</span></a></li>
                                        <li><a href="<?= site_url('upload'); ?>"><i class="fa fa-briefcase"></i> <span> Upload Document</span></a></li>
                                        <li><a href="<?= site_url('blog'); ?>"><i class="fab fa-blogger"></i> <span> Blog </span></a></li>
                                       <li><a href="<?= site_url('user_management/update_password'); ?>"><i class="fa fa-eye"></i> <span>Change Password</span></a></li>
                                         <?php if ($role_type == 1) { ?>
                                            <li><a href="<?= site_url('user_management'); ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
                                        <?php 
                                    } ?>
                                          <li><a href="<?= site_url('log'); ?>"><i class="fa fa-file"></i> <span>Log Activities</span></a></li>
                                        <li><?php echo anchor(site_url('welcome/logout'), '<i class="fa fa-sign-out"></i><span>Logout</span>'); ?></li>
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
                                 <?php
                                if ($this->session->userdata('error') <> '') {
                                    echo '<div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="ti ti-alert"></i>&nbsp; <strong>Error!</strong><p>' . $this->session->userdata("error") . '</p>
            </div>';
                                }
                                if ($this->session->userdata('message') <> '') {
                                    echo '<div class="alert alert-dismissable alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><p><i class="ti ti-check"></i>&nbsp; ' . $this->session->userdata("message") . '</p></strong>
            </div>';
                                }
                                if (validation_errors() != false) {
                                    echo '<div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="ti ti-alert"></i>&nbsp; <strong>Error!</strong> There are some errors in your form
                <ul style="list-style-type:disc">' . validation_errors() . '</ul>
            </div>';
                                }
                                ?>
                                <?php echo $body; ?>
                            </div> <!-- .container-fluid -->
                        </div> <!-- #page-content -->
                    </div>
                    <footer role="contentinfo">
                        <div class="clearfix">
                            <ul class="list-unstyled list-inline pull-left">
                                <li><h6 style="margin: 0;">&copy; <?php echo date('Y'); ?> Trusted Edge Consult. By Xown Solutions Ltd</h6></li>
                               
                            </ul>
                            <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

    </body>
</html>
