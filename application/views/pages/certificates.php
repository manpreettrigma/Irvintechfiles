<!-- ================================= Banner Section ================================= -->

        

        <section class="slideArea innerPageBg parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>assets/frontend_dashboard/images/course-detail-banner2.png">

            <div class="container">

                <div class="jumboText">

                    <h1>CODING</h1>

                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3> 

					

                </div> 

        </section>





<section class="innerPageView">

	<div class="container">	

	

	  <div class="mobileOnly">

		<h1>Content menu</h1> <span id="sideNav" class="contentToggle"><i class="fa  fa-list-ul"></i></span>

	</div>

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
             <?php foreach($certificateList as $certificate){?>
			  <li><a href="http://dev514.trigma.us/codigproject/page/certificates/<?php echo $certificate['id']; ?>"><?php echo $certificate['title']; ?></a></li>

			<?php } ?>

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

	

<!-- ============================================= sidebar ends ======================  -->	
	
	<div class="pageContent">
			<div class="detailHeader">
				<div class="courseIntro">
					<div class="introBlock imgBlock">
						<img src="<?php echo base_url(); ?>uploads/certificates_image/<?php echo $certificatedata->image; ?>" alt="">
					</div>
					
					<div class="introBlock infoBlock">
					     
						<h1> <?php echo $certificatedata->title; ?></h1>
						<p> <?php echo substr($certificatedata->description, 0, strpos($certificatedata->description, '.')); ?> </p>
						<div class="enrolBtn"> <a href="#">ENROLL NOW <i><img src="images/btn-arrow-big.png" alt=""></i></a> </div>
					</div>
					
				</div>
				 
			</div><!-- page header ends --> 
			<div class="courseTerms"></div> 
			 
			<!-- ======================================== info article ends =================================== -->
			<article class="courseDescription">
				<div class="artHead"><i class="icon"><img src="images/note-icon.png" alt=""></i><h1>Certificate Description</h1></div>
				<?php echo $certificatedata->description; ?>
			</article>
			
			<article class="courseDescription">
				<div class="artHead"><i class="icon"><img src="images/course-icon.png" alt=""></i><h1>Required Courses</h1></div>
				
				 <table>
				<?php if(!empty($coursedetails)){ ?>
				 <thead>
					<tr>
						<th>No</th>
						<th>Course Code</th>
						<th>Course Title</th>						 
					</tr>
				 </thead>
				 <?php } ?>
					<tbody>
						<tr>
						<?php $i=1;
						if(!empty($coursedetails)){
                 foreach($coursedetails as $coursedetail){
					// echo "<pre>";
					// print_r($coursedetail[0]);
					 ?>
                     
							<td><?php echo $i; ?></td>
							<td><?php echo $coursedetail[0]['course_code']; ?></td>
							<td><?php echo $coursedetail[0]['title']; ?></td>						 
										 						 						 
						</tr>
					 <?php
					  $i++;
				 }
                   }else{
					   ?>
					   <tr>
					   <b>
					   <?php echo "NO COURSE ADDED"; ?>
					   </b>
					   </tr>
					   
					   <?php
				   }
                
				?>		
			
					</tbody>				 
				 </table>
			</article> <!-- courseDescription ends -->
			
			<article class="courseDescription">
				<div class="artHead"><i class="icon"><img src="images/course-icon.png" alt=""></i><h1>Optional Courses (Choose One):</h1></div>
				 <table>
				 <thead>
					<tr>
						<th>No</th>
						<th>Course Code</th>
						<th>Course Title</th>						 
					</tr>
				 </thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>CODE 211</td>
							<td>Essentials of jQuery</td>							 						 						 
						</tr>
						
						<tr>
							<td>2</td>
							<td>CODE 221</td>
							<td>Essentials of Angular.js</td>							 						 						 
						</tr>
						
						<tr>
							<td>3</td>
							<td>CODE 231</td>
							<td>Adobe XD</td>							 						 						 
						</tr> 
						
					</tbody>				 
				 </table>
			</article> <!-- courseDescription ends -->
			
			<article class="courseDescription">
				<div class="artHead"><i class="icon"><img src="images/laptop-icon.png" alt=""></i><h1>Required Equipment</h1></div>
				  <ul>
					<li>	<?php echo $certificatedata->rtme; ?></li>
				  </ul>
			</article> <!-- courseDescription ends -->
			
			
			
			
		</div>

	</div><!-- wrapper ends -->

</section> <!-- inner page ends -->

   

<!-- ================================= Newsletter ================================= -->

        <section class="newsletterSection">

            <div class="container">

                <div class="newsletterInfo slide-left">

                    <span><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-newsletter.png" alt="" /></span>

						 <h2>STAY UPDATED WITH CRESCENT </h2>

                    <p>Get our Monthly newsletter insights on new technology trends</p>

                </div> <!-- info ends -->

                <div class="newsletterForm slide-right">

                    <div class="inputField">

                        <form>

                            <input type="text" placeholder="Enter email here" />

                            <input type="submit" value="Signup" name="" />

                        </form>

                    </div>

                </div><!-- newsletter form -->

            </div>

        </section>