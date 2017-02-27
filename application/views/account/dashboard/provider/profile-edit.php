
 <div class="middle-content">
  <div class="content-col">
      <?php
        if($this->session->flashdata('message_name')) {
		$message = $this->session->flashdata('message_name');
        ?>
		<div class="<?php echo $message; ?>"><?php echo $message; ?>

		</div>
      <?php
		}

        ?>
 <?php  //if(isset($message_name)) { echo $msg ; }
         if(isset($id)) { $id= $get_image->id; }
 ?>
    <form class="contact-info" method="POST" enctype="multipart/form-data">
      
        <section>
             <span class="bold">Edit Profile</span>
            <div class="form-100">
                <div class="form-inner-100">
                    <label>Username</label><br>
                    <input type="text" name="username" value="<?php if(isset($get_profile['username']))  echo $get_profile['username']; ?>" placeholder="john" disabled >
                     <input type="hidden" name="userinfo_id" value="<?php  if(isset($id)) {  echo $id;  }?>">
                </div>
            </div>
            <div class="form-100">
                <div class="form-inner-100">
                    <label>Upload Image</label><br>
					<?php if(isset($get_image->user_value)) { $image= $get_image->user_value; 
					if($image != '' ||  file_exists(FCPATH.'uploads/'.$image) )
					{
					?>
						<img src="<?php echo base_url().'uploads/'.$image; ?>" >
					<?php } } ?>
                    <input type="file" name="userfile" value="<?php if(isset($get_image->user_value)) { if($image != '' && file_exists(FCPATH.'uploads/'.$image) ) echo $image; }?>" >
                    

                </div>
            </div>
            <div class="form-100">

                <div class="form-50">
                    <label>Email Address</label><br>
                    <input type="text" name="email" value="<?php  if(isset($get_profile['email'])) echo $get_profile['email']; ?>" placeholder="john-smith@gmail.com">
                     <?php echo form_error('email', '<p class="red">', '</p>'); ?>
                </div>

                <div class="form-50">
                    <label>Provider Contact</label><br>
                    <input type="text" name="phone_number" value="<?php if(isset($get_profile['phone_number'])) echo $get_profile['phone_number']; ?>" placeholder="+614-888-888-8888">
                 <?php echo form_error('phone_number', '<p class="red">', '</p>'); ?>
                </div>
            </div>

            <div class="form-100">
	
                <div class="form-50">
                    <label>First name</label><br>
                    <input type="text" name="first_name" value="<?php if(isset($get_profile['first_name'])) echo $get_profile['first_name'];  ?>"  placeholder="John">
                   <?php echo form_error('first_name', '<p class="red">', '</p>'); ?>

                </div>
                <div class="form-50">
                    <label>Last name</label><br>
                    <input type="text" name="last_name" value="<?php if(isset($get_profile['last_name'])) echo $get_profile['last_name']; ?>" autofocus="" placeholder="John">
                    <?php echo form_error('last_name', '<p class="red">', '</p>'); ?>
                </div>
            </div>

            <div class="form-100">
                <div class="form-50">
                    <label>City</label><br>
                    <input type="text" name="city" value="<?php if(isset($get_profile['city'])) echo $get_profile['city']; ?>" placeholder="Chandigarh">
                 <?php echo form_error('city', '<p class="red">', '</p>'); ?>
                </div>
                <div class="form-50">
                    <label>State / Province</label><br>
                    <input type="text" name="state" value="<?php  if(isset($get_profile['state'])) echo $get_profile['state']; ?>" placeholder="Punjab">
               <?php echo form_error('state', '<p class="red">', '</p>'); ?>
                </div>
            </div>
            <div class="form-100">
                <div class="form-50">
                    <label>Zip / Postal Code</label><br>
                    <input type="text" name="zip_code" value="<?php if(isset($get_profile['zip'])) echo $get_profile['zip']; ?>" placeholder="175835">
                    <?php echo form_error('zip_code', '<p class="red">', '</p>'); ?>
                </div>
                <div class="form-50">
                    <label>Country</label><br>
                    <input type="text" name="country" value="<?php if(isset($get_profile['country']))  echo $get_profile['country']; ?>" placeholder="India">
                  <?php echo form_error('country', '<p class="red">', '</p>'); ?>
                </div>
            </div>

            <div class="form-100">
                <div class="form-50">
                    <label>Current Website</label><br>
                    <input type="text" name="website" value="<?php if(isset($get_profile['website']))  echo $get_profile['website']; ?>"  placeholder="http://cleseminars.com/">
                </div>
                <div class="form-50">
				   <label>Address Line 1</label><br>
                    <input type="text" name="address1" value="<?php if(isset($get_profile['address'])) echo $get_profile['address']; ?>" placeholder="Schönhauser Allee">
                   <?php echo form_error('address1', '<p class="red">', '</p>'); ?>
                </div>
            </div>

        </section>
        <button type="submit" name="edit_profile" class="login-today on-demand submit">Submit</button>
    </form>
	</div>
	</div>
