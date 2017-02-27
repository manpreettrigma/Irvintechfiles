        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Admins</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editing Admin</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      
                    <br>
                    <form method="POST" name="new_admin"  id="add-admin-form" data-parsley-validate="" class="form-horizontal form-label-left">
					<div class="form-group">
                        <label for="email-id" class="control-label col-md-3 col-sm-3 col-xs-12">Change Username</label>
                       <div class="col-md-6 col-sm-6 col-xs-12 ">
                       <input type = "checkbox" name="change_username" <?php if(isset($_REQUEST['change_username'])){echo "checked";}?> value="1" >
					   <sup>Check this box if you want to change Username for the admin. otherwise any changes will not be saved.</sup>
					</div>
					 </div>
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-name">Username <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input class="form-control " name="user-name" value="<?php if(isset($_REQUEST['user-name'])){echo $_REQUEST['user-name'];}else{
							echo $admin_data['0']['username'];
						} ?>" required="required" id="user-name" placeholder="User Name" type="text">
						<?php echo form_error('user-name'); ?>
                      </div>
                      </div>
					
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                          <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input class="form-control has-feedback-left" name="first-name" value="<?php if(isset($_REQUEST['first-name'])){echo $_REQUEST['first-name'];}else{
							echo $admin_data['0']['firstname'];
						}  ?>" required="required" id="first-name" placeholder="First Name" type="text">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
						<?php echo form_error('first-name'); ?>
                      </div>
                      </div>	  
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input class="form-control" id="last-name" name="last-name" value="<?php if(isset($_REQUEST['last-name'])){echo $_REQUEST['last-name'];}else{
							echo $admin_data['0']['lastname'];
						}  ?>" placeholder="Last Name" type="text">
                        <?php echo form_error('last-name'); ?>
						<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="email-id" class="control-label col-md-3 col-sm-3 col-xs-12">Change Email</label>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group ">
                       <input type = "checkbox" name="change_email" value="1"  <?php if(isset($_REQUEST['change_email'])){echo "checked";}?>  >
						<sup>Check this box if you want to change email adress for the admin. Otherwise any changes will not be saved.</sup>
					</div>
					 </div>
					  
                      <div class="form-group">
                        <label for="email-id" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>
                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input class="form-control has-feedback-left" id="email-id" name="email-id" value="<?php if(isset($_REQUEST['email-id'])){echo $_REQUEST['email-id'];}else{
							echo $admin_data['0']['email'];
						}  ?>" placeholder="Email" type="email">
						<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                       <?php echo form_error('email-id'); ?>						
					</div>
					 </div>
					 
					  <input type="hidden" name="position" value="<?php echo $admin_data['0']['role']; ?>" >
                     
					 <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo base_url(); ?>admin/manage_admins" class="btn btn-primary">Cancel</a>
                          <button type="submit" class="btn btn-success">Update Changes</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
