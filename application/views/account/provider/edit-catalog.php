<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/flatpickr.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/bootstrap-tagsinput.css">
<div class="full-content">
	<div class="content-col">
		<span class="bold">Master Catalog Event Creation</span>
	</div>		
	<div class="content-col">
		<form class="add-course" method="POST" id="add_course" enctype="multipart/form-data" action="<?php echo base_url();?>account/provider/updateCatalog">
			<section class="catalogEvent">
				<div class="wrapper_provider">
					<div class="leftFormCol">
						<div class="fullWidth">
							<label>Event Title <span style="color:red">*</span></label>
							<input type="text" name="catalog_events[title]" placeholder="Enter event title" value="<?php if($catalog['title'] != ''){ echo $catalog['title']; } else{ echo set_value('catalog_events[title]', ''); } ?>">
							<?php echo form_error('catalog_events[title]', '<p class="red">', '</p>'); ?>
						</div>
						
						<div class="fullWidth">
							<div class="halfWidth">
								<label>Start Date &amp; Time <span style="color:red">*</span></label>
								<div class="slct_datepicker">
									<div class="datepicker_outer">
										<input class="flatpickr form-control" type="text" name="catalog_events[start_date]" placeholder="Select Date.." data-enable-time="true" value="<?php if($catalog['start_date'] != ''){ echo date('Y-m-d H:i',strtotime($catalog['start_date'])); } else{ echo set_value('catalog_events[start_date]', ''); } ?>">
									</div>
								</div>
								<?php echo form_error('catalog_events[start_date]', '<p class="red">', '</p>'); ?>
							</div>
							<div class="halfWidth fltRight">
								<label>End Date &amp; Time <span style="color:red">*</span></label>
								<div class="slct_datepicker">
									<div class="datepicker_outer">
										<input class="flatpickr form-control" type="text" name="catalog_events[end_date]" placeholder="Select Date.." data-enable-time="true" value="<?php if($catalog['end_date'] != ''){ echo date('Y-m-d H:i',strtotime($catalog['end_date'])); } else{ echo set_value('catalog_events[end_date]', ''); } ?>">
									</div>
								</div>
								<?php echo form_error('catalog_events[end_date]', '<p class="red">', '</p>'); ?>
							</div>
						</div>
						<div class="fullWidth">
							<label>Time Zone</label>
							<div class="select fullWidth">
								<select name="catalog_events[timezone]">
									<?php if(!empty($timezone)){ 
										foreach($timezone as $tz){
										?>
										<option value="<?php echo $tz['value']; ?>" <?php if(isset($catalog['timezone']) && $catalog['timezone'] == $tz['value']) { echo 'selected'; } ?>><?php echo $tz['name']; ?></option>
									<?php } }?>
									
								</select>
							</div>
						</div>
						
						
						<div class="fullWidth">
							<label>Topic Tags For The Event</label>
							<input type="text" class="tag-inputs" name="catalog_event_meta[topic_tag]" value="<?php if(isset($catalog['topic_tag']) && !empty($catalog['topic_tag'])){ echo $catalog['topic_tag']; }?>" data-role="tagsinput"  />
						</div>
						
						<div class="fullWidth">
							<label>Catalog Type <span style="color:red">*</span></label>
							<label> <input type="radio" name="catalog_events[type]" class="webinar_type" value="1" onchange="webinar_type('1')" <?php if(isset($catalog['type']) && $catalog['type'] == '1'){ echo 'checked'; } else{ echo set_radio('catalog_events[type]', '1'); }?> value="1">Live Webinar</label>
							<div id="live_webinar" style="display:none">
								<div class="radioCol">
									<label>Existing Adobe Connect Meeting Room</label>
									<?php 
										if(!empty($get_meeting)){
											$html_meeting = '<select name="catalog_event_meta[meeting_room]">';
											foreach ($get_meeting as $key => $meeting){
												$html_meeting .= '<option value="'.$meeting["url"].'">'.$meeting["title"].'</option>';
											}
											$html_meeting .= '</select>';
											echo $html_meeting;
										}
									?>
								</div>
							</div>
						</div>
						
						
						<div class="fullWidth">
							<label> <input type="radio" name="catalog_events[type]" class="webinar_type" value="2" onchange="webinar_type('2')" <?php if($catalog['type'] == '2'){ echo 'checked'; } else{ echo set_radio('catalog_events[type]', '2'); } ?> value="2">On-Demand Webinar</label>
							<div id="on_demand_webinar" style="display:none">									
								<div class="radioCol">
									<label>Adobe Connect Server Content</label>
									<input type="text" name="catalog_event_meta[type_webinar_first]">
									<label class="btn btn-default btn-file" style="margin-top:10px">    
										<span>Upload On-Demand Content</span> 
										<input type="file" title="all_file" style="display: none;" class="upload_content" id="type_webinar_second" name="type_webinar_second[]">
										<input type="hidden" name="catalog_event_meta[ondemand_file]" value="<?php if(isset($meta['ondemand_file']) && $meta['ondemand_file']!=''){ echo $meta['ondemand_file']; }?>" id="ondemand_file">
									</label>										
								</div>
								<div class="radioCol">									
									<label>   
										<?php if(isset($meta['ondemand_file']) && $meta['ondemand_file'] != ''){?>
											<a href="<?php echo $meta['ondemand_file']; ?>" target="_blank">Click to view</a>
										<?php }?>
									</label>										
								</div>
							</div>
							<?php echo form_error('catalog_events[type]', '<p class="red">', '</p>'); ?>
						</div>
						<div class="fullWidth">
							<div style="display: none;" id="progress-wrp-ondemand">
								<div class="progress-bar"></div>
								<div class="status">0%</div> 
							</div>
							<div id="output-ondemand"></div>
						</div>
					</div>
					
					<div class="rightFormCol">
						<div class="fullWidth">
							<div class="halfWidth">
								<label>Speaker of the Event <span style="color:red">*</span></label>
								<div class="select">
									<select name="catalog_event_meta[speaker_events]">
										<option value="">Select Speaker</option>
										<?php
											if (!empty($field_data)) {
												foreach ($field_data as $key => $get_presenters) { ?>
												<option value="<?php if(isset($get_presenters['id'])) echo $get_presenters['id']; ?>" <?php if(isset($catalog['speaker_events']) && $catalog['speaker_events'] ==$get_presenters['id']){ echo 'selected'; } else { echo set_select("catalog_event_meta[speaker_events]",$get_presenters['id']); } ?>><?php if(isset($get_presenters['username'])) echo $get_presenters['username']; ?></option>
												<?php }
											}
										?>
									</select>									
								</div>
							</div>
							<?php echo form_error('catalog_event_meta[speaker_events]', '<p class="red">', '</p>'); ?>
							
							<div class="halfWidth fltRight">
								<label>Type(s) of credit for the Event</label>
								<div class="select">
									<select name="catalog_event_meta[credit_events]">
										<option value="">Select Credit</option>
										<?php foreach($category as $cate){?>
											<option value="<?php echo $cate['id']?>" <?php if(isset($catalog['credit_events']) && $catalog['credit_events'] == $cate['id'] ){?> selected <?php }?>><?php echo ucfirst($cate['title']); ?></option>
										<?php }?>
									</select>
								</div>
							</div>							
						</div>
						
						<div class="fullWidth">
							
							<div class="halfWidth">
								<label>Price<span style="color:red">*</span></label>
								<div class="select">
									<input type="text" name="catalog_event_meta[price]" value="<?php if($catalog['price'] != ''){ echo $catalog['price']; } else{ echo set_value('catalog_event_meta[price]', ''); } ?>">
									<?php echo form_error('catalog_event_meta[price]', '<p class="red">', '</p>'); ?>
								</div>
							</div>
							
							<div class="halfWidth fltRight">								
								
								<?php if(isset($catalog['pdf']) && !empty($catalog['pdf'])){?>
									<label>
										<a href="<?php echo $catalog['pdf'];?>" target="_blank">Click to view</a>
									</label>
									<?php } else{?>	
									<label class="clear-fit"></label>
								<?php }?>
								<label class="btn btn-default btn-file">
									<span>Upload Handout (PDF)</span> 									
									<input type="file" title="pdf" style="display: none;" class="upload_content" id="pdf_file" name="handout_pdf[]">
									<input type="hidden" name="catalog_event_meta[pdf_file]" value="<?php if(isset($catalog['pdf']) && $catalog['pdf'] != '') { echo $catalog['pdf']; }?>" id="pdf_file">
								</label>
							</div> 
						</div>
						
						<div class="fullWidth">
							<div style="display: none;" id="progress-wrp-pdf">
								<div class="progress-bar"></div>
								<div class="status">0%</div> 
							</div>
							<div id="output-pdf"></div>
						</div>
						
						<div class="clear"></div>
						<div class="fullWidth">
							<label>Short Description <span style="color:red">*</span></label>
							<textarea class="provider_textarea" name="catalog_event_meta[short_desc]"><?php if($catalog['short_desc'] != ''){ echo $catalog['short_desc']; } else{ echo set_value('catalog_event_meta[short_desc]', ''); } ?></textarea>
							<?php echo form_error('catalog_event_meta[short_desc]', '<p class="red">', '</p>'); ?>
						</div>
						
						<div class="fullWidth">
							<label>Longer Description</label>
							<textarea class="provider_textarea" name="catalog_event_meta[longer_desc]"><?php if($catalog['longer_desc'] != ''){ echo $catalog['longer_desc']; } else{ echo set_value('catalog_event_meta[longer_desc]', ''); } ?></textarea>
						</div>
						
						<div class="fullWidth">
							<div class="halfWidth" id="catalog_picture">
								<div style="display: none;" id="progress-wrp">
									<div class="progress-bar"></div>
									<div class="status">0%</div> 
								</div>
								<div id="output">									
									<?php if(!empty($catalog['thumb_img'])){?>
										<img src="<?php echo $catalog['thumb_img'];?>"/>
									<?php }?>
								</div>
							</div>
							
							<div class="halfWidth">								
								<label class="btn btn-default btn-file">    
									<span>Upload Main Event Photo</span> 
									<input type="file" title="picture" style="display: none;" class="upload_content" name="banner[]">
									<input type="hidden" name="catalog_event_meta[image]" value="<?php echo($catalog['image'] != '' ? $catalog['image'] : '')?>" id="image">
									<input type="hidden" name="catalog_event_meta[thumb_img]" value="<?php echo($catalog['thumb_img'] != '' ? $catalog['thumb_img'] : '')?>" id="thumb_img">
								</label>
							</div>
						</div>
						
						<input type="hidden" name="id" value="<?php echo $catalog_id; ?>">
						<input type="hidden" name="catalog_events[user_id]" value="<?php echo $catalog['user_id']; ?>">
						<input type="hidden" name="catalog_events[created_at]" value="<?php echo date('Y-m-d H:i:s'); ?>">
					</div>
					<div class="clear"></div>
				</div>
			</section>
			<div class="submit_button"><button type="submit" name="edit_profile" class="login-today on-demand submit add_course_submit">Update Event</button></div>
		</form>		
	</div>   
