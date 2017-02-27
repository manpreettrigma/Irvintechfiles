<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Adobe Meeting</h3>
			</div>			
		</div>
		
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>List of Meeting</h2>
						
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<a href="<?php echo base_url(); ?>admin/mastercatalog/create_adobe_meeting"><button class="btn btn-success btn-sm" type="submit"><i class="fa  fa-plus-square"></i> Add Meeting</button></a>
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
									<th>URL</th>
									<th>Start Date</th>
									<th>End Date</th>
									<th>Action</th>								
								</tr>
							</thead>
							<tbody >								
								<?php
									if (!empty($get_meeting)) {
										foreach ($get_meeting as $key => $meeting) {     
											?><tr class="active">
											<td><?php echo $meeting['title']; ?></td>
											<td><a href="<?php echo $meeting['url']; ?>" target="_blank"><?php echo $meeting['url']; ?></a></td>
											<td><?php echo $meeting['date_begin']; ?></td>
											<td><?php echo $meeting['date_end']; ?></td>
											<td><a href="<?php echo base_url(); ?>account/provider/delete/adobe-meeting/<?php echo $meeting['id']; ?>" onclick="return confirm('Are you sure you want to delete?');">DELETE</a></td>
											</tr><?php
										}
									}
									else{
										echo '<tr class="active"><td colspan="6" align="center">No Meeting Found.....</td></tr>';
									}
								?>
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