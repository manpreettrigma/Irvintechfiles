
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a class="btn btn-success">Edit Profile</a>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar" style="padding:0px;overflow: hidden;height:100px;box-shadow: 0 4px 8px 0 #2A3F54, 0 6px 20px 0 #2A3F54;width:100px;border-radius: 2%;">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" style="width: 100%;padding: 0px;height:100%;border-radius: 2%;" src="<?php
                                    if ($userinfo['0']['picture_url'] == null || $userinfo['0']['picture_url'] == "" || $userinfo['0']['picture_url'] == " ") {
                                        echo base_url() . "images/user.png";
                                    } else {
                                        echo $userinfo['0']['picture_url'];
                                    }
                                    ?>" alt="Avatar" title="Avatar">
                                </div>
                            </div>
                            <h3><?php echo $userinfo['0']['name']; ?></h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-envelope user-profile-icon"></i> <a href="mailto:<?php echo $userinfo['0']['email']; ?>"><?php echo $userinfo['0']['email']; ?></a>
                                </li>
                                <li><i class="fa fa-hashtag user-profile-icon"></i> User Id:  <?php echo $userinfo['0']['id']; ?>
                                </li>

                            </ul>


                            <br />

                            <!-- start skills -->
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="form-group">
                                <div class="group-item">
                                    <input type="text" value="Gender: " disabled class="borderless_input"><input disabled type="text" class="bottom_border_input" value="<?echo $userinfo['0']['gender'];?>">
                                </div>
                                <div class="group-item">
                                    <input type="text" value="Joining Date: " disabled class="borderless_input"><input disabled type="text" class="bottom_border_input" value="<?echo $userinfo['0']['created'];?>">
                                </div>
                                <div class="group-item">
                                    <input type="text" value="Phone: " disabled class="borderless_input"><input disabled type="text" class="bottom_border_input" value="<?echo $userinfo['0']['phone'];?>">
                                </div>
                                <div class="group-item">
                                    <input type="text" value="Address: " disabled class="borderless_input"><input disabled type="text" class="bottom_border_input" value="<?echo $userinfo['0']['adress'];?>">
                                </div>
                                <div class="group-item">
                                    <input type="text" value="City: " disabled class="borderless_input"><input disabled type="text" class="bottom_border_input" value="<?echo $userinfo['0']['city'];?>">
                                </div>
                                <div class="group-item">
                                    <input type="text" value="State: " disabled class="borderless_input"><input disabled type="text" class="bottom_border_input" value="<?echo $userinfo['0']['state'];?>">
                                </div>
                                <div class="group-item">
                                    <input type="text" value="Zip code: " disabled class="borderless_input"><input disabled type="text" class="bottom_border_input" value="<?echo $userinfo['0']['zipcode'];?>">
                                </div>
                                <div class="group-item">
                                    <input type="text" value="Status: " disabled class="borderless_input"><input disabled type="text" class="bottom_border_input" value="<? if($userinfo['0']['status']==0){echo"Inactive";} if($userinfo['0']['status']==1){echo"Active";} if($userinfo['0']['status']==2){echo"Blocked";}?>">
                                </div>
                                <div class="group-item" style="float:left;">
                                    <input type="text" style="float:left" value="ID Proof : " disabled class="borderless_input"><div style="float:left;width:173px;" class="bottom_border_input"><a href="<?php echo base_url() . "uploads/id_proofs/" . $userinfo['0']['id_proof']; ?>" class="fancybox">View ID Proof</a></div>
                                </div>
                                <div class="group-item" style="float:left;clear:left;">
                                    <input type="text" style="float:left" value="Action : " disabled class="borderless_input">
                                    <div style="float:left;" class="bottom_border_input">
                                        <form method="post" action="<?php echo base_url() . "admin/Manage/manage_user"; ?>">
                                            <input type="hidden" name="id" value="<?php echo $userinfo['0']['id']; ?>">
                                            <select name="user_activation">
                                                <option <?php
                                                if ($userinfo['0']['status'] == 0 || $userinfo['0']['status'] == 2) {
                                                    echo "selected='slected'";
                                                }
                                                ?> value="1">Acitvate</option>
                                                <option <?php
                                                if ($userinfo['0']['status'] == 1) {
                                                    echo "selected='slected'";
                                                }
                                                ?> value="2">Inactivate</option>
                                            </select>
                                            <input type="submit" class="btn btn-info btn-sm" value="Submit Action">
                                        </form>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
