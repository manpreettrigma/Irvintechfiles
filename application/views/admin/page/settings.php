<?php //echo "<pre>"; print_r($setting_records);?>
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


                            <input type="hidden" value="0" name="seller">
							
								<div class="form-group">
                                <label for="product_headline" class="control-label col-md-2 col-sm-3 col-xs-12">Headline
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                     <textarea placeholder="Product Headline" id="page_headline" name="headline" class="form-control "><?php if(isset($setting_records->headline)) { echo $setting_records->headline; } ?></textarea>
                                </div>
                            </div>
							
							 <br>
							  <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Email
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Email" id="product-title" name="email" value="<?php if(isset($setting_records->email_id)) { echo $setting_records->email_id; }?>" class="form-control ">
                                  
                                   
                                </div>
                            </div>
							 
							  <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Phone Number
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Phone Number" id="product-title" name="phone_no" value="<?php if(isset($setting_records->email_id)) { echo $setting_records->phone_no; } ?>" class="form-control ">
                                  
                                   
                                </div>
                            </div>
							  <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Address
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <textarea type="text" placeholder="Address" id="product-title" name="address" value="" class="form-control "><?php if(isset($setting_records->address)) { echo $setting_records->address; } ?></textarea>
                                  
                                   
                                </div>
                            </div>							
							    <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
								<input type="hidden" value="<?php echo $setting_records->logo_image; ?> " name="upload_image" >
                                    <?php
                                    $logo_image =  $setting_records->logo_image;
                                    if ($logo_image != '' || file_exists(FCPATH . 'uploads/' . $logo_image)) {
                                        ?>
                                        <div class="imageOuter">
                                           
                                            <img class="del_img" src="<?php echo base_url() . 'uploads/' . $logo_image; ?>" >
                                        </div>

                                  <?php
									}
									?>
								
									  <input type="file" name="userfile" size="20" />
									  <!--<img src="<?php// echo $image_path ; ?>">---->
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
</script>