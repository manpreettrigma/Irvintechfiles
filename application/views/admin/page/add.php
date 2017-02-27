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


                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Title<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Title" id="product-title" name="title" value="<?php echo set_value('title', ''); ?>" class="form-control has-feedback-left required">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">T</span>
                                    <?php echo form_error('title', '<p class="red">', '</p>'); ?>
                                </div> 
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Sidebar</label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">


                                    <?php
                                    $sidebar_list = array('1' => 'Enable', '0' => 'Disable');
                                    $class_list = array('class' => 'form-control');
                                    echo form_dropdown('sidebar', $sidebar_list, '0', $class_list);
                                    ?>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Slug<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Title" id="product-title" name="slug" value="<?php echo set_value('slug', ''); ?>" class="form-control has-feedback-left required">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">S</span>
                                    <?php echo form_error('slug', '<p class="red">', '</p>'); ?>
                                </div>
                            </div>

                            <input type="hidden" value="0" name="seller">

                            <div class="form-group">
                                <label for="product_headline" class="control-label col-md-2 col-sm-3 col-xs-12">Headline
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <textarea placeholder="Product Headline" id="page_headline" name="headline" class="form-control required"></textarea>
                                </div>
                            </div>
                            <br>
                            <input type="hidden" value="" name="upload_image" >
                            <div class="form-group">
                                <label for="product_description" class="control-label col-md-2 col-sm-3 col-xs-12">Description
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <textarea placeholder="Product Description" id="page_description" name="description" class="form-control required"></textarea>
                                </div>
                            </div>
                            <br>



                            <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">


                                    <input type="file" name="userfile" size="20" />
                                    <!--<img src="<?php // echo $image_path ;    ?>">---->
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