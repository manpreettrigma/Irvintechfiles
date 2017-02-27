<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
<!-- ================================= HEAD ================================= -->
    
    <head>
          <meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		
		<link rel="shortcut icon" type="image/png" href="assets/frontend_dashboard/images/ca_favicon_32x32.png"/>
        <title>PYRAMIDS ACADEMY - Developing Talents in Coding &amp; Creativity : Home</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend_dashboard/css/font.css" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend_dashboard/css/font-awesome.css" />  
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend_dashboard/css/owl.carousel.css" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend_dashboard/css/owl.theme.css" /> 
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend_dashboard/css/responsivemultimenu.css" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend_dashboard/css/style.css" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend_dashboard/css/responsive.css" /> 
		
    </head>

<!-- ================================= BODY ================================= -->
    
    <body>

<!-- ================================= BODY Header ================================= -->
  
        <header class="siteHeader">
            
            <div class="headerTop">
                <div class="container">
                    <ul>
                        <li><a href="tel:9498007776"><i class="fa fa-phone call-icon"></i>Call Us :<span>(949) 800-7776</span></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div><!-- top ends -->
            
            <div class="headerMain">	
                <div class="container">
                    <div class="siteBrand">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/logo-pa.png" alt="" /></a>
                    </div><!-- logo ends -->
                    
                    <div class="headerRight">
                        <div class="enrolBtn">
                          
							<?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {?>
								
								  <a href="#">ENROLL NOW <i><img src="<?php echo base_url(); ?>assets/frontend_dashboard/images/btn-arrow.png" alt="" /></i></a>
								<a href="<?php echo base_url(); ?>user/logout/logout_success">Logout </a>
							<?php } else {?>
							<a href="<?php echo base_url(); ?>user/login">Login </a>
							<?php } ?>
                            
                            <a href="<?php echo base_url(); ?>user/register">Register </a>
                            
                        </div>
                        
                        <nav class="site-nav rmm style" >
                            <ul class="menu-left">
                                <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                                <li><a href="<?php echo base_url(); ?>page/coding/20">Coding</a></li>
                                <li><a href="#">Creativity</a></li>
                                <li><a href="#">Cross-Platform</a></li>
                                <li><a href="#">Company</a>
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>page/about-us">About</a></li>
                                        <li><a href="<?php echo base_url(); ?>page/contact-us">Contact</a></li>
                                        <li><a href="<?php echo base_url(); ?>page/faqs">FAQs</a></li>
                                    </ul>
                                </li>
                            </ul>
                         </nav>
                    </div>
                </div><!-- container -->
            </div><!-- header main ends -->
        
        </header>