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
							<div class="slct_datepicker">
								<select id="speaker">
								  <option value="hide">Preferred Provider</option>
								  <option value="Browse by Speaker1">Preferred Provider</option>
								  <option value="Browse Speaker1">Preferred Provider</option>
								</select>
								
								<select id="topics">
								  <option value="hide">Type of Credit</option>
								  <option value="Browse by Topics1">Browse by Topics1</option>
								  <option value="Browse Topics1">Browse Topics</option>
								</select>
								
								<select id="Credit">
								  <option value="hide">Topic</option>
								  <option value="Browse by Credit">Browse by Credit</option>
								  <option value="Browse by Credit Type1">Browse by Credit Type1</option>
								</select>
		
								
							</div>
							
					  </div><!--left-group close here-->
				  </div><!--right-content close here-->
				  	  <script>
	    $( function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  

  
  <script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery.datepicker.js"></script>