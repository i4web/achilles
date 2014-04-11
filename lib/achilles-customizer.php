<?php 
/**
 * Class that integrates the WP Theme Customizer into Achilles.
 *
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since Achilles 1.0
 */
class Achilles_Customize {
	/*
	* Hooks into the customize_register and allows you to add new sections and controls to the Theme Customize screen
	*/
	public static function achilles_customize_register( $wp_customize ){
		
    //add a section to customize the logo on the website
    $wp_customize->add_section('achilles_logo', array(
        'title'    => __('Logo', 'achilles'),
        'priority' => 01,
    ));
 
	/**
	 * Image Upload
	 */  
    $wp_customize->add_setting('achilles_theme_options[achilles_upload_logo]', array(
        'default'           => 'image.jpg',  
        'capability'        => 'edit_theme_options',
        'type'				   => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'achilles_upload_logo', array(
        'label'    => __('Upload Logo', 'achilles'),
        'section'  => 'achilles_logo',
        'settings' => 'achilles_theme_options[achilles_upload_logo]',
    )));
	
	
    //add a section to customize the body css on the website
    $wp_customize->add_section('achilles_body_styles', array(
        'title'    => __('Body Styling', 'achilles'),
        'priority' => 02,
    ));
	
    //  =============================
    //  Background Color Picker
    //  =============================
    $wp_customize->add_setting('achilles_theme_options[body_color]', array(
        'default'           => '#FFFFFF',
       // 'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
		 'transport'		=> 'postMessage',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_color', array(
        'label'    => __('Body Color', 'achilles'),
        'section'  => 'achilles_body_styles',
        'settings' => 'achilles_theme_options[body_color]',
    )));	
 	
    //  =============================
    //  Headings Color Picker        
    //  =============================
    $wp_customize->add_setting('achilles_theme_options[headings_color]', array(
        'default'           => '#000000',
       // 'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'headings_color', array(
        'label'    => __('Headings Color', 'achilles'),
        'section'  => 'achilles_body_styles',
        'settings' => 'achilles_theme_options[headings_color]',
    )));		
	
	
	
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting('header_textcolor')->transport='postMessage';
	
	

	
	} // end achilles_customize_register()

	/**
	 * Outputs the custom CSS to the head using wp_head for the front-end 
	 */		
	public static function achilles_customizer_css() {  
	  /**
	   * Retrieve all the achilles theme options that we'll be using
	   * 
	   * @keys achilles_upload_logo, body_color, headings_color
	   * @since Achilles 1.0
	   */
	  $achillesOptions = get_option('achilles_theme_options'); ?>
      
 	  <style type="text/css">
        .home { background-color: <?php  echo $achillesOptions['body_color'];	 ?>; }
		 h1,h2,h3,h4,h5,h6{ color: <?php echo $achillesOptions['headings_color']; ?>; }
		 
      </style>
    <?php
}

	/**
	 * Registers and enqueus the live preview JS
	 *
	 * See js/live-preview.php for more details
	 */	
	public static function achilles_customize_preview() { 
	  wp_register_script( 'achilles-live-preview', get_template_directory_uri() . '/js/live-preview.js', '', true );
	  wp_enqueue_script( 'achilles-live-preview', get_template_directory_uri() . '/js/live-preview.js', array( 'jquery', 'customize-preview' ) );
	} 
	

}

// Setup the Theme Customizer settings and controls
add_action( 'customize_register' , array( 'Achilles_Customize' , 'achilles_customize_register' ) );
add_action( 'wp_head', array('Achilles_Customize','achilles_customizer_css' ) );
add_action( 'wp_footer' , array( 'Achilles_Customize' , 'achilles_customize_preview' ) );


?>