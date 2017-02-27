<div class="event-creation">
<div class="container">
	<div class="wrapper">
		<div class="presenter top-36 master-cata">
			<section class="width-70 about-text">
				<h2> <span class="bold">Webinar Detail</span></h2><br>
				<div class="main-event">
					<?php 
						if(!empty($webinar['thumb_img'])){
							$img = $webinar['thumb_img'];
						}
						else{
							$img = base_url()."assets/frontend/images/dummy.png";
						}
					?>
					<div class="image-path"><img src="<?php echo $img;?>"/></div>
				</div>
				<section class="no-margin">
					<div class="form-100">
						<div class="form-50">
							<label>Event Title</label>
							<label><?php echo $webinar['title']?></label>
						</div>
						<div class="form-50">
							<label>Speaker of the Event</label>
							<label><?php echo getSpeaker($webinar['speaker_events'],2); ?></label>
						</div>
					</div>
					<div class="form-100">
						<div class="form-50">
							<label>Type(s) of credit for the Event</label>
							<label><?php echo getCreditCategory($webinar['credit_events']);?></label>
						</div>
						<div class="form-50">
							<label>Start Date & Time</label>
							<label><?php echo date("M d,Y",strtotime($webinar['start_date'])); ?> <span><?php echo date("h:i A",strtotime($webinar['start_date'])); ?></span></label>
						</div>
					</div>
					<div class="form-100">
						<div class="form-50">
							<label>Price</label>
							<label>$<?php echo $webinar['price']; ?></label>
							
						</div>
						<div class="form-50">
							<label>Time Zone</label>
							<label><?php echo getTimezone($webinar['timezone']);?></label>
						</div>
					</div>					
					<div class="form-100">
						<label>Topic Tags For The Event</label>
						<label><?php echo $webinar['topic_tag']; ?></label>
					</div>
					<div class="form-100 description">
						<label>Longer Description</label>
						<label><?php echo $webinar['longer_desc']; ?></label>
					</div>							
				</section>					
			</section>		
			
		</div>		
	</div>
</div>
</div>
<script>
	function paypal_payment(name) {
		$.ajax({
			url: "<?php echo base_url(); ?>" + "page/level",
			type: "post",
			beforeSend: function () {
				$("#" + name).html('loading.....');
			},
			data: 'id=' + name,
			success: function (response) {				
				var responseArr = $.parseJSON(response);
				if (responseArr.response == 'failed') {
					alert(responseArr.msg);
					window.location.href = '<?php echo base_url();?>account/create-provider';
				}
				else if(responseArr.response == 'failed_found'){
					alert(responseArr.msg);
					location.reload();
				}
				else{
					$("#" + name).attr('onclick', '');
					$('#form_provider').append(responseArr.form_data);
					$('#form_provider').submit();
				}
			}
		});
	}
</script>