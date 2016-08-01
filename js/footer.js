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
	
function postListDynamicWidth(){

	//console.log( $('.main_column').parent().width() + ' -- ' + $('.user_sidebar').outerWidth() );
	$('.author_posts_list').css('width', $('.author_posts_list').parent().width() - $('.user_sidebar').outerWidth() );
	
}
	
// EVENTS

$(window).resize(function() { 
	
	footerPosition() 
	postListDynamicWidth();
	
	} );

// ************************************************************************** //

/* Set position fixed position of some elements during scroll*/
window.onscroll = function() {
	var positionFixedStatus = ( $('html').scrollTop() || $('body').scrollTop() ) >= $('header').outerHeight() ;
	var padding = parseInt( $('.user_sidebar').parent().css('padding-top') ) ;
	var navOffsetTop = ( $('#wpadminbar').length )? $('#wpadminbar').outerHeight(): 0 ;
	
	//nav fixed scroll
	if ( positionFixedStatus ) {

			$('nav').addClass('nav_fixed').css('top', navOffsetTop );
			$('.main_container').css('margin-top', $('nav').outerHeight() );
	}
	else {

		$('nav').removeClass('nav_fixed');
		$('.main_container').css('margin-top', '');
	}
	
	//User sidebar fixed scroll
	if ( positionFixedStatus && $('.user_sidebar').length ) {

			$('.user_sidebar')
				.addClass('user_sidebar_fixed')
				.css('top', padding + navOffsetTop + $('nav').outerHeight() )
			;
	}
	else {

		$('.user_sidebar')
			.removeClass('user_sidebar_fixed')
			.css('top', '')
		;
	}
};

// ************************************************************************** //

// INIT
footerPosition();
postListDynamicWidth()

});




