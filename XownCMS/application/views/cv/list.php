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
					<h2>All Submitted CV </h2>
					<div class="panel-ctrls">
            
          </div>
				</div>
        <div class="panel-body no-padding">
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<th class="hidden"></th>
								<th>FullName</th>
								<th>Email</th>
                <th>Qualifications</th>
                <th>Field of study</th>
                <th>grade</th>
                <th>FileUrl</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
              <?php 
              foreach ($cv_data as $rows) { ?>
             
                  <tr class="odd gradeX">
                        <td class="hidden"></td>
                                      <td><?= $rows->fullname; ?></td>
                                      <td><?= $rows->email; ?></td>
                                      <td><?= $rows->qualification; ?></td>
                                      <td style="width: 100px;overflow: hidden;display: inline-block; white-space: nowrap;"><?= $rows->field; ?></td>
                                      <td><?= $rows->grade; ?></td>
                                      <td style="width: 250px;"> <a target="_blank" href="http://www.trustededgeconsult.com/uploads/<?= $rows->url; ?>"><?= $rows->url; ?></a></td>
                                     
                                          <td style="width:15%"><?= anchor(
                                                                  site_url('cv/delete/' . $rows->cv_id),
                                                                  'Delete',
                                                                  array('class' => 'btn btn-danger btn-sm')
                                                                ) ?>
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
