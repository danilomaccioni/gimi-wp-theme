jQuery(document).ready(function($) {
  /* grandezza del documento è minore della finestra - altezza footer */
  //alert( $(document).height() + " - " + $(window).height() + " - " + $("footer").outerHeight() + "...");
  //if ($(document).height() > ( $(window).height() - $("footer").outerHeight() )){
  if ($(document).height() ==  $(window).height() ){
	  $("footer").attr('class','bottom_footer');
	} else {
	  $("footer").removeClass('bottom_footer');
	}
})
