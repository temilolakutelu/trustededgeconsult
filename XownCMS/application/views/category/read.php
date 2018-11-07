<link type="text/css" href="<?php echo base_url(); ?>assets/css/read.css" rel="stylesheet">

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

<div class="panel panel-default read-panel">
				<div class="panel-heading">
					<h2><?php echo $name; ?></h2>

					<div class="panel-ctrls">
            <?php
                  echo anchor(site_url('bloodgroup/update/'.$id), '<i class="ti ti-pencil-alt"></i>&nbsp; Edit', array('class' => 'btn btn-primary btn-sm read-icon'));
						      echo anchor(site_url('bloodgroup/delete/'.$id), '<i class="ti ti-close"></i>&nbsp; Delete', array('class' => 'btn btn-danger btn-sm read-icon'));
            ?>
					</div>
				</div>
				<div class="panel-body">
					<?php echo $description; ?>
				</div>
			</div>
