<?php $getUserArr = $userlist[0]; ?>

<div class="right_col" role="main">
    <div class=""> 
        <div class="page-title">
            <div class="title_left">
                <h3>User</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit User</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <form class="form-horizontal form-label-left" data-parsley-validate="" id="edit_product_form" name="edit_product_form" enctype="multipart/form-data" method="POST" novalidate="">
                            <input type="hidden" value="<?php echo $getUserArr['id']; ?>" name="id">

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">User Name<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Username" id="product-title" name="username" value="<?php echo $getUserArr['username']; ?>" class="form-control has-feedback-left required" readonly="readonly">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">U</span>

                                </div> 
                            </div>

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Email" id="product-title" name="email" value="<?php echo $getUserArr['email']; ?>" class="form-control has-feedback-left required">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">E</span>
                                    <?php echo form_error('email', '<p class="red">', '</p>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Status</label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <?php
                                    $status_list = array('1' => 'Enable', '0' => 'Disable');
                                    $class_list = array('class' => 'form-control');
                                    echo form_dropdown('status', $status_list, $getUserArr['status'], $class_list);
                                    ?>
                                </div>
                            </div>
                            
                            
                            <?php
                            if(!empty($getUserArr['meta_info'])){
                                foreach($getUserArr['meta_info'] as $metaKey => $metaValue){
                                   ?><div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12"><?php echo sentence($metaKey); ?></label>
                                    <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" placeholder="Enter <?php echo sentence($metaKey);?>" id="product-title" name="meta_info[<?php echo $metaKey; ?>]" value="<?php echo $metaValue; ?>" class="form-control has-feedback-left required">
                                        <span aria-hidden="true" class="fa fa form-control-feedback left">E</span>
                                        <?php echo form_error('email', '<p class="red">', '</p>'); ?>
                                    </div>
                                    </div><?php 
                                }
                            }
                            ?>
                            
                            <br>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/manage_users">Cancel</a>
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
