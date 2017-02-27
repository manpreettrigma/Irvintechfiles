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

			 <form class="reg-more-info" method="post">

				<div class="inputField"><input type="text" name="name" placeholder="first name" /></div>

				<div class="inputField"><input type="text" name="phone" placeholder="phone" /></div>

				<div class="inputField"><input type="text" name="email" placeholder="email" /></div>

				<div class="comm-mathod">

					<p>Preferred Method of Communication:</p>

					<div class="inputField">

						<label><input name="phonechk" type="checkbox" />Phone</label>

						<label><input name="emailchk" type="checkbox" />Email</label>

					</div><!-- input ends -->

					<p>Preferred Time of Calling:</p>

					<div class="inputField">

						<label><input name="amchk" type="checkbox" />AM</label>

						<label><input name="pmchk" type="checkbox" />PM</label>

					</div><!-- input ends -->

				</div>

				<div class="inputField"><button name="reg_more_info">Submit<img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/btn-arrow-big.png" alt="" /></button></div>

			</form>

			</div>

		</div><!-- request form ends -->

	

	</aside>

	

<!-- ============================================= sidebar ends ======================  -->	

	

		<div class="pageContent">

			<div class="detailHeader angularCourse-icon">

				<div class="courseIntro">

					<div class="introBlock imgBlock bgRed">

						<img src="<?php echo base_url(); ?>uploads/workshops_image/<?php echo $workshopdata->image?>" alt="" />

					</div>

					

					<div class="introBlock infoBlock">

					 

						<h1><?php echo $workshopdata->title?></h1>

						<h2>Fee: <span>$<?php echo $workshopdata->price?></span></h2>

						<div class="enrolBtn"> <a href="#">ENROLL NOW <i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/btn-arrow-big.png" alt="" /></i></a> </div>

					</div>

					

				</div>

				 

			</div><!-- page header ends --> 

			<div class="courseTerms">

				<div class="termDetails col-3">

					<div class="termDetailsBlock">

						<article>

							<i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/term-icon.png" alt="" /></i> 

							<h2><?php echo $workshopdata->workshop_day?></h2>

						</article>						

					</div><!-- block ends -->

					

					<div class="termDetailsBlock">

						<article>

							<i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/teach-icon-w.png" alt="" /></i>

							<p>Instructor</p>

							<h2><?php echo $workshopdata->workshop_instructor?></h2>

						</article>						

					</div><!-- block ends -->

					

					<div class="termDetailsBlock">

						<article>

							<i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/clock-icon-w.png" alt="" /></i>

							<p>Time</p>

							<h2><?php echo $workshopdata->workshop_time?></h2>

						</article>						

					</div><!-- block ends --> 

					

				</div>			

			</div> 

			 

			<!-- ======================================== info article ends =================================== -->

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/note-icon.png" alt="" /></i><h1>Learning Objectives:</h1></div>

				<p><?php echo $workshopdata->workshop_learning_objectives?></p>

			</article>

			

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/idea-icon.png" alt="" /></i><h1>Learning Objectives:</h1></div>

				  <ul class="text-left listingCOl2">

					<li>Understand how the web works</li>

					<li>Be able to publish a website</li>

					<li>Be able to structure the contents of a web page using HTML5</li>

					<li>Be introduced to the CSS Frameworks SASS and Bootstrap </li>

					<li>Be able to style the contents of a web page using CSS3</li>

				  </ul>

			</article> <!-- courseDescription ends -->

			

		 

			

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/laptop-icon.png" alt="" /></i><h1>Required Equipment</h1></div>

				  <ul>

					<?php echo $workshopdata->workshop_rtme?>

				  </ul>

			</article> <!-- courseDescription ends -->

			

			 

			

			

			

			

		</div><!-- page content --> 
		

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