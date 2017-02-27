 <link href="<?php echo base_url(); ?>assets/backend/vendors/css/modal.css" rel="stylesheet">   <!-- top navigation -->
   <?php  $id= $this->session->userdata('c718b175bc162f27f740fbfa91a3f090'); ?>
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                     <img src="http://dev614.trigma.us/ladress/public/images/user.jpg" alt="..." ">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="<?php echo base_url();?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    <li><a href="<?php echo base_url();?>admin/page/edit_profile"><i class="fa fa-sign-out pull-right"></i> Profile</a></li>
                    <li><a href="<?php echo base_url();?>">Front End</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->