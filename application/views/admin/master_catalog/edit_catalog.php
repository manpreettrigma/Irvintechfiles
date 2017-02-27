<link rel="stylesheet" href="<?php echo base_url(); ?>assets/public/css/flatpickr.min.css">
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Master Catalog</h3>
			</div>
		</div>
		<div class="row">
			<form method="post" id="add_course" action="<?php echo base_url();?>admin/mastercatalog/updateCatalog" enctype="multipart/form-data" >
				<div class="x_content">
					
					<div class="x_panel">						
						<button type="button" class="btn btn-success btn-sm">Master Catalog</button>
						<button type="button" class="btn btn-success btn-sm">Provider Catalog</button>
						<button type="button" class="btn btn-success btn-sm">Reports</button>
						<button type="button" class="btn btn-success btn-sm">Home</button>
						<button type="button" class="btn btn-success btn-sm">My Account</button>
						<div id="suggestions-container" style="position: relative; float: left; width: 350px; margin: 10px;"></div>
					</div>
					<div class="x_panel">
						<div class="x_title">
							<h2>Master Catalog Event Creation</h2>
							<button type="button" class="btn btn-success btn-sm">Master Catalog</button>
							<button type="button" class="btn btn-success btn-sm">Provider Catalog</button>
							<button type="button" class="btn btn-success btn-sm">Reports</button>
							<button type="button" class="btn btn-success btn-sm">Home</button>
							<button type="button" class="btn btn-success btn-sm">My Account</button>
							<div id="suggestions-container" style="position: relative; float: left; width: 39px; margin: 10px;"></div>
							<div class="clearfix"></div>
						</div>
						<div class="x_title">
							<?php
								if ($this->session->flashdata('catalogevent_name')) {
									$message = $this->session->flashdata('catalogevent_name');
									?><div class="<?php echo $message; ?> alert alert-success alert-dismissible fade in "><?php echo $message; ?></div><?php
								}
							?>
						</div>
						<div class="x_title" style="text-align:center;">
							<h3>Event Information</h3>
							
							<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
							<div class="clearfix"></div>
						</div>
						
						<div class="col-md-6 col-xs-12">
							<div class="x_panel">
								<div class="x_content">
									<div class="form-horizontal form-label-left">									
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Event Name</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" name="catalog_events[title]" value="<?php if(isset($catalog_event->title)) { echo $catalog_event->title; } else { echo set_value('catalog_events[title]'); } ?>" class="form-control" placeholder="Event Name">
												<?php echo form_error('catalog_events[title]', '<p class="red">', '</p>'); ?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date <span class="required">*</span>
											</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input class="flatpickr form-control" type="text" value="<?php if(isset($catalog_event->start_date)) { echo $catalog_event->start_date; } else{ echo set_value('catalog_events[start_date]'); } ?>" name="catalog_events[start_date]" placeholder="Select Date.." data-enable-time="true">
												<?php echo form_error('catalog_events[start_date]', '<p class="red">', '</p>'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Last Date <span class="required">*</span>
											</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input class="flatpickr form-control"  value="<?php if(isset($catalog_event->end_date)) { echo $catalog_event->end_date; } else{ echo set_value('catalog_events[end_date]'); } ?>"name="catalog_events[end_date]" type="text" name="catalog_events[end_date]" placeholder="Select Date.." data-enable-time="true">
												<?php echo form_error('catalog_events[end_date]', '<p class="red">', '</p>'); ?>
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Timezone</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select class="form-control" name="catalog_events[timezone]" value="<?php if(isset($catalog_event->timezone)) echo $catalog_event->timezone; ?>"  >
													<?php if(!empty($timezone)){ 
														foreach($timezone as $tz){
														?>
														<option value="<?php echo $tz['value']; ?>" <?php if(isset($catalog_event->timezone) && $catalog_event->timezone == $tz['value']) { echo 'selected'; } else{ echo set_select('catalog_events[timezone]',$tz['value']); } ?>><?php echo $tz['name']; ?></option>
													<?php } }?>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Catalog Type<span class="required">*</span></label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<div class="radio">
													<label>
														<input type="radio" name="catalog_events[type]" value="1"  onchange="webinar_type('1')" id="optionsRadios1" <?php if(isset($catalog_event->type) && $catalog_event->type == 1) {  echo "checked" ; }  else{ echo set_radio('catalog_events[type]',1); } ?>/> Live Webinar
													</label>
												</div>
												<div id="live_webinar" style="display:none">
													<div class="radioCol">
														<label>Existing Adobe Connect Meeting Room</label>
														<?php 
															if(!empty($get_meeting)){
																$html_meeting = '<select name="catalog_event_meta[meeting_room]" class="form-control">';
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
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<div class="radio">
													<label>
														<input type="radio" name="catalog_events[type]" value="2"  onchange="webinar_type('2')" id="optionsRadios1" name="optionsRadios"  <?php if(isset($catalog_event->type) && $catalog_event->type == 2) {  echo "checked" ; }  else{ echo set_radio('catalog_events[type]',2); } ?>/> On-Demand Webinar
													</label>
												</div>
												<div id="on_demand_webinar" style="display:none">
													<div class="radioCol">
														<label>Adobe Connect Server Content</label>
														<input type="text" name="catalog_event_meta[type_webinar_first]" class="form-control">														
														<label class="btn btn-success btn-lg" style="margin-top:10px">    
															<span>Upload On-Demand Content</span> 
															<input type="file" title="all_file" style="display: none;" class="upload_content" id="type_webinar_second" name="type_webinar_second[]">
														</label>										
													</div>
												</div>
												<?php echo form_error('catalog_events[type]', '<p class="red">', '</p>'); ?>
											</div>
										</div>										
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Short Description<span class="required">*</span></label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<textarea class="form-control" value=""  name="catalog_event_meta[short_desc]" rows="3" placeholder=""><?php if(isset($catalog_event_meta['short_desc'])) { echo $catalog_event_meta['short_desc']; } else{ echo set_value('catalog_event_meta[short_desc]'); } ?></textarea>
												<?php echo form_error('catalog_event_meta[short_desc]', '<p class="red">', '</p>'); ?>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Long Description</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<textarea class="form-control" value="" name="catalog_event_meta[longer_desc]" rows="3" placeholder=""><?php if(isset($catalog_event_meta['longer_desc'])){ echo $catalog_event_meta['longer_desc'];  } else{ echo set_value('catalog_event_meta[short_desc]'); } ?></textarea>
											</div>
										</div>	
										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12">Price<span class="required">*</span></label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" class="form-control" name="catalog_event_meta[price]" value="<?php if(isset($catalog_event_meta['price'])){ echo $catalog_event_meta['price'];  } else{ echo set_value('catalog_event_meta[price]'); } ?>">
												<?php echo form_error('catalog_event_meta[price]', '<p class="red">', '</p>'); ?>
											</div>
										</div>	
									</div>
								</div>
							</div>
						</div>						
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="x_panel">								
								<div class="x_content">									
									<div class="form-horizontal form-label-left">
										<div class="control-group">
											<label >Enter Topic Tags for the Event</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<input type="text" value="<?php if(isset($catalog_event_meta['topic_tag'])){ echo $catalog_event_meta['topic_tag'];  } else{ echo set_value('catalog_event_meta[topic_tag]'); } ?>"  name="catalog_event_meta[topic_tag]" data-role="tagsinput" />
												
												<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
											</div>
										</div>
										
										<div class="form-group">
											<label >Select Type(s) of credit for the Event</label>
											
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select class="form-control" name="catalog_event_meta[credit_events]" >
													<option value="">Select Credit</option>
													<?php foreach($category as $cate){?>
														<option value="<?php echo $cate['id']?>" <?php if(isset($catalog_event_meta['credit_events']) && !empty($catalog_event_meta['credit_events']) && $catalog_event_meta['credit_events'] == $cate['id']){ echo "selected"; }?>><?php echo ucfirst($cate['title']); ?></option>
													<?php }?>
												</select>
											</div>
										</div>										
										<div class="form-group">
											<label class="btn btn-success btn-lg">    
												<span>Upload Pdf</span>
												<div class="col-md-9 col-sm-9 col-xs-12">
													<input type="file" title="pdf" class="upload_content" value="<?php if(isset($catalog_event_meta['pdf'])) echo $catalog_event_meta['pdf']; ?>" style="display: none;" id="pdf_file" name="handout_pdf[]">
													<input type="hidden" name="catalog_event_meta[pdf_file]" value="<?php if(isset($catalog_event_meta['pdf']) && $catalog_event_meta['pdf'] != '') { echo $catalog_event_meta['pdf']; }?>" id="pdf_file">
												</div>
											</label>
											<div class="fullWidth">
												<div style="display: none;" id="progress-wrp-pdf">
													<div class="progress-bar"></div>
													<div class="status">0%</div> 
												</div>
												<div id="output-pdf">
													<?php if(isset($catalog_event_meta['pdf']) && !empty($catalog_event_meta['pdf'])){?>
														<a href="<?php echo $catalog_event_meta['pdf'];?>" target="_blank" id="pdffile">Click to view</a>
														<a href="javascript:void(0)" onclick="removeFile();">Remove</a>
													<?php }?>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label >Select a Speaker the Event</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select class="form-control" name="catalog_event_meta[speaker_events]">
													<?php foreach($get_presenter as $get_presenters)
														{ ?>														
														<option value="<?php if(isset($get_presenters['id'])) echo $get_presenters['id']; ?>" <?php if(isset($catalog_event_meta['speaker_events']) && $catalog_event_meta['speaker_events'] ==$get_presenters['id']){ echo 'selected'; } else { echo set_select("catalog_event_meta[speaker_events]",$get_presenters['id']); } ?>><?php if(isset($get_presenters['username'])) echo $get_presenters['username']; ?></option>														
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label >Select catalog(s) to add event to</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select class="form-control" name="catalog_event_meta[add_events]" multiple>
													<option value="all" <?php if(isset($catalog_event_meta['add_events']) && $catalog_event_meta['add_events'] == "all"){ echo "selected"; } else{ echo set_select("catalog_event_meta[add_events]","all"); }?>>All</option>
													<?php if(!empty($providers)){?>
														<?php foreach($providers as $provider){?>
															<option value="<?php echo $provider['id']; ?>" <?php if(isset($catalog_event_meta['add_events']) && $catalog_event_meta['add_events'] == $provider['id']){ echo "selected"; } else{ echo set_select("catalog_event_meta[add_events]",$provider['id']); }?>><?php echo ucfirst($provider['username']); ?></option>
														<?php }?>
													<?php }?>												
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="btn btn-success btn-lg">
												<span>Upload Main Event Photo</span>
												<div class="col-md-9 col-sm-9 col-xs-12">
													<input type="file" title="picture" style="display: none;" class="upload_content" name="banner[]">
													<input type="hidden" name="catalog_event_meta[image]" value="<?php if(isset($catalog_event_meta['image']) && $catalog_event_meta['image'] != '' ) { echo $catalog_event_meta['image'] ; }else{ echo set_value('catalog_event_meta[image]'); }?>" id="image">
													<input type="hidden" name="catalog_event_meta[thumb_img]" value="<?php if(isset($catalog_event_meta['thumb_img']) && $catalog_event_meta['thumb_img'] != '' ) { echo $catalog_event_meta['thumb_img'] ; } else{ echo set_value('catalog_event_meta[thumb_img]'); }?>" id="thumb_img">
												</div>
											</label>
											<div class="halfWidth" id="catalog_picture">
												<div style="display: none;" id="progress-wrp">
													<div class="progress-bar"></div>
													<div class="status">0%</div> 
												</div>
												<div id="output"><?php if(isset($catalog_event_meta['thumb_img'])){ ?><img src="<?php echo $catalog_event_meta['thumb_img']; ?>" /><?php } else{ ?> <img src="<?php echo set_value('catalog_event_meta[thumb_img]'); ?>" /><?php }?></div>
											</div>											
										</div>										
										<div class="divider-dashed"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $catalog_id; ?>">
				<div class="submit_button"><button style="text-align:center; " type="submit" name="edit_catalog" class="btn btn-success btn-lg">Update Event</button></div>
			</form>
		</div>
	</div>
</div>

<script>	
	function removeFile(){
		$("#pdffile").remove();
		$("#pdffile").val("");
	}
	
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
		if($('input[type=radio]:checked').val() == 1){
			$("#live_webinar").css("display","");
			$("#on_demand_webinar").css("display","none");
		}
		if($('input[type=radio]:checked').val() == 2){
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
				var url = '<?php echo base_url(); ?>admin/mastercatalog/uploader_pdf';			
			}
			else {
				$('#output').html("");
				$("#progress-wrp").show();
				var url = '<?php echo base_url(); ?>admin/mastercatalog/uploader';
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
				console.log(resJson);
				if (type == 'pdf' || type == 'csv') {
					
					$("#add_course").append('<input type="hidden" name="catalog_event_meta[pdf_file]" value="' + resJson.filename + '">');
					$("#progress-wrp-pdf").html('<div class="progress-bar"></div><div class="status">0%</div>').hide();
					$('#output-pdf').html(resJson.msg);
				}
				else {
					$('#output').html('<img src="<?php echo base_url(); ?>uploads/catalog_event/picture/thumbnail/' + resJson.thumb + '">');
					$("#progress-wrp").html('<div class="progress-bar"></div><div class="status">0%</div>').hide();
					$("#add_course").append('<input type="hidden" name="catalog_event_meta[image]" value="' + resJson.img + '">');
					$("#add_course").append('<input type="hidden" name="catalog_event_meta[thumb_img]" value="' + resJson.thumb + '">');
					
				}
			});
		});
	});	
	
</script>


<script src="<?php echo base_url(); ?>assets/public/js/flatpickr.js"></script>
<script src="<?php echo base_url(); ?>assets/public/js/flatdatejquery.js"></script>