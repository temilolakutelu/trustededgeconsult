
<link href="<?php echo base_url(); ?>assets/summernote/summernote.css" rel="stylesheet">
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
<script  type="text/javascript" src="<?php echo base_url(); ?>assets/summernote/summernote.min.js"></script>

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
        <h2>Edit Job</h2>
        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
    </div>
    <div class="panel-editbox" data-widget-controls=""></div>
    <div class="panel-body">
        <form action="<?= site_url('photos/edit_action') ?>" method="post" enctype="multipart/form-data">            
        <div class="form-group col-md-5">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id='email'  value="<?php echo $email; ?>"/>
            </div>
            <div class="form-group col-sm-5">
                <label for="title">Job Title<span class="required"> *</span></label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo $title; ?>" />
            </div>
        
            <div class="form-group col-sm-5">
                <label for="url">Application url<span class="required"> *</span></label>
                <input type="text" class="form-control" name="url" id="url" value="<?php echo $url; ?>" />
            </div>
            <div class="form-group col-sm-5">
                <label for="name">Company Name<span class="required"> *</span></label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" />
            </div>
            <div class="form-group col-sm-5">
                <label for="website">Website<span class="required"> *</span></label>
                <input type="text" class="form-control" name="website" id="website" value="<?php echo $website; ?>" />
            </div>
            <div class="form-group col-sm-5">
                <label for="tagline">Tagline<span class="required"> *</span></label>
                <input type="text" class="form-control" name="tagline" id="tagline" value="<?php echo $tagline; ?>" />
            </div>
            <div class="form-group col-md-10">
                <label for="video">Video Link <span class="required">*(Youtube link e.g. https://www.youtube.com/embed/dZKXteMyXQ0?rel=0&autoplay=1)</span></label>
                <input type="text" class="form-control" name="video" placeholder="Web reference" value="<?php echo $video; ?>"/>
            </div>
            <div class="form-group col-sm-5">
                <label for="twitter_name">Twitter Username</label>
                <input type="text" class="form-control" name="twitter_name" id="twitter_name" value="<?php echo $twitter_name; ?>" />
            </div>
          
            <div class="form-group col-sm-5">
                <label for="date">Closing Date<span class="required"> *</span></label>
                <input type="date" class="form-control" name="date" id="date" value="<?= set_value('date'); ?>" />
            </div>
            <div class="form-group col-md-10">
                <label for="logo" class="control-label">Company Logo <span class="required">*(Width:1090px by 750px)</span></label>
                <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
                    <div>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="logo" name="logo"></span>
                    </div>
                </div>
            </div>
            
           
            <div class="form-group col-md-10">
                <label for="health_history">Job Description<span class="required">*</span></label>
                <textarea class="form-control autosize" rows="3" name="description" id="summernote"><?php echo set_value('description'); ?></textarea>
            </div>
           
       <div class="form-group col-md-3">&nbsp;
       </div>
        <input type="submit" class="finish btn-success btn form-group col-md-3" value="<?= $button; ?>" />
       </form>
    </div>
</div>

<script>
//CKEDITOR.replace( 'description' );
</script>


<script type="text/javascript">
$(document).ready(function() {
	$('#summernote').summernote({
		height: "200px",
		styleWithSpan: false
	});
});

</script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote1').summernote({
		height: "200px",
		styleWithSpan: false
	});
});

</script>


