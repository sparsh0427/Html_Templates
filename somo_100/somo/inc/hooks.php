<?php

/**
 * Get Theme Settins
 */

if (!function_exists('yprm_get_theme_setting')) {
  function yprm_get_theme_setting($param = false) {
    global $somo_theme;
    $result = false;
    $defaults = array(
      // General

      'accent_color' => '#e4b96c',
      'site_scheme' => 'dark',
      'right_click_disable' => 'false',
      'right_click_disable_message' => wp_kses(__('<p style="text-align: center"><strong><span style="font-size: 18px">Content is protected. Right-click function is disabled.</span></strong></p>', 'somo'), 'post'),
      'protected_message' => esc_html__('This Content Is Password Protected To View It Please Enter Your Password Below', 'somo'),
      'mobile_adaptation' => 'false',
      'cat_prefix' => 'true',
      'project_image_download' => 'false',
      'custom_cursor' => 'false',

      // Preloader

      'preloader_show' => 'true',
      'preloader_type' => 'cube',

      // Header

      'header_container' => 'container',
      'header_color_mode' => 'light',
      'header_style' => 'logo-left',
      'header_space' => 'true',
      'navigation_item_hover_style' => 'style1',
      'header_social_links' => 'true',
      'header_search' => 'true',
      'header_cart' => 'true',
      'header_sidebar' => 'true',

      // Navigation

      'navigation_type' => 'visible_menu',
      'navigation_button_style' => 'butter',

      // Social Links

      'social_target' => '_self',

      // Custom Fonts

      'custom_fonts' => array(
        'fonts' => '{"type":"google","family":"Montserrat","variants":"100, 100italic, 200, 200italic, 300, 300italic, regular, italic, 500, 500italic, 600, 600italic, 700, 700italic, 800, 800italic, 900, 900italic","subsets":"vietnamese, cyrillic, latin, latin-ext, cyrillic-ext"}',
      ),

      // Footer

      'footer' => 'true',
      'footer_logo' => 'true',
      'footer_social_links' => 'true',
      'footer_scroll_top' => 'true',
      'footer_links' => '',
      'footer_col_1' => 'col-12 col-md-3',
      'footer_col_2' => 'col-12 col-md-3',
      'footer_col_3' => 'col-12 col-md-3',
      'footer_col_4' => 'col-12 col-md-3',

      // 404 Page

      'site_scheme_404' => 'dark',
      '404_sub_heading' => esc_html__('#oooops', 'somo'),
      '404_heading' => esc_html__('404 Error', 'somo'),
      '404_text' => esc_html__('You are on a non existing page!', 'somo'),

      // Coming Soon Page

      'site_scheme_coming_soon' => 'dark',
      'coming_soon_sub_heading' => esc_html__('#underconstruction', 'somo'),
      'coming_soon_heading' => esc_html__('Coming Soon', 'somo'),
      'coming_soon_text' => esc_html__('The site is under maintance. Subscribe and get the latest news.', 'somo'),

      // Project Page

      'project_image' => 'cover',
      'download_link' => 'true',
      'project_style' => 'grid',
      'project_count_cols' => '3',
      'project_featured_image' => 'true',
      'project_likes' => 'true',
      'project_navigation_links' => 'true',
      'project_date' => 'true',
      'project_categories' => 'true',

      // LightBox

      'project_image_zoom' => 'show',
      'project_image_full_screen' => 'show',
      'project_image_share' => 'show',
      'project_image_download' => 'hide',

      // Project Items

      'project_in_popup' => 'true',
      'portfolio_style' => 'grid',
      'portfolio_cols' => 'col3',

      // Blog Post

      'blog_feature_image' => 'true',
      'blog_feature_image_style' => 'cover',
      'blog_date' => 'true',
      'blog_like' => 'true',
      'blog_comments' => 'true',
      'blog_navigation' => 'true',
      'blog_sidebar' => 'true',
      'blog_categories' => 'true',

      // Translations

      'tr_load_more' => esc_html__('Load More', 'somo'),
      'tr_all' => esc_html__('All', 'somo'),
      'tr_open_project' => esc_html__('open project', 'somo'),
      'tr_view_category' => esc_html__('View Category', 'somo'),
      'tr_scroll' => esc_html__('Scroll', 'somo'),
      'tr_purchase' => esc_html__('Purchase', 'somo'),
      'tr_read_more' => esc_html__('Read More', 'somo'),
      'tr_explore_project' => esc_html__('Explore Project', 'somo'),
      'tr_view' => esc_html__('View', 'somo'),
      'tr_drag' => esc_html__('Drag', 'somo'),
      'tr_play' => esc_html__('Play', 'somo'),
      'tr_pause' => esc_html__('Pause', 'somo'),
      'tr_scroll_down' => esc_html__('Scroll Down', 'somo'),
      'tr_back_to_top' => esc_html__('back to top', 'somo'),
      'tr_zoom' => esc_html__('Zoom', 'somo'),
      'tr_director' => esc_html__('Director', 'somo'),
      'tr_location' => esc_html__('Location', 'somo'),
      'tr_duration' => esc_html__('Duration', 'somo'),
      'tr_year_created' => esc_html__('Year Created', 'somo'),
      'tr_view_full_project' => esc_html__('View Full Project', 'somo'),
      'tr_prev' => esc_html__('Prev', 'somo'),
      'tr_next' => esc_html__('Next', 'somo'),
      'tr_send' => esc_html__('Send', 'somo'),
    );

    if (function_exists('get_field') && !empty(get_field($param)) && get_field($param) != 'default' && !is_search()) {
      $result = get_field($param);
    } elseif (class_exists('Redux') && is_array($somo_theme) && !empty($somo_theme[$param])) {
      $result = $somo_theme[$param];
    } elseif (is_array($defaults) && !empty($defaults[$param])) {
      $result = $defaults[$param];
    }

    $id = get_the_ID();
    $thumb = get_post_meta($id, '_thumbnail_id', true);

    if (is_404()) {
      if (!$somo_theme['site_scheme_404']) {
        $site_scheme = 'dark';
      } else {
        $site_scheme = $somo_theme['site_scheme_404'];
      }

      if($site_scheme == 'dark') {
        $header_color_mode = 'light';
      } else {
        $header_color_mode = 'dark';
      }

      ($param == 'header_space') ? $result = 'false' : '';
      ($param == 'site_scheme') ? $result = $site_scheme : '';
      ($param == 'header_color_mode') ? $result = $header_color_mode : '';
      ($param == 'footer') ? $result = 'false' : '';
    } elseif (is_page_template('page-coming-soon.php')) {
      if (!$somo_theme['site_scheme_coming_soon']) {
        $site_scheme = 'dark';
      } else {
        $site_scheme = $somo_theme['site_scheme_coming_soon'];
      }

      if($site_scheme == 'dark') {
        $header_color_mode = 'light';
      } else {
        $header_color_mode = 'dark';
      }
      
      ($param == 'header_space') ? $result = 'false' : '';
      ($param == 'header_style') ? $result = 'logo-left' : '';
      ($param == 'header_color_mode') ? $result = $header_color_mode : '';
      ($param == 'site_scheme') ? $result = $site_scheme : '';
      ($param == 'navigation_type') ? $result = 'disabled' : '';
      ($param == 'header_cart') ? $result = 'false' : '';
      ($param == 'header_search') ? $result = 'false' : '';
      ($param == 'footer') ? $result = 'false' : '';
      ($param == 'header_sidebar') ? $result = 'false' : '';
    } if (get_post_type() == 'post' && !empty($thumb)) {

    } if ((!is_page_template() && is_page()) || is_archive() || is_page_template('template-with-sidebar.php') || (function_exists('is_shop') && is_shop()) || is_search()) {
      ($param == 'header_space') ? $result = 'false' : '';
    }
    return $result;
  }
}

