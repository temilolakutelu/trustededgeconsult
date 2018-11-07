<link type="text/css" href="<?php echo base_url(); ?>assets/css/form.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-stepy/jquery.stepy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form-wizard.js"></script>

<?php
    if ($this->session->userdata('error') <> '') {
        echo '<div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="ti ti-alert"></i>&nbsp; <strong>Error!</strong> There are some errors happening
                <p>' . $this->session->userdata("error") . '</p>
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
<div class="panel panel-info form-panel" data-widget='{"draggable": "false"}'>
    <div class="panel-heading">
        <h2>Change Password</h2>
    </div>
    <div class="panel-body">
        <form action="<?php echo site_url('user_management/update_password_action'); ?>" method="post" id="wizard-form">
            
                <div class="form-group col-md-6">
                    <label for="reg_number">old Password <span class="required">*</span> </label>
                    <input type="password" class="form-control" name="old_pass" id="reg_number" placeholder="Old Password" value="" />
                </div>
                <div class="form-group col-md-6">
                    <label for="reg_year">New Password <span class="required">*</span></label>
                    <input type="password" class="form-control" name="new_pass" id="reg_year" placeholder="New Password" value="" />
                </div>
               
               
            <div class="form-group col-md-6">
            <input type="submit" class="finish btn-success btn" value="Change password" />
            </div>
        </form>
    </div>
</div>

<script>
/*$(".checkit").click(function(){
     $(this).find(".subclass").css("visibility","visible");
});*/
</script>

