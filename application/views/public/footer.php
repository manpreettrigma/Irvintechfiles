<!-- ================================= BODY Footer ================================= -->
        
        <footer class="siteFooter">
            <div class="container">
                <div class="footer-wrapper">
                    <div class="footerBlock small-w">
                        <h1>CODING</h1>
                        <ul>
                            <li><a href="#">Android Development</a></li>
                            <li><a href="#">iOS Development</a></li>
                            <li><a href="#">Web Development</a></li>
                        </ul>
                    </div> <!-- block ends -->

                    <div class="footerBlock small-w">
                        <h1>CREATIVITY</h1>
                        <ul>
                            <li><a href="#">Adobe Experience Design</a></li>  
                            <li><a href="#">Adobe Illustrator</a></li>
                            <li><a href="#">Adobe Photoshop</a></li>
                        </ul>
                    </div> <!-- block ends -->

                    <div class="footerBlock small-w">
                        <h1>CROSS-PLATFORM</h1>
                        <ul>
                            <li><a href="#">Cyber Security</a></li>
                            <li><a href="#">Database Administration</a></li>
                            <li><a href="#">Digital Marketing</a></li>
                        </ul>
                    </div> <!-- block ends -->            

                    <div class="footerBlock small-w">
                        <h1>COMPANY</h1>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>page/about-us">About</a></li>
                            <li><a href="<?php echo base_url(); ?>page/contact-us">Contact</a></li>
                            <li><a href="<?php echo base_url(); ?>page/faqs">FAQs</a></li>
                        </ul>
                    </div> <!-- block ends -->

                    <div class="social-wrapper">
                        <ul class="social-list">
                            <li><a href="#"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-fb.png"></a></li>
                            <li><a href="#"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-twitter.png"></a></li>
                            <li><a href="#"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-insta.png"></a></li>
                            <li><a href="#"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-pin.png"></a></li>
                            <li><a href="#"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/icon-youtube.png"></a></li>
                        </ul>
                    </div>
                </div>
            </div><!-- container ends -->
            
            <section class="copyrights">
                <p>Copyright &copy; <a href="about.html">2016 Pyramids Academies LLC. All rights reserved.</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
            </section>
        </footer>
        
<!--  ================================= jQuery 1.7+ =================================  -->
      
        <script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/responsivemultimenu.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/parallax.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/owl.carousel.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery.easing.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery.fadethis.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/jquery.vide.js"></script>
        <script src="<?php echo base_url(); ?>assets/frontend_dashboard/js/custom.js"></script>
		
		<script>
			$(document).ready(function() {
				$(window).fadeThis({
					speed: 1000,
					reverse: false,
				});
				
			});
		</script>
        <script>
			$(document).ready(function() {
				$('[data-behavior=accordion]').simpleAccordion({cbOpen:accOpen, cbClose:accClose});
			});

			function accClose(e, $this) {
				$this.find('span').fadeIn(200);
			}

			function accOpen(e, $this) {
				$this.find('span').fadeOut(200)
			}
		</script>
		
			
    </body>
</html>