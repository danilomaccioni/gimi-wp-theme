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
/*
	var sidebar = 0;

	//console.log( $('.main_column').parent().width() + ' -- ' + $('.user_sidebar').outerWidth() );
	if ($('.info_sidebar').length){
		sidebar = $('.info_sidebar').outerWidth();
	}else if ( $('.user_sidebar').length ){
		sidebar = $('.user_sidebar').outerWidth();
	}
	
	
	//$('.author_posts_list').css('width', $('.author_posts_list').parent().width() - $('.user_sidebar').outerWidth() );
	//$('.posts_list').css('width', $('.posts_list').parent().width() - $('.info_sidebar').outerWidth() );
	
	if ( sidebar ){
		$('.posts_list').css('width', $('.posts_list').parent().width() - sidebar );
	}
*/
	//console.log( $('.main_container').parent(). );
	//var right_sidebar_width = $('.main_container').parent().width() - $('.right_sidebar').outerWidth();
	var right_sidebar_width = $('.main_container').width() - $('.right_sidebar').outerWidth();
	if ( $('.right_sidebar').length ) $('.posts_container').css('width', right_sidebar_width );
	//if ( $('.right_sidebar').length && $('.navigation').length ) $('.navigation').css('width', right_sidebar_width );

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
	var padding = parseInt( $('.right_sidebar').parent().css('padding-top') ) ;
	var navOffsetTop = ( $('#wpadminbar').length )? $('#wpadminbar').outerHeight(): 0 ;
	
	//nav fixed scroll
	console.log( positionFixedStatus + ' -- ' + padding + ' -- ' + navOffsetTop);
	if ( positionFixedStatus ) {

			$('nav').addClass('nav_fixed').css('top', navOffsetTop );
			$('.main_container').css('margin-top', $('nav').outerHeight() );
	}
	else {

		$('nav').removeClass('nav_fixed');
		$('nav').css('top', '');
		$('.main_container').css('margin-top', '' );
	}
	
	//User sidebar fixed scroll
	if ( positionFixedStatus && $('.user_sidebar').length ) {

			$('.user_sidebar')
				.addClass('user_sidebar_fixed')
				.css('top', padding + navOffsetTop + $('nav').outerHeight() )
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
footerPosition();
postListDynamicWidth()

});




