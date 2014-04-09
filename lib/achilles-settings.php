<?php 
/** 
 * Achilles Settings Page
 */


//Store the Template Path

define ('ACHILLES_PATH', get_stylesheet_directory_uri());

/**
 * Creates the Theme Admin Menus
 */
function achilles_theme_admin_menus(){
	
	//add top level menu page.
	add_menu_page( 'Achilles', 'Achilles', 'edit_theme_options', 'achilles_theme_settings', 'achilles_theme_settings_page', ACHILLES_PATH.'/img/achilles-icon.png', '3.72' );

	
}
add_action('admin_menu', 'achilles_theme_admin_menus', 50);


/**
 * Initialize the achilles settings to work with the settings api
 */
function achilles_settings_init() {
	
	//create one option to store all of our values. 
    register_setting( 'achilles-settings-group', 'achilles-settings' );
    add_settings_section( 'achilles-general-settings', 'General Settings', 'achilles_general_settings_callback', 'achilles' );
    add_settings_field('resident-portal', 'Resident Portal URL', 'resident_portal_url_callback', 'achilles', 'achilles-general-settings');
    add_settings_field( 'facebook-url', 'Facebook URL', 'facebook_url_callback', 'achilles', 'achilles-general-settings' );
	
}
add_action( 'admin_init', 'achilles_settings_init' );

/** 
 * Achilles General Settings Text
 */
function achilles_general_settings_callback() {
    echo 'Welcome to the Achilles Theme Settings. Here you will be able to set information for your property that will be used across the website.';
}

/**
 *  Renders the Resident Portal URL input
 */
function resident_portal_url_callback(){
  $settings = (array) get_option( 'achilles-settings' );
  $resPortalURL = esc_attr( $settings['resident-portal'] );
  echo "<input type='text' name='achilles-settings[resident-portal]' value='$resPortalURL' />";
}
/** 
 * Render the Facebook URL input
 */
function facebook_url_callback() {
	$settings = (array) get_option( 'achilles-settings' );
	$facebookURL = esc_attr( $settings['facebook'] );    
	echo "<input type='text' name='achilles-settings[facebook]' value='$facebookURL' />";
}


/** 
 * Renders the Achilles Theme Settings Page 
 */
function achilles_theme_settings_page(){ ?>
  <div class="wrap">
    <h2><?php printf(__('%s Settings', 'achilles'), wp_get_theme()); ?></h2>
      <div class="updated">
        <p><?php _e('Enter in your property settings below.', 'achilles'); ?></p>
      </div>
    <?php settings_errors(); ?> 
    
        <form action="options.php" method="POST">
            <?php settings_fields( 'achilles-settings-group' ); ?>
            <?php do_settings_sections( 'achilles' ); ?>
            <?php submit_button(); ?>
        </form>
      
  </div> <!-- end settings wrap -->
  
	
<?php } ?>