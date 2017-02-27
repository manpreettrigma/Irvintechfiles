$(document).ready(function(){


/*blog reply form*/
 $(".leave-reply").click(function(){
     $('#response-form').slideDown();
  });
  
  $(".cancel-comment-reply-link").click(function(){
     $('#response-form').slideUp();
  });

    $("select").selectBoxIt({
	 	 	// Uses the jQuery 'fadeIn' effect when opening the drop down
    		showEffect: "fadeIn",

   		 // Sets the jQuery 'fadeIn' effect speed to 400 milleseconds
  		  showEffectSpeed: 100,

   		 // Uses the jQuery 'fadeOut' effect when closing the drop down
  		  hideEffect: "fadeOut",

  		  // Sets the jQuery 'fadeOut' effect speed to 400 milleseconds
    	hideEffectSpeed: 100

	  });


 /* $('.date').datepicker({
  	autoclose: true
  });*/
          
$('.input-daterange input').each(function() {
    $(this).datepicker({
    	autoclose: true
    });
});

$('.datepicker').datepicker({
    autoclose: true
});


$('#datepicker').datepicker();
$('#datepicker').on("changeDate", function() {
    $('#my_hidden_input').val(
        $('#datepicker').datepicker('getFormattedDate')
    );
});

  $("#main-banner-home").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      autoPlay : false
  });

  $("#our-partners").owlCarousel({
            itemsCustom : [
        [0, 1],
        [480, 2],
        [640, 3],
        [767, 3],
        [1024, 5],
        [1366, 5]
      ],
      pagination : false,
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      items: 5,
      paginationSpeed : 400,
      autoPlay : 3000
  });
	

});





(function ($) {

    //'use strict';

    // Toggle classes in body for syncing sliding animation with other elements
    $('#bs-example-navbar-collapse-1')
        .on('show.bs.collapse', function (e) {
          
            $('body').addClass('menu-slider');
        })
        .on('shown.bs.collapse', function (e) {
         
            $('body').addClass('in');
        })
        .on('hide.bs.collapse', function (e) {
        
            $('body').removeClass('menu-slider');
        })
        .on('hidden.bs.collapse', function (e) {
          
            $('body').removeClass('in');
        });

})(jQuery);

/* colse menu on click right nav */
$(document).ready(function () {
    $('#wrapper').click(function (event) {
        var clickover = $(event.target);
        var _opened = $(".navbar-collapse").hasClass("navbar-collapse collapse in");
        if (_opened === true && !clickover.hasClass("navbar-toggle") && clickover.parents('.navbar-collapse').length == 0) {
            $("button.navbar-toggle").click();
        }
    });
});


