
<!-- ================================= Banner Section ================================= -->
        
        <section class="slideArea homePageBg parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>assets/frontend_dashboard/images/banner-image.jpg">
            
           <!--div data-vide-options="position: 0% 50%" data-vide-bg="mp4: videos/banner-video, webm: videos/banner-video, ogv: banner-video, poster: videos/banner-video" style="width: 100%; height: 878px; position: relative;" id="block2">
		   <div style="position: absolute; z-index: -1; top: 0px; left: 0px; bottom: 0px; right: 0px; overflow: hidden; background-size: cover; background-color: transparent; background-repeat: no-repeat; background-position: 0% 50%; background-image: none;">
		   <video autoplay="" loop="" muted="" style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 0%; transform: translate(0%, -50%); visibility: visible; opacity: 1; width: auto; height: 880px;">
		   <source type="video/mp4" src="<?php echo base_url(); ?>assets/frontend_dashboard/videos/banner-video.mp4"></source>
		   <source type="video/webm" src="<?php echo base_url(); ?>assets/frontend_dashboard/videos/banner-video.webm"></source>
		   <source type="video/ogg" src="<?php echo base_url(); ?>assets/frontend_dashboard/banner-video.ogv"></source>
		   </video>
		   </div>
		   </div-->
		
            <div class="heroText">
                <div class="container">
                    <div class="jumboText">
                        <h2>TAKE A STEP TO CREATE</h2>
                        <h1>YOUR FUTURE</h1>
                        <h3>Starting a high-paying, in-demand, exciting career is one step away!</h3>
						<div class="enrolBtn">
                            <a href="#">ENROLL NOW <i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/btn-arrow.png" alt=""></i></a>
                        </div>
                    </div>

                    <div class="desktop-only featuresMain">
					<?php foreach($degreeList as $degree){?>
                        <div class="featureBlock">
                            <img class="slide-top" src="<?php echo base_url(); ?>uploads/degrees_image/<?php echo $degree['image']; ?>" alt="" />
                            <h3><?php echo $degree['title']; ?></h3>
                            <span class="line-break"></span>
                            <p><?php echo $degree['description']; ?></p>
                        </div><!-- block ends -->
                    <?php } ?>
                    
                        <div class="featureBlock searchBlock">
                            <h3>FIND YOUR COURSE</h3>
                            <form>
                                <input type="text" class="search-control" placeholder="Type a Keyword" />
                                <div class="parent"><select class="dropdown ">
									<option>Select course</option>
									<option>abc</option>
									<option>qwe</option>
								</select>							 
                                </div>
                                <button>SEARCH<i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- block ends -->
                    </div><!-- features ends -->
                </div>
            </div><!-- hero text ends -->
        </section>

<!-- ================================= Blocks Over Banner ================================= -->
        
        <section class="planCourse mobile-only">
            <div class="container">
                <div class="featuresMain">
                    
                    <div class="featureBlock">
                        <img class="slide-top" src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-workshops.png" alt="" />
                        <h3>WORKSHOPS</h3>
                        <span class="line-break"></span>
                        <p>1-day workshops are powerful to introduce you to or boost your knowledge and skills on a specific subject.</p>
                    </div><!-- block ends -->
                    
                    <div class="featureBlock">
                        <img class="slide-top" src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-courses.png" alt="" />
                        <h3>COURSES</h3>
                        <span class="line-break"></span>
                        <p>Our courses are designed based on the 20-hour learning theory. They get you highly trained in each subject.</p>
                    </div><!-- block ends -->
                    
                    <div class="featureBlock">
                        <img class="slide-top" src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-certificates.png" alt="" />
                        <h3>CERTIFICATES</h3>
                        <span class="line-break"></span>
                        <p>Certificates are granted to students who study a complete set of courses in an area of study.</p>
                    </div><!-- block ends -->
                    
                    <div class="featureBlock searchBlock">
                        <h3>FIND YOUR COURSE</h3>
                        <form>
                            <input type="text" placeholder="Type a Keyword" />
                            <select><option>select course</option></select>
                            <button>SEARCH<i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- block ends -->
                    
                </div><!-- features -->
            </div>
        </section>