/**
 * Body CSS
 */

if (!function_exists('yprm_body_class')) {
  function yprm_body_class($classes) {
    if (function_exists('yprm_get_theme_setting')) {
      $classes[] = yprm_get_theme_setting('site_scheme') . '-scheme';
      $classes[] = 'preloader-' . yprm_get_theme_setting('preloader_show');
      $classes[] = 'header-' . yprm_get_theme_setting('header_container');
      $classes[] = 'header-' . yprm_get_theme_setting('header_color_mode');
      $classes[] = 'header-' . yprm_get_theme_setting('header_style');
      $classes[] = 'header-space-' . yprm_get_theme_setting('header_space');
      $classes[] = 'right-click-disable-' . yprm_get_theme_setting('right_click_disable');
      $classes[] = 'popup-download-link-' . yprm_get_theme_setting('download_link');
      $classes[] = 'mobile-images-' . yprm_get_theme_setting('mobile_adaptation');
      $classes[] = 'project-image-download-' . yprm_get_theme_setting('project_image_download');
      $classes[] = 'custom-cursor-' . yprm_get_theme_setting('custom_cursor');
      $classes[] = 'navigation-hover-' . yprm_get_theme_setting('navigation_item_hover_style');

      if(is_active_sidebar('sidebar') && yprm_get_theme_setting('sidebar_button') == 'side') {
        $classes[] = 'with-sidebar';
      }

      if (yprm_get_theme_setting('project_image_zoom') == 'hide') {
        $classes[] = 'hide-popup-zoom';
      }

      if (yprm_get_theme_setting('project_image_full_screen') == 'hide') {
        $classes[] = 'hide-popup-full-screen';
      }

      if (yprm_get_theme_setting('project_image_share') == 'hide') {
        $classes[] = 'hide-popup-share';
      }

      if (yprm_get_theme_setting('footer_decor') == 'hide') {
        $classes[] = 'hide-footer-decor';
      }

      return $classes;
    }
  }
  add_filter('body_class', 'yprm_body_class');
}

add_filter('get_the_excerpt', 'shortcode_unautop');
add_filter('get_the_excerpt', 'do_shortcode');

/**
 * Get Browser Type
 */

