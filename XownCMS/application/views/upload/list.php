<link type="text/css" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url(); ?>assets/datatables/dataTables.themify.css" rel="stylesheet">
<link type="text/css" href="<?php echo base_url(); ?>assets/css/list.css" rel="stylesheet">

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

<div data-widget-group="group1">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default list-panel">
				<div class="panel-heading">
					<h2>All Documents </h2>
					<div class="panel-ctrls">
            <div class="pull-left list-button" >
							<?php echo anchor(site_url('upload/create'), 'Add', array('class' => 'btn btn-primary')); ?>
            </div>
          </div>
				</div>
        <div class="panel-body no-padding">
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<th class="hidden"></th>
								<th>File name</th>
								<th>Document Url</th>
								<th>Date added</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
              <?php
													foreach ($Upload_lists as $row) { ?>
							<tr>
								<td class="hidden"></td>
								<td><?= $row->filename; ?></td>
								<td class="center"><a target="_blank" href="http://<?= $row->url; ?>"><?= $row->url; ?></a></td>
								<td><?= $row->date; ?></td>
							
								<td class="center">
									<a class="btn btn-sm btn-info" href="<?= site_url('upload/edit/' . $row->doc_id); ?>">
										<i class="halflings-icon white edit"></i> Edit  
									</a>
									<a class="btn btn-sm btn-danger" href="<?= site_url('upload/delete/' . $row->doc_id); ?>">
										<i class="halflings-icon white trash"></i> Delete
									</a>
								</td>
							</tr>
                           <?php 
																									} ?>
              </tbody>
            </table>
          </div>
          <div class="panel-footer"></div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/datatable.js"></script>
