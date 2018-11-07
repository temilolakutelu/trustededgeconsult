<link type="text/css" href="<?php echo base_url(); ?>assets/css/form.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/form-autosize/jquery.autosize-min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/form.js"></script>

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
			<h2>Add New Category</h2>
			<div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
		</div>
		<div class="panel-editbox" data-widget-controls=""></div>
		<div class="panel-body">

        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" />
        </div>
	   
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('category') ?>" class="btn btn-danger">Cancel</a>
	</form>
</div>
</div>
