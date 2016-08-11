jQuery(document).ready(function($) {

// ************************************************************************** //

function footerPosition(){

/*  
 * Set Footer position always on page bottom 
 * 
 * if 
 * 		document height is egual to window heigth 
 * 	and 
 * 		document height plus footer outerHeight is greater to window height
 */
	if ($(document).height() ==  $(window).height() && $(document).height() + $("footer").outerHeight() >  $(window).height() ){
			$("footer").attr('class','bottom_footer');
		} else {
			$("footer").removeClass('bottom_footer');
		}
}
	
// ************************************************************************** //
	
// EVENTS

$(window).resize(function() { 
	
	footerPosition();
	
	} );

// ************************************************************************** //

// INIT
footerPosition();

});




