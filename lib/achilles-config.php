<?php 
/** 
 * Configure Achilles
 */
 

/**
 * Enable Theme Support for Achilles Features
 */ 

add_theme_support('jquery-cdn');		//Enable the ability to load jQuery via CDN

/**
 * .main classes
 */
function achilles_main_class() {
  if (achilles_display_sidebar()) {
    // Classes on pages with the sidebar
    $class = 'col-sm-8';
  } else {
    // Classes on full width pages
    $class = 'col-sm-12';
  }

  return $class;
}

/**
 * .sidebar classes
 */
function achilles_sidebar_class() {
  return 'col-sm-4';
}



/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 1140; }

?>