<!DOCTYPE html>
<html lang="en" class="coming-soon">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->config->item('app_name') .' | '. $title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="author" content="Tobi Taiwo|ttobi4@gmail.com">
     <link rel="shortcut icon"href="<?php echo base_url(); ?>assets/images/fav.jpg" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/fav.jpg" type="image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/914c709366.css">
        <link type="text/css" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/minimal/blue.css" rel="stylesheet">

    </head>

    <body class="focused-form animated-content" style="margin-top: 40px;">
        <div class="container" id="login-form">
            
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
    
                        <div class="panel-heading">
                            <p> <img src="<?php echo base_url(); ?>assets/images/logo.png" class="img-responsive col-sm-4 col-sm-offset-4" style="width: 100%; margin: 0px; margin-bottom: 10px;" /></p>
                            <h2>Reset Password</h2>
                        </div>
                        <?php
                            if ($this->session->userdata('error') <> '') {
                                echo '<div class="alert alert-dismissable alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="ti ti-alert"></i>&nbsp; <strong>Error!</strong>
                                        <p>' . $this->session->userdata("error") . '</p>
                                    </div>';
                            }
                        if ($this->session->userdata('message') <> '') {
                                echo '<div class="alert alert-dismissable alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="ti ti-alert"></i>&nbsp;<p>' . $this->session->userdata("message") . '</p>
                                    </div>';
                            }
                        ?>
                        <form action="<?php echo site_url('welcome/reset_action'); ?>" class="form-horizontal" id="validate-form" method="POST">
                            <div class="panel-body">

                                <div class="form-group mb-md">
                                        <div class="col-xs-12">
                                            <div class="input-group">							
                                                <span class="input-group-addon">
                                                    <i class="ti ti-envelope"></i>
                                                </span>
                                                <input type="text" name="email" class="form-control" placeholder="Email" data-parsley-minlength="6" placeholder="At least 6 characters" required>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="panel-footer text-center">
                            <div class="clearfix">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </div>
                        
                         <div class="panel-footer text-center">
                          <span>Registered?</span><a href="<?= site_url('welcome/login'); ?>" > Login Here!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Load site level scripts -->
        <script src="https://code.jquery.com/jquery-1.10.2.min.js" integrity="sha256-C6CB9UYIS9UJeqinPHWTHVqh/E1uhG5Twh+Y5qFQmYg=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.min.js" integrity="sha256-lnH4vnCtlKU2LmD0ZW1dU7ohTTKrcKP50WA9fa350cE=" crossorigin="anonymous"></script>
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

    </body>
</html>