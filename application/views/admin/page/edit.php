<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/samples/js/sample.js"></script>
<!-- page content -->

<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Page</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Page</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form class="form-horizontal form-label-left" data-parsley-validate="" id="edit_product_form" name="edit_product_form" enctype="multipart/form-data" method="POST" novalidate="">
                            <input type="hidden" value="<?php echo $page_content->id; ?>" name="id">

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Title<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Title" id="product-title" name="title" value="<?php echo $page_content->title; ?>" class="form-control has-feedback-left required">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">T</span>
                                    <?php echo form_error('title', '<p class="red">', '</p>'); ?>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Slug<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Title" id="product-title" name="slug" value="<?php echo $page_content->slug; ?>" class="form-control has-feedback-left required">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">S</span>
                                    <?php echo form_error('slug', '<p class="red">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Sidebar</label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">

                                    <?php
                                    $status_list = array('1' => 'Enable', '0' => 'Disable');
                                    $class_list = array('class' => 'form-control');
                                    echo form_dropdown('sidebar', $status_list, $page_content->sidebar, $class_list);
                                    ?>


                                </div>
                            </div>
                            
                            <!--div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Menu Status</label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <?php //echo form_dropdown('active_menu', $status_list, $page_content->active_menu, $class_list); ?>
                                </div>
                            </div-->

                            <div class="form-group">
                                <label for="product_headline" class="control-label col-md-2 col-sm-3 col-xs-12">Headline
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <textarea placeholder="Product Headline" id="page_headline" name="headline" class="form-control required"><?php echo $page_content->headline; ?></textarea>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="product_description" class="control-label col-md-2 col-sm-3 col-xs-12">Description
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <textarea placeholder="Product Description" id="page_description" name="description" class="form-control required"><?php echo $page_content->description; ?></textarea>
                                </div>
                            </div>
                            <br>



                            <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input type="hidden"  id="upload_image"  value="<?php echo $page_content->image; ?>" name="upload_image" >
									
                                    <?php
                                    $page_image = $page_content->image;
									//file_exists(FCPATH . 'uploads/' . $page_image);  
                                    if($page_image!='') {
                                        ?>
                                        <div class="imageOuter">
                                            <a onClick="remove_img('<?php echo $page_content->id; ?>');" href="javascript:void(0) ">
                                                <img class="del_img" src="<?php echo base_url() . 'public/images/cross.png'; ?>" width="20"height="20">
                                            </a>
                                            <img class="del_img" src="<?php echo base_url() . 'uploads/' . $page_content->image; ?>" >
                                        </div>

										<?php
										}
										?>
                                    <input type="file" name="userfile" size="20" id="fileUpload" />
                                    <!--<img src="<?php // echo $image_path ; ?>">---->
                                </div>
                            </div>


                            <br>
							
                            <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12"> Upload Banner
                                </label>
								 <input type="hidden"  id="banner_image" value="<?php echo $page_content->banner_image;?>" name="banner_image" >
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    
                                    <?php
                                    $banner_image = $page_content->banner_image;
                                    if ($banner_image != '') {
                                        ?>
                                        <div class="imageOuter">
                                            <a onClick="remove_bannerimg('<?php echo $page_content->id; ?>');" href="javascript:void(0) ">
                                                <img class="del_img1" src="<?php echo base_url() . 'public/images/cross.png'; ?>" width="20"height="20">
                                            </a>
                                            <img class="del_img1" src="<?php echo base_url() . 'uploads/' . $page_content->banner_image; ?>" >
                                        </div>

										<?php
										}
										?>
                                        </div>
								<input type="file" name="bannerfile" size="20" id="fileUpload" />
                                    <!--<img src="<?php // echo $image_path ; ?>">---->
                                </div>
                            </div>
							<br>
							
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
    CKEDITOR.replace('page_headline');
    function remove_img(kay) {
        $.ajax({url: "<?php echo base_url() ?>admin/Page/image_delete?id=" + kay, success: function (result) {
                $(".del_img").remove();
                $("#upload_image").val("");
            }});

    }
	 function remove_bannerimg(kay) {
        $.ajax({url: "<?php echo base_url() ?>admin/Page/imagebanner_delete?id=" + kay, success: function (result) {
                $(".del_img1").remove();
				 $("#banner_image").val("");
            }});

    }
</script>