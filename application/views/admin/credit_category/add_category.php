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
						<h2>Add Category</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form class="form-horizontal form-label-left"  id="edit_product_form" name="edit_product_form" action= "<?php echo base_url();?>admin/creditcategory/processCategory" method="POST">
							<div class="form-group">
								<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Title<span class="">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" name="title" placeholder="Enter event title" value="<?php echo set_value('title', ''); ?> "class="form-controller">
									<?php echo form_error('title', '<p class="red">', '</p>'); ?>
								</div> 
							</div>							
							<div class="form-group">
								<label for="product_headline" class="control-label col-md-2 col-sm-3 col-xs-12">Description
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12">
									<textarea class="provider_textarea" name="description" placeholder="Enter folder description" class="form-control required"><?php echo set_value('description', ''); ?></textarea>
									
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit"  class="btn btn-success">Create Category</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>