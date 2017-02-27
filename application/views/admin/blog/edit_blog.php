>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/samples/js/sample.js"></script>
<div class="right_col" role="main">
    <div class=""> 
        <div class="page-title">
            <div class="title_left">
                <h3>Blog</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Blog</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
						<?php
						if ($this->session->flashdata('blog_message')) {
						$message = $this->session->flashdata('blog_message');
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
                                <input type="text" placeholder="Title" id="product-title" name="blog[title]" value="<?php if(isset( $blog_data -> title)) echo  $blog_data -> title ; ?>" class="form-control has-feedback-left required" required="required" >
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">T</span>

                                </div> 
                            </div>
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Author<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="author" id="product-title" name="blog[author]" value="<?php if(isset( $blog_data -> author ))  echo  $blog_data -> author ; ?>" class="form-control has-feedback-left required" required="required" >
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">A</span>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">publish Date<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                  						  				
								<input type="text" class="form-control" placeholder="dd/mm/yyyy" value="<?php if(isset( $blog_data -> blog_date ))  echo  $blog_data -> blog_date ; ?>" id="datepicker" name="blog[blog_date]" id="date" data-select="datepicker">
								<span class="date_icon"><button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button></span>
				
                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Category<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                  						  				
								  <input type="text" placeholder="Category" id="product-title" name="blog[category]" value="<?php  if(isset( $blog_data -> category )) echo  $blog_data -> category ; ?>" class="form-control has-feedback-left required" required="required" >
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">C</span>
								
				
                                
                                </div>
                            </div>
														

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                   <textarea placeholder="Product Description" id="page_description" name="blog[description]" class="form-control required" ><?php  if(isset( $blog_data -> description )) echo  $blog_data -> description ; ?></textarea>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                    <input id="uploadImg" type="hidden" value="<?php echo $blog_data->image; ?> " name="upload_image" >
									
                                   
                                    <input type="file" name="userfile" size="20" id="fileUpload" />
									<br>
                                      <?php
							
                                    if ($blog_data->image != '') {
											$image=explode(",",$blog_data->image);
                                            $small_image = $image[1];
                                        ?>
                                        <div class="imageOuter">
                                            <a onClick="remove_img('<?php echo $blog_data->id; ?>');" href="javascript:void(0) ">
                                                <img class="del_img" src="<?php echo base_url() . 'public/images/cross.png'; ?>" width="20"height="20">
                                            </a>
											
                                            <img class="del_img" src="<?php echo base_url() . 'uploads/blog_profile/small/' . $small_image; ?>" >
                                        </div>
								
									<?php
									}
									?>
									</div>
									 <div class="col-md-10 col-sm-6 col-xs-12">
								
								</div>
                            </div>                   
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">User Id<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                   <select class="form-control" >
						
								  
								    <?php foreach($users_id as $UserId)
								    { ?>
								     <option value="<?php echo $blog_data -> user_id ;?>"<?php if($blog_data -> user_id ==$blog_data -> user_id): ?> selected="selected"<?php endif; ?>><?php  echo $UserId['id'] ; ?></option>
									<?php } ?>
								   </select>
								   
                                   
                                   
                                </div>
                            </div>
                            
                            <br>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/blog">Cancel</a>
                                    <button id="sumbit_dropzone" name="blog_edit" class="btn btn-success" type="submit"> <i class="fa fa-plus-square" style="color:rgb(228, 228, 228) !important; font-size:18px;padding:0px;"> </i> Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	 <link href="<?php echo base_url(); ?>assets/frontend_dashboard/css/jquery.datepicker.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery-1.8.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery.datepicker.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('page_description');
	  function remove_img(kay) {
        $.ajax({url: "<?php echo base_url() ?>admin/blog/image_delete?id=" + kay, success: function (result) {
                $(".del_img").remove();
                $("#uploadImg").val('');				
            }});

    }
</script>