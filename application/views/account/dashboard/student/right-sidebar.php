<div class="right-content">
	<div class="left-group">
		<h2>Calendar</h2>
		<div class="datepicker_outer">
			<input type="text" class="form-control" value="dd/mm/yyyy" name="date" id="date" data-select="datepicker">
			<span class="date_icon"><button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button></span>
		</div>
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



<script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery.datepicker.js"></script>