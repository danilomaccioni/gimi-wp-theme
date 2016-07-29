jQuery(document).ready(function($) {

// ************************************************************************** //

function footerPosition(){
	
	
	var bodyHeight = $('body').outerHeight();
	var footerHeight = ( $("footer").hasClass('bottom_footer') ) ? $("footer").outerHeight() : 0;
	
	console.log(
		'document: ' + $(document).height() + ' - ' +
		'window: ' + $(window).height() + ' - ' +
		'JQuery body: ' + bodyHeight
	);

	//alert ($(document).height() + " - " + $(window).height() + " - " + $("footer").outerHeight() + "\n" + ( $(document).height() - $("footer").outerHeight() ));

	var adminBar = ($("#wpadminbar").length)?$("#wpadminbar").outerHeight():0 ;
	var adminBar = 0;

/* grandezza del documento - altezza footer è minore della finestra  */
if ($(document).height() ==  $(window).height() && $(document).height() + $("footer").outerHeight() >  $(window).height() ){
// 	if ($(document).height() + adminBar - $("footer").outerHeight() <  $(window).height() ){
 		$("footer").attr('class','bottom_footer');
 	} else {
 		$("footer").removeClass('bottom_footer');
 	}


/*
	if ( ($(document).height() + footerHeight) <= $(window).height() ) {
	
		$("footer").addClass('bottom_footer');
		
			console.log('caso a');
	} else {
		$("footer").removeClass('bottom_footer');
		
		console.log('caso b');
	}
*/
}
	
// ************************************************************************** //
	
// EVENTS
$(window).resize(function() { footerPosition() } );


// INIT
footerPosition();
	
});




