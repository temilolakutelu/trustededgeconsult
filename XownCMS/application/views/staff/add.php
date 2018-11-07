
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
        <h2>Add New Staff</h2>
    </div>
    <div class="panel-body">
       <form action="<?= site_url('staff_profile/create_action'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-5">
               
                <label for="cus_id">Title<span class="required">*</span></label>
                <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" pattern="[a-zA-Z0-9\s]+" title="Only Alphanemeric allowed" />
                
            </div>
            
            <div class="form-group col-md-5">
               
                <label for="cus_id">Fullname<span class="required">*</span></label>
                <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholde="Full name"/>
                
            </div>
            
            <div class="form-group col-md-5">
                <label for="region_id">Department<span class="required">*</span></label>
                <select type="text" class="region_id form-control" name="dept" id="dept" required>
                    <option value=""> Select department</option>
                    <?php
                        foreach ($dept as $region) {?>
                            <option value="<?= $region->id?>"><?= $region->college?></option>
                    <?php    }
                    ?>
                </select>
            </div>
            
             <div class="form-group col-md-5">
                <label for="staff_no">Email Address<span class="required">*</span></label>
                <input type="text" class="form-control" name="email" id="staff_no" placeholder="Email" value="<?php echo set_value('email'); ?>" maxlength="120"/>
            </div>
            
            <div class="form-group col-md-5">
                <label for="staff_no">Facebook Page</label>
                <input type="text" class="form-control" name="fbook" id="fbook" placeholder="Facebook page" value="<?php echo set_value('fbook'); ?>" maxlength="120"/>
            </div>
            
            <div class="form-group col-md-5">
                <label for="staff_no">Linkedin Page</label>
                <input type="text" class="form-control" name="link" id="staff_no" placeholder="Linkedin Page" value="<?php echo set_value('linked'); ?>" maxlength="120"/>
            </div>
            
            <div class="form-group col-md-5">
                <label for="staff_no">Google-plus Page</label>
                <input type="text" class="form-control" name="gplus" id="staff_no" placeholder="Google-plus Page" value="<?php echo set_value('gplus'); ?>" maxlength="120"/>
            </div>
            
            
             <div class="form-group col-md-5">
                <label for="image" class="control-label">Passport Photo (Width:200px by 200px)</label>
                <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
                    <div>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="image" name="image" required></span>
                    </div>
                </div>
            </div>
            
            
            <div class="form-group col-md-5">
                <label for="image" class="control-label">Upload CV (PDF Format)</label>
                <div class="fileinput fileinput-new" style="width: 100%;" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail mb20" data-trigger="fileinput" style="width: 100%; height: 150px;"></div>
                    <div>
                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select PDF File</span><span class="fileinput-exists">Change</span><input type="file" id="image" name="pdf" required></span>
                    </div>
                </div>
            </div>
           
          
            <div class="form-group col-md-10">
                <label for="health_history">Biography </label>
                <textarea class="form-control autosize" rows="3" name="biography" id="summernote1"><?php echo set_value('content'); ?></textarea>
            </div>
            
             <div class="form-group col-md-10">
                <label for="health_history">Publications </label>
                <textarea class="form-control autosize" rows="3" name="public" id="summernote2"><?php echo set_value('public'); ?></textarea>
            </div>
            
            <div class="form-group col-md-10">
                <label for="health_history">Research </label>
                <textarea class="form-control autosize" rows="3" name="research" id="summernote3"><?php echo set_value('research'); ?></textarea>
            </div>
            
            <div class="form-group col-md-10">
                <label for="health_history">Conference </label>
                <textarea class="form-control autosize" rows="3" name="conference" id="summernote4"><?php echo set_value('conference'); ?></textarea>
            </div>
            
            <div class="form-group col-md-10">
                <label for="health_history">Courses </label>
                <textarea class="form-control autosize" rows="3" name="course" id="summernote5"><?php echo set_value('course'); ?></textarea>
            </div>
            
            <div class="form-group col-md-10">
                <label for="health_history">Profesional Qualifications </label>
                <textarea class="form-control autosize" rows="3" name="qualification" id="summernote6"><?php echo set_value('qualification'); ?></textarea>
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
	$('#summernote1').summernote({
		height: "200px",
		styleWithSpan: false
	});
});

</script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote2').summernote({
		height: "200px",
		styleWithSpan: false
	});
});

</script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote3').summernote({
		height: "200px",
		styleWithSpan: false
	});
});

</script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote4').summernote({
		height: "200px",
		styleWithSpan: false
	});
});

</script>

v

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote5').summernote({
		height: "200px",
		styleWithSpan: false
	});
});

</script>

<script type="text/javascript">
$(document).ready(function() {
	$('#summernote6').summernote({
		height: "200px",
		styleWithSpan: false
	});
});

</script>
