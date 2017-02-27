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
						<h2>Edit Course</h2>
						<div class="clearfix"></div>
					</div>
					
					<div class="x_content">
						<?php
							if ($this->session->flashdata('course_message')) {
								$message = $this->session->flashdata('course_message');
							?>
							<div class="<?php echo $message; ?>"><?php echo $message; ?>							
							</div>
							<?php
							}
						?>						
						<form class="form-horizontal form-label-left" data-parsley-validate="" id="edit_course_form" name="edit_course_form" enctype="multipart/form-data" method="POST" novalidate="" action="<?php echo base_url();?>admin/course/updateCourse">
							<input type="hidden" name="id" value="<?php echo $course_data->id; ?>">
							<div class="form-group">
								<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Title<span class="required">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" placeholder="Title" id="" name="course[title]" value="<?php if(isset( $course_data -> title )) {echo  $course_data -> title ; } else { echo set_value('course[title]'); } ?>" class="form-control required">	
									<?php echo form_error('course[title]', '<div class="error">', '</div>'); ?>
								</div> 
							</div>
							
							<div class="form-group">
								<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Description<span class="required">*</span>
								</label>
								<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
									<textarea placeholder="Product Description" id="page_description" name="course[description]"class="form-control required"><?php if(isset( $course_data -> description )){ echo  $course_data->description; }  else { echo set_value('course[description]'); } ?></textarea>
									<?php echo form_error('course[description]', '<div class="error">', '</div>'); ?>
								</div>
							</div>							
						
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Subject<span class="required">*</span>
								</label>								
								<div class="col-md-10 col-sm-6 col-xs-12">
									<select class="form-control" id="subject" name="course[subject]" >
										<option value="">Select Subject</option>
										<?php foreach($subjects as $subject){ ?>
											<option value="<?php echo $subject['id']?>" <?php if(isset($subjectid['subject']) && !empty($subjectid['subject']) && $subjectid['subject'] == $subject['id']){ echo "selected"; }?>><?php echo ucfirst($subject['title']); ?></option>
										<?php }?>
									</select>
									<?php echo form_error('course[subject]', '<div class="error">', '</div>'); ?>
								</div>
							</div>								
							
							<div id="degree">	
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
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Day<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_days" name="course[workshop_day]" value="<?php if(isset( $course_data -> workshop_day )){ echo  $course_data -> workshop_day ; } else{ echo set_value('course[workshop_day]'); } ?>" class="form-control required">
										<?php echo form_error('course[workshop_day]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Instructor<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_days" name="course[workshop_instructor]" value="<?php if(isset( $course_data -> workshop_instructor )){ echo  $course_data -> workshop_instructor ; } else{ echo set_value('course[workshop_instructor]'); }?>" class="form-control required">
										<?php echo form_error('course[workshop_instructor]', '<div class="error">', '</div>'); ?>
									</div>
								</div> 
								
								<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Instructor<span class="required">*</span>
								</label>								
								<div class="col-md-10 col-sm-6 col-xs-12">
									<select class="form-control" id="subject" name="course[workshop_instructor]" >
										<option value="">Select Instructor</option>
										<?php foreach($instructors as $instructor){ ?>
											<option value="<?php echo $instructor['id']?>" <?php if(isset($instructorid['workshop_instructor']) && !empty($instructorid['workshop_instructor']) && $instructorid['workshop_instructor'] == $instructor['id']){ echo "selected"; }?>><?php echo ucfirst($instructor['instructor_name']); ?></option>
										<?php }?>
									</select>
									<?php echo form_error('course[workshop_instructor]', '<div class="error">', '</div>'); ?>
								</div>
							</div>	
								
								
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Time<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_time" name="course[workshop_time]" value="<?php if(isset( $course_data -> workshop_time )){ echo  $course_data -> workshop_time ; } else{ echo set_value('course[workshop_time]'); }?>" class="form-control required">
										<?php echo form_error('course[workshop_time]', '<div class="error">', '</div>'); ?>
									</div>
								</div> 
								
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Learning Objectives</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[workshop_learning_objectives]" rows="3" placeholder=""><?php if(isset( $course_data -> workshop_learning_objectives )){ echo  $course_data -> workshop_learning_objectives ; } else{ echo set_value('course[workshop_learning_objectives]'); }?></textarea>
										<?php echo form_error('course[workshop_learning_objectives]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Required Equipment</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[workshop_rtme]" rows="3" placeholder=""><?php if(isset( $course_data -> workshop_rtme )){ echo  $course_data -> workshop_rtme ; } else{ echo set_value('course[workshop_rtme]'); }?></textarea>
										<?php echo form_error('course[workshop_rtme]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
							</div>
							
							<div id="degree-course" style="display:none;;margin-top:30px">
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Course Code<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="product-title" name="course[course_code]" value="<?php if(isset( $course_data -> course_code )){ echo  $course_data -> course_code ; } else{ echo set_value('course[course_code]'); }?>" class="form-control required">
										<?php echo form_error('course[course_code]', '<div class="error">', '</div>'); ?>
									</div>
								</div>  
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Course Name<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="product-title" name="course[course_name]" value="<?php if(isset( $course_data -> course_name )){ echo  $course_data -> course_name ; } else{ echo set_value('course[course_name]'); }?>" class="form-control required">
										<?php echo form_error('course[course_name]', '<div class="error">', '</div>'); ?>
									</div>
								</div>  
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Price<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="product-title" name="course[price]" value="<?php if(isset( $course_data -> price )){ echo  $course_data -> price ; } else{ echo set_value('course[price]'); }?>" class="form-control required">
										<?php echo form_error('course[price]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Term<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<select class="form-control" id="subject" name="course[term]" >
											<option value="term">Select Term</option>
											<option value="1">Term First</option>
											<option value="2">Term Second</option>
											<option value="3">Term Third</option>
										</select>
										<?php echo form_error('course[term]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Start Date <span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<input class="flatpickr form-control" type="text" value="<?php if(isset($course_data->start_date)) { echo $course_data->start_date; } else{ echo set_value('course[start_date]'); } ?>" name="course[start_date]" placeholder="Select Date.." data-enable-time="true">
										<?php echo form_error('course[start_date]', '<p class="red">', '</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">End Date <span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<input class="flatpickr form-control"  value="<?php if(isset($course_data->end_date)) { echo $course_data->end_date; } else{ echo set_value('course[end_date]'); } ?>" type="text" name="course[end_date]" placeholder="Select Date.." data-enable-time="true">
										<?php echo form_error('course[end_date]', '<p class="red">', '</p>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Course Days<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_days" name="course[course_days]" value="<?php if(isset( $course_data -> course_days )){ echo  $course_data -> course_days ; } else{ echo set_value('course[course_days]'); }?>" class="form-control required">
									</div>
								</div> 
								<div class="form-group">
									<label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Course Time<span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
										<input type="text" placeholder="Price" id="course_time" name="course[course_time]" value="<?php if(isset( $course_data -> course_time )){ echo  $course_data -> course_time ; } else{ echo set_value('course[course_time]'); }?>" class="form-control required">
									</div>
								</div> 
								
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Learning Objectives</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[learning_objectives]" rows="3" placeholder=""><?php if(isset( $course_data -> learning_objectives )){ echo  $course_data -> learning_objectives ; } else{ echo set_value('course[learning_objectives]'); }?></textarea>
										<?php echo form_error('course[learning_objectives]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Required Textbooks, Materials, & Equipment</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[rtme]" rows="3" placeholder=""><?php if(isset( $course_data -> rtme )){ echo  $course_data -> rtme ; } else{ echo set_value('course[rtme]'); }?></textarea>
										<?php echo form_error('course[rtme]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Assignments & Method of Evaluation</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[ame]" rows="3" placeholder=""><?php if(isset( $course_data -> ame )){ echo  $course_data -> ame ; } else{ echo set_value('course[ame]'); }?></textarea>
										<?php echo form_error('course[ame]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Topics</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[topics]" rows="3" placeholder=""><?php if(isset( $course_data -> topics )){ echo  $course_data -> topics ; } else{ echo set_value('course[topics]'); }?></textarea>
										<?php echo form_error('course[topics]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Prerequisites</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[prerequisites]" rows="3" placeholder=""><?php if(isset( $course_data -> prerequisites )){ echo  $course_data -> prerequisites ; } else{ echo set_value('course[prerequisites]'); }?></textarea>
										<?php echo form_error('course[prerequisites]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								
							</div>
							
							<div id="degree-diploma" style="display:none;;margin-top:30px">
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Certificate Description</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[certificate_desc]" rows="3" placeholder=""><?php if(isset( $course_data -> certificate_desc )){ echo  $course_data -> certificate_desc ; } else{ echo set_value('course[certificate_desc]'); }?></textarea>
										<?php echo form_error('course[certificate_desc]', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12">Required Equipment</label>
									<div class="col-md-10 col-sm-6 col-xs-12">
										<textarea class="form-control" name="course[certificate_rtme]" rows="3" placeholder=""><?php if(isset( $course_data -> certificate_rtme )){ echo  $course_data -> certificate_rtme ; } else{ echo set_value('course[certificate_rtme]'); }?></textarea>
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
									<input  id="uploadImg"  type="hidden" value="<?php if(isset($course_data -> image)) echo $course_data -> image; ?> " name="course_image" >									
									<?php
										$page_image =$course_data ->image ;										 
										if($page_image!='') {
										?>
										<div class="imageOuter">
											<a onClick="remove_img('<?php echo $course_data ->id; ?>');" href="javascript:void(0) ">
												<img class="del_img" src="<?php echo base_url() . 'public/images/cross.png'; ?>" width="20" height="20">
											</a>
											<img class="del_img" src="<?php echo base_url() . 'uploads/courses_image/' . $page_image; ?>" width="100" height="100">
										</div>										
										<?php } ?>
									<input type="file" name="course_image" size="20" id="fileUpload" />							
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/course">Cancel</a>
									<button id="sumbit_dropzone" name="course_edit" class="btn btn-success" type="submit"> <i class="fa fa-plus-square" style="color:rgb(228, 228, 228) !important; font-size:18px;padding:0px;"> </i> Save</button>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	CKEDITOR.replace('page_description');
	function remove_img(kay) {
		$.ajax({url: "<?php echo base_url() ?>admin/course/image_delete?id=" + kay, success: function (result) {
			$(".del_img").remove();
			$("#uploadImg").val('');	
		}});
		
	}
	
	$(function() {
		// $('#row_dim').hide(); 
		// $('#subject').change(function(){
		//console.log($('#subject').val());
		// if($('#subject').val() == 'subject') {
		// $('#degree').hide(); 
		// } else {
		// $('#degree').show(); 
		// } 
		// });
		
		$('#workshops').click(function(){
			$('#degree-workshop').show(); 
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