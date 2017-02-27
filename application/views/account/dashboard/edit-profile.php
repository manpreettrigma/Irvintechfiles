<div class="middle-content">
	<div class="content-col">
		<?php
			if ($this->session->flashdata('message_name')) {
				$message = $this->session->flashdata('message_name');
				?><div class="<?php echo $message; ?>"><?php echo $message; ?></div><?php
			}
		?>
		
		<form class="contact-info" method="POST" enctype="multipart/form-data">
			<section style="margin-top:0px">
				<span class="bold">Edit Profile</span>
				<div class="form-100">
					<div class="form-50">
						<label>Username</label><br>
						<input type="hidden" name="id" value="<?php echo $get_profile['id']; ?>" >
						<input type="text" name="username" value="<?php if (isset($get_profile['username'])) echo $get_profile['username']; ?>" placeholder="john" disabled >
						
					</div>
					
					<div class="form-50">
						<label>Email Address</label><br>
						<input type="text" name="users[email]" value="<?php if (isset($get_profile['email'])) echo $get_profile['email']; ?>" placeholder="john-smith@gmail.com">
						<?php echo form_error('email', '<p class="red">', '</p>'); ?>
					</div>
					
				</div>
				
				
				<div class="form-100">
					<div class="form-50">
						<label>Password</label><br>
						<input type="password" name="password" value="" placeholder="john-smith@gmail.com">
						<?php
							if ($this->session->flashdata('password')) {
								$message = $this->session->flashdata('password');
								?><div class="<?php echo $message; ?>"><?php echo $message; ?></div><?php
							}
						?>
					</div>
					
					<div class="form-50">
						<label>Confirm Password</label><br>
						<input type="password" name="cfpassword" value="" placeholder="Confirm Password">
						<?php echo form_error('cfpassword', '<p class="red">', '</p>'); ?>
					</div>
				</div> 
				
				<?php
					if (!empty($get_profile['meta_info'])) {
						$counter = 1;
						$html_start = '<div class="form-100">';
						unset($get_profile['meta_info']['profile_picture']);
						if($get_profile['role']!='student')
						unset($get_profile['meta_info']['provider_level']);
						foreach ($get_profile['meta_info'] as $key => $get_profiles) {
							$html_start .= '<div class="form-50">';
							$html_start .= '<label>' . sentence($key) . '</label><br>';
							$html_start .= '<input type="text" name="meta_info[' . $key . ']" value="' . ((isset($get_profiles)) ? $get_profiles : '') . '"  placeholder="John">';
							$html_start .= form_error($key, '<p class="red">', '</p>');
							$html_start .= '</div>';
							if ($counter % 2 == 0) {
								$html_start .= '</div><div class="form-100">';
							}
							$counter++;
						}
						echo $html_start;
					}
				?>
			</section>
			<button type="submit" name="edit_profile" class="login-today on-demand submit">Submit</button>
		</form>
	</div>
</div>
