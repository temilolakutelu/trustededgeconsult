
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
        <h2>Add New Feedback</h2>
    </div>
    <div class="panel-body">
       <form action="<?= site_url('feedback/create_action'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-5"> 
                <label for="name">Full Name<span class="required">*</span></label>
                <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>"  
                title="Only Alphanumeric allowed" />
            </div>
            
            <div class="form-group col-md-5"> 
                <label for="email">Email<span class="required">*</span></label>
                <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>"  
                title="Only Alphanumeric allowed" />
            </div>

            <div class="form-group col-md-10">
                <label for="message">Message<span class="required">*</span></label>
                <textarea class="form-control autosize" rows="3" name="message" id="summernote"><?php echo set_value('message'); ?></textarea>
            </div>
           
       <div class="form-group col-md-3">&nbsp;
       </div>
        <input type="submit" class="finish btn-success btn form-group col-md-3" value="<?= $button; ?>" />
       </form>
    </div>
</div>

<script>
//CKEDITOR.replace( 'message' );
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

