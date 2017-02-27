<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>public/ckeditor/samples/js/sample.js"></script>

<div class="right_col" role="main">
    <div class=""> 
        <div class="page-title">
            <div class="title_left">
                <h3>Blogs</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Blogs</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <form class="form-horizontal form-label-left"  id="edit_product_form" name="edit_product_form" enctype="multipart/form-data" method="POST" >
                        

                            <div class="form-group">
							
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Title<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type= "text"   placeholder= "Title" id= "product-title"  name= "blog[title]" value= "" class="form-control has-feedback-left required" required="required" />
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">T</span>

                                </div> 
                            </div>

                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Author<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" placeholder="author" id="product-title" name="blog[author]" value="" class="form-control has-feedback-left required" required="required"  />
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">A</span>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">publish Date<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback" >
                                  						  				
								<input type="text" class="form-control" value="" name="blog[blog_date]" id="date" data-select="datepicker"  />
								<span class="date_icon"><button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button></span>
				
                                
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Category<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                  						  				
								  <input type="text" placeholder="Category" id="product-title" name="blog[category]" value="" class="form-control has-feedback-left required" required="required"  />
                                    <span aria-hidden="true" class="fa fa form-control-feedback left">C</span>
								
				
                                
                                </div>
                            </div>
							
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">Description<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                    <textarea placeholder="Product Description" id="page_description" name="blog[description]" class="form-control required" required="required" ></textarea>
                                  
                                </div>
                            </div>
							    <div class="form-group">
                                <label for="image_upload" class="control-label col-md-2 col-sm-3 col-xs-12">Image Upload
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12">
                                
								 <input type="hidden" value="" name="upload_image" >
									  <input type="file" name="userfile" size="20" />
									  <!--<img src="<?php// echo $image_path ; ?>">---->
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="product-title" class="control-label col-md-2 col-sm-3 col-xs-12">User Id<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-6 col-xs-12 form-group has-feedback">
                                   <select class="form-control"  name="blog[user_id]" >
								   
								   <?php foreach($users_id as $UserId)
								    { ?>
									<option value="<?php echo $UserId['id']; ?>"><?php  echo $UserId['id'] ; ?></option>
								   <?php } ?>
								   
								   </select>
							  
                                </div>
                            </div>
                            
                            
                            <br>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/admin/blog">Cancel</a>
                                    <button id="sumbit_dropzone" type="submit" class="btn btn-success" > <i class="fa fa-plus-square" style="color:rgb(228, 228, 228) !important; font-size:18px;padding:0px;"> </i> Save</button>
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
</script>
