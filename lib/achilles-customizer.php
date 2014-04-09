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
        'title'    => __('Logo', 'themename'),
        'priority' => 01,
    ));
 
     //  =============================
    //  = Image Upload              =
    //  =============================
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
	}
	

}

// Setup the Theme Customizer settings and controls
add_action( 'customize_register' , array( 'Achilles_Customize' , 'achilles_customize_register' ) );
?>