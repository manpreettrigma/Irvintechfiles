<?php //print_r($get_profile);           ?>
<div class="full-content">
	<div class="content-col">
		<div class="row">
			<div class="col-xs-12 col-md-85">
				<h2>Catalog</h2>                                          
			</div>
			<div id="profile_snapshot" class="col-xs-12 col-md-15">
				<a href="<?php echo base_url(); ?>account/provider/add-catalog"/>
				<button type="submit" class="btn btn-success btn-sm"><i class="fa  fa-plus-square"></i> Add Catalog</button>
			</a>
		</div>
	</div>
</div>

<div class="content-col">
        <?php
		if ($this->session->flashdata('message_status')) {
			$message = $this->session->flashdata('message_status');
			?><div class="Profile updated succcessfully"><?php echo $message; ?></div><?php
		}
	?>
        <div class="upcome webinarss">
		<?php
			if (!empty($catalog)) {				
				foreach ($catalog as $key => $data) {
					//$meta_data = unserialize($data['value']);
					$startDate = date('n/j/Y', strtotime($data['start_date']));
					$startTime = date('h:i:s A', strtotime($data['start_date']));
					$endDate = date('n/j/Y', strtotime($data['end_date']));
					$endTime = date('h:i:s A', strtotime($data['end_date']));
				?>
				<div class="service web">
					<a href="<?php echo base_url();?>provider/edit_catalog/<?php echo $data['catalog_event_id']?>"><img src="<?php echo $data['thumb_img']; ?>"/></a>
					<div class="service-content">
						<p><?php echo $data['short_desc']; ?></p>
						<div class="timing">
							<h4><div class="data"><i class="fa fa-calendar"></i></div><span class="data-inc"><?php echo $startDate; ?> - <?php echo $endDate; ?></span></h4>
							<h4><div class="data"><i class="fa fa-clock-o"></i></div><span class="data-inc"><?php echo $startTime; ?> - <?php echo $endTime; ?></span></h4>
						</div>
					</div>
					</div><?php
				}
				} else {
				?><div class="service web">
				<div class="service-content">
					<p>No Catalog Found.....</p>
				</div>
				</div><?php
			}
		?>
	</div>
</div>
</div>

