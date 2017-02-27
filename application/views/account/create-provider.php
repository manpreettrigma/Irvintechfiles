<?php //echo "<pre>";print_r($create_provider);     ?>
<div class="container">
    <div class="wrapper">
        <div class="provider">
            <h2>Apply to be a <span class="bold">Provider</span></h2> 
            <section class="width-70">
                <form class="contact-info" method="POST">
                    
                    <section>
                        <h3>Account <span class="bold">Information</span></h3>
                        <div class="form-100">
                            <div class="form-inner-100">
                                <label>Username</label><br>
                                
                                <input type="text" name="username" value="<?php echo set_value('username', ''); ?>" placeholder="john">
                                <?php echo form_error('username', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-100">

                            <div class="form-50">
                                <label>Email Address</label><br>
                                <input type="text" name="email" value="<?php echo set_value('email', ''); ?>" placeholder="john-smith@gmail.com">
                                <?php echo form_error('email', '<p class="red">', '</p>'); ?>
                            </div>

                            <div class="form-50">
                                <label>Provider Contact</label><br>
                                <input type="text" name="phone_number" value="<?php echo set_value('phone_number', ''); ?>" placeholder="+614-888-888-8888">
                                <?php echo form_error('phone_number', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-100">

                            <div class="form-50">
                                <label>First name</label><br>
                                <input type="text" name="first_name" value="<?php echo set_value('first_name', ''); ?>"  placeholder="John">
                                <?php echo form_error('first_name', '<p class="red">', '</p>'); ?>

                            </div>
                            <div class="form-50">
                                <label>Last name</label><br>
                                <input type="text" name="last_name" value="<?php echo set_value('last_name', ''); ?>" autofocus="" placeholder="John">
                                <?php echo form_error('last_name', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-100">
                            <div class="form-50">
                                <label>Address Line 1</label><br>
                                <input type="text" name="address1" value="<?php echo set_value('address1', ''); ?>" placeholder="Schönhauser Allee">
                                <?php echo form_error('address1', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="form-50">
                                <label>Address Line 2</label><br>
                                <input type="text" name="address2" value="<?php echo set_value('address2', ''); ?>" placeholder="167c 10435">
                            </div>
                        </div>
                        <div class="form-100">
                            <div class="form-50">
                                <label>City</label><br>
                                <input type="text" name="city" value="<?php echo set_value('city', ''); ?>" placeholder="Chandigarh">
                                <?php echo form_error('city', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="form-50">
                                <label>State / Province</label><br>
                                <input type="text" name="state" value="<?php echo set_value('state', ''); ?>" placeholder="Punjab">
                                <?php echo form_error('state', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-100">
                            <div class="form-50">
                                <label>Zip / Postal Code</label><br>
                                <input type="text" name="zip_code" value="<?php echo set_value('zip_code', ''); ?>" placeholder="175835">
                                <?php echo form_error('zip_code', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="form-50">
                                <label>Country</label><br>
                                <input type="text" name="country" value="<?php echo set_value('country', ''); ?>" placeholder="India">
                                <?php echo form_error('country', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-100">
                            <div class="form-50">
                                <label>Current Website</label><br>
                                <input type="text" name="website" value="<?php echo set_value('website', ''); ?>"  placeholder="http://cleseminars.com/">
                            </div>
                            <div class="form-50">
                                <label>Federal Tax ID</label><br>
                                <input type="text" name="fed_tax_id" value="<?php echo set_value('fed_tax_id', ''); ?>"  placeholder="HPLDF168542">
                            </div>
                        </div>
                    </section>
                    <input type="hidden" name="provider_level" value="free">
                    <button type="submit" name="submit" class="login-today on-demand submit">Submit</button>
                </form>
            </section>
            <section class="width-30"> 
                <div>
                    <h3>Provider <span class="bold">Levels</span></h3>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias</p>
                    <div class="trophy">
                        <ul>
                            <li>
                                <img src="<?php echo base_url(); ?>assets/frontend/images/silver.jpg"/>
                                <div class="trophy-text">
                                    <h5>Platinum Rovider</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                </div>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>assets/frontend/images/gold.jpg"/>
                                <div class="trophy-text">
                                    <h5>Gold Provider</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                </div>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>assets/frontend/images/silver.jpg"/>
                                <div class="trophy-text">
                                    <h5>Platinum Rovider</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                </div>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>assets/frontend/images/gold.jpg"/>
                                <div class="trophy-text">
                                    <h5>Gold Provider</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                </div>
                            </li>
                            <li>
                                <img src="<?php echo base_url(); ?>assets/frontend/images/silver.jpg"/>
                                <div class="trophy-text">
                                    <h5>Platinum Rovider</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="provider">
                    <h3>Program <span class="bold">Limitations</span></h3>
                    <p>All applications are subject to review and approval. Provider participation is limited to existing continuing legal education providers in the United States, its Commonwealth's Territories, and Protectorates. Terms and Conditions apply.</p>
                </div>
            </section>
        </div>
    </div>
</div>
