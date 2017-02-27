<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Manage Webinars</h3>
			</div>			
			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">						
						<fieldset>
							<input class="form-control"   id="s"  type="search" placeholder="Search for course"/>
						</fieldset>						
					</div>
				</div>
			</div>
		</div>		
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>List of Webinars</h2>						
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<a href="<?php echo base_url(); ?>admin/mastercatalog/add_mastercatalog"><button class="btn btn-success btn-sm" type="submit"><i class="fa  fa-plus-square"></i> Add Webinar</button></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<?php echo $this->session->flashdata('flash_data'); ?>					
					<div class="x_content ">
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"  width="100%">
							<thead>
								<tr>
									<th>Title</th>
									<th>Type</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody >								
								<?php foreach ($catalog_records as $catalogs) { ?>
									<tr>
										<td><?php echo $catalogs['title']; ?></td>
										<td>
											<?php
												if ($catalogs['type'] == 1) {
													echo "<p>Live Webinar</p>";
												}
												if ($catalogs['type'] ==2) {
													echo "<p>On Demand Webinar</p>";
												}
											?>
										</td>
										<td><?php echo $catalogs['start_date']; ?></td>
										<td><?php echo $catalogs['end_date']; ?></td>										
										<td><?php
											if ($catalogs['status'] == 0) {
												echo "<p style='color:rgb(255, 193, 14)'>Inactive</p>";
											}
											if ($catalogs['status'] == 1) {
												echo "<p style='color:green;'>Active</p>";
											}
										?>
										</td>
										<td>											
											<div class="modal fade" id="viewMetaData_<?php echo $catalogs['catalog_event_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title" id="exampleModalLabel">View Webinar</h4>
														</div>
														<div class="modal-body">
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Topic Tag</label>
																	</div>
																</div>
																<div class="col-md-9"><?php echo $catalogs['topic_tag']; ?></div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Meeting Room</label>
																	</div>
																</div>
																<div class="col-md-9"><?php echo $catalogs['meeting_room']; ?></div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Speaker Events</label>
																	</div>
																</div>
																<div class="col-md-9"><?php echo getSpeaker($catalogs['speaker_events'],2); ?></div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Credit Events</label>
																	</div>
																</div>
																<div class="col-md-9"><?php echo $catalogs['credit_events']; ?></div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Price</label>
																	</div>
																</div>
																<div class="col-md-9"><?php echo $catalogs['price']; ?></div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Short Description</label>
																	</div>
																</div>
																<div class="col-md-9"><?php echo $catalogs['short_desc']; ?></div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Longer Description</label>
																	</div>
																</div>
																<div class="col-md-9"><?php echo $catalogs['longer_desc']; ?></div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Handout Pdf</label>
																	</div>
																</div>
																<div class="col-md-9"><?php if(!empty($catalogs['pdf'])){ ?><a href="<?php echo $catalogs['pdf']; ?>">Click to view</a><?php } else{ echo 'NA'; }?></div>
															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="recipient-name" class="control-label">Event Image</label>
																	</div>
																</div>
																<div class="col-md-9"><img src="<?php echo $catalogs['thumb_img']; ?>"></div>
															</div>															
														</div>
													</div>
												</div>
											</div>
											
											<a title="View" class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewMetaData_<?php echo $catalogs['catalog_event_id']; ?>" data-whatever="@getbootstrap"><i class="fa fa-folder"></i></a>
											<?php if ($catalogs['status'] == 1) { ?>
												<a title="Deactivate" class="btn btn-danger btn-xs " href="<?php echo base_url() . "admin/mastercatalog/block_catalogevent/" . $catalogs['catalog_event_id']; ?>"><i class="glyphicon glyphicon-remove"></i></a> 
											<?php } if ($catalogs['status'] == 0) { ?>
												<a title="Activate" class="btn btn-success btn-xs " href="<?php echo base_url() . "admin/mastercatalog/unblock_catalogevent/" . $catalogs['catalog_event_id']; ?>"><i class="glyphicon glyphicon-ok"></i></a> 
											<?php } ?>
											<a title="Edit" class="btn btn-success btn-xs " href="<?php echo base_url() . "admin/mastercatalog/edit_catalog/" . $catalogs['catalog_event_id']; ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
											<a title="Delete" onclick="return confirm('Are you sure to want to delete?');" class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/mastercatalog/delete/" . $catalogs['catalog_event_id']; ?>"><i class="fa fa-trash-o"></i></a>
										</td>
									</tr><?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>/public/js/admin/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script>
	// var jq = jQuery.noConflict();
	// jq(document).ready(function () {
        // jq('#datatable-responsive').DataTable({
	// "bProcessing": true,
	// "serverSide": true,
	// "ajax": {
	// url: "<?php echo base_url(); ?>admin/course/admin_data_table",
	// type: "post",
	// error: function () {
	// jq("#employee_grid_processing").css("display", "none");
	// }
	// }
	
        // });
	// });
	
	
</script> 