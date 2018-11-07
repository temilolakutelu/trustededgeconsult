<link type="text/css" href="<?php echo base_url(); ?>assets/css/form.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url(); ?>assets/form-select2/select2.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-autosize/jquery.autosize-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-jasnyupload/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-stepy/jquery.stepy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form-wizard.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form-enrollment.js"></script>


    <?php
    if ($this->session->userdata('error') <> '') {
        echo '<div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="ti ti-alert"></i>&nbsp; <strong>Error!</strong> There are some errors happening
                    <p>' . $this->session->userdata("error") . '</p>
                </div>';
    }
    ?>
    <?php
    if ($this->session->userdata('message') <> '') {
        echo '<div class="alert alert-dismissable alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><p><i class="ti ti-check"></i>&nbsp; ' . $this->session->userdata("message") . '</p></strong>
                </div>';
    }
    ?>
    <?php
    if (validation_errors() != false) {
        echo '<div class="alert alert-dismissable alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="ti ti-alert"></i>&nbsp; <strong>Error!</strong> There are some errors in your form
                    <ul style="list-style-type:disc">' . validation_errors() . '</ul>
                </div>';
    }
    ?>

<div class="panel panel-default form-panel" data-widget='{"draggable": "false"}'>
    <div class="panel-heading">
        <h2>Add Document</h2>
        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
    </div>
    <div class="panel-editbox" data-widget-controls=""></div>
    <div class="panel-body">
        <form action="<?= site_url('upload/create_action') ?>" method="post" enctype="multipart/form-data">            
            <div class="form-group col-sm-5">
                <label for="name">File name<span class="required"> *</span></label>
                <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name'); ?>" />
            </div>

						
            <div class="form-group col-md-10">
                <label for="file" class="control-label">File Upload <span class="required">*</span></label>
                <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 50%; height: 50px;"></div>
                    <div>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" id="file" name="file" required></span>
                    </div>
                </div>
            </div>
            
            <!--input type="hidden" name="id" value="<?php echo $id; ?>" /-->
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button> 
                <a href="<?php echo site_url('upload') ?>" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