if (!function_exists('somo_browser_body_class')) {
  function somo_browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_edge, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if ($is_lynx) {
      $classes[] = 'lynx';
    } elseif ($is_gecko) {
      $classes[] = 'gecko';
    } elseif ($is_opera) {
      $classes[] = 'opera';
    } elseif ($is_NS4) {
      $classes[] = 'ns4';
    } elseif ($is_safari) {
      $classes[] = 'safari';
    } elseif ($is_chrome) {
      $classes[] = 'chrome';
    } elseif ($is_edge) {
      $classes[] = 'edge';
    } elseif ($is_IE) {
      $classes[] = 'ie';
      if (preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'), $browser_version)) {
        $classes[] = 'ie' . $browser_version[1];
      }

    } else {
      $classes[] = 'unknown';
    }

    if ($is_iphone) {
      $classes[] = 'iphone';
    }

    if (stristr(filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'), "mac")) {
      $classes[] = 'osx';
    } elseif (stristr(filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'), "linux")) {
      $classes[] = 'linux';
    } elseif (stristr(filter_input(INPUT_SERVER, 'HTTP_USER_AGENT'), "windows")) {
      $classes[] = 'windows';
    }
    return $classes;
  }
  add_filter('body_class', 'somo_browser_body_class');
}

/**
 * TinyMCE
 */

if (!function_exists('yprm_tiny_mce_add_formats')) {
  function yprm_tiny_mce_add_formats($settings) {

    $style_formats = array(
      array(
        'title' => esc_html__('Thin', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '100',
        ),
      ),
      array(
        'title' => esc_html__('Extra Light', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '200',
        ),
      ),
      array(
        'title' => esc_html__('Light', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '300',
        ),
      ),
      array(
        'title' => esc_html__('Regular', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '400',
        ),
      ),
      array(
        'title' => esc_html__('Medium', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '500',
        ),
      ),
      array(
        'title' => esc_html__('Semibold', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '600',
        ),
      ),
      array(
        'title' => esc_html__('Bold', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '700',
        ),
      ),
      array(
        'title' => esc_html__('Extra Bold', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '800',
        ),
      ),
      array(
        'title' => esc_html__('Black', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'fontWeight' => '900',
        ),
      ),
      array(
        'title' => esc_html__('Uppercase', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'textTransform' => 'uppercase',
        ),
      ),
      array(
        'title' => esc_html__('Lowercase', 'somo'),
        'inline' => 'span',
        'styles' => array(
          'textTransform' => 'lowercase',
        ),
      ),
      array(
        'title' => esc_html__('Button Style 1', 'somo'),
        'inline' => 'a',
        'classes' => 'button-style1',
        'wrapper' => true,
      ),
      array(
        'title' => esc_html__('Button Style 2', 'somo'),
        'inline' => 'a',
        'classes' => 'button-style2',
        'wrapper' => true,
      ),
    );

    $settings['style_formats'] = json_encode($style_formats);

    return $settings;
  }
  add_filter('tiny_mce_before_init', 'yprm_tiny_mce_add_formats');
}

if (!function_exists('yprm_tiny_mce_custom_fonts')) {
  function yprm_tiny_mce_custom_fonts($init) {
    global $somo_theme;

    $array = '';

    //$font_formats = isset($init['font_formats']) ? $init['font_formats'] : 'Andale Monos=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';

    $init['fontsize_formats'] = "10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 33px 34px 35px 36px 37px 38px 39px 40px";

    return $init;

    if (isset($array) && !empty($array)) {
      //trim($array, ';');
      //$custom_fonts = ';' . $array;

      //$init['font_formats'] = $font_formats . $custom_fonts;

      //$init['font_formats'] = $font_formats;

      return $init;
    } else {
      return false;
    }
  }
  add_filter('tiny_mce_before_init', 'yprm_tiny_mce_custom_fonts');
}

/**
 * Right Click Disable
 */

if (!function_exists('yprm_right_click_disable')) {
  function yprm_right_click_disable() {
    if (function_exists('yprm_get_theme_setting') && yprm_get_theme_setting('right_click_disable') == 'true') {
      echo '<div class="right-click-disable-message main-row"><div class="container full-height">' . wp_kses(yprm_get_theme_setting('right_click_disable_message'), 'post') . '</div></div>';
    }
  }
  add_action('wp_footer', 'yprm_right_click_disable');
}

/**
 * Password Protected
 */

if (!function_exists('yprm_custom_password_form')) {
  function yprm_custom_password_form() {
    global $post;
    $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
    $o = '<form class="protected-post-form" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
      <div class="text">' . wp_kses(yprm_get_theme_setting('protected_message'), 'post') . '</div>
      <div class="form">
        <div>
          <input name="post_password" class="input" placeholder="' . esc_attr__('Type the password', 'somo') . '" id="' . $label . '" type="password" />
        </div>
        <button type="submit" name="Submit" class="button"><i class="base-icon-padlock"></i></button>
      </div>
    </form>';
    return $o;
  }
  add_filter('the_password_form', 'yprm_custom_password_form');
}

/**
 * Hide Editor on Coming Soon
 */

if (!function_exists('yprm_hide_editor_on_coming_soon')) {
  function yprm_hide_editor_on_coming_soon() {
    if (isset($_GET['post'])) {
      $post_id = $_GET['post'];
    } elseif (isset($_POST['post_ID'])) {
      $post_id = $_POST['post_ID'];
    }

    if (!isset($post_id) || empty($post_id)) {
      return;
    }

    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if ($template_file == 'page-coming-soon.php') {
      remove_post_type_support('page', 'editor');
    }
  }
  add_action('admin_init', 'yprm_hide_editor_on_coming_soon');
}

/**
 * Site pagination.
 */

if (!function_exists('yprm_wp_corenavi')) {
  function yprm_wp_corenavi($max_count = '') {
    global $wp_query;
    $pages = '';
    if (isset($max_count) && $max_count > 0) {
      $max = $max_count;
    } else {
      $max = $wp_query->max_num_pages;
    }

    if (get_query_var('paged') != 0) {
      $paged = get_query_var('paged');
    } else {
      $paged = get_query_var('page');
    }

    if (!$current = $paged) {
      $current = 1;
    }

    $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
    $a['total'] = $max;
    $a['current'] = $current;

    $a['mid_size'] = 5;
    $a['end_size'] = 1;
    $a['prev_text'] = '<i class="base-icon-back"></i>';
    $a['next_text'] = '<i class="base-icon-next-1"></i>';
    $a['type'] = 'list';
    $a['add_args'] = false;

    $html = '';

    if ($max > 1) {
      $html .= '<div class="pagination">';
    }
    $html .= paginate_links($a);
    if ($max > 1) {
      $html .= '</div>';
    }

    return $html;
  }
}

/**
 * Let to Num
 */

if (!function_exists('yprm_let_to_num')) {
  function yprm_let_to_num($size) {
    $l = substr($size, -1);
    $ret = substr($size, 0, -1);
    $byte = 1024;

    switch (strtoupper($l)) {
    case 'P':
      $ret *= 1024;
    case 'T':
      $ret *= 1024;
    case 'G':
      $ret *= 1024;
    case 'M':
      $ret *= 1024;
    case 'K':
      $ret *= 1024;
    }
    return $ret;
  }
}

/**
 * Build Site Logo
 */

if (!function_exists('yprm_site_logo')) {
  function yprm_site_logo() {
    $colored = false;
    $html = '';

    if (function_exists('yprm_get_theme_setting')) {
      if (
        is_array(yprm_get_theme_setting('light_logo')) &&
        !empty(yprm_get_theme_setting('light_logo')['background-image']) &&
        is_array(yprm_get_theme_setting('dark_logo')) &&
        !empty(yprm_get_theme_setting('dark_logo')['background-image'])
      ) {
        $colored = true;
      }

      if (is_array(yprm_get_theme_setting('light_logo')) && !empty(yprm_get_theme_setting('light_logo')['background-image'])) {

        $html .= '<img' . (($colored) ? ' class="light"' : '') . ' src="' . esc_url(yprm_get_theme_setting('light_logo')['background-image']) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
      }

      if (is_array(yprm_get_theme_setting('dark_logo')) && !empty(yprm_get_theme_setting('dark_logo')['background-image'])) {

        $html .= '<img' . (($colored) ? ' class="dark"' : '') . ' src="' . esc_url(yprm_get_theme_setting('dark_logo')['background-image']) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
      }

      if (empty($html)) {
        if (!empty(yprm_get_theme_setting('logo_text'))) {
          $html = '<span>' . wp_kses(yprm_get_theme_setting('logo_text'), 'post') . '</span>';
        } else {
          $html = '<span>' . wp_kses(get_bloginfo('name'), 'post') . '</span>';
        }
      }

    } else {
      $html = '<span>' . wp_kses(get_bloginfo('name'), 'post') . '</span>';
    }

    return '<a href="' . esc_url(home_url('/')) . '" data-magic-cursor="link">' . $html . '</a>';
  }
}

if (!function_exists('yprm_site_footer_logo')) {
  function yprm_site_footer_logo() {
    $colored = false;
    $html = '';

    if (function_exists('yprm_get_theme_setting')) {
      if (
        is_array(yprm_get_theme_setting('footer_light_logo')) &&
        !empty(yprm_get_theme_setting('footer_light_logo')['background-image']) &&
        is_array(yprm_get_theme_setting('footer_dark_logo')) &&
        !empty(yprm_get_theme_setting('footer_dark_logo')['background-image'])
      ) {
        $colored = true;
      }

      if (is_array(yprm_get_theme_setting('footer_light_logo')) && !empty(yprm_get_theme_setting('footer_light_logo')['background-image'])) {

        $html .= '<img' . (($colored) ? ' class="light"' : '') . ' src="' . esc_url(yprm_get_theme_setting('footer_light_logo')['background-image']) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
      }

      if (is_array(yprm_get_theme_setting('footer_dark_logo')) && !empty(yprm_get_theme_setting('footer_dark_logo')['background-image'])) {

        $html .= '<img' . (($colored) ? ' class="dark"' : '') . ' src="' . esc_url(yprm_get_theme_setting('footer_dark_logo')['background-image']) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
      }

    }

    if($html) {
      return '<a href="' . esc_url(home_url('/')) . '" data-magic-cursor="link">' . $html . '</a>';
    } else {
      return yprm_site_logo();
    }
    
  }
}

/**
 * WC Minicart
 */

if (!function_exists('yprm_wc_minicart')) {
  function yprm_wc_minicart() {
    if (!class_exists('WooCommerce')) {
      return;
    }

    global $woocommerce;
    $count = $woocommerce->cart->cart_contents_count;
    ?>
    <div class="header-minicart woocommerce header-minicart-somo">
      <?php if ($count == 0) { ?>
        <div class="hm-count"><i class="base-icon-shopping-cart"></i><span><?php echo esc_html($count) ?></span></div>
      <?php } else { ?>
        <a class="hm-count" href="<?php echo esc_url(wc_get_cart_url()) ?>" data-magic-cursor="link-small"><i class="base-icon-shopping-cart"></i><span><?php echo esc_html($count) ?></span></a>
      <?php } ?>
      <div class="minicart-wrap">
        <?php woocommerce_mini_cart(); ?>
      </div>
    </div>
    <?php
}
}

/**
 * Build Social Links
 */

if (!function_exists('yprm_build_social_links')) {
  function yprm_build_social_links($type = false, $items = false, $target = null) {
    $html = '';
    $default_icons = array(
      '500px' => array(
        'icon' => 'fab fa-500px',
        'title' => esc_html__('500px', 'somo'),
        'title_small' => esc_html__('500px', 'somo'),
      ),
      'amazon' => array(
        'icon' => 'fab fa-amazon',
        'title' => esc_html__('Amazon', 'somo'),
        'title_small' => esc_html__('az', 'somo'),
      ),
      'app-store' => array(
        'icon' => 'fab fa-app-store',
        'title' => esc_html__('App Store', 'somo'),
        'title_small' => esc_html__('as', 'somo'),
      ),
      'behance' => array(
        'icon' => 'fab fa-behance',
        'title' => esc_html__('Behance', 'somo'),
        'title_small' => esc_html__('bh', 'somo'),
      ),
      'blogger' => array(
        'icon' => 'fab fa-blogger-b',
        'title' => esc_html__('Blogger', 'somo'),
        'title_small' => esc_html__('bg', 'somo'),
      ),
      'codepen' => array(
        'icon' => 'fab fa-codepen',
        'title' => esc_html__('Codepen', 'somo'),
        'title_small' => esc_html__('cp', 'somo'),
      ),
      'digg' => array(
        'icon' => 'fab fa-digg',
        'title' => esc_html__('Digg', 'somo'),
        'title_small' => esc_html__('dg', 'somo'),
      ),
      'dribbble' => array(
        'icon' => 'fab fa-dribbble',
        'title' => esc_html__('Dribbble', 'somo'),
        'title_small' => esc_html__('db', 'somo'),
      ),
      'dropbox' => array(
        'icon' => 'fab fa-dropbox',
        'title' => esc_html__('Dropbox', 'somo'),
        'title_small' => esc_html__('db', 'somo'),
      ),
      'ebay' => array(
        'icon' => 'fab fa-ebay',
        'title' => esc_html__('Ebay', 'somo'),
        'title_small' => esc_html__('eb', 'somo'),
      ),
      'facebook' => array(
        'icon' => 'fab fa-facebook-f',
        'title' => esc_html__('Facebook', 'somo'),
        'title_small' => esc_html__('fb', 'somo'),
      ),
      'flickr' => array(
        'icon' => 'fab fa-flickr',
        'title' => esc_html__('Flickr', 'somo'),
        'title_small' => esc_html__('fl', 'somo'),
      ),
      'foursquare' => array(
        'icon' => 'fab fa-foursquare',
        'title' => esc_html__('Foursquare', 'somo'),
        'title_small' => esc_html__('fs', 'somo'),
      ),
      'github' => array(
        'icon' => 'fab fa-github',
        'title' => esc_html__('GitHub', 'somo'),
        'title_small' => esc_html__('gh', 'somo'),
      ),
      'google-plus' => array(
        'icon' => 'fab fa-google-plus-g',
        'title' => esc_html__('Google Plus', 'somo'),
        'title_small' => esc_html__('gp', 'somo'),
      ),
      'instagram' => array(
        'icon' => 'base-icon-instagram-social-network-logo-of-photo-camera',
        'title' => esc_html__('Instagram', 'somo'),
        'title_small' => esc_html__('in', 'somo'),
      ),
      'itunes' => array(
        'icon' => 'fab fa-itunes-note',
        'title' => esc_html__('Itunes', 'somo'),
        'title_small' => esc_html__('it', 'somo'),
      ),
      'kickstarter' => array(
        'icon' => 'fab fa-kickstarter-k',
        'title' => esc_html__('Kickstarter', 'somo'),
        'title_small' => esc_html__('ks', 'somo'),
      ),
      'linkedin' => array(
        'icon' => 'fab fa-linkedin-in',
        'title' => esc_html__('LinkedIn', 'somo'),
        'title_small' => esc_html__('li', 'somo'),
      ),
      'mailchimp' => array(
        'icon' => 'fab fa-mailchimp',
        'title' => esc_html__('Mailchimp', 'somo'),
        'title_small' => esc_html__('mc', 'somo'),
      ),
      'mixcloud' => array(
        'icon' => 'fab fa-mixcloud',
        'title' => esc_html__('MixCloud', 'somo'),
        'title_small' => esc_html__('mc', 'somo'),
      ),
      'windows' => array(
        'icon' => 'fab fa-microsoft',
        'title' => esc_html__('Windows', 'somo'),
        'title_small' => esc_html__('wd', 'somo'),
      ),
      'odnoklassniki' => array(
        'icon' => 'fab fa-odnoklassniki',
        'title' => esc_html__('Odnoklassniki', 'somo'),
        'title_small' => esc_html__('od', 'somo'),
      ),
      'paypal' => array(
        'icon' => 'fab fa-paypal',
        'title' => esc_html__('PayPal', 'somo'),
        'title_small' => esc_html__('pp', 'somo'),
      ),
      'periscope' => array(
        'icon' => 'fab fa-periscope',
        'title' => esc_html__('Periscope', 'somo'),
        'title_small' => esc_html__('ps', 'somo'),
      ),
      'openid' => array(
        'icon' => 'fab fa-openid',
        'title' => esc_html__('OpenID', 'somo'),
        'title_small' => esc_html__('oi', 'somo'),
      ),
      'pinterest' => array(
        'icon' => 'fab fa-pinterest',
        'title' => esc_html__('Pinterest', 'somo'),
        'title_small' => esc_html__('pr', 'somo'),
      ),
      'reddit' => array(
        'icon' => 'fab fa-reddit-alien',
        'title' => esc_html__('Reddit', 'somo'),
        'title_small' => esc_html__('rd', 'somo'),
      ),
      'skype' => array(
        'icon' => 'fab fa-skype',
        'title' => esc_html__('Skype', 'somo'),
        'title_small' => esc_html__('sk', 'somo'),
      ),
      'snapchat' => array(
        'icon' => 'fab fa-snapchat-ghost',
        'title' => esc_html__('Snapchat', 'somo'),
        'title_small' => esc_html__('sc', 'somo'),
      ),
      'soundcloud' => array(
        'icon' => 'fab fa-soundcloud',
        'title' => esc_html__('SoundCloud', 'somo'),
        'title_small' => esc_html__('sc', 'somo'),
      ),
      'spotify' => array(
        'icon' => 'fab fa-spotify',
        'title' => esc_html__('Spotify', 'somo'),
        'title_small' => esc_html__('sp', 'somo'),
      ),
      'stack-overflow' => array(
        'icon' => 'fab fa-stack-overflow',
        'title' => esc_html__('Stack Overflow', 'somo'),
        'title_small' => esc_html__('so', 'somo'),
      ),
      'steam' => array(
        'icon' => 'fab fa-steam-square',
        'title' => esc_html__('Steam', 'somo'),
        'title_small' => esc_html__('st', 'somo'),
      ),
      'stripe' => array(
        'icon' => 'fab fa-stripe',
        'title' => esc_html__('Stripe', 'somo'),
        'title_small' => esc_html__('st', 'somo'),
      ),
      'telegram' => array(
        'icon' => 'fab fa-telegram-plane',
        'title' => esc_html__('Telegram', 'somo'),
        'title_small' => esc_html__('tl', 'somo'),
      ),
      'tumblr' => array(
        'icon' => 'fab fa-tumblr',
        'title' => esc_html__('Tumblr', 'somo'),
        'title_small' => esc_html__('tu', 'somo'),
      ),
      'twitter' => array(
        'icon' => 'fab fa-twitter',
        'title' => esc_html__('Twitter', 'somo'),
        'title_small' => esc_html__('tw', 'somo'),
      ),
      'viber' => array(
        'icon' => 'fab fa-viber',
        'title' => esc_html__('Viber', 'somo'),
        'title_small' => esc_html__('vi', 'somo'),
      ),
      'vimeo' => array(
        'icon' => 'fab fa-vimeo-v',
        'title' => esc_html__('Vimeo', 'somo'),
        'title_small' => esc_html__('vi', 'somo'),
      ),
      'vk' => array(
        'icon' => 'fab fa-vk',
        'title' => esc_html__('VK', 'somo'),
        'title_small' => esc_html__('vk', 'somo'),
      ),
      'whatsapp' => array(
        'icon' => 'fab fa-whatsapp',
        'title' => esc_html__('Whatsapp', 'somo'),
        'title_small' => esc_html__('wa', 'somo'),
      ),
      'yahoo' => array(
        'icon' => 'fab fa-yahoo',
        'title' => esc_html__('Yahoo', 'somo'),
        'title_small' => esc_html__('ya', 'somo'),
      ),
      'yelp' => array(
        'icon' => 'fab fa-yelp',
        'title' => esc_html__('Yelp', 'somo'),
        'title_small' => esc_html__('ye', 'somo'),
      ),
      'yoast' => array(
        'icon' => 'fab fa-yoast',
        'title' => esc_html__('Yoast', 'somo'),
        'title_small' => esc_html__('yo', 'somo'),
      ),
      'youtube' => array(
        'icon' => 'fab fa-youtube',
        'title' => esc_html__('YouTube', 'somo'),
        'title_small' => esc_html__('yt', 'somo'),
      ),
    );

    $square_icons = $circle_icons = $default_icons;

    $square_icons['app-store']['icon'] = 'fab fa-app-store-ios';
    $square_icons['behance']['icon'] = 'fab fa-behance-square';
    $square_icons['blogger']['icon'] = 'fab fa-blogger';
    $square_icons['dribbble']['icon'] = 'fab fa-dribbble-square';
    $square_icons['facebook']['icon'] = 'fab fa-facebook-square';
    $square_icons['github']['icon'] = 'fab fa-github-square';
    $square_icons['google-plus']['icon'] = 'fab fa-google-plus-square';
    $square_icons['itunes']['icon'] = 'fab fa-itunes';
    $square_icons['kickstarter']['icon'] = 'fab fa-kickstarter';
    $square_icons['linkedin']['icon'] = 'fab fa-linkedin';
    $square_icons['odnoklassniki']['icon'] = 'fab fa-odnoklassniki-square';
    $square_icons['pinterest']['icon'] = 'fab fa-pinterest-square';
    $square_icons['reddit']['icon'] = 'fab fa-reddit-square';
    $square_icons['tumblr']['icon'] = 'fab fa-tumblr-square';
    $square_icons['twitter']['icon'] = 'fab fa-twitter-square';
    $square_icons['vimeo']['icon'] = 'fab fa-vimeo-square';
    $square_icons['whatsapp']['icon'] = 'fab fa-whatsapp-square';
    $square_icons['youtube']['icon'] = 'fab fa-youtube-square';

    $circle_icons['behance']['icon'] = 'glypho-behance-logo-button';
    $circle_icons['dribbble']['icon'] = 'glypho-dribble-logo-button';
    $circle_icons['facebook']['icon'] = 'glypho-facebook-logo-button';
    $circle_icons['google-plus']['icon'] = 'glypho-google-plus-logo-button';
    $circle_icons['instagram']['icon'] = 'glypho-instagram-logo';
    $circle_icons['linkedin']['icon'] = 'glypho-linkedin-logo-button';
    $circle_icons['tumblr']['icon'] = 'glypho-tumblr-logo-button';
    $circle_icons['twitter']['icon'] = 'glypho-twitter-logo-button';

    if (function_exists('yprm_get_theme_setting')) {
      $items_array = array();
      if(!$target) {
        $target = yprm_get_theme_setting('social_target');
      }
      if (!$items) {
        $n = 0;
        while ($n < 7) {
          $n++;
          if (!empty(yprm_get_theme_setting('social_icon' . $n)) && !empty(yprm_get_theme_setting('social_link' . $n))) {
            array_push($items_array, array(
              'type' => yprm_get_theme_setting('social_icon' . $n),
              'url' => yprm_get_theme_setting('social_link' . $n),
            ));
          }
        }

        if (count($items_array) == 0) {
          return false;
        }
      } elseif (is_array($items) && count($items) > 0) {
        $items_array = $items;
      }

      if (!$type) {
        foreach ($items_array as $item) {
          $icon = $default_icons[$item['type']]['icon'];
          $html .= '<a href="' . esc_url($item['url']) . '" target="' . esc_attr($target) . '"><i class="' . esc_attr($icon) . '"></i></a>';
        }
        return $html;
      } elseif ($type == 'square') {
        foreach ($items_array as $item) {
          $icon = $square_icons[$item['type']]['icon'];
          $html .= '<a href="' . esc_url($item['url']) . '" target="' . esc_attr($target) . '"><i class="' . esc_attr($icon) . '"></i></a>';
        }
        return $html;
      } elseif ($type == 'with-label') {
        foreach ($items_array as $item) {
          $icon = $default_icons[$item['type']]['icon'];
          $html .= '<a href="' . esc_url($item['url']) . '" target="' . esc_attr($target) . '"><i class="' . esc_attr($icon) . '"></i><span>' . strip_tags($default_icons[$item['type']]['title']) . '</span></a>';
        }
        return $html;
      } elseif ($type == 'label') {
        foreach ($items_array as $item) {
          $html .= '<a href="' . esc_url($item['url']) . '" target="' . esc_attr($target) . '"><span>' . strip_tags($default_icons[$item['type']]['title']) . '</span></a>';
        }
        return $html;
      } elseif ($type == 'circle') {
        foreach ($items_array as $item) {
          $icon = $circle_icons[$item['type']]['icon'];
          $html .= '<a href="' . esc_url($item['url']) . '" target="' . esc_attr($target) . '"><i class="' . esc_attr($icon) . '"></i></a>';
        }
        return $html;
      } elseif ($type == 'circle-with-label') {
        foreach ($items_array as $item) {
          $icon = $circle_icons[$item['type']]['icon'];
          $html .= '<a href="' . esc_url($item['url']) . '" target="' . esc_attr($target) . '"><i class="' . esc_attr($icon) . '"></i><span>' . strip_tags($default_icons[$item['type']]['title']) . '</span></a>';
        }
        return $html;
      } elseif ($type == 'circle-array') {
        foreach ($items_array as $key => $item) {
          $icon = $circle_icons[$item['type']]['icon'];
          $html .= esc_attr($icon) . '||' . esc_url($item['url']);
          if ($key < count($items_array)) {
            $html .= ',';
          }
        }
        return $html;
      }

    } else {
      return;
    }

  }
}

/**
 * Inline JS
 */

if (!function_exists('somo_inline_js')) {
  function somo_inline_js($js = false) {
    if (empty($js)) {
      return false;
    }

    $js = "jQuery(document).ready(function (jQuery) {
      $js
    });";

    wp_enqueue_script('somo-scripts');
    wp_add_inline_script('somo-scripts', $js);
  }
  add_action('somo_inline_js', 'somo_inline_js');
}

