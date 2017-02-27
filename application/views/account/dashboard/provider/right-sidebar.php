<div class="right-content">
	<div class="left-group">
		<h2>Provider level</h2>
		<span><?php echo $get_profile['meta_info']['provider_level']; ?></span>
	</div><!--left-group close here-->
	<div class="left-group">
		<h2>Filters</h2>
		<form method="post" action="<?php echo base_url();?>student/filterList">
		<div class="slct_datepicker">
			<select name="provider">
				<option value="">Select Provider</option>
				<?php if(!empty($presenters)){?>				
					<?php foreach($presenters as $presenter){?>
						<option value="<?php echo $presenter['id']; ?>" <?php if(isset($provider) && !empty($provider) && $provider == $presenter['id']){ echo 'selected'; }?>><?php echo ucfirst($presenter['username']); ?></option>
					<?php }?>
				<?php }?>
			</select>			
			<select name="credit">
				<option value="">Select Credit Type</option>
				<?php if(!empty($credits)){?>				
					<?php foreach($credits as $cre){?>
						<option value="<?php echo $cre['id']; ?>" <?php if(isset($credit) && !empty($credit) && $credit == $cre['id']){ echo 'selected'; }?>><?php echo ucfirst($cre['title']); ?></option>
					<?php }?>
				<?php }?>
			</select>
			<!--<select id="Credit">
				<option value="hide">Topic</option>
				<option value="Browse by Credit">Browse by Credit</option>
				<option value="Browse by Credit Type1">Browse by Credit Type1</option>
			</select>-->
			
			<button type="submit" class="customize">Filter</button>
		</div>
		</form>
		
	</div><!--left-group close here-->
</div><!--right-content close here-->
<script>
	/*$(function () {
		$("#datepicker").datepicker();
	});*/
</script>
