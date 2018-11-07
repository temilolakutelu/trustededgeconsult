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
					<h2>All Registered Trainees </h2>
				</div>
        <div class="panel-body no-padding">
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<th class="hidden"></th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
                <th>Course</th>
                <th>Course Category</th>
                <th>Date-Registered</th>
							</tr>
						</thead>
						<tbody>
            <?php

            foreach ($register_data as $reg) { ?>

      <tr class="odd gradeX">
            <td class="hidden"></td>
                          <td><?= $reg->trainee_name; ?></td>
                          <td><?= $reg->email; ?></td>
                             <td><?= $reg->mobile; ?></td>
                              <td><?= $reg->course; ?></td>
                          <td><?= $reg->category; ?></td>
                              <td><?= $reg->date; ?></td>
                            <td style="width:15%"><?= anchor(site_url('register/delete/' . $reg->register_id), 'Delete', array('class' => 'btn btn-danger btn-sm')) ?>
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
