jQuery(function($) {
	$('.jvcustom').each(function(){
		var el = $(this),
			parentBackground = el.data('parent');
			parentElement ="";
			switch(parentBackground) {
			    case 1: parentElement =el.parent('*');
			        break;
			    case 2: parentElement =el.parent('*').parent('*');
			        break;
			    case 3: parentElement =el.parent('*').parent('*').parent('*');
			        break;
			    case 4: parentElement =el.parent('*').parent('*').parent('*').parent('*');
			        break;
			    case 5: parentElement =el.parent('*').parent('*').parent('*').parent('*').parent('*');
			        break;
			    case 6: parentElement =el.parent('*').parent('*').parent('*').parent('*').parent('*').parent('*');
			        break;
			    case 7: parentElement =el.parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*');
			        break;
			    case 8: parentElement =el.parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*');
			        break;
			    case 9: parentElement =el.parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*');
			        break;
			    case 10: parentElement =el.parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*').parent('*');
			        break;
			}
			if (parentBackground !="") {
				parentElement.addClass('parentBackground')
							.attr({"data-stellar-background-ratio":el.data('stellar-background-ratio'),  "style": el.attr("style")})
							.append('<div class="jvoverlay" style="background-color:'+el.data('coloroverlay')+'; opacity:'+el.data('opacityoverlay')+';"></div>');
				el.attr({"data-stellar-background-ratio":"", "style":""});
				if (el.hasClass("parallax")) {
					parentElement.addClass('parallax');
					el.removeClass('parallax');
				};
				if (el.hasClass("skew")) {
					parentElement.addClass('skew');
					el.removeClass('skew');
				};
				if (el.hasClass("skew-reverse")) {
					parentElement.addClass('skew-reverse');
					el.removeClass('skew-reverse');
				};
			} else {
				el.append('<div class="jvoverlay" style="background-color:'+el.data('coloroverlay')+'; opacity:'+el.data('opacityoverlay')+';"></div>');
			}
			$('.background').show();			
	});
	// $('.parallax').each(function(){
	// 	var el = $(this),
	// 		speedBG = parseFloat(el.data('speed'));
	// 	el.parallax({
	// 	    speed: speedBG
	//     });	
	// });
	function OsParallax() {
        $(window).stellar({
            scrollProperty: 'scroll',
            positionProperty: 'transform',
            horizontalScrolling: false,
            verticalScrolling:true,
            responsive: true,
            parallaxBackgrounds: true
        });
    }

    OsParallax();
});
