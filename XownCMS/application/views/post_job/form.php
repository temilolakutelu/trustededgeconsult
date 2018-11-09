     
<link href="<?php echo base_url(); ?>assets/summernote/summernote.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url(); ?>assets/css/form.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url(); ?>assets/form-select2/select2.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-autosize/jquery.autosize-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-jasnyupload/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-stepy/jquery.stepy.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form-wizard.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form-select.js"></script>
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
        <h2>Post New Job</h2>
        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
    </div>
    <div class="panel-editbox" data-widget-controls=""></div>
    <div class="panel-body">
        <form action="<?= site_url('post_job/create_action') ?>" method="post" enctype="multipart/form-data">            
            <div class="form-group col-sm-5">
                <label for="email">Email<span class="required"> *</span></label>
                <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>" />
            </div>
            <div class="form-group col-sm-5">
                <label for="title">Job Title<span class="required"> *</span></label>
                <input type="text" class="form-control" name="title" id="title" value="<?= set_value('title'); ?>" />
            </div>
          
            <div class="form-group col-sm-5">
                <label for="url">Application URL<span class="required"> *</span></label>
                <input type="text" class="form-control" name="url" id="url" value="<?= set_value('url'); ?>" />
            </div>
            <div class="form-group col-sm-5">
                <label for="name">Company Name<span class="required"> *</span></label>
                <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name'); ?>" />
            </div>
            <div class="form-group col-sm-5">
                <label for="website">Website<span class="required"> *</span></label>
                <input type="text" class="form-control" name="website" id="website" value="<?= set_value('website'); ?>" />
            </div>
            <div class="form-group col-sm-5">
                <label for="tagline">Tagline<span class="required"> *</span></label>
                <input type="text" class="form-control" name="tagline" id="tagline" value="<?= set_value('tagline'); ?>" />
            </div>
            <div class="form-group col-md-10">
                <label for="video">Video Link <span>(Youtube link e.g. https://www.youtube.com/embed/dZKXteMyXQ0?rel=0&autoplay=1)</span></label>
                <input type="text" class="form-control" name="video" placeholder="Web reference" value="<?php echo set_value('video'); ?>"/>
            </div>
            <div class="form-group col-sm-5">
                <label for="twitter_name">Twitter Username</label>
                <input type="text" class="form-control" name="twitter_name" id="twitter_name" value="<?= set_value('twitter_name'); ?>" />
            </div>
            <div class="form-group col-sm-5">
                <label for="date">Closing Date<span class="required"> *</span></label>
                <input type="date" class="form-control" name="date" id="date" value="<?= set_value('date'); ?>" />
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

