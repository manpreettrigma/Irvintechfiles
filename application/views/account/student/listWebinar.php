<div class="event-creation">
<div class="container">
	<div class="wrapper">
		<div class="webinar-services demand-service up-webinars">
		<h2>Upcoming Webinars</h2><br>
			<?php if(!empty($webinars)){?>
				<?php foreach($webinars as $k=>$webinar){					
					$style="";
					if($k+1 % 4 == 0){
						$style= "margin-left:0px";
					}
				?>
					<div class="service demd" style="<?php echo $style; ?>">
						<?php 
						if(!empty($webinar['thumb_img'])){
							$img = $webinar['thumb_img'];
						}
						else{
							$img = base_url()."assets/frontend/images/dummy.png";
						}
						?>
						<a href="<?php echo base_url();?>student/viewWebinar/<?php echo $webinar['catalog_event_id']; ?>"><img src="<?php echo $img;?>"/></a>
						<div class="service-content">
							<p><?php if(strlen($webinar['title']) > 20){ echo substr($webinar['title'],0,20)."..."; } else{ echo $webinar['title']; } ?></p>
							<div class="timing">
								<h4><div class="data"><i class="fa fa-calendar"></i></div><span class="data-inc"><?php echo date("M d, Y",strtotime($webinar['start_date'])); ?></span></h4>
								<h4><div class="data"><i class="fa fa-clock-o"></i></div><span class="data-inc"><?php echo date("h:i a",strtotime($webinar['start_date'])); ?>-<?php echo date("h:i a",strtotime($webinar['end_date'])); ?></span></h4>
								<h4><div class="data"><i class="fa fa-dollar"></i></div><span class="data-inc"><b>$<?php echo $webinar['price']; ?></b></span></h4>
							</div>
						</div>
					</div>
				<?php }?>
			<?php }?>
		</div>
	</div>
</div>
</div>