(function ($) {
 "use strict";
    	       
	
		/*New Product List*/       
		var owl = $(".product-list-wol-active");
		 
		owl.owlCarousel({
		items : 4,
		autoPlay : true,
		stopOnHover : true,
		loop : true,
		
		navigation : true,
		navigationText : ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
		
		});
		 

		/* home 8 brand */	
		$('.brand-lists').owlCarousel({
			items:5,
			autoPlay : true,
			stopOnHover : true,
			loop : true,
			autoplayTimeout:2500,

		});
		/* Single clients */	
		$('.clients-says-list').owlCarousel({
			items:1,
			autoPlay : true,
			stopOnHover : true,
			loop : true,
			autoplayTimeout:2500,
			navigation : true, // Show next and prev buttons
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem:true
		});
				
		
			
		/* Category Toggle*/
		$('.categori-head').click(function(){
			$('.categories-body').toggle();
		});
		/*-------------------------------------------
		scrollUp
		-------------------------------------------- */	
		jQuery.scrollUp({
			scrollText: '<i class="fa fa-angle-up"></i>',
			easingType: 'linear',
			scrollSpeed: 900,
			animation: 'fade'
		});	
		/*---------------------
		TOP Menu Stick
		--------------------- */
		
		
		/*----- cart-plus-minus-button -----*/
        $(".cart-plus-minus").append('<div class="dec qtybutton">-</i></div><div class="inc qtybutton">+</div>');
        $(".qtybutton").on("click", function () {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find("input").val(newVal);
        });
	  /*---------------------
	  Category menu
	 --------------------- */
		$('#categorymenu li.active').addClass('open').children('ul').show();
		$('#categorymenu li.has-sub>a').on('click', function(){
		$(this).removeAttr('href');
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp(200);
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown(200);
			element.siblings('li').children('ul').slideUp(200);
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp(200);
		}
		});
	  /*---------------------
	  Mobile menu
	 --------------------- */
	  jQuery('nav#mobile-menu').meanmenu();
	  
	/*Price Filter */
	$( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 1500,
		values: [ 450, 969 ],
		slide: function( event, ui ) {
			$( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
		}
	});
	$( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
		" - " + $( "#slider-range" ).slider( "values", 1 ) );
   
})(jQuery) ; 
 