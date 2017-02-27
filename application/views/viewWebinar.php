<div class="container">
	<div class="catalog">
		<h2>Master <b>Catalog</b></h2>
		<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet </p>
	</div>
</div>
<div class="container">
	<div class="wrapper">
		<div class="presenter top-36 master-cata">
			<section class="width-70 about-text">
				<h2>Webinar <span class="bold">Detail</span></h2><br>
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
			<section class="width-30 about-text"> 
				<h2>Our <span class="bold">Services</span></h2><br> 
				<div>
					<button class="accordion"><i class="arrow-right"></i><i class="arrow-down"></i> For Legal Professionals</button>
					<div class="panel">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					
					<button class="accordion"><i class="arrow-right"></i><i class="arrow-down"></i>Partner With Us</button>
					<div class="panel">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
				</div>
				<div class="trophy speakers">
					<h2>Recent <span class="bold">Speakers</span></h2>
					<ul>
						<li>
							<img src="images/img1.png">
							<div class="trophy-text users">
								<h5>John Mathew</h5>
								<p>Lorem ipsum dolor sit amet consectetur </p>
								<a href="#">Show Events</a>
							</div>
						</li>
						<li>
							<img src="images/img2.png">
							<div class="trophy-text users">
								<h5>Susie A. Prater</h5>
								<p>Lorem ipsum dolor sit amet consectetur </p>
								<a href="#">Show Events</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="trophy speakers">
					<h2>Available <span class="bold">On-Demand Courses</span></h2>
					<ul>
						<li>
							<img src="images/img3.png">
							<div class="trophy-text">
								<h5>Sed ut perspiciatis unde omnis istenatus</h5>
								<div class="price"><span>$250</span><a href="#">View Detail</a></div>
							</div>
						</li>
						<li>
							<img src="images/img4.png">
							<div class="trophy-text">
								<h5>Nemo enim ipsam voluptatem quiavoluptas sit </h5>
								<div class="price"><span>$180</span><a href="#">View Detail</a></div>
							</div>
						</li>
					</ul>
				</div>
			</section>
		</div>		
	</div>
</div>
