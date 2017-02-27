<div class="container">
   
        <?php
        if (isset($banner_images)) {
            ?>		
			<div class="about-img">
            <style>
                .about-img {
                    background-image:url('<?php echo base_url() . 'uploads/' . $banner_images; ?>');
                }
            </style>
			  <h2><?php if (isset($headline)) {
            echo $headline;
        } ?></h2>
		     
    </div>
            <?php
        }
		
        ?>		

 

</div>