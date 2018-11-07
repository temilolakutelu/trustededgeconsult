
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
        <h2>Edit Media</h2>
    </div>
    <div class="panel-body">
       <form action="<?= site_url('multimedia/edit_action'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-12">
               
                <label for="cus_id">Media Title<span class="required">*</span></label>
                <input type="text" class="form-control" name="title" value="<?php echo $title; ?>" pattern="[a-zA-Z0-9\s]+" title="Only Alphanemeric allowed" />
                
            </div>
             
            <div class="form-group col-md-12">
                <label for="staff_no">Media Link <span class="required">*(Youtube link e.g. https://www.youtube.com/embed/dZKXteMyXQ0?rel=0&autoplay=1)</span></label>
                <input type="text" class="form-control" name="reference" placeholder="Web reference" value="<?php echo $reference; ?>"/>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
       <div class="form-group col-md-3">&nbsp;
       </div>
        <input type="submit" class="finish btn-success btn form-group col-md-3" value="<?= $button; ?>" />
       </form>
    </div>
</div>

