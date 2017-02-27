<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/flatpickr.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/bootstrap-tagsinput.css">
<div class="full-content">
	<div class="content-col">
		<span class="bold">Master Catalog Event Creation</span>
	</div>
	
	<div class="content-col">
		<form class="add-course" method="POST" id="add_course" enctype="multipart/form-data" action="<?php echo base_url();?>account/provider/processCatalog">
			<section class="catalogEvent">
				<div class="wrapper_provider">
					<div class="leftFormCol">
						<div class="fullWidth">
							<label>Event Title <span style="color:red">*</span></label>
							<input type="text" name="catalog_events[title]" placeholder="Enter event title" value="<?php echo set_value('catalog_events[title]', ''); ?>">
							<?php echo form_error('catalog_events[title]', '<p class="red">', '</p>'); ?>
						</div>
						
						<div class="fullWidth">
							<div class="halfWidth">
								<label>Start Date &amp; Time <span style="color:red">*</span></label>
								<div class="slct_datepicker">
									<div class="datepicker_outer">
										<input class="flatpickr form-control" type="text" name="catalog_events[start_date]" placeholder="Select Date.." data-enable-time="true" value="<?php echo set_value('catalog_events[start_date]', ''); ?>">
									</div>
								</div>
								<?php echo form_error('catalog_events[start_date]', '<p class="red">', '</p>'); ?>
							</div>
							<div class="halfWidth fltRight">
								<label>End Date &amp; Time <span style="color:red">*</span></label>
								<div class="slct_datepicker">
									<div class="datepicker_outer">
										<input class="flatpickr form-control" type="text" name="catalog_events[end_date]" placeholder="Select Date.." data-enable-time="true" value="<?php echo set_value('catalog_events[end_date]', ''); ?>">
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
										<option value="<?php echo $tz['value']; ?>" <?php echo set_select("catalog_events['timezone']",$tz['value']); ?>><?php echo $tz['name']; ?></option>
									<?php } }?>
								</select>
								</div>
						</div>
						<div class="fullWidth">
							<label>Topic Tags For The Event</label>
							<input type="text" class="tag-inputs" name="catalog_event_meta[topic_tag]" value="Computer, IT, Hardware" data-role="tagsinput"  />
						</div>
						
						<div class="fullWidth">
							<label>Catalog Type <span style="color:red">*</span></label>
							<label> <input type="radio" name="catalog_events[type]" value="1" onchange="webinar_type('1')" <?php echo set_radio('catalog_events[type]', '1'); ?>>Live Webinar</label>
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
							<label> <input type="radio" name="catalog_events[type]" value="2" onchange="webinar_type('2')" <?php echo set_radio('catalog_events[type]', '2'); ?>>On-Demand Webinar</label>
							<div id="on_demand_webinar" style="display:none">									
								<div class="radioCol">
									<label>Adobe Connect Server Content</label>
									<input type="text" name="catalog_event_meta[type_webinar_first]">
									<label class="btn btn-default btn-file" style="margin-top:10px">    
										<span>Upload On-Demand Content</span> 
										<input type="file" title="all_file" style="display: none;" class="upload_content" id="type_webinar_second" name="type_webinar_second[]">
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
												foreach ($field_data as $key => $speaker) { ?>
													<option value="<?php echo $speaker['id']; ?>" <?php echo set_select("catalog_event_meta[speaker_events]",$speaker['id']);?>><?php echo $speaker['username']; ?></option>
												<?php }
											}
										?>
									</select>
									<?php echo form_error('catalog_event_meta[presenter]', '<p class="red">', '</p>'); ?>
								</div>
							</div>
							<div class="halfWidth fltRight">
								<label>Type(s) of credit for the Event</label>
								<div class="select">
									<select name="catalog_event_meta[credit_events]">
										<option value="">Select Credit</option>
										<?php foreach($category as $cate){?>
											<option value="<?php echo $cate['id']?>" <?php echo set_select("catalog_event_meta[credit_events]",$cate['id']);?>><?php echo ucfirst($cate['title']); ?></option>
										<?php }?>
									</select>
								</div>
							</div>
							
						</div>
						
						<div class="fullWidth">
							
							<div class="halfWidth">
								<label>Price<span style="color:red">*</span></label>
								<div class="select">
									<input type="text" name="catalog_event_meta[price]" value="<?php echo set_value('catalog_event_meta[price]'); ?>">
								</div>
							</div>
							
							<div class="halfWidth fltRight">
								<label class="clear-fit"></label>
								<label class="btn btn-default btn-file">    
									<span>Upload Handout (PDF)</span> 
									<input type="file" title="pdf" style="display: none;" class="upload_content" id="pdf_file" name="handout_pdf[]">
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
							<textarea class="provider_textarea" name="catalog_event_meta[short_desc]"><?php echo set_value('catalog_event_meta[short_desc]', ''); ?></textarea>
							<?php echo form_error('catalog_event_meta[short_desc]', '<p class="red">', '</p>'); ?>
						</div>
						
						<div class="fullWidth">
							<label>Longer Description</label>
							<textarea class="provider_textarea" name="catalog_event_meta[longer_desc]"></textarea>
						</div>
						
						<div class="fullWidth">
							<div class="halfWidth" id="catalog_picture">
								<div style="display: none;" id="progress-wrp">
									<div class="progress-bar"></div>
									<div class="status">0%</div> 
								</div>
								<div id="output"></div>
							</div>
							
							<div class="halfWidth">
								<label class="btn btn-default btn-file">    
									<span>Upload Main Event Photo</span> 
									<input type="file" title="picture" style="display: none;" class="upload_content" name="banner[]">
									
								</label>
								<?php if(!empty($_POST['catalog_event_meta']['thumb_img'])){?>
										<img src="<?php echo base_url();?>uploads/catalog_event/picture/thumbnail/<?php echo $_POST['catalog_event_meta']['thumb_img']?>">
									<?php }?>
							</div>
						</div>
						
						<input type="hidden" name="catalog_events[user_id]" value="<?php echo $get_profile['id']; ?>">
						<input type="hidden" name="catalog_events[created_at]" value="<?php echo date('Y-m-d H:i:s'); ?>">
					</div>
					<div class="clear"></div>
				</div>
			</section>
			<div class="submit_button"></div>
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
				if (type == 'pdf' || type == 'csv') {						
					$("#add_course").append('<input type="hidden" name="catalog_event_meta[pdf_file]" value="' + resJson.filename + '">');
					$("#progress-wrp-pdf").html('<div class="progress-bar"></div><div class="status">0%</div>').hide();
					$('#output-pdf').html(resJson.msg);
				}
				else if (type=="all_file") {										
					$("#add_course").append('<input type="hidden" name="catalog_event_meta[ondemand_file]" value="' + resJson.filename + '">');
					$("#progress-wrp-ondemand").html('<div class="progress-bar"></div><div class="status">0%</div>').hide();
					$('#output-ondemand').html(resJson.msg);
				}
				else {								
					$('#output').html('<img src="<?php echo base_url(); ?>uploads/catalog_event/picture/thumbnail/' + resJson.thumb + '">');
					$("#progress-wrp").html('<div class="progress-bar"></div><div class="status">0%</div>').hide();
					$("#add_course").append('<input type="hidden" name="catalog_event_meta[image]" value="' + resJson.img + '">');
					$("#add_course").append('<input type="hidden" name="catalog_event_meta[thumb_img]" value="' + resJson.thumb + '">');
					$(".submit_button").append('<button type="submit" name="edit_profile" class="login-today on-demand submit add_course_submit">Create Event</button>');
					
				}
			});
		});
	});
	
</script>		