/**
 * Inline CSS
 */

if (!function_exists('somo_inline_css')) {
  function somo_inline_css($css = false) {
    if (empty($css)) {
      return false;
    }

    wp_enqueue_style('somo-inline', get_parent_theme_file_uri() . '/css/custom.css');
    wp_add_inline_style('somo-inline', $css);
  }
  add_action('somo_inline_css', 'somo_inline_css');
}

/**
 * Edit Archive Title
 */

if (!function_exists('yprm_edit_archive_title')) {
  function yprm_edit_archive_title($title) {
    if (function_exists('yprm_get_theme_setting') && yprm_get_theme_setting('cat_prefix') == 'false') {
      return preg_replace('~^[^:]+: ~', '', $title);
    } else {
      return $title;
    }
  }

  add_filter('get_the_archive_title', 'yprm_edit_archive_title');
}

/**
 * Implode
 */

if (!function_exists('yprm_implode')) {
  function yprm_implode($array = array(), $before = ' ', $separator = ' ') {
    return $before . implode($separator, $array);
  }
}

/**
 * Demo Content
 */

if (!function_exists('yprm_demo_content')) {
  function yprm_demo_content($demos) {
    $demos_array = array(
      'demo' => array(
        'title' => esc_html__('Demo Content', 'somo'),
        'screenshot' => 'http://updates.promo-theme.com/demo-contents/somo/screenshot.png',
        'preview_link' => 'https://promo-theme.com/somo',
      ),
    );

    $download_url = 'http://updates.promo-theme.com/demo-contents/somo/';

    foreach ($demos_array as $id => $data) {
      $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
        'url' => $download_url,
        'file_id' => $id,
      ));
      $demo->set_title($data['title']);
      $demo->set_screenshot($data['screenshot']);
      $demo->set_preview_link($data['preview_link']);

      $demos[$demo->get_id()] = $demo;

      unset($demo);
    }

    return $demos;
  }
  add_filter('fw:ext:backups-demo:demos', 'yprm_demo_content');
}

