jQuery(document).ready(function($) {

	// Check if hero section is present and add margins to main-content
	if ( $( 'body' ).hasClass( 'home' ) || $('body').hasClass( 'single-post' ) && $('section').hasClass( 'hero-feature' ) ) {
		$( '.main-content' ).css('margin-top', '500px');
	} else if ( $( 'body' ).hasClass( 'page' ) && $( 'section' ).hasClass( 'hero-feature' ) ) {
		$( '.main-content' ).css('margin-top', '250px');
	} else {
		$( '.main-content' ).css('margin-top', '65px');
	}

	// Logo pulse on scroll
	$(window).scroll(function() {
		if ( $( this ).scrollTop() > 1 ) {
		    $( '.site-header' ).addClass( 'sticky' );
	  	}
	  	else{
	    	$( '.site-header' ).removeClass( 'sticky' );
	  	}
	});

});
