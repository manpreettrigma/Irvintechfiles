<h2><?php if(isset($content_title)) { echo $content_title;} ?></h2>	

<?php

if ($image != '' && file_exists(FCPATH . 'uploads/' . $image)) {
    ?><img class="del_img" src="<?php echo base_url() . 'uploads/' . $image; ?>"><?php
}
?>
    
<?php if (isset($content)) {echo $content;} ?>