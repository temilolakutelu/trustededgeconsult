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
        <h2>Add New User</h2>
    </div>
    <div class="panel-body">
        <form action="<?php echo site_url('user_management/create_action'); ?>" method="post" id="wizard-form">
            <div class="col-sm-12">
               <div class="col-sm-6">
                <div class="form-group col-md-12">
                    <label for="reg_number">First name <span class="required">*</span> </label>
                    <input type="text" class="form-control" name="first_name" id="reg_number" placeholder="First name" value="" />
                </div>
                <div class="form-group col-md-12">
                    <label for="reg_year">Last name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="last_name" id="reg_year" placeholder="Last name" value="" />
                </div>
            
                
                </div>
                <div class="col-sm-6">
                <div class="form-group col-md-12">
                    <label for="name">Email <span class="required">*</span></label>
                    <input type="text" class="form-control" name="email" id="name" placeholder="Email" value="" required/>
                </div>
                
                <div class="form-group col-md-12">
                    <label for="name">Role <span class="required">*</span></label>
                    <select class="form-control" name="role" required>
                       <option value="">Select role</option>
                        <option value="0">Admin</option>
                        <option value="1">Super Admin</option>
                    </select>
                </div>
                </div>
            </div>
             <div class="col-sm-12">
                <div class="form-group col-sm-6">
                <input type="submit" class="finish btn-success btn" value="Add User" />
                </div>
            </div>
        </form>
    </div>
</div>

<script>
/*$(".checkit").click(function(){
     $(this).find(".subclass").css("visibility","visible");
});*/
</script>

