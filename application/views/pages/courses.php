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

			<div class="detailHeader singleCourse-icon">

				<div class="courseIntro">

					<div class="introBlock imgBlock bgBlue">

						<img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/thumb-html.png" alt="" />

					</div>

					

					<div class="introBlock infoBlock">

						<h4>Course Code: <?php echo $coursedata->course_code;?></h4>

						<h1><?php echo $coursedata->title;?></h1>

						<h2>Fee: <span>$<?php echo $coursedata->price;?></span></h2>

						<div class="enrolBtn"> <a onclick="paypal_payment('<?php echo $coursedata->title; ?>',<?php echo $coursedata->id;?>)" href="#">ENROLL NOW <i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/btn-arrow-big.png" alt="" /></i></a> </div>
                        <form method="post" id="form_provider" action="https://www.sandbox.paypal.com/cgi-bin/webscr"></form>	
					</div>

					

				</div>

				 

			</div><!-- page header ends --> 

			<div class="courseTerms">

				<div class="termDetails">

					<div class="termDetailsBlock">

						<article>

							<i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/term-icon.png" alt="" /></i>

							<p>Term</p>

							<h2><?php echo $coursedata->term;?></h2>

						</article>						

					</div><!-- block ends -->

					

					<div class="termDetailsBlock">

						<article>

							<i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/cal-icon.png" alt="" /></i>

							<p>Dates</p>

							<h2>
						
							<?php echo $startdate = date("d/m/y ", strtotime($coursedata->start_date));?> - <?php echo $enddate = date("d/m/y ", strtotime($coursedata->end_date));?></h2>

						</article>						

					</div><!-- block ends -->

					

					<div class="termDetailsBlock">

						<article>

							<i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/cal-icon.png" alt="" /></i>

							<p>Days</p>

							<h2><?php echo $coursedata->course_days;?></h2>

						</article>						

					</div><!-- block ends -->

					

					<div class="termDetailsBlock">

						<article>

							<i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/clock-icon-w.png" alt="" /></i>

							<p>Time</p>

							<h2><?php echo $coursedata->course_time;?></h2>

						</article>						

					</div><!-- block ends -->

					

				</div>			

			</div> 

			 

			<!-- ======================================== info article ends =================================== -->

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/note-icon.png" alt="" /></i><h1>Learning Objectives:</h1></div>

				<p><?php echo $coursedata->learning_objectives;?></p>

			</article>

			

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/idea-icon.png" alt="" /></i><h1>Required Equipment</h1></div>

				  <ul class="text-left listingCOl2">

					<li><?php echo $coursedata->rtme;?></li>

					
				  </ul>

			</article> <!-- courseDescription ends -->

			

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/laptop-icon.png" alt="" /></i><h1>Required Textbooks, Materials, and Equipment</h1></div>

				  <ul class="text-left">

					<li><?php echo $coursedata->rtme;?></li> 

				  </ul>

			</article> <!-- courseDescription ends -->

			

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/assn-icon.png" alt="" /></i><h1>Assignments and Method of Evaluation:</h1></div>

				  <ul class="text-left listingCOl2">

					<li><?php echo $coursedata->ame;?></li>


				  </ul>

			</article> <!-- courseDescription ends -->

			

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/course-icon.png" alt="" /></i><h1>Lessons:</h1></div>

				 <table>

				 <thead>

					<tr>

						<th>No</th>

						<th>Date</th>

						<th>Tools/Description</th>						 

					</tr>

				 </thead>

					<tbody>

						<tr>

							<td>1</td>

							<td>January 10</td>

							<td>Browsers, Clients, and FTP</td>							 						 						 

						</tr>

						

						<tr>

							<td>2</td>

							<td>January 11</td>

							<td>HTML Tags - Quiz</td>							 						 						 

						</tr>

						

						<tr>

							<td>3</td>

							<td>January 12</td>

							<td>HTML Media</td>							 						 						 

						</tr>

						

						<tr>

							<td>4</td>

							<td>January 13</td>

							<td>CSS Styling Tags- Quiz</td>							 						 						 

						</tr>

						

						<tr>

							<td>4</td>

							<td>January 13</td>

							<td>CSS Styling Tags- Quiz</td>							 						 						 

						</tr>

						

						<tr>

							<td>5</td>

							<td>January 14</td>

							<td> CSS Page Layout & the DOM</td>							 						 						 

						</tr>

						

						<tr>

							<td>6</td>

							<td>January 15</td>

							<td> Nav Bars - Quiz </td>							 						 						 

						</tr>

						

						<tr>

							<td>7</td>

							<td>January 16</td>

							<td> Intro to CSS Frameworks (SASS & Bootstrap)</td>							 						 						 

						</tr>

						

						<tr>

							<td>8</td>

							<td>January 17</td>

							<td>Publishing Websites - Quiz </td>							 						 						 

						</tr>

						

						<tr>

							<td>9</td>

							<td>January 18</td>

							<td>Revision</td>							 						 						 

						</tr>

						

					</tbody>				 

				 </table>

			</article> <!-- courseDescription ends -->

			

			 

			

			<article class="courseDescription">

				<div class="artHead"><i class="icon"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/list-check-icon.png" alt="" /></i><h1>Prerequisites:</h1></div>

				  <p><?php echo $coursedata->prerequisites;?></p>

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
		
<script>
    function paypal_payment(name, cid) {
		console.log(cid);
        $.ajax({
            url: "<?php echo base_url(); ?>" + "page/courses/" +cid,
            type: "post",
            beforeSend: function () {
                $("#" + name).html('loading.....');
            },
            data: 'name=' + name + '&cid='+cid,
            success: function (response) {
                //return false;
                var responseArr = $.parseJSON(response);
                if (responseArr.response == 'failed') {
                    alert(responseArr.msg);
                    window.location.href = '<?php echo base_url();?>account/create-provider';
                }else if(responseArr.response == 'failed_found'){
                    alert(responseArr.msg);
                    location.reload();
                }else{
                    $("#" + name).attr('onclick', '');
                    $('#form_provider').append(responseArr.form_data);
                    $('#form_provider').submit();
                }
            }
        });
    }




</script>