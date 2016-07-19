jQuery(document).ready(function($) {



// ************************************************************************** //

function footerPosition(){
	/* grandezza del documento è minore della finestra - altezza footer */
	if ($(document).height() ==  $(window).height() ){
		$("footer").attr('class','bottom_footer');
	} else {
		$("footer").removeClass('bottom_footer');
	}
}
	
// ************************************************************************** //
	

// EVENTS
$(window).resize(function() { footerPosition() } );


// INIT
footerPosition();
	
});




