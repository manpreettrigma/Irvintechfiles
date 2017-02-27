<div class="middle-content">	
	<div class="content-col">
		<h2>YOUR UPCOMING WEBINARS</h2>
		<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas. 
		<a href="javascript:void(0)">Show all</a> </p>
		<div class="upcome webinarss">
			<?php if(!empty($webinars)){?>
				<?php foreach($webinars as $webinar){	?>
					<div class="service web">
						<a href="<?php echo base_url();?>student/viewWebinar/<?php echo $webinar['catalog_event_id']?>"><img src="<?php echo $webinar['thumb_img']?>"/></a>
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
	</div><!--content-col close here-->
	
	<div class="content-col">
		<h2>CURRENT ON-DEMAND COURSES</h2>
		<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas.
			<a href="javascript:void(0)">More On-Demand Courses</a>
		</p>
		<div class="upcome webinarss">
			<div class="service web">
				<img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/service1.jpg"/>
				<div class="service-content">
					<p>Itaque earum rerum hic tenetur a sapiente, delectus </p>
					<div class="timing">
						<h4><div class="data"><i class="fa fa-calendar"></i></div><span class="data-inc">25/12/2016</span></h4>
						<h4><div class="data"><i class="fa fa-clock-o"></i></div><span class="data-inc">9:30am - 11:30am</span></h4>
						<h4><div class="data"><i class="fa fa-dollar"></i></div><span class="data-inc"><b>280</b></span></h4>
					</div>
				</div>
			</div>
			
			<div class="service web">
				<img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/service2.jpg"/>
				<div class="service-content">
					<p>Itaque earum rerum hic tenetur a sapiente, delectus </p>
					<div class="timing">
						<h4><div class="data"><i class="fa fa-calendar"></i></div><span class="data-inc">25/12/2016</span></h4>
						<h4><div class="data"><i class="fa fa-clock-o"></i></div><span class="data-inc">9:30am - 11:30am</span></h4>
						<h4><div class="data"><i class="fa fa-dollar"></i></div><span class="data-inc"><b>280</b></span></h4>
					</div>
				</div>
			</div>
			<div class="service web">
				<img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/service3.jpg"/>
				<div class="service-content">
					<p>Itaque earum rerum hic tenetur a sapiente, delectus </p>
					<div class="timing">
						<h4><div class="data"><i class="fa fa-calendar"></i></div><span class="data-inc">25/12/2016</span></h4>
						<h4><div class="data"><i class="fa fa-clock-o"></i></div><span class="data-inc">9:30am - 11:30am</span></h4>
						<h4><div class="data"><i class="fa fa-dollar"></i></div><span class="data-inc"><b>280</b></span></h4>
					</div>
				</div>
			</div>
		</div>
	</div><!--content-col close here-->
</div><!--middle-content close here-->

