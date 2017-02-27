	<?php //echo "<pre>"; print_r($blog_data); ?>
	<div class="container">
		<div class="wrapper">
		<div class="tabs-1">

				<section class="tab_content_wrapper">
					<div class="tab_content" id="tab1">
					<?php foreach($blogPage_data as $blog_records) { ?>
						<div class="main_inner_tab">
							<div class="lft_in no-p">
								<h1><?php if(isset($blog_records['title'])) echo $blog_records['title']; ?></h1>
							
								<div class="video">
								
								       <?php
									   $image=explode(",",$blog_records['image']);
                                    $thumbnail_image = $image[0];
                                    $small_image = $image[1];
                                    $large_image = $image[2];
                                    if ($large_image != '') {
                                        ?>
                                   
                                       <img class="del_img" src="<?php echo base_url() . 'uploads/blog_profile/large/' . $large_image; ?>" >
                          
									<?php
									}
									?>
								</div>
								<br>
								
							</div>
							
							<div class="rght_in">
							
								
								<div class="user_info">
									<div class="name_rating">
										<h3><?php if(isset($blog_records['author'])) echo $blog_records['author']; ?></h3>
									
									</div>
									<div class="post_date"><?php if(isset($blog_records['blog_date'])) echo $blog_records['blog_date']; ?></div>
									<h6><?php if(isset($blog_records['title'])) echo $blog_records['title']; ?></h6>
									<p><?php if(isset($blog_records['description'])) echo $blog_records['description']; ?></p>
								</div>
							
							</div>
						</div>
					<?php } ?>
					</div>
				
				
						</div>
					
					</div>
			
					
					
					
				</section>
				
</div>
			
			
		</div>
	</div>