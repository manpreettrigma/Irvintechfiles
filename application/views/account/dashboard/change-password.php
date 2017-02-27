    <?php
    foreach($get_content as $get_contents){
	
     	$password= $get_contents['password'];
    } 
    ?>


 <div class="middle-content">
       <?php
        if($this->session->flashdata('password')) {
		$message = $this->session->flashdata('password');
        ?>
		<div class="<?php echo $message; ?>"><?php echo $message; ?>

		</div>
      <?php
		}

        ?>
    <form class="contact-info" method="POST">
      
        <section>
             <span class="bold">Update Password</span>
       <?php  if(isset($msg)){ echo $msg;} ?>
            <div class="form-100">
	
                <div class="form-50">
                    <label>Password</label><br>
                    <input type="text" name="password" value="<?php if(isset($password)) echo $password; ?>"  placeholder="John" required>
               

                </div>
                <div class="form-50">
                    <label>Confirm Password</label><br>
                    <input type="text" name="cfpassword" value=""  placeholder="Confirm Password" >
               

                </div>

            </div>



        </section>
        <button type="submit" name="edit_password" class="login-today on-demand submit">Submit</button>
    </form>
	</div>
