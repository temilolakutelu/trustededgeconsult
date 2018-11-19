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
					<h2>All Posts </h2>
					<div class="panel-ctrls">
            <div class="pull-left list-button" >
              <?php echo anchor(site_url('blog/create'), 'Create', array('class' => 'btn btn-primary')); ?>
            </div>
           
          </div>
				</div>
        <div class="panel-body no-padding">
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<th class="hidden"></th>
								<th>Post Title</th>
                <th>Author</th>
								<th>Tag</th>
								<th>Summary</th>
                <th>Views</th>
                <th>Image</th>
                <th>Date Published</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

              <?php

              foreach ($post_data as $posts) { ?>
             
                    <tr class="odd gradeX">
          								<td class="hidden"></td>
                                        <td><?= $posts->title; ?></td>
                                        <td><?= $posts->author; ?></td>
                                           <td><?= $posts->tag; ?></td>
                                            <td><?= $posts->subtitle; ?></td>
                                            <td><?= $posts->views; ?></td>
                                            <td><img src="<?php base_url() ?>../img/blog/<?= $posts->image; ?>" class="img-responsive" width="100px"></td>
                                            <td><?= $posts->date; ?></td>
                                            <td style="width:15%"><?= anchor(site_url('blog/edit/' . $posts->blogID), 'Edit', array('class' => 'btn btn-primary btn-sm')) . ' ' . anchor(site_url('blog/delete/' . $posts->blogID), 'Delete', array('class' => 'btn btn-danger btn-sm')) ?>
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
