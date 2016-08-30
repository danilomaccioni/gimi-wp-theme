jQuery(document).ready(function($) {
	
function postListDynamicWidth(){

	var right_sidebar_width = $('.main_container').width() - $('.right_sidebar').outerWidth();
	//console.log(right_sidebar_width + " - " + $('.main_container').width() + " - " + $('.right_sidebar').outerWidth());
	////if ( $('.right_sidebar').length ) $('.center_container').css('width', right_sidebar_width );
	if (right_sidebar_width == 0) right_sidebar_width = '';
	if ( $('.right_sidebar').length ) {
		$('.center_container').css({ 'display': 'inline-block', 'width': right_sidebar_width });
	}
	
}
	
// EVENTS

$(window).resize(function() { 
	
	postListDynamicWidth();
	
	} );

// ************************************************************************** //

/* Set position fixed position of some elements during scroll*/
window.onscroll = function() {
	var positionFixedStatus = ( $('html').scrollTop() || $('body').scrollTop() ) >= $('header').outerHeight() ;
	var padding = parseInt( $('.right_sidebar').parent().css('padding-top') ) ;
	var navOffsetTop = ( $('#wpadminbar').length )? $('#wpadminbar').outerHeight(): 0 ;
	
	//nav fixed scroll
	//console.log( positionFixedStatus + ' -- ' + padding + ' -- ' + navOffsetTop);
	if ( positionFixedStatus ) {

			$('#header_nav').addClass('nav_fixed').css('top', navOffsetTop );
			$('.main_container').css('margin-top', $('#header_nav').outerHeight() );
	}
	else {

		$('#header_nav').removeClass('nav_fixed');
		$('#header_nav').css('top', '');
		$('.main_container').css('margin-top', '' );
	}
	
	//User sidebar fixed scroll
	if ( positionFixedStatus && $('.user_sidebar').length ) {

			$('.user_sidebar')
				.addClass('user_sidebar_fixed')
				.css('top', padding + navOffsetTop + $('#header_nav').outerHeight() )
			;
	}
	else {

		$('.right_sidebar')
			.removeClass('user_sidebar_fixed')
			.css('top', '')
		;
	}
};

// ************************************************************************** //

// INIT

postListDynamicWidth()

});




