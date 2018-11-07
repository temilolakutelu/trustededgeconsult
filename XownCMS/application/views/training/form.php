
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
        <h2>Add New Training</h2>
    </div>
    <div class="panel-body">
       <form action="<?= site_url('training/create_action'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-5"> 
                <label for="title">Training Title<span class="required">*</span></label>
                <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>"  title="Only Alphanumeric allowed" />
            </div>
            <div class="form-group col-md-5">
                <label for="category" class="control-label">Select Category <span class="required">*</span></label>
                <select name="category" class='form-control'>
                    <?php foreach ($result as $option) : ?>
                    <option value="<?php echo $option->category_id; ?>">
                    <?php echo $option->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group col-md-5">
                <label for="from" class="control-label">Start Date <span class="required">*</span></label>
                <div class="input-group date datepicker-pastdisabled">
                    <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                    <input type="text" name="from" id="from" class="form-control">
                </div>
            </div>
            <div class="form-group col-md-5">
                <label for="to" class="control-label">Ending Date <span class="required">*</span></label>
                <div class="input-group date datepicker-pastdisabled">
                    <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                    <input type="text" name="to" id="to" class="form-control">
                </div>
                
            </div>
            
          <div class="form-group col-md-10">
          <label for="image" class="control-label">Image <span class="required">*(Width:1024px by 600px)</span></label>
                <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
                    <div>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="image" name="image" required></span>
                    </div>
                </div>
            </div>
            
            <div class="form-group col-md-10">
                <label for="health_history">Training Details<span class="required">*</span></label>
                <textarea class="form-control autosize" rows="3" name="content" id="summernote"><?php echo set_value('content'); ?></textarea>
            </div>
           
       <div class="form-group col-md-3">&nbsp;
       </div>
        <input type="submit" class="finish btn-success btn form-group col-md-3" value="<?= $button; ?>" />
       </form>
    </div>
</div>

<script>
//CKEDITOR.replace( 'content' );
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

