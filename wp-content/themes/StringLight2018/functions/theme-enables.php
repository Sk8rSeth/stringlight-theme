<?php

// uncomment if you want to see that dumb admin bar
// show_admin_bar( false );

// Add post thumbnail supports.
add_theme_support("post-thumbnails");

// RSS
add_theme_support("automatic-feed-links");


// Add menu support.
add_theme_support("menus");
register_nav_menus(array(
    "primary" => __("Primary Navigation"),
    // "secondary" => __("Secondary Navigation"),
    "footer" => __("Lower Footer Navigation")
));

// Adding Options page to the backend admin
function add_options_pages() {
  if (!function_exists('acf_add_options_page')) return;
  $args = array(
    'page_title' => 'Global Theme Options',
    'menu_title' => 'Global Options',
    'capability' => 'edit_posts',
    'icon_url' => 'dashicons-admin-settings'
  );
  acf_add_options_page($args);

}
if( is_admin() ) add_options_pages();

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function add_post_types_to_acf_field($field){

  $field['choices'] = array();

  $types = get_post_types('', 'names');
  $exclude = array('post', 'page', 'attachment', 'revision', 'nav_menu_item', 'acf-field-group', 'acf-field');
  foreach ($types as $type) {
    if( in_array($type, $exclude) ) continue;
    $field['choices'][$type] = ucwords(str_replace(array('_', '-'), ' ', $type));
  }

  return $field;

}
add_filter('acf/load_field/name=post_type', 'add_post_types_to_acf_field');

// enable display of all results on search page
add_filter('post_limits', 'postsperpage');
function postsperpage($limits) {
  if (is_search()) {
    global $wp_query;
    $wp_query->query_vars['posts_per_page'] = -1;
  }
  return $limits;
}

// clean up dashboard
// Create the function to use in the action hook
function remove_dashboard_widget() {
  remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}

// Hook into the 'wp_dashboard_setup' action to register our function
add_action('wp_dashboard_setup', 'remove_dashboard_widget' );

function custom_menu_page_removing() {
  if(!current_user_can( 'edit_users' )){
    remove_menu_page( 'tools.php' );
  }
}
add_action( 'admin_menu', 'custom_menu_page_removing' );
