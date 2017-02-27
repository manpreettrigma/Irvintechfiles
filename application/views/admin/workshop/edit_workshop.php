
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/samples/js/sample.js"></script>
<div class="right_col" role="main">
    <div class=""> 
        <div class="page-title">
            <div class="title_left">
                <h3>Workshop</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Workshop</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
						<?php
						if ($this->session->flashdata('workshop_message')) {
						$message = $this->session->flashdata('workshop_message');
						?>
						<div class="<?php echo $message; ?>"><?php echo $message; ?>

						</div>
						<?php
						}
        ?>
	
                        <form class="form-horizontal form-label-left" data-parsley-validate="" id="edit_course_form" name="edit_course_form" enctype="multipart/form-data" method="POST" novalidate="">
                        

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Title<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" placeholder="Title" id="" name="workshop[title]" value="<?php if(isset( $workshop_data -> title ))echo  $workshop_data -> title ; ?>" class="form-control has-feedback-left required">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">T</span>

                                </div> 
                            </div>

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
								 <textarea placeholder="Product Description" id="page_description" name="workshop[description]"class="form-control required"><?php if(isset( $workshop_data -> description )) echo  $workshop_data->description; ?></textarea>
                                   
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">D</span>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Price<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Price" id="product-title" name="workshop[price]" value="<?php if(isset( $workshop_data -> price )) echo  $workshop_data -> price ; ?>" class="form-control has-feedback-left required">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">A</span>
                                   
                                </div>
                            </div>
                            
							
							<div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Day<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Price" id="workshop_days" name="workshop[workshop_day]" value="<?php if(isset( $workshop_data -> workshop_day )) echo  $workshop_data -> workshop_day ; ?>" class="form-control has-feedback-left required">
                                </div>
                             </div>
								
								<div class="form-group">
								<label class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Instructor<span class="required">*</span>
								</label>								
								<div class="col-md-10 col-sm-6 col-xs-12">
									<select class="form-control" id="subject" name="workshop[workshop_instructor]" >
										<option value="">Select Instructor</option>
										<?php foreach($instructors as $instructor){ ?>
											<option value="<?php echo $instructor['id']?>" <?php if(isset($instructorid['workshop_instructor']) && !empty($instructorid['workshop_instructor']) && $instructorid['workshop_instructor'] == $instructor['id']){ echo "selected"; }?>><?php echo ucfirst($instructor['instructor_name']); ?></option>
										<?php }?>
									</select>
									<?php echo form_error('workshop[workshop_instructor]', '<div class="error">', '</div>'); ?>
								</div>
							</div>
							    <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Workshop Time<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="Price" id="course_time" name="workshop[workshop_time]" value="<?php if(isset( $workshop_data -> workshop_time )) echo  $workshop_data -> workshop_time ; ?>" class="form-control has-feedback-left required">
                                </div>
                              </div> 
													
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Learning Objectives</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<textarea class="form-control" name="workshop[workshop_learning_objectives]" rows="3" placeholder=""><?php if(isset( $workshop_data -> workshop_learning_objectives )) echo  $workshop_data -> workshop_learning_objectives ; ?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Required Equipment</label>
								<div class="col-md-9 col-sm-9 col-xs-12">
									<textarea class="form-control" name="workshop[workshop_rtme]" rows="3" placeholder=""><?php if(isset( $workshop_data -> workshop_rtme )) echo  $workshop_data -> workshop_rtme ; ?></textarea>
								</div>
							</div>
							
                            <br>
							
							                 <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input  id="uploadImg"  type="hidden" value="<?php if(isset($workshop_data -> image)) echo $workshop_data -> image; ?> " name="upload_image" >
									
                                    <?php
                                    $page_image =$workshop_data ->image ;
									//file_exists(FCPATH . 'uploads/' . $page_image);  
                                    if($page_image!='') {
                                        ?>
                                        <div class="imageOuter">
                                            <a onClick="remove_img('<?php echo $workshop_data ->id; ?>');" href="javascript:void(0) ">
                                                <img class="del_img" src="<?php echo base_url() . 'public/images/cross.png'; ?>" width="20"height="20">
                                            </a>
                                           <img class="del_img" src="<?php echo base_url() . 'uploads/workshops_image/' . $page_image; ?>" >
                                        </div>

										<?php
										}
										?>
                                    <input type="file" name="workshop_image" size="20" id="fileUpload" />
                                    <!--<img src="<?php // echo $image_path ; ?>">---->
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/workshop">Cancel</a>
                                    <button id="sumbit_dropzone" name="workshop_edit" class="btn btn-success" type="submit"> <i class="fa fa-plus-square" style="color:rgb(228, 228, 228) !important; font-size:18px;padding:0px;"> </i> Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
CKEDITOR.replace('page_description');
	 function remove_img(kay) {
        $.ajax({url: "<?php echo base_url() ?>admin/workshop/image_delete?id=" + kay, success: function (result) {
                $(".del_img").remove();
				 $("#uploadImg").val('');	
            }});

    }
</script>