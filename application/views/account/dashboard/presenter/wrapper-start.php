<?php $user_info = $this->session->userdata['user_info']; ?>
<div class="dashboard-container">
    <div class="dashboard-top">
        <div class="dashboard-wrapper">
            <div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/logo.png" alt="logo"></a></div><!--logo close here-->
            <div class="top-right">
                <ul>
                    <li>
                        <a href="javascript:void(0)">
                            <span class="notifications"><i class="fa fa-bell-o" aria-hidden="true"></i></span>
                            <span class="numbers">2</span>
                        </a>
                    </li> 
                    <li>
                        <a href="javascript:void(0)">
                            <?php
                            echo $user_info['username'];
                            if (isset($user_info['meta_info']['image']) && file_exists(FCPATH . 'uploads/' . $user_info['meta_info']['image'])) {
                                ?><img src="<?php echo base_url() . 'uploads/' . $user_info['meta_info']['image']; ?>" ><?php
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="user-section">
        <div class="dashboard-wrapper">
            <div class="user-detail">
                <?php
                if (isset($user_info['meta_info']['image']) && file_exists(FCPATH . 'uploads/' . $user_info['meta_info']['image'])) {
                    ?><img src="<?php echo base_url() . 'uploads/' . $user_info['meta_info']['image']; ?>" ><?php
                }
                ?>
                <span><?php echo $user_info['username']; ?></span>
            </div><!--user-detail close here-->
            <div class="breadcrumb">
                <ul>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>Account/dashboard?id=<?php echo $user_info['id'] ?>">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="button-section">
        <!--div class="dashboard-wrapper">
            <button class="dashboard"><span><i class="fa fa-home" aria-hidden="true"></i></span> Dashboard</button>
            <button class="customize">Customize this page</button>
        </div-->
    </div>