/**
 * TypeKit Ajax
 */

if (!function_exists('typekit_ajax')) {
  function typekit_ajax($id = '') {

    if (!empty($_POST['id'])) {
      $id = $_POST['id'];
    } elseif (!$id) {
      return false;
    }
    if (class_exists('Typekit')) {
      $typekit = new Typekit();
      $fonts_array = $typekit->get($id);
      $typekit_html = '';

      $font_weight_change_array = array(
        'search' => array('n1', 'i1', 'n2', 'i2', 'n3', 'i3', 'n4', 'i4', 'n5', 'i5', 'n6', 'i6', 'n7', 'i7', 'n8', 'i8', 'n9', 'i9'),
        'replace' => array('Thin', 'Thin Italic', 'ExtraLight', 'ExtraLight Italic', 'Light', 'Light Italic', 'Regular', 'Italic', 'Medium', 'Medium Italic', 'SemiBold', 'SemiBold Italic', 'Bold', 'Bold Italic', 'ExtraBold', 'ExtraBold Italic', 'Ultra', 'Ultra Italic'),
      );
      if (is_array($fonts_array)) {
        $typekit_html .= '<link rel="stylesheet" href="https://use.typekit.net/' . strip_tags($id) . '.css">';
        $typekit_html .= '<div class="redux-typekit-block">';
        foreach ($fonts_array['kit']['families'] as $font) {
          $typekit_html .= '<div class="item">';
          $typekit_html .= '<div class="label"><strong>' . esc_html__('Font Family:', 'somo') . '</strong> ' . strip_tags($font['name']) . '</div>';
          $typekit_html .= '<div class="value"><strong>' . esc_html__('Font Weights:', 'somo') . '</strong> ' . strip_tags(str_replace($font_weight_change_array['search'], $font_weight_change_array['replace'], implode(', ', $font['variations']))) . '</div>';
          $typekit_html .= '<div class="font-example" style="font-family: \'' . esc_attr($font['slug']) . '\'">' . esc_html__('The quick brown fox jumps over the lazy dog', 'somo') . '</div>';
          $typekit_html .= '</div>';
        }
        $typekit_html .= '</div>';
      } else {
        $typekit_html .= '<div>' . esc_html__('Nothing Found', 'somo') . '</div>';
      }

      echo wp_kses($typekit_html, array(
        'link' => array(
          'rel' => true,
          'href' => true,
        ),
        'div' => array(
          'class' => true,
        ),
        'strong' => array(
          'class' => true,
        ),
      ));
    }
  }
  add_action('wp_ajax_typekit_ajax', 'typekit_ajax');
  add_action('wp_ajax_nopriv_typekit_ajax', 'typekit_ajax');
}