</div>


<script src="<?php echo base_url(); ?>assets/public/js/flatpickr.js"></script>
<script src="<?php echo base_url(); ?>assets/public/js/flatdatejquery.js"></script>
<script src="<?php echo base_url(); ?>assets/public/js/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
	
	function webinar_type(type) {
		var html;
		if (type == 1) {			
			$("#live_webinar").css("display","");
			$("#on_demand_webinar").css("display","none");
			
		}
		else {
			$("#live_webinar").css("display","none");						
			$("#on_demand_webinar").css("display","");
		}
	}
	
	$(document).ready(function () {		
		if($('input[type=radio]:checked').val() == '1'){
			$("#live_webinar").css("display","");
			$("#on_demand_webinar").css("display","none");
		}
		else if($('input[type=radio]:checked').val() == '2'){
			$("#live_webinar").css("display","none");						
			$("#on_demand_webinar").css("display","");
		}
		$(document).on("keypress", 'form', function (e) {
			var code = e.keyCode || e.which;
			if (code == 13) {
				e.preventDefault();
				return false;
			}
		});
		
		$('.upload_content').on("change", function (event) {
			/* $('#output').html("");
			$('#output-pdf').html(""); */
			var form_data = new FormData();
			$.each($("#add_course").find("input[type='file']"), function (i, tag) {
				$.each($(tag)[0].files, function (i, file) {
					form_data.append(tag.name, file);
				});
			});
			
			var type = $(this).attr('title');
			form_data.append('type', type);
			
			if (type == 'pdf' || type == 'csv') {
				$('#output-pdf').html("");
				$("#progress-wrp-pdf").show();
				var url = '<?php echo base_url(); ?>account/provider/uploader_pdf';
			}
			else if(type=="all_file"){
				$('#output-ondemand').html("");
				$("#progress-wrp-ondemand").show();
				var url = '<?php echo base_url(); ?>account/provider/uploader_ondemand';
			}
			else {
				$('#output').html("");
				$("#progress-wrp").show();
				var url = '<?php echo base_url(); ?>account/provider/uploader';
			}
			
			$.ajax({
				url: url,
				type: "POST",
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				xhr: function () {
					var xhr = $.ajaxSettings.xhr();
					if (xhr.upload) {
						xhr.upload.addEventListener('progress', function (event) {
							var percent = 0;
							var position = event.loaded || event.position;
							var total = event.total;
							if (event.lengthComputable) {
								percent = Math.ceil(position / total * 100);
							}
							if (type == 'pdf' || type == 'csv') {
								$("#progress-wrp-pdf" + " .progress-bar").css("width", +percent + "%");
								$("#progress-wrp-pdf" + " .status").text(percent + "%");
							}
							else if (type=="all_file") {
								$("#progress-wrp-ondemand" + " .progress-bar").css("width", +percent + "%");
								$("#progress-wrp-ondemand" + " .status").text(percent + "%");
							}
							else {
								$("#progress-wrp" + " .progress-bar").css("width", +percent + "%");
								$("#progress-wrp" + " .status").text(percent + "%");
							}
							
						}, true);
					}
					return xhr;
				},
				}).done(function (res) {
				var resJson = $.parseJSON(res);	
				//console.log(resJson);
				if(resJson.resonse != "failed"){
					if (type == 'pdf' || type == 'csv') {		
						$("#pdf_file").val(resJson.filename);
						//$("#add_course").append('<input type="hidden" name="catalog_event_meta[pdf_file]" value="' + resJson.filename + '">');
						$("#progress-wrp-pdf").html('<div class="progress-bar"></div><div class="status">0%</div>').hide();
						$('#output-pdf').html(resJson.msg);
					}
					else if (type=="all_file") {				
						$("#ondemand_file").val(resJson.filename);
						//$("#add_course").append('<input type="hidden" name="catalog_event_meta[ondemand_file]" value="' + resJson.filename + '">');
						$("#progress-wrp-ondemand").html('<div class="progress-bar"></div><div class="status">0%</div>').hide();
						$('#output-ondemand').html(resJson.msg);
					}
					else {					
						$('#output').html('<img src="<?php echo base_url(); ?>uploads/catalog_event/picture/thumbnail/' + resJson.thumb + '">');
						$("#progress-wrp").html('<div class="progress-bar"></div><div class="status">0%</div>').hide();
						$("#image").val(resJson.img);
						$("#thumb_img").val(resJson.thumb);
						/* $("#add_course").append('<input type="hidden" name="catalog_event_meta[image]" value="' + resJson.img + '">');
						$("#add_course").append('<input type="hidden" name="catalog_event_meta[thumb_img]" value="' + resJson.thumb + '">');		 */								
					}
				}
			});
		});
	});
	
</script>	