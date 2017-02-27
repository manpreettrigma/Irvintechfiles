<script src="<?php echo base_url(); ?>assets/public/js/angular.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/flatpickr.min.css">
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
						<h2>Add Meeting</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<form class="form-horizontal form-label-left"  id="edit_product_form" name="edit_product_form" enctype="multipart/form-data" method="POST" action="<?php echo base_url();?>admin/mastercatalog/processMeeting">
							<div class="form-group">
								<label for="product-title" class="control-label col-md-4 col-sm-3 col-xs-12">Meeting Title<span class="">*</span>
								</label>
								<div class="col-md-8 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" name="adobe_meeting[title]" placeholder="Enter event title" value="<?php echo set_value('adobe_meeting[title]', ''); ?>" class="form-controller">
									<?php echo form_error('adobe_meeting[title]', '<p class="red">', '</p>'); ?>
								</div> 
							</div>
							<div class="form-group">
								<label for="product-title" class="control-label col-md-4 col-sm-3 col-xs-12">Start Date &amp; Time<span class="">*</span>
								</label>
								<div class="col-md-8 col-sm-6 col-xs-12 form-group has-feedback">
									<input class="flatpickr form-controller" type="text" name="adobe_meeting[date_begin]" placeholder="Select Date.." data-enable-time="true" value="<?php echo set_value('adobe_meeting[date_begin]', ''); ?>">
									<?php echo form_error('adobe_meeting[date_begin]', '<p class="red">', '</p>'); ?>
								</div> 
							</div>
							<div class="form-group">
								<label for="product-title" class="control-label col-md-4 col-sm-3 col-xs-12">End Date &amp; Time<span class="">*</span>
								</label>
								<div class="col-md-8 col-sm-6 col-xs-12 form-group has-feedback">
									<input class="flatpickr form-controller" type="text" name="adobe_meeting[date_end]" placeholder="Select Date.." data-enable-time="true" value="<?php echo set_value('adobe_meeting[date_end]', ''); ?>">
									<?php echo form_error('adobe_meeting[date_end]', '<p class="red">', '</p>'); ?>
								</div> 
							</div>
							<div class="form-group">
								<label for="product-title" class="control-label col-md-4 col-sm-3 col-xs-12">Folder Parent
								</label>
								<div class="col-md-8 col-sm-6 col-xs-12 form-group has-feedback">
									<select name="adobe_meeting[folder_id]">										
										<?php
											if (!empty($get_folder)) {
												foreach ($get_folder as $key => $folder) {
													echo '<option value="' . $folder['folder_id'] . '">' . $folder['title'] . '</option>';
												}
											}
										?>
									</select>
									<?php echo form_error('adobe_meeting[folder_id]', '<p class="red">', '</p>'); ?>
								</div> 
							</div>
							<div ng-app="">
								<div class="form-group">
									<label for="product_headline" class="control-label col-md-4 col-sm-3 col-xs-12">Slug<span class="">*</span> <br>(https://cleseminars.adobeconnect.com/{{adobe_meeting[url]}})
									</label>
									<div class="col-md-8 col-sm-6 col-xs-12">
										<input type="text" ng-model="adobe_meeting[url]" name="adobe_meeting[url]" placeholder="computer_science, engineering, mca etc" value="<?php echo set_value('adobe_meeting[url]', ''); ?>">
										<?php echo form_error('adobe_meeting[url]', '<p class="red">', '</p>'); ?>
									</div>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<input type="hidden" name="adobe_meeting[user_id]" value="<?php if(isset($get_profile) && !empty($get_profile['id'])) { echo $get_profile['id']; } ?>">
									<input type="hidden" name="adobe_meeting[created_at]" value="<?php echo date('Y-m-d H:i:s'); ?>">
									<button type="submit" name="create_adobe_folder"  class="btn btn-success">Create Meeting</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/public/js/flatpickr.js"></script>
<script src="<?php echo base_url(); ?>assets/public/js/flatdatejquery.js"></script>