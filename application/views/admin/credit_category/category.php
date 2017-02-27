<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Credit Category</h3>
			</div>			
		</div>
		
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>List of Categories</h2>
						
						<ul class="nav navbar-right panel_toolbox">
							<li>
								<a href="<?php echo base_url(); ?>admin/creditcategory/add_category"><button class="btn btn-success btn-sm" type="submit"><i class="fa  fa-plus-square"></i> Add Category</button></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<?php echo $this->session->flashdata('flash_data'); ?>					
					<div class="x_content ">
						<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"  width="100%">
							<thead>
								<tr>									
									<th>Id</th>
									<th>Title</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody >		
								<?php if(!empty($get_category)){?>
									<?php foreach ($get_category as $cate) { ?>
										<tr>
											<td><?php echo $cate['id']; ?></td>										
											<td><?php echo $cate['title']; ?></td>
											<td><?php echo $cate['description']; ?></td>
											<td>
												<a title="Edit" class="btn btn-success btn-xs " href="<?php echo base_url() . "admin/creditcategory/edit_category/" . $cate['id']; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
												<a title="Delete" onclick="return confirm('Are you sure to want to delete?');" class="btn btn-danger btn-xs" href="<?php echo base_url() . "admin/creditcategory/deleteCategory/" . $cate['id']; ?>"><i class="fa fa-trash-o"></i></a>
											</td>
										</tr>
									<?php } ?>
								<?php } ?>
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