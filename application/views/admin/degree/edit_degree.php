
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/samples/js/sample.js"></script>
<div class="right_col" role="main">
    <div class=""> 
        <div class="page-title">
            <div class="title_left">
                <h3>Degree</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Degree</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
						<?php
						if ($this->session->flashdata('course_message')) {
						$message = $this->session->flashdata('course_message');
						?>
						<div class="<?php echo $message; ?>"><?php echo $message; ?>

						</div>
						<?php
						}
        ?>
	
                        <form class="form-horizontal form-label-left" data-parsley-validate="" id="edit_degree_form" name="edit_degree_form" enctype="multipart/form-data" method="POST" novalidate="">
                        

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Title<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" placeholder="Title" id="" name="degree[title]" value="<?php if(isset( $degree_data -> title ))echo  $degree_data -> title ; ?>" class="form-control has-feedback-left required">
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">T</span>

                                </div> 
                            </div>

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
								 <textarea placeholder="Product Description" id="page_description" name="degree[description]"class="form-control required"><?php if(isset( $degree_data -> description )) echo  $degree_data->description; ?></textarea>
                                   
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">D</span>
                                   
                                </div>
                            </div>
                           
                                                     
                            <br>
							
							                 <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input  id="uploadImg"  type="hidden" value="<?php if(isset($degree_data -> image)) echo $degree_data -> image; ?> " name="upload_image" >
									
                                    <?php
                                    $page_image =$degree_data ->image ;
									//file_exists(FCPATH . 'uploads/' . $page_image);  
                                    if($page_image!='') {
                                        ?>
                                        <div class="imageOuter">
                                            <a onClick="remove_img('<?php echo $degree_data ->id; ?>');" href="javascript:void(0) ">
                                                <img class="del_img" src="<?php echo base_url() . 'public/images/cross.png'; ?>" width="20"height="20">
                                            </a>
                                           <img class="del_img" src="<?php echo base_url() . 'uploads/degrees_image/' . $page_image; ?>" >
                                        </div>

										<?php
										}
										?>
                                    <input type="file" name="degree_image" size="20" id="fileUpload" />
                                    <!--<img src="<?php // echo $image_path ; ?>">---->
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/degree">Cancel</a>
                                    <button id="sumbit_dropzone" name="degree_edit" class="btn btn-success" type="submit"> <i class="fa fa-plus-square" style="color:rgb(228, 228, 228) !important; font-size:18px;padding:0px;"> </i> Save</button>
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
        $.ajax({url: "<?php echo base_url() ?>admin/degree/image_delete?id=" + kay, success: function (result) {
                $(".del_img").remove();
				 $("#uploadImg").val('');	
            }});

    }
</script>