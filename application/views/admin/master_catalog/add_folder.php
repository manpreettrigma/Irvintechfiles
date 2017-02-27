<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Page</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Add Folder Creation</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form class="form-horizontal form-label-left"  id="edit_product_form" name="edit_product_form" enctype="multipart/form-data" method="POST">
							<div class="form-group">
								<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Folder Name<span class="">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" name="adobe_folder[title]" placeholder="Enter event title" value="<?php echo set_value('adobe_folder[title]', ''); ?> "class="form-controller">
									<?php echo form_error('adobe_folder[title]', '<p class="red">', '</p>'); ?>
								</div> 
							</div>
							<div class="form-group">
								<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Folder Parent<span class="">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
									<select name="adobe_folder[folder_id]">
										<option value="">Select Folder</option>
										<?php
											if (!empty($get_folder)) {
												foreach ($get_folder as $key => $folder) { ?>
												<option value=" <?php echo $folder['folder_id'] ;?>" <?php set_select('adobe_folder[folder_id]',$folder['folder_id']);?>><?php echo $folder['title']; ?> </option>
												<?php }
											}
										?>
									</select>
									<?php echo form_error('adobe_folder[folder_id]', '<p class="red">', '</p>'); ?>
								</div> 
							</div>
							<div class="form-group">
								<label for="product_headline" class="control-label col-md-2 col-sm-3 col-xs-12">Summary:(max length=4000 characters)
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12">
									<textarea class="provider_textarea" name="adobe_folder[desc]" placeholder="Enter folder description" class="form-control required"><?php echo set_value('desc[desc]', ''); ?></textarea>
									
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit" name="create_adobe_folder"  class="btn btn-success">Create Folder</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>