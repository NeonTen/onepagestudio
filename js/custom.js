jQuery(document).ready(function() {

    // Menu
	jQuery(".hamberger").click(function(e) {
        e.preventDefault();

		jQuery(".mobile-menu").removeClass("translate-x-full");
		jQuery(".mobile-menu").addClass("translate-x-0");
	    jQuery(".overlay").removeClass("hidden");
        
    });
	jQuery(".overlay, .mobile-menu .close").click(function(e) {
        e.preventDefault();

		jQuery(".mobile-menu").addClass("translate-x-full");
		jQuery(".mobile-menu").removeClass("translate-x-0");
	    jQuery(".overlay").addClass("hidden");
        
    });

    // Our work section carousel
	jQuery('.work-carousel').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2
				}
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1
			  }
			}
		]
	});

	// Our team section carousel
	jQuery('.team-carousel').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: false,
		dots: true,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2
				}
			},
			{
			  breakpoint: 640,
			  settings: {
				slidesToShow: 1
			  }
			}
		]
	});

	// Our team section carousel
	jQuery('.testimonial-slider').slick({
		infinite: true,
		arrows: false,
		dots: true,
	});

    // redirect
    jQuery(".animate-redirect a[href^='#']").click(function(e) {
        e.preventDefault();

        var position = jQuery(jQuery(this).attr("href")).offset().top;

        jQuery("body, html").animate({
            scrollTop: position
        }, 1000);
    });

});
