
$(document).ready(function() {
 
  $("#gallerySlide").owlCarousel({
autoPlay: false, //Set AutoPlay to 3 seconds
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
     // autoPlay: true,
      navigation: true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});

 

$(document).ready(function() {
 
  $("#behind-exp").owlCarousel({
 //autoPlay: 4000, //Set AutoPlay to 3 seconds
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
	  pagination: false,
	  navigationText : ["", ""]
     // autoPlay: true,
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});

 


$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top - 0
        }, 1000);
        return false;
      }
    }
  });
});


// Accordian css

 
$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
 
 

$("#sideNav").click(function(){ 
   $(".pageSidebar").toggleClass("active");
   event.stopPropagation();
});





    $(document).ready(function() {
     
      $("#projectTraining").owlCarousel({
     
          navigation : true, // Show next and prev buttons
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem:true,
		  pagination: true,
           navigationText: ["<img src='http://dev514.trigma.us/codigproject/assets/frontend_dashboard/images/left-arrow.png'>",
		   "<img src='http://dev514.trigma.us/codigproject/assets/frontend_dashboard/images/arrow-right.png'>"]
     
          // "singleItem:true" is a shortcut for:
          // items : 1, 
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false
     
      });
     
    });
	
	    $(document).ready(function() {
     
      $("#purpose").owlCarousel({
     
          navigation : true, // Show next and prev buttons
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem:true,
		  pagination: true,
		  navigationText: ["<img src='http://dev514.trigma.us/codigproject/assets/frontend_dashboard/images/left-arrow.png'>","<img src='http://dev514.trigma.us/codigproject/assets/frontend_dashboard/images/arrow-right.png'>"]
     
          // "singleItem:true" is a shortcut for:
          // items : 1, 
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false
     
      });
     
    });







