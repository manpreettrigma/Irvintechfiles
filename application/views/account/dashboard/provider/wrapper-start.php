<?php
$user_info = $this->session->userdata['user_info'];
$setting_records = get_settings();
?>
<div class="dashboard-container">

    <header>
        <div class="top-header">
            <div class="wrapper">
                <ul class="pull-right">
                    <li><a href="mailto:lms@example.com" target="_blank"><i class="fa fa-envelope"></i><?php
                            if (isset($setting_records->email_id)) {
                                echo $setting_records->email_id;
                            }
                            ?></a></li>
                    <li class="divider">|</li>
                    <li><a href="javascript:void(0)"><i class="fa fa-phone"></i><?php
                            if (isset($setting_records->phone_no)) {
                                echo $setting_records->phone_no;
                            }
                            ?></a></li>
                </ul>
            </div>
        </div>
        <div class="wrapper">
            <div class="main-header">
                <?php
                if (isset($setting_records->logo_image)) {
                    $logo_image = $setting_records->logo_image;
                    if ($logo_image != '' || file_exists(FCPATH . 'uploads/' . $logo_image)) {
                        ?>
                        <style>
                            .logo {
                                background-image:url('<?php echo base_url() . 'uploads/' . $logo_image; ?>');
                            }
                        </style>			
                        <a href="<?php echo base_url(); ?>" class="logo pull-left"></a>

                        <?php
                    }
                }
                if (isset($setting_records->headline)) {
                    echo $setting_records->headline;
                }
                ?>
                <div class="buttons pull-right">
                    <?php if (!isset($this->session->userdata['user_info']['id'])): ?>
                        <button class="login-today" onclick="window.location.href = '<?php echo base_url() ?>admin'">Login to Today’s Webinar</button>
                        <div class="profileBtnOuter"> 
                            <button class="create-profile" onclick="myFunction()">Create Profile</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="<?php echo base_url(); ?>account/create-presenter">Presenter</a>
                                <a href="<?php echo base_url(); ?>account/create-provider">Provider</a>
                            </div> 
                        </div>
                    <?php endif; ?>

                    <div class="profileBtnOuterLogin"> 
                        <?php if (isset($this->session->userdata['user_info']['id'])): ($this->session->userdata['user_info']); ?>
                            <?php
                            if (isset($get_profile['meta_info']['profile_picture']) && file_exists(FCPATH.'uploads/user_profile/large/'.$get_profile['meta_info']['profile_picture'])) {
                                echo '<a href="javascript:void(0)" onclick="logout()">';
                                echo '<img width="50" height="50" src="' . base_url() . 'uploads/user_profile/large/' . $get_profile['meta_info']['profile_picture'] . '">';
                                echo '</a>';
                            } else {

                                echo '<a href="javascript:void(0)" onclick="logout()">';
                                echo '<img src="'.base_url().'assets/frontend/images/no_images.png"/>';
                                echo '</a>';
                            }
                            ?>

                            <div id="logout" class="dropdown-content">
                                <a href="<?php echo base_url(); ?>account/dashboard">Dashboard</a>
                                <a href="<?php echo base_url(); ?>account/logout">Logout</a>
                            </div> 
                        <?php else: ?>
                            <button class="login" onclick="window.location.href = '<?php echo base_url() ?>account/login'">LOG IN</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="navigation1">
            <div class="wrapper">
                <nav>
                    <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                    <ul class="mobimenu">
                        <li><a href="<?php echo base_url(); ?>" class="<?php echo activate_menu('Home'); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>page/about-us" class="<?php
                            if ($this->uri->uri_string() == 'page/about-us') {
                                echo 'active';
                            }
                            ?>">About Us</a></li>
                        <li><a href="<?php echo base_url(); ?>page/live-webinars" class="<?php
                            if ($this->uri->uri_string() == 'page/live-webinars') {
                                echo 'active';
                            }
                            ?>">Live Webinars</a></li>
                        <li><a href="<?php echo base_url(); ?>page/on-demand" class="<?php
                            if ($this->uri->uri_string() == 'page/on-demand') {
                                echo 'active';
                            }
                            ?>">On-Demand</a></li>
                        <li><a href="<?php echo base_url(); ?>page/by-jurisdiction" class="<?php
                            if ($this->uri->uri_string() == 'page/by-jurisdiction') {
                                echo 'active';
                            }
                            ?>">By Jurisdiction</a></li>
                        <li><a href="<?php echo base_url(); ?>page/partner-with-us" class="<?php
                            if ($this->uri->uri_string() == 'page/partner-with-us') {
                                echo 'active';
                            }
                            ?>">Partner With Us <span class="fa fa-angle-down"></span></a>
                            <!--ul class="hidden">
                                <li><a href="#">For Bar Association</a></li>
                                <li><a href="#">For Law Firms</a></li>
                                <li><a href="#">For Other Legal Organizations</a></li>
                                <li><a href="#">Interested in Presenting?</a></li>
                            </ul-->
                        </li>
                        <li><a href="<?php echo base_url(); ?>page/help-and-faq" class="<?php
                            if ($this->uri->uri_string() == 'page/help-and-faq') {
                                echo 'active';
                            }
                            ?>">Help/FAQ</a></li>
                    </ul>
                </nav><div class="clr"></div>
            </div>
            <div class="clr"></div>
        </div>	
        <div class="clr"></div>
    </header>

    <div class="user-section">
        <div class="dashboard-wrapper">

            <div class="breadcrumb">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>account/dashboard">Dashboard</a></li>
                    <?php echo $breadcrumb;?>
                </ul>
            </div>
        </div>
    </div>
    
    
        <?php 
        if(empty(get_payment_status($user_info['id']))){
            echo '<div class="alert alert-danger">';
            echo '<strong>Inactive!</strong> You are using Free provider account. Click to <a href="'.base_url().'page/level">UPGRADE</a> for maximum accessibility.';
            echo '</div>';
        }
        ?>
   

    <!--div class="button-section">
        <!--div class="dashboard-wrapper">
            <button class="dashboard"><span><i class="fa fa-home" aria-hidden="true"></i></span> Dashboard</button>
            <button class="customize">Customize this page</button>
        </div>
    </div-->