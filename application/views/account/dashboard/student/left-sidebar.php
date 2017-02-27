<div class="left-content">
	<div class="left-group">
		<ul>
			<li>
				<a id="profile_picture_image" data-toggle="modal" data-target="#myModal">
					<?php						
						if (isset($get_profile['meta_info']['profile_picture']) && $get_profile['meta_info']['profile_picture'] != "" && file_exists(FCPATH . 'uploads/user_profile/large/' . $get_profile['meta_info']['profile_picture'])) {
							echo '<img src="' . base_url() . 'uploads/user_profile/large/' . $get_profile['meta_info']['profile_picture'] . '">';
						}
						else {
							echo '<img width="250" src="' . base_url() . 'assets/public/img/dummyperson.gif">';
						}
					?>
				</a>
				
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
						<form id="update_profile_form" accept-charset="utf-8" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>account/update_profile_picture">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">View Profile</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-xs-12 col-md-30">
											<?php
												if (isset($get_profile['meta_info']['profile_picture']) && file_exists(FCPATH . 'uploads/user_profile/large/' . $get_profile['meta_info']['profile_picture'])) {
													echo '<img preview_profile_src src="' . base_url() . 'uploads/user_profile/large/' . $get_profile['meta_info']['profile_picture'] . '">';
													} else {
													echo '<img width="250" src="' . base_url() . 'assets/public/img/dummyperson.gif">';
												}
											?>
											<span class="btn btn-default btn-file change_picture">
												<p class="change_label_profile">Change</p> <input type="file" name="profile_img" id="profile_img">
											</span>
										</div>
										<div class="col-xs-12 col-md-60" id="profile_snapshot">
											<p><strong>User Name:</strong> <?php echo (isset($get_profile['username'])) ? $get_profile['username'] : ''; ?></p>
											<p><strong>Name:</strong> <?php echo (isset($get_profile['meta_info']['first_name'])) ? ucfirst($get_profile['meta_info']['first_name']) : ''; ?> <?php echo (isset($get_profile['meta_info']['last_name'])) ? ucfirst($get_profile['meta_info']['last_name']) : ''; ?></p>
											<p><strong>Email:</strong> <?php echo (isset($get_profile['email'])) ? $get_profile['email'] : ''; ?></p>
											<p><strong>Address:</strong> 
												<?php echo (isset($get_profile['meta_info']['address'])) ? $get_profile['meta_info']['address'] : ''; ?>,
												<?php echo (isset($get_profile['meta_info']['state'])) ? $get_profile['meta_info']['state'] : ''; ?>
												<?php echo (isset($get_profile['meta_info']['state'])) ? $get_profile['meta_info']['state'] : ''; ?>,
												<?php echo (isset($get_profile['meta_info']['country'])) ? $get_profile['meta_info']['country'] : ''; ?>
												
											</p>
											
										</div>
									</div>
								</div>
								
								<div class="modal-footer">
									<input type="hidden" name="user_id" value="<?php echo $get_profile['id']; ?>">
									<button type="submit" class="btn btn-default">Save</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</form>
						
					</div>
				</div>
				
			</li>
		</ul>
	</div>
	<div class="left-group">
		<h2>Navigation</h2>
		<ul>
			<li>
				<a class="main-link" href="javascript:void(0)"><span><i class="fa fa-book" aria-hidden="true"></i></span>My Courses</a>
				<ul class="sublinks">
					<li>
						<a href="javascript:void(0)">
							<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							Upcoming Webinars
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							In Progress On-Demand Courses
						</a>
					</li>
					<li>
						<a href="javascript:void(0)">
							<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
							Completed Courses
						</a>
					</li>					
				</ul>
			</li>
			<li>
				<a href="javascript:void(0)"><span><i class="fa fa-calendar" aria-hidden="true"></i></span>Calendar</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>account/edit-profile">
					<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
					Edit Profile
				</a>
			</li>
			<li>
				<a href="<?php echo base_url(); ?>account/logout">
					<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
					Log out
				</a>
			</li>
		</ul>
	</div><!--left-group close here-->	
</div><!--left-content close here-->


