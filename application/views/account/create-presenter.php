<div class="container">
    <div class="wrapper">
        <div class="presenter">
            <h2>Apply to be a <span class="bold">Presenter</span></h2> 
            <section class="width-70">
                <section class="no-margin">
                    <h3>1. Contact <span class="bold">information</span></h3>
                    <form class="contact-info" method="post">

                        <div class="form-100">
                            <div class="form-50">
                                <label>USERNAME</label><br>
                                <input type="text" name="username" value="<?php echo set_value('username', ''); ?>"  placeholder="John">
                                <?php echo form_error('username', '<p class="red">', '</p>'); ?>

                            </div>
                            <div class="form-50">
                                <label>Email Address</label><br>
                                <input placeholder="john-smith@gmail.com" type="text" value="<?php echo set_value('email', ''); ?>" autofocus=""  name="email">
                                <?php echo form_error('email', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-100">

                            <div class="form-50">
                                <label>First name</label><br>
                                <input placeholder="John" type="text" autofocus="" value="<?php echo set_value('first_name', ''); ?>" name="first_name">
                                <?php echo form_error('first_name', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="form-50">
                                <label>Last name</label><br>
                                <input placeholder="John" type="text" value="<?php echo set_value('last_name', ''); ?>" autofocus=""  name="last_name">
                                <?php echo form_error('last_name', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>

                        <div class="form-100">
                            <div class="form-50">
                                <label>Address Line 1</label><br>
                                <input placeholder="Schönhauser Allee" value="<?php echo set_value('address1', ''); ?>" type="text" autofocus=""  name="address1">
                                <?php echo form_error('address1', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="form-50">
                                <label>Address Line 2</label><br>
                                <input placeholder="167c 10435"  type="text" autofocus=""  name="address2">

                            </div>
                        </div>
                        <div class="form-100">
                            <div class="form-50">
                                <label>City</label><br>
                                <input placeholder="Chandigarh" value="<?php echo set_value('city', ''); ?>" type="text" autofocus=""  name="city">
                                <?php echo form_error('city', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="form-50">
                                <label>State / Province</label><br>
                                <input placeholder="Punjab"  value="<?php echo set_value('state', ''); ?>" type="text" autofocus=""  name="state">
                                <?php echo form_error('state', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-100">
                            <div class="form-50">
                                <label>Zip / Postal Code</label><br>
                                <input placeholder="175835" value="<?php echo set_value('zip', ''); ?>" type="text" autofocus=""  name="zip">
                                <?php echo form_error('zip', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="form-50">
                                <label>Counrty</label><br>
                                <input placeholder="India" value="<?php echo set_value('country', ''); ?>"  type="text" autofocus=""  name="country">
                                <?php echo form_error('country', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>
                        <div class="form-100">
                            <div class="form-50">
                                <label>Phone Number</label><br>
                                <input placeholder="+614-888-888-8888" value="<?php echo set_value('phone_number', ''); ?>" type="text" autofocus=""  name="phone_number">
                                <?php echo form_error('phone_number', '<p class="red">', '</p>'); ?>
                            </div>
                            <div class="form-50">
                                <label>Current Website</label><br>
                                <input placeholder="http://cleseminars.com/" type="text" autofocus=""   value="<?php echo set_value('website', ''); ?>"  name="website">
                                <?php echo form_error('website', '<p class="red">', '</p>'); ?>
                            </div>
                        </div>
                </section>
                <section class="width-100">
                    <h3>2. Speaking <span class="bold">Experience</span></h3>

                    <div class="textara">
                        <label>Describe Your Speaking Experience</label><br>
                        <textarea placeholder="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius" name="speaking_experience" value="<?php echo set_value('speaking_experience', ''); ?>" ></textarea>
                        <?php echo form_error('speaking_experience', '<p class="red">', '</p>'); ?>
                    </div>	

                </section>	
                <section>
                    <h3>3. Links to Previous <span class="bold">Presentations</span></h3>

                    <div class="form-100">
                        <div class="form-50">
                            <label>Link to past presentation pages, materials, or Videos</label><br>
                            <input placeholder="http://cleseminars.com/" type="text" name="link1" >

                        </div>
                        <div class="form-50">
                            <label>Link</label><br>
                            <input placeholder="http://cleseminars.com/" type="text" name="link2" >
                        </div>
                    </div>
                    <div class="form-100">
                        <div class="form-50">
                            <label>Link</label><br>
                            <input placeholder="http://cleseminars.com/" type="text" name="link3"  >
                        </div>
                        <div class="form-50">
                            <label>Link</label><br>
                            <input placeholder="http://cleseminars.com/" type="text" name="link4"  >
                        </div>
                    </div>
                    <div class="form-100">
                        <div class="form-50">
                            <label>Link</label><br>
                            <input placeholder="http://cleseminars.com/" type="text" name="link5"  >
                        </div>
                        <div class="form-50">
                            <label>Link</label><br>
                            <input placeholder="http://cleseminars.com/" type="text" name="link6" >
                        </div>
                    </div>
                </section>	
                <button type="submit" class="login-today on-demand submit" name="submit">Submit Application</button>

            </section>


            </form>
            <section class="width-30"> 
                <div>
                    <h3>Presenter <span class="bold">Levels</span></h3>
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
