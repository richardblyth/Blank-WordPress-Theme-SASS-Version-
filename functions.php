<?php
// Custom Functions


// Load jQuery 2.2.4 - if not using version shipped with WordPress
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js");
   wp_enqueue_script('jquery');
}


// Correctly Enqueue Other Scripts and CSS
function other_scripts() {

  //CSS
  wp_enqueue_style( 'appcss', get_template_directory_uri() . '/css/app.css', array(), null );
    
  //Head Scripts
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array('jquery'), '3.3.1', false);

  //End of Document Scripts
  wp_enqueue_script( 'appjs', get_template_directory_uri() . '/js/app-dist.js', array(), '1.0.6', true );
}
add_action( 'wp_enqueue_scripts', 'other_scripts' );


// Remove Unnecessary Meta Tags
remove_action( 'wp_head', 'wp_generator' ) ; 
remove_action( 'wp_head', 'wlwmanifest_link' ) ; 
remove_action( 'wp_head', 'rsd_link' ) ;
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


// Remove Secondary Feeds
remove_action( 'wp_head', 'feed_links', 2 ); 
remove_action( 'wp_head', 'feed_links_extra', 3 );


// Completely Disable Comments and Trackbacks
/*function df_disable_comments_post_types_support() {
  $post_types = get_post_types();
  foreach ($post_types as $post_type) {
    if(post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
}
add_action('admin_init', 'df_disable_comments_post_types_support');*/

// Close comments on the front-end
/*function df_disable_comments_status() {
  return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);*/

// Hide existing comments
/*function df_disable_comments_hide_existing_comments($comments) {
  $comments = array();
  return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);*/

// Remove comments page in menu
/*function df_disable_comments_admin_menu() {
  remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');*/

// Redirect any user trying to access comments page
/*function df_disable_comments_admin_menu_redirect() {
  global $pagenow;
  if ($pagenow === 'edit-comments.php') {
    wp_redirect(admin_url()); exit;
  }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');*/

// Remove comments metabox from dashboard
/*function df_disable_comments_dashboard() {
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');*/

// Remove comments links from admin bar
/*function df_disable_comments_admin_bar() {
  if (is_admin_bar_showing()) {
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
  }
}
add_action('init', 'df_disable_comments_admin_bar');*/


// Add Additional Menus to the Theme - change 'themename' to match your theme name
register_nav_menus( array(
  'main' => __( 'Main Menu', 'blank-wordpress-theme'),
  'footer' => __( 'Footer Links', 'blank-wordpress-theme')
) );


// Nicetrim - for text previews
/*function nicetrim ($input, $length) { */
  /*Usage: <?php echo nicetrim(strip_tags($TheFieldVariable), 450);?> Where 450 is the number of characters to show */

  /*$input = strip_shortcodes($input);
  if (strlen($input) <= $length) {
      return $input;
  }
  $last_space = strrpos(substr($input, 0, $length), ' ');
  $trimmed_text = substr($input, 0, $last_space);

  $trimmed_text .= '...';
  return $trimmed_text;
}*/


//Custom Image Sizes
/*add_image_size('team_thumbnail', 180, 180, true);*/
//Add the new sizes to WP Admin
/*add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
  return array_merge( $sizes, array(
    'team_thumbnail' => __( 'Team Thumbnail' )
  ));
}*/


//Custom WP Admin Login logo
/*function custom_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'custom_login_logo' );*/


//Remove User Roles we're not using
/*remove_role( 'contributor' );
remove_role( 'editor' );
remove_role( 'subscriber' );*/


// Hide the WordPress Admin Bar on the front end (when admin is logged in)
/*add_filter('show_admin_bar', '__return_false');*/


//Make Custom Posts Show in Category.php, Archive.php etc.
/*function add_custom_types_to_tax( $query ) { 
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $post_types = get_post_types(); $query->set( 'post_type', $post_types ); return $query; }
  }
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );*/

//Disable native emjoi support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


//Re-label Posts as xxxx
/*function revcon_change_post_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'Blog';
  $submenu['edit.php'][5][0] = 'Blog';
  $submenu['edit.php'][10][0] = 'Add Bog Post';
  $submenu['edit.php'][16][0] = 'Blog Tags';
  echo '';
}
function revcon_change_post_object() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Blog';
  $labels->singular_name = 'Blog Post';
  $labels->add_new = 'Add Blog Post';
  $labels->add_new_item = 'Add Blog Post';
  $labels->edit_item = 'Edit Blog Post';
  $labels->new_item = 'Blog';
  $labels->view_item = 'View Blog';
  $labels->search_items = 'Search Blog';
  $labels->not_found = 'No Blog Posts found';
  $labels->not_found_in_trash = 'No Blog Posts found in Trash';
  $labels->all_items = 'All Blog Posts';
  $labels->menu_name = 'Blog';
  $labels->name_admin_bar = 'Blog';
}
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );*/


//Add Theme Support
function custom_theme_setup() {
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'custom-background' );
  add_theme_support( 'custom-header' );
  add_theme_support( 'custom-logo' );
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
  add_theme_support( 'post-thumbnails', array('post') );
  add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );


// Disable Update Notifcations
/*$func = function ($a) {
    global $wp_version;
    return (object) array(
        'last_checked' => time(),
        'version_checked' => $wp_version,
    );
};
add_filter('pre_site_transient_update_core', $func); 
add_filter('pre_site_transient_update_plugins', $func);
add_filter('pre_site_transient_update_themes', $func);*/


//Editor Styles
function add_editor_styles() {
  add_editor_style( 'editor-styles.css' );
}

//Content Width
if ( ! isset( $content_width ) ) {
  $content_width = 1200;
}


//Remove version numbers from CSS/JS in head
function remove_cssjs_ver( $src ) {
  if( strpos( $src, '?ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );


// Remove WP Embed Scripts
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

?>