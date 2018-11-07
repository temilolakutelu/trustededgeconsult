
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
        <h2>Add New Page</h2>
    </div>
    <div class="panel-body">
       <form action="<?= site_url('newspage/edit_action'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-5">
               <input type="hidden"  name="id" value="<?= $id; ?>">
                <label for="cus_id">News Title<span class="required">*</span></label>
                <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" pattern="[a-zA-Z0-9\s]+" title="Only Alphanemeric allowed" />
                
            </div>
            
            <div class="form-group col-md-5">
               
                <label for="cus_id">News Title Summary <span class="required">*</span></label>
                <input type="text" class="form-control" name="brief" value="<?php echo $brief; ?>" pattern="[a-zA-Z0-9\s]+" title="Only Alphanemeric allowed" maxlength="35" />
                
            </div>
            
             <div class="form-group col-md-5">
                <label for="staff_no">News description/summary<span class="required">*</span></label>
                <input type="text" class="form-control" name="description" id="staff_no" placeholder="Description" value="<?php echo $description; ?>" maxlength="120"/>
            </div>
            
            <div class="form-group col-md-5">
                <label for="staff_no">Web reference <span class="required">* (Demarcate words with _ or -)</span></label>
                <input type="text" class="form-control" name="reference" placeholder="Web reference" value="<?php echo $reference; ?>" pattern="[a-zA-Z0-9_-]*$" title="Only _ or - special character allowed"/>
            </div>
            
             <div class="form-group col-md-5">
                <label for="image" class="control-label">News Image (Width:450px by 300px)</label>
                <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
                    <div>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="image" name="image"></span>
                    </div>
                </div>
            </div>
           
          
            <div class="form-group col-md-10">
                <label for="health_history">Contents<span class="required">*</span></label>
                <textarea class="form-control autosize" rows="3" name="content" id="summernote"><?php echo $content; ?></textarea>
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
		height: "300px",
		styleWithSpan: false
	});
});

</script>

