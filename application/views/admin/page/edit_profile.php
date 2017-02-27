<?php //echo "<pre>";print_r($admin_records); ?>
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Profile</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Profile</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" data-parsley-validate="" id="edit_profile_form" name="edit_product_form" enctype="multipart/form-data" method="POST" novalidate="">
                           
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">User Name
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="User Name" id="username" name="username" value="<?php if(isset($admin_records->username)) { echo $admin_records->username ;} ?>" class="form-control " disabled>
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product_headline" class="control-label col-md-2 col-sm-3 col-xs-12">First Name
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input type="text" placeholder="First Name" id="username" name="first_name" value="<?php if(isset($admin_records->firstname)) { echo $admin_records->firstname ;} ?>" class="form-control ">
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="product_description" class="control-label col-md-2 col-sm-3 col-xs-12">Last Name
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input type="text" placeholder="Last Name" id="username" name="last_name" value="<?php if(isset($admin_records->lastname)) { echo $admin_records->lastname ;} ?>" class="form-control ">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="product_description" class="control-label col-md-2 col-sm-3 col-xs-12">Email
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input type="text" placeholder="Email" id="username" name="email" value="<?php if(isset($admin_records->email)) { echo $admin_records->email ;} ?>" class="form-control ">
                                </div>
                            </div>
                            <br>							
                            <div class="form-group">
                                <label for="product_description" class="control-label col-md-2 col-sm-3 col-xs-12">Password
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input type="text" placeholder="Password" id="username" name="password" value="<?php if(isset($admin_records->password)) { echo $admin_records->password ;} ?>" class="form-control ">
                                </div>
                            </div>
                            <br>
							
							    <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input type="hidden" value="<?php if(isset($admin_records->image)) { echo $admin_records->image ;} ?> " name="upload_image" >
                                    <?php
                                    $page_image = $admin_records->image;
                                    if ($page_image != '' && file_exists(FCPATH . 'uploads/' . $page_image)) {
                                        ?>
                                        <div class="imageOuter">
                                            
                                            <img width="150" class="del_img" src="<?php echo base_url() . 'uploads/' . $admin_records->image; ?>" >
                                        </div>

									<?php
									}
									?>
                                    <input type="file" name="userfile" size="20" id="fileUpload" />
                                    <!--<img src="<?php // echo $image_path ; ?>">---->
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/page">Cancel</a>
                                    <button id="sumbit_dropzone" class="btn btn-success" type="submit"> <i class="fa fa-plus-square" style="color:rgb(228, 228, 228) !important; font-size:18px;padding:0px;"> </i> Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('page_description');
    function remove_img(kay) {
        $.ajax({url: "<?php echo base_url() ?>admin/Page/image_delete?id=" + kay, success: function (result) {
                $(".del_img").remove();
            }});

    }
</script>