//Theme Customizer Live Preview JS

( function( $ ){
  wp.customize('achilles_theme_options[body_color]',function( value ) {
    value.bind(function(to) {
      $('.home').css('background-color', to ? to : '' );
    });
  });
  
  wp.customize('achilles_theme_options[headings_color]',function( value ) {
    value.bind(function(to) {
      $('h1').css('color', to ? to : '' );
    });
  });  
  
} )( jQuery )
