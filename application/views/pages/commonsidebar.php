
<!-- ================================= inner sidebar ================================= -->

    

	<aside class="pageSidebar">

		<div class="sidebarHeader">

			<h1>CONTENTS</h1>

		</div>

		

		<ul id="accordion" class="accordion">

		   

		  <li>

			<div class="link"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/bedge1.png" alt="" /></i>Workshops<i class="fa fa-angle-down"></i></div>

			<ul class="submenu" style="display:block;">
            <?php foreach($workshopList as $workshop){?>
		
				
			  <li><a href="http://dev514.trigma.us/codigproject/page/coding/<?php echo $workshop['id']; ?>"><?php echo $workshop['title']; ?></a></li>

            <?php	} ?>
			</ul>

		  </li>

		  <li>

			<div class="link"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/bedge2.png" alt="" /></i>Courses<i class="fa fa-angle-down"></i></div>

			<ul class="submenu">
            <?php foreach($courseList as $course){?>
			  <li><a href="http://dev514.trigma.us/codigproject/page/courses/<?php echo $course['id']; ?>"><?php echo $course['title']; ?></a></li>

			<?php } ?>

			</ul>

		  </li>

		  <li>

			<div class="link"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/bedge3.png" alt="" /></i>CertificatEs<i class="fa fa-angle-down"></i></div>

			<ul class="submenu">
              <?php foreach($certificatelist as $certificate){?>
			  <li><a href="http://dev514.trigma.us/codigproject/page/certificate/<?php echo $certificate['id']; ?>"><?php echo $certificate['title']; ?></a></li>

			<?php } ?>
			  <li><a href="#">Googcccccbcvle</a></li>

			  <li><a href="#">Bing</a></li>

			  <li><a href="#">Yahoo</a></li>

			</ul>

		  </li>

		</ul>

		

		<div class="requestForm">

			<h1>Request More Info</h1>

			<div class="form-main">

			<form>

				<div class="inputField"><input type="text" placeholder="first name" /></div>

				<div class="inputField"><input type="text" placeholder="first name" /></div>

				<div class="inputField"><input type="text" placeholder="first name" /></div>

				<div class="comm-mathod">

					<p>Preferred Method of Communication:</p>

					<div class="inputField">

						<label><input type="checkbox" />Phone</label>

						<label><input type="checkbox" />Email</label>

					</div><!-- input ends -->

					<p>Preferred Time of Calling:</p>

					<div class="inputField">

						<label><input type="checkbox" />AM</label>

						<label><input type="checkbox" />PM</label>

					</div><!-- input ends -->

				</div>

				<div class="inputField"><button>Submit<img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/btn-arrow-big.png" alt="" /></button></div>

			</form>

			</div>

		</div><!-- request form ends -->

	

	</aside>

	