jQuery(document).ready(function($) {



// ************************************************************************** //

function footerPosition(){
	alert ($(document).height() + " - " + $(window).height() + " - " + $("footer").outerHeight() + "\n" + ( $(document).height() - $("footer").outerHeight() ));
	/* grandezza del documento è minore della finestra - altezza footer */
	//if ($(document).height() ==  $(window).height() && $(document).height() + $("footer").outerHeight() >  $(window).height() ){
	if ($(document).height() - $("footer").outerHeight() <  $(window).height() ){
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




