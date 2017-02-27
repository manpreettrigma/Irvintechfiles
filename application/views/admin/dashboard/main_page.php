  <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count"><?php //echo $total_users; ?></div>
              <span class="count_bottom"><i class="green">as of <?php //echo date('Y-m-d'); ?></i> </span>
            </div>
			 <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Verified Users</span>
              <div class="count"><?php $verified_users = $total_users-$unverified_users; //echo $verified_users; ?></div>
              <span class="count_bottom"><i class="green">as of <?php //echo date('Y-m-d'); ?></i> </span>
            </div>
			
			 <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Unverified Users</span>
              <div class="count"><?php //echo $unverified_users; ?></div>
              <span class="count_bottom"><i class="green">as of <?php //echo date('Y-m-d'); ?></i> </span>
            </div>
		</div>
         
        </div> -->
        <!-- /page content -->