<!-- ================================= Courses ================================= -->
        
        <section class="offerCourses">
            <div class="container">
                <div class="sectionTitle">
                    <h1>Areas of Study</h1>
                    <h3>9 Areas to Choose From. Click on Your Choice.</h3>
                </div>
                
                <div class="offers">
                    
                    <div class="offerBlock slide-left">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-android.png" alt="" />
                        <h2>Android Development</h2>
                    </div><!-- block ends -->
                    
                    <div class="offerBlock slide-left">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-ios.png" alt="" />
                        <h2>iOS Development</h2>
                    </div><!-- block ends -->
                    
                    <div class="offerBlock slide-left">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-webDev.png" alt="" />
                        <h2>Web Development</h2>
                    </div><!-- block ends -->
                    
                    <div class="offerBlock slide-left">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-xd.png" alt="" />
                        <h2>Adobe Experience Design</h2>
                    </div><!-- block ends -->
                    
                    <div class="offerBlock slide-left">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-ai.png" alt="" />
                        <h2>Adobe Illustrator</h2>
                    </div><!-- block ends -->
                    
                    <div class="offerBlock slide-top">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-ps.png" alt="" />
                        <h2>Adobe Photoshop</h2>
                    </div><!-- block ends -->
                    
                    <div class="offerBlock slide-top">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-cyber-security.png" alt="" />
                        <h2>Cyber Security</h2>
                    </div><!-- block ends -->
                    
                    <div class="offerBlock slide-left">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-da.png" alt="" />
                        <h2>Database Administration</h2>
                    </div><!-- block ends -->
                
                    <div class="offerBlock slide-right">
                        <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-digital-marketing.png" alt="" />
                        <h2>Digital Marketing</h2>
                    </div><!-- block ends -->
                
                </div> <!-- offer ends -->
            </div><!-- container ends -->
        </section><!-- course ends -->

<!-- ================================= Our Team ================================= -->
        
        <section class="whyUs ourInstructors">
            <div class="container">
                <div class="sectionTitle">
                    <h1>Our Instructors</h1>
                    <h3>Experienced Professionals with Real-World Experience</h3>
                </div> <!-- title ends -->
                
                <div class="Instructors">
                 <?php foreach($instructorList as $instructor) { ?>
                    <div class="InstructorsBlock ">
                        <div class="imgblock slide-top">
                            <img src="<?php echo base_url(); ?>uploads/instructors_image/<?php echo $instructor['image']; ?>" alt="" />
                        </div>
                        <h2><?php echo $instructor['instructor_name']; ?></h2>
                        <h3><?php echo $instructor['instructor_desg']; ?></h3>
                        <?php echo $instructor['description']; ?>
                        
                        <!--
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        -->
                        
                    </div><!-- block ends -->
                    <?php } ?>
                </div> <!-- Instructors ends -->
            </div><!-- container ends -->
        </section><!-- our team ends -->

<!-- ================================= Project Based Training ================================= -->
            
        <section class="projectTraining">
            <div id="projectTraining" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="training-wrapper">
                        <h1>Interactive</h1>
                        <h2>Unlike recorded online courses, CA offers interactive training in a traditional classroom setting.</h2>
                        </div>
                </div>

                <div class="item">
                    <div class="training-wrapper">
                        <h1>Project-Based Training</h1>
                        <h2>I hear and I forget. I see and I remember.<br><strong>I do and I understand.</strong></h2>
                    </div>
                </div>

                <div class="item">
                    <div class="training-wrapper">
                        <h1>20-hour Courses</h1>
                        <h2>You can learn many new skills in 20-hours! That's how our courses are designed.</h2>
                    </div>
                </div>

                <div class="item">
                    <div class="training-wrapper">
                        <h1>Internships Opportunities</h1>
                        <h2>CA has partnered with many local companies in the coding and creativity fieldss for our students to receive on the job training.</h2>
                    </div>
                </div>

                <div class="item">
                    <div class="training-wrapper">
                        <h1>Central Location</h1>
                        <h2>CA is conveniently located in the heart of Orange County. It is less than 20 minutes from Irvine, Tustin, Santa Ana, Lake Forest, Mission Viejo, Rancho Santa Margarita, and other neighboring cities.</h2>
                    </div>
                </div>
            </div>
        </section><!-- projectTraining ends -->

<!-- ================================= Enroll Now ================================= -->

        <section class="enrollnow">
            <div class="container">
                <h1>Your Future Begins Today. Take The Step. Enroll Now!</h1>
                <a href="#" class="cta">ENROLL NOW <img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/cta-arrow.png"></a>
            </div>
        </section>