/**
 * Breadcrumbs
 */

if (!function_exists('yprm_breadcrumbs')) {
  function yprm_breadcrumbs() {
    global $post;
    if (!is_home()) {
      echo '<div class="breadcrumbs">';
      echo '<a href="' . site_url() . '">'.esc_html__('Home', 'somo').'</a> \ ';
      if (is_single()) {
        the_category();
        echo " \ ";
        the_title();
      } elseif (is_page()) {
        if ($post->post_parent) {
          $parent_id = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          foreach ($breadcrumbs as $crumb) {
            echo wp_kses($crumb . ' \ ', 'post');
          }

        }
        echo the_title();
      } elseif (is_category()) {
        global $wp_query;
        $obj_cat = $wp_query->get_queried_object();
        $current_cat = $obj_cat->term_id;
        $current_cat = get_category($current_cat);
        $parent_cat = get_category($current_cat->parent);
        if ($current_cat->parent != 0) {
          echo (get_category_parents($parent_cat, TRUE, ' \ '));
        }

        single_cat_title();
      } elseif (is_tag()) {
        echo single_tag_title('', false);
      } elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> \ ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> \ ';
        echo get_the_time('d');
      } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> \ ';
        echo get_the_time('F');
      } elseif (is_year()) {
        echo get_the_time('Y');
      }
      echo '</div>';
    }
  }
}

/**
 * Page Top Block
 */

if(!function_exists('yprm_page_top_block')) {
  function yprm_page_top_block($type = false) {
    ob_start(); ?>
    <div class="page-top-block">
      <div class="container">
        <div class="heading-block">
          <h1 class="h h3"><?php if(!have_posts()) {
            esc_html_e( 'Nothing Found', 'somo' );
          } elseif($type == 'woocommerce') {
            woocommerce_page_title();
          } elseif($type == 'search') {
            printf( esc_html__( 'Search Results for: %s', 'somo' ), get_search_query() );
          } elseif($type == 'archive') {
            the_archive_title();
          } else {
            the_title();
          } ?></h1>
        </div>
      </div>
    </div>
    <?php return ob_get_clean();
  }
}