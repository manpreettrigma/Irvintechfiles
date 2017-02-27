<div class="container">
	<div class="wrapper">
		<div class="presenter">
			<h2>Apply to be a <span class="bold">Student</span></h2> 
			<section id="reg" style="margin: 106px 20px 10px;" class="width-70">
				<section class="no-margin">
					<h3>1. Contact <span class="bold">information</span></h3>
					<form class="contact-info" method="post" action="<?php echo base_url();?>account/processStudent">
						<div class="form-100">
							<div class="form-50">
								<label>USERNAME<span class="red">*</span></label><br>
								<input type="text" name="username" value="<?php echo set_value('username', ''); ?>">
								<?php echo form_error('username', '<p class="red">', '</p>'); ?>
								
							</div>
							<div class="form-50">
								<label>Email Address<span class="red">*</span></label><br>
								<input type="text" value="<?php echo set_value('email', ''); ?>" autofocus=""  name="email">
								<?php echo form_error('email', '<p class="red">', '</p>'); ?>
							</div>
						</div>
						
						<div class="form-100">
							
							<div class="form-50">
								<label>First name<span class="red">*</span></label><br>
								<input type="text" autofocus="" value="<?php echo set_value('first_name', ''); ?>" name="first_name">
								<?php echo form_error('first_name', '<p class="red">', '</p>'); ?>
							</div>
							<div class="form-50">
								<label>Last name<span class="red">*</span></label><br>
								<input type="text" value="<?php echo set_value('last_name', ''); ?>" autofocus=""  name="last_name">
								<?php echo form_error('last_name', '<p class="red">', '</p>'); ?>
							</div>
						</div>
						
						<div class="form-100">
							<div class="form-50">
								<label>Address Line 1<span class="red">*</span></label><br>
								<input value="<?php echo set_value('address1', ''); ?>" type="text" autofocus=""  name="address1">
								<?php echo form_error('address1', '<p class="red">', '</p>'); ?>
							</div>
							<div class="form-50">
								<label>Address Line 2</label><br>
								<input type="text" name="address2">
								
							</div>
						</div>
						<div class="form-100">
							<div class="form-50">
								<label>City<span class="red">*</span></label><br>
								<input value="<?php echo set_value('city', ''); ?>" type="text" name="city">
								<?php echo form_error('city', '<p class="red">', '</p>'); ?>
							</div>
							<div class="form-50">
								<label>State / Province<span class="red">*</span></label><br>
								<input  value="<?php echo set_value('state', ''); ?>" type="text"  name="state">
								<?php echo form_error('state', '<p class="red">', '</p>'); ?>
							</div>
						</div>
						<div class="form-100">
							<div class="form-50">
								<label>Zip / Postal Code</label><br>
								<input value="<?php echo set_value('zip', ''); ?>" type="text"  name="zip">
								<?php echo form_error('zip', '<p class="red">', '</p>'); ?>
							</div>
							<div class="form-50">
								<label>Country<span class="red">*</span></label><br>
								<input value="<?php echo set_value('country', ''); ?>"  type="text" name="country">
								<?php echo form_error('country', '<p class="red">', '</p>'); ?>
							</div>
						</div>
						<div class="form-100">							
							<div class="form-50">
								<label>Phone Number<span class="red">*</span></label><br>
								<input value="<?php echo set_value('phone_number', ''); ?>" type="text" name="phone_number">
								<?php echo form_error('phone_number', '<p class="red">', '</p>'); ?>
							</div>
					
						</div>
					</section>	
					<button type="submit" class="login-today on-demand submit" name="submit">Submit</button>
				</form>
			</section>					
		
		</div>
	</div>
</div>
