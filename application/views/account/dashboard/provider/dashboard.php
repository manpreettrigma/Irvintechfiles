<div class="middle-content">
	<div class="content-col">
		<h2><span>Welcome,</span> <?php echo ucfirst($get_profile['username']); ?></h2>
		<?php 
			if(empty(get_payment_status($user_info['id']))){
				echo '<div class="alert alert-danger">';
				echo 'You are using the free provider service. Please purchase the premium plan to getting the maximum level accessibility. Click to <a href="'.base_url().'page/level">UPGRADE</a> your provider account.';
				echo '</div>';
			}
		?>
	</div><!--content-col close here-->
	<div class="content-col">
		<div class="row">
			<div class="col-xs-12 col-md-85"><h2>TOP COURSES</h2></div>
		</div>
		<div class="upcome webinarss">
			<?php if(!empty($webinarList)){?>
				<?php foreach($webinarList as $webinar){ ?>
					<div class="service web">
						<a href="<?php echo base_url();?>provider/edit_catalog/<?php echo $webinar['catalog_event_id']?>"><img src="<?php echo $webinar['thumb_img']?>"/></a>
						<div class="service-content">
							<p><?php echo $webinar['title']; ?></p>
							<div class="timing">
								<h4><div class="data"><i class="fa fa-calendar"></i></div><span class="data-inc"><?php echo date("d/m/Y",strtotime($webinar['start_date'])); ?></span></h4>
								<h4><div class="data"><i class="fa fa-clock-o"></i></div><span class="data-inc"><?php echo date("h:i a",strtotime($webinar['start_date'])); ?> - <?php echo date("h:i a",strtotime($webinar['end_date'])); ?></span></h4>
								<h4><div class="data"><i class="fa fa-dollar"></i></div><span class="data-inc"><b><?php echo $webinar['price']; ?></b></span></h4>
							</div>
						</div>
					</div>
				<?php }?>
			<?php }?>
		</div>
	</div>
</div>

