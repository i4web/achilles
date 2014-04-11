<?php 
/** 
 * Theme Scripts and Stylesheets
 */


/**
 * Enqueus and Registers Scripts and Stylesheets
 * 
 */
function achilles_scripts() {
	
	//main stylesheet for now
	wp_enqueue_style('achilles_style', get_template_directory_uri() . '/style.css', false, '1.0');
	
	//Foundations stylesheet
	wp_register_style( 'achilles_main', get_template_directory_uri(). '/css/app.css', false, '1.0');
	
	
	wp_enqueue_style( 'achilles_main' );
}

add_action('wp_enqueue_scripts', 'achilles_scripts', 100);
?>