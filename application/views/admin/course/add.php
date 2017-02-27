<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/flatpickr.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/samples/js/sample.js"></script>
<style>
	.error{
	color:#ff0000;
	}
</style>
<div class="right_col" role="main">
	<div class=""> 
		<div class="page-title">
			<div class="title_left">
				<h3>Course</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Add Course</h2>
						<div class="clearfix"></div>
					</div>
					
					<div class="x_content">
						<form class="form-horizontal form-label-left" data-parsley-validate="" id="edit_product_form" name="edit_product_form" enctype="multipart/form-data" method="POST" novalidate="" action="<?php echo base_url();?>admin/course/processCourse">													
							<div class="form-group">
								<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Title<span class="required">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" placeholder="Title" id="product-title" name="course[title]" value="<?php echo set_value('course[title]')?>" class="form-control has-feedback-left required">
									<span aria-hidden="true" class="fa fa form-control-feedback left">T</span>
									<?php echo form_error('course[title]', '<div class="error">', '</div>'); ?>
								</div> 
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Description<span class="required">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
									<textarea placeholder="Product Description" id="page_description" name="course[description]"class="form-control required"><?php echo set_value("course[description]")?></textarea>
									<span aria-hidden="true" class="fa fa form-control-feedback left">D</span>
									<?php echo form_error('course[description]', '<div class="error">', '</div>'); ?>
								</div>
							</div>
							
													
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Subject<span class="required">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12">
									<select class="form-control" id="subject" name="course[subject]" >
										<option value="">Select Subject</option>
										<?php foreach($subjects as $subject){?>
											<option value="<?php echo $subject['id']?>" <?php echo set_select("course[subject]",$subject['id']);?>><?php echo ucfirst($subject['title']); ?></option>
										<?php }?>
									</select>
									<?php echo form_error('course[subject]', '<div class="error">', '</div>'); ?>
								</div>
							</div>
							
							<div id="degree" style="display:none;">	
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Degree</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<p value="">Fill Below Forms</p>
										<?php foreach($degrees as $degree){?>
											<a id="<?php echo lcfirst($degree['title']); ?>" href="javascript:void(0)" style="background: #c9c9c9; padding: 10px; border-radius: 5px;"><?php echo ucfirst($degree['title']); ?></a>
										<?php }?>
									</div>
								</div>
							</div>
							<!-- SECOND LEVEL STARTS -->		
							<div id="degree-workshop" style="display:none;margin-top:30px">
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Day<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_days" name="course[workshop_day]" value="<?php echo set_value('course[workshop_day]')?>" class="form-control required">
										<?php echo form_error('course[workshop_day]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
															
								<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Instructor<span class="required">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12">
									<select class="form-control" id="subject" name="course[workshop_instructor]" >
										<option value="">Select Instructor</option>
										<?php foreach($instructors as $instructor){ ?>
											<option value="<?php echo $instructor['id']?>" <?php echo set_select("course[workshop_instructor]",$instructor['id']);?>><?php echo ucfirst($instructor['instructor_name']); ?></option>
										<?php }?>
									</select>
									<?php echo form_error('course[workshop_instructor]', '<div class="error">', '</div>'); ?>
								</div>
							</div>
								
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Time<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_time" name="course[workshop_time]" value="<?php echo set_value('course[workshop_time]')?>" class="form-control required">
										<?php echo form_error('course[workshop_time]', '<div class="error">', '</div>'); ?>
									</div>
								</div> 
								
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Learning Objectives</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[workshop_learning_objectives]" rows="3" placeholder=""><?php echo set_value('course[workshop_learning_objectives]')?></textarea>
										<?php echo form_error('course[workshop_learning_objectives]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Required Equipment</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[workshop_rtme]" rows="3" placeholder=""><?php echo set_value('course[workshop_rtme]')?></textarea>
										<?php echo form_error('course[workshop_rtme]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
							</div>
							
							<div id="degree-course" style="display:none;;margin-top:30px">
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Course Code<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="product-title" name="course[course_code]" value="<?php echo set_value('course[course_code]')?>" class="form-control required">
										<?php echo form_error('course[course_code]', '<div class="error">', '</div>'); ?>
									</div>
								</div>  
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Course Name<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="product-title" name="course[course_name]" value="<?php echo set_value('course[course_name]')?>" class="form-control required">
										<?php echo form_error('course[course_name]', '<div class="error">', '</div>'); ?>
									</div>
								</div>  
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Price<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="product-title" name="course[price]" value="<?php echo set_value('course[price]')?>" class="form-control required">			
										<?php echo form_error('course[price]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Term<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<select class="form-control" id="subject" name="course[term]" >
											<option value="">Select Term</option>
											<option value="1">Term First</option>
											<option value="2">Term Second</option>
											<option value="3">Term Third</option>
										</select>
										<?php echo form_error('course[term]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Start Date<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<input class="flatpickr form-control" type="text" name="course[start_date]" placeholder="Select Date.." data-enable-time="true" value="<?php echo set_value('course[start_date]')?>">
										<?php echo form_error('course[start_date]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">End Date<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<input class="flatpickr form-control" type="text" name="course[end_date]" placeholder="Select Date.." data-enable-time="true" value="<?php echo set_value('course[end_date]')?>">
										<?php echo form_error('course[end_date]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Course Days<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_days" name="course[course_days]" value="<?php echo set_value('course[course_days]')?>" class="form-control required">
										<?php echo form_error('course[course_days]', '<div class="error">', '</div>'); ?>
									</div>
								</div> 
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Course Time<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_time" name="course[course_time]" value="<?php echo set_value('course[course_time]')?>" class="form-control required">
										<?php echo form_error('course[course_time]', '<div class="error">', '</div>'); ?>
									</div>
								</div> 
								
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Learning Objectives</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[learning_objectives]" rows="3" placeholder=""><?php echo set_value('course[learning_objectives]')?></textarea>
										<?php echo form_error('course[learning_objectives]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Required Textbooks, Materials, & Equipment</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[rtme]" rows="3" placeholder=""><?php echo set_value('course[rtme]')?></textarea>
										<?php echo form_error('course[rtme]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Assignments & Method of Evaluation</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[ame]" rows="3" placeholder=""><?php echo set_value('course[ame]')?></textarea>
										<?php echo form_error('course[ame]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Topics</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[topics]" rows="3" placeholder=""><?php echo set_value('course[topics]')?></textarea>
										<?php echo form_error('course[topics]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Prerequisites</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[prerequisites]" rows="3" placeholder=""><?php echo set_value('course[prerequisites]')?></textarea>
										<?php echo form_error('course[prerequisites]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								
							</div>
							
							<div id="degree-diploma" style="display:none;;margin-top:30px">
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Certificate Description</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[certificate_desc]" rows="3" placeholder=""><?php echo set_value('course[certificate_desc]')?></textarea>
										<?php echo form_error('course[certificate_desc]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Required Equipment</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[certificate_rtme]" rows="3" placeholder=""><?php echo set_value('course[certificate_rtme]')?></textarea>
										<?php echo form_error('course[certificate_rtme]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
							</div>
							
							<!-- SECOND LEVEL END -->			
							<br>
							<div class="form-group">
								<label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12">
									<input type="hidden" value="" name="upload_image" >
									<input type="file" name="course_image" size="20" id="fileUpload" />
									<?php echo form_error('course_image', '<div class="error">', '</div>'); ?>
								</div>
							</div>
							
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/course">Cancel</a>
									<button id="sumbit_dropzone" class="btn btn-success" type="submit"> <i class="fa fa-plus-square" style="color:rgb(228, 228, 228) !important; font-size:18px;padding:0px;"> </i> Save</button>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	CKEDITOR.replace('page_description');		
	$(document).ready(function(){
		if($('#subject').val() == '') {
			$('#degree').hide(); 
		}
		else {
			$('#degree').show(); 
		} 
	})
	$(function() {		
		$('#subject').change(function(){			
			if($('#subject').val() == 'subject') {
				$('#degree').hide(); 
			}
			else {
				$('#degree').show(); 
			} 
		});
		
		$('#workshops').click(function(){
			$('#degree-workshop').show(); 
			$('#degree-workshop').focus(); 
			$('#degree-diploma').hide(); 
			$('#degree-course').hide(); 
		});
		
		$('#courses').click(function(){
			$('#degree-course').show(); 
			$('#degree-workshop').hide(); 
			$('#degree-diploma').hide(); 
			
		});
		
		$('#certificates, #diplomas').click(function(){
			$('#degree-diploma').show(); 
			$('#degree-workshop').hide(); 
			$('#degree-course').hide(); 
		});
		
		
	});
</script>
<script src="<?php echo base_url(); ?>assets/public/js/flatpickr.js"></script>
<script src="<?php echo base_url(); ?>assets/public/js/flatdatejquery.js"></script>