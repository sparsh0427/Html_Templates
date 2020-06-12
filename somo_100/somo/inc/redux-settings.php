<?php

if (!class_exists('Redux')) {
  return;
}

$opt_name = "somo_theme";
$opt_name = apply_filters('somo_theme/opt_name', $opt_name);

$theme = wp_get_theme();

$args = array(
  'opt_name' => $opt_name,
  'display_name' => $theme->get('Name'),
  'display_version' => $theme->get('Version'),
  'menu_type' => 'submenu',
  'allow_sub_menu' => true,
  'menu_title' => esc_html__('Theme Options', 'somo'),
  'page_title' => esc_html__('Theme Options', 'somo'),
  'google_api_key' => '',
  'google_update_weekly' => true,
  'async_typography' => true,
  'admin_bar' => false,
  'admin_bar_icon' => 'dashicons-portfolio',
  'admin_bar_priority' => 50,
  'global_variable' => '',
  'dev_mode' => false,
  'update_notice' => true,
  'customizer' => true,
  'page_priority' => null,
  'page_parent' => 'somo_dashboard',
  'page_permissions' => 'manage_options',
  'menu_icon' => '',
  'last_tab' => '',
  'page_icon' => 'icon-themes',
  'page_slug' => '',
  'save_defaults' => true,
  'default_show' => false,
  'default_mark' => '',
  'show_import_export' => true,
  'transient_time' => 60 * MINUTE_IN_SECONDS,
  'output' => true,
  'output_tag' => true,
  'database' => '',
  'use_cdn' => true,
  'show_options_object' => false,
);

Redux::setArgs($opt_name, $args);

if (!function_exists('yprm_redux_social_icons')) {
  function yprm_redux_social_icons() {
    return array(
      '' => esc_html__('None', 'somo'),
      '500px' => esc_html__('500px', 'somo'),
      'amazon' => esc_html__('Amazon', 'somo'),
      'app-store' => esc_html__('App Store', 'somo'),
      'behance' => esc_html__('Behance', 'somo'),
      'blogger' => esc_html__('Blogger', 'somo'),
      'codepen' => esc_html__('Codepen', 'somo'),
      'digg' => esc_html__('Digg', 'somo'),
      'dribbble' => esc_html__('Dribbble', 'somo'),
      'dropbox' => esc_html__('Dropbox', 'somo'),
      'ebay' => esc_html__('Ebay', 'somo'),
      'facebook' => esc_html__('Facebook', 'somo'),
      'flickr' => esc_html__('Flickr', 'somo'),
      'foursquare' => esc_html__('Foursquare', 'somo'),
      'github' => esc_html__('GitHub', 'somo'),
      'google-plus' => esc_html__('Google Plus', 'somo'),
      'instagram' => esc_html__('Instagram', 'somo'),
      'itunes' => esc_html__('Itunes', 'somo'),
      'kickstarter' => esc_html__('Kickstarter', 'somo'),
      'linkedin' => esc_html__('LinkedIn', 'somo'),
      'mailchimp' => esc_html__('Mailchimp', 'somo'),
      'mixcloud' => esc_html__('MixCloud', 'somo'),
      'windows' => esc_html__('Windows', 'somo'),
      'odnoklassniki' => esc_html__('Odnoklassniki', 'somo'),
      'paypal' => esc_html__('PayPal', 'somo'),
      'periscope' => esc_html__('Periscope', 'somo'),
      'openid' => esc_html__('OpenID', 'somo'),
      'pinterest' => esc_html__('Pinterest', 'somo'),
      'reddit' => esc_html__('Reddit', 'somo'),
      'skype' => esc_html__('Skype', 'somo'),
      'snapchat' => esc_html__('Snapchat', 'somo'),
      'soundcloud' => esc_html__('SoundCloud', 'somo'),
      'spotify' => esc_html__('Spotify', 'somo'),
      'stack-overflow' => esc_html__('Stack Overflow', 'somo'),
      'steam' => esc_html__('Steam', 'somo'),
      'stripe' => esc_html__('Stripe', 'somo'),
      'telegram' => esc_html__('Telegram', 'somo'),
      'tumblr' => esc_html__('Tumblr', 'somo'),
      'twitter' => esc_html__('Twitter', 'somo'),
      'viber' => esc_html__('Viber', 'somo'),
      'vimeo' => esc_html__('Vimeo', 'somo'),
      'vk' => esc_html__('VK', 'somo'),
      'whatsapp' => esc_html__('Whatsapp', 'somo'),
      'yahoo' => esc_html__('Yahoo', 'somo'),
      'yelp' => esc_html__('Yelp', 'somo'),
      'yoast' => esc_html__('Yoast', 'somo'),
      'youtube' => esc_html__('YouTube', 'somo'),
    );
  }
}

Redux::setSection($opt_name, array(
  'title' => esc_html__('General', 'somo'),
  'id' => 'general',
  'customizer_width' => '400px',
  'icon' => 'fa fa-home',
  'fields' => array(
    array(
      'id' => 'accent_color',
      'type' => 'color',
      'title' => esc_html__('Accent Color', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array(
        'background-color' => '',

        'background' => '',

        'border-color' => '',

        'color' => '',

        'stroke' => '',
      ),
    ),
    array(
      'id' => 'right_click_disable',
      'type' => 'button_set',
      'title' => esc_html__('Right Click Disable', 'somo'),
      'options' => array(
        'true' => esc_html__('On', 'somo'),
        'false' => esc_html__('Off', 'somo'),
      ),
      'default' => 'false',
    ),
    array(
      'id' => 'right_click_disable_message',
      'type' => 'editor',
      'title' => esc_html__('Right Click Message', 'somo'),
      'default' => wp_kses(__('<p style="text-align: center"><strong><span style="font-size: 18px">Content is protected. Right-click function is disabled.</span></strong></p>', 'somo'), 'post'),
      'args' => array(
        'teeny' => false,
        'textarea_rows' => 5,
      ),
      'required' => array('right_click_disable', '=', 'true'),
    ),
    array(
      'id' => 'protected_message',
      'type' => 'editor',
      'title' => esc_html__('Protected Page Message', 'somo'),
      'default' => esc_html__('This Content Is Password Protected To View It Please Enter Your Password Below', 'somo'),
      'args' => array(
        'teeny' => false,
        'textarea_rows' => 5,
      ),
    ),
    array(
      'id'       => 'mobile_adaptation',
      'type'     => 'button_set',
      'title'    => esc_html__('Mobile Adaptation', 'somo'),
      'options' => array(
        'true' => esc_html__('Original', 'somo'),
        'false' => esc_html__('Cropped', 'somo'),
      ),
      'default' => 'false',
    ),
    array(
      'id'       => 'cat_prefix',
      'type'     => 'button_set',
      'title'    => esc_html__('Category Prefix', 'somo'),
      'desc'     => wp_kses(__('Show/Hide Category prefix.<br><b>Example:</b><br><b>If Show -</b> Category: Lifestyle<br><b>If Hide -</b> Lifestyle', 'somo'), 'post'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id'       => 'project_image_download',
      'type'     => 'button_set',
      'title'    => esc_html__('Image Download Link On Popup', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'false',
    ),
    array(
      'id'       => 'custom_cursor',
      'type'     => 'button_set',
      'title'    => esc_html__('Custom Cursor', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'false',
    ),
    array(
      'id' => 'google_maps_api_key',
      'type' => 'text',
      'title' => esc_html__('Google Map Api Key', 'somo'),
      'description' => wp_kses(__('Create an application in <a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">Google Console</a> and add the Key here.', 'somo'), 'post'),
    ),
    array(
      'id' => 'subscribe_shortcode',
      'type' => 'text',
      'title' => esc_html__('Subscribe Form Shortcode', 'somo'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Preloader', 'somo'),
  'id' => 'general_preloader',
  'customizer_width' => '450px',
  'icon' => 'fas fa-sync-alt ',
  'fields' => array(
    array(
      'id' => 'preloader_show',
      'type' => 'button_set',
      'title' => esc_html__('Preloader', 'somo'),
      'options' => array(
        'true' => esc_html__('On', 'somo'),
        'false' => esc_html__('Off', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'preloader_type',
      'type' => 'select',
      'title' => esc_html__('Preloader Type', 'somo'),
      'options' => array(
        'words' => esc_html__('Words', 'somo'),
        'cube' => esc_html__('Cube', 'somo'),
        'custom_image' => esc_html__('Custom Image', 'somo'),
      ),
      'default' => 'cube',
      'required' => array('preloader_show', '=', 'true'),
    ),
    array(
      'id' => 'preloader_words',
      'type' => 'textarea',
      'title' => esc_html__('Preloader Words', 'somo'),
      'required' => array('preloader_type', '=', 'words'),
    ),
    array(
      'id' => 'preloader_bg_color',
      'type' => 'color',
      'title' => esc_html__('Preloader Background Color', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background' => 'body.dark-scheme .preloader-area, body .dark-scheme .preloader-area, body.dark-scheme .preloader-default-area, body .dark-scheme .preloader-default-area, body.dark-scheme .preloader-words-area, body .dark-scheme .preloader-words-area'),
      'required' => array('preloader_show', '=', 'true'),
    ),
    array(
      'id' => 'preloader_color',
      'type' => 'color',
      'title' => esc_html__('Preloader Color', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background' => '.preloader-folding-cube .preloader-cube:before', 'color'=> 'body.dark-scheme .preloader-words-area'),
      'required' => array('preloader_show', '=', 'true'),
    ),
    array(
      'id' => 'preloader_img',
      'type' => 'background',
      'title' => esc_html__('Prelaoder Image', 'somo'),
      'desc' => esc_html__('Choose A Default Logo Image To Display', 'somo'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
      'required' => array('preloader_type', '=', 'custom_image'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Logo', 'somo'),
  'id' => 'header_logo',
  'customizer_width' => '450px',
  'icon' => 'fas fa-address-book',
  'fields' => array(
    array(
      'id' => 'logo_text',
      'type' => 'text',
      'title' => esc_html__('Logo Text', 'somo'),
    ),
    array(
      'id' => 'light_logo',
      'type' => 'background',
      'title' => esc_html__('Logo Image Light', 'somo'),
      'desc' => esc_html__('Choose A Logo Image To Display For Light Header Skin', 'somo'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => 'dark_logo',
      'type' => 'background',
      'title' => esc_html__('Logo Image Dark', 'somo'),
      'desc' => esc_html__('Choose A Logo Image To Display For Dark Header Skin', 'somo'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => 'logo_size',
      'units' => 'px',
      'type' => 'dimensions',
      'units_extended' => 'false',
      'title' => esc_html__('Logo Max Width', 'somo'),
      'output' => array('.site-header .site-logo'),
      'height' => true,
    ),
    array(
      'id' => 'mobile_logo_size',
      'units' => 'px',
      'type' => 'dimensions',
      'units_extended' => 'false',
      'title' => esc_html__('Mobile Logo Size', 'somo'),
      'output' => array('.is-mobile-body .site-header .site-logo'),
      'height' => true,
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Header', 'somo'),
  'id' => 'header_style_area',
  'customizer_width' => '450px',
  'icon' => 'fas fa-heading',
  'fields' => array(
    array(
      'id' => 'header_container',
      'type' => 'select',
      'title' => esc_html__('Header Container', 'somo'),
      'options' => array(
        'container' => esc_html__('Center Container', 'somo'),
        'container-fluid' => esc_html__('Full Witdh', 'somo'),
      ),
      'default' => 'container',
    ),
    array(
      'id' => 'header_color_mode',
      'type' => 'select',
      'title' => esc_html__('Header Color Mode', 'somo'),
      'options' => array(
        'dark' => esc_html__('Dark', 'somo'),
        'light' => esc_html__('Light', 'somo'),
      ),
      'default' => 'light',
    ),
    array(
      'id' => 'header_style',
      'type' => 'image_select',
      'title' => esc_html__('Header Type', 'somo'),
      'options' => array(
        'logo-left' => array(
          'alt' => esc_html__('Logo Left', 'somo'),
          'img' => get_template_directory_uri() . '/images/redux/logo-left.png',
        ),
        'logo-center' => array(
          'alt' => esc_html__('Logo Center', 'somo'),
          'img' => get_template_directory_uri() . '/images/redux/logo-center.png',
        ),
        'logo-right' => array(
          'alt' => esc_html__('Logo Right', 'somo'),
          'img' => get_template_directory_uri() . '/images/redux/logo-right.png',
        ),
        'side' => array(
          'alt' => esc_html__('Side', 'somo'),
          'img' => get_template_directory_uri() . '/images/redux/side.png',
        ),
      ),
      'default' => 'logo-left',
    ),
    array(
      'id' => 'header_cart',
      'type' => 'button_set',
      'title' => esc_html__('Cart', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'header_search',
      'type' => 'button_set',
      'title' => esc_html__('Search', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'header_bg_color_light',
      'type' => 'color',
      'title' => esc_html__('Background Color For Light', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background-color' => '.site-header.fixed.light-color'),
    ),
    array(
      'id' => 'header_bg_color_dark',
      'type' => 'color',
      'title' => esc_html__('Background Color For Dark', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background-color' => '.site-header.fixed.dark-color'),
    ),
    array(
      'id' => 'header_text_light_color',
      'type' => 'color',
      'title' => esc_html__('Text Color For Light', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.site-header.light-color'),
    ),
    array(
      'id' => 'header_text_dark_color',
      'type' => 'color',
      'title' => esc_html__('Text Color For Dark', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.site-header.dark-color'),
    ),
    array(
      'id' => 'nav-options-start',
      'type' => 'section',
      'title' => esc_html__('Navigation Options', 'somo'),
      'indent' => true 
    ),
    array(
      'id' => 'navigation_type',
      'type' => 'image_select',
      'title' => esc_html__('Navigation Type', 'somo'),
      'options' => array(
        'disabled' => array(
          'alt' => esc_html__('Disabled', 'somo'),
          'img' => get_template_directory_uri() . '/images/redux/disabled.png',
        ),
        'hidden_menu' => array(
          'alt' => esc_html__('Hidden', 'somo'),
          'img' => get_template_directory_uri() . '/images/redux/hidden.png',
        ),
        'visible_menu' => array(
          'alt' => esc_html__('Visible', 'somo'),
          'img' => get_template_directory_uri() . '/images/redux/visible.png',
        ),
        'fullscreen' => array(
          'alt' => esc_html__('FullScreen', 'somo'),
          'img' => get_template_directory_uri() . '/images/redux/fullscreen.png',
        ),
      ),
      'default' => 'visible_menu',
    ),
    array(
      'id' => 'navigation_button_style',
      'type' => 'select',
      'title' => esc_html__('Navigation Button Style', 'somo'),
      'options' => array(
        'butter' => esc_html__('Butter', 'somo'),
        'style1' => esc_html__('With Label', 'somo'),
      ),
    ),
    array(
      'id' => 'navigation_item_hover_style',
      'type' => 'image_select',
      'title' => esc_html__('Navigation hover style', 'somo'),
      'options' => array(
        'style1' => array(
          'alt' => 'Style 1',
          'img' => get_template_directory_uri() . '/images/redux/nav-h1.png',
        ),
        'style2' => array(
          'alt' => 'Style 2',
          'img' => get_template_directory_uri() . '/images/redux/nav-h2.png',
        ),
        'style3' => array(
          'alt' => 'Style 3',
          'img' => get_template_directory_uri() . '/images/redux/nav-h3.png',
        ),
        'style4' => array(
          'alt' => 'Style 4',
          'img' => get_template_directory_uri() . '/images/redux/nav-h4.png',
        ),
      ),
      'default' => 'style1',
    ),
    array(
      'id' => 'nav-options-end',
      'type' => 'section',
      'indent' => false 
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Typography', 'somo'),
  'id' => 'typography',
  'customizer_width' => '400px',
  'icon' => 'fa fa-font',
  'fields' => array(
    array(
      'id' => 'body-font-face',
      'type' => 'yprm_typography',
      'title' => esc_html__('Body', 'somo'),
      'output' => array('body'),
      'default' => array(
        'weight' => 'regular',
        'family' => 'proxima-nova',
        'font-size' => '16px',
      ),
    ),
    array(
      'id' => 'h1-font-face',
      'type' => 'yprm_typography',
      'title' => esc_html__('H1', 'somo'),
      'output' => array('h1, .h1'),
      'default' => array(
        'weight' => '700',
        'family' => 'montserrat',
        'font-size' => '60px',
      ),
    ),
    array(
      'id' => 'h2-font-face',
      'type' => 'yprm_typography',
      'title' => esc_html__('H2', 'somo'),
      'output' => array('h2, .h2'),
      'default' => array(
        'weight' => '700',
        'family' => 'montserrat',
        'font-size' => '48px',
      ),
    ),
    array(
      'id' => 'h3-font-face',
      'type' => 'yprm_typography',
      'title' => esc_html__('H3', 'somo'),
      'output' => array('h3, .h3'),
      'default' => array(
        'weight' => '700',
        'family' => 'montserrat',
        'font-size' => '40px',
      ),
    ),
    array(
      'id' => 'h4-font-face',
      'type' => 'yprm_typography',
      'title' => esc_html__('H4', 'somo'),
      'output' => array('h4, .h4'),
      'default' => array(
        'weight' => '700',
        'family' => 'montserrat',
        'font-size' => '36px',
      ),
    ),
    array(
      'id' => 'h5-font-face',
      'type' => 'yprm_typography',
      'title' => esc_html__('H5', 'somo'),
      'output' => array('h5, .h5'),
      'default' => array(
        'weight' => '700',
        'family' => 'montserrat',
        'font-size' => '30px',
      ),
    ),
    array(
      'id' => 'h6-font-face',
      'type' => 'yprm_typography',
      'title' => esc_html__('H6', 'somo'),
      'output' => array('h6, .h6'),
      'default' => array(
        'weight' => '700',
        'family' => 'montserrat',
        'font-size' => '24px',
      ),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Theme Fonts', 'somo'),
  'id' => 'theme_fonts',
  'icon' => 'fas fa-i-cursor',
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Fonts', 'somo'),
  'id' => 'theme_fonts_array',
	'subsection'       => true,
  'fields' => array(
    array(
			'id'       => 'custom_fonts',
      'type'     => 'yprm_fonts',
      'default'  => array(
        'fonts' => '{"type":"typekit","family":"Poppins","slug":"poppins","variants":"300, 300 Italic, Regular, Italic, 500, 500 Italic, 600, 600 Italic, 700, 700 Italic","subsets":false,"css":["poppins"]},{"type":"typekit","family":"Proxima Nova","slug":"proxima-nova","variants":"300, 300 Italic, Regular, Italic, 500, 500 Italic, 600, 600 Italic, 700, 700 Italic","subsets":false,"css":["proxima-nova"]},{"type":"typekit","family":"Montserrat","slug":"montserrat","variants":"300, 300 Italic, Regular, Italic, 500, 500 Italic, 600, 600 Italic, 700, 700 Italic","subsets":false,"css":["montserrat"]}',
        'typekit_project_id' => 'djm2xvx'
      )
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Icon Fonts', 'somo'),
  'id' => 'theme_icon_fonts_array',
	'subsection'       => true,
  'fields' => array(
    array(
			'id'       => 'icon_fonts',
      'type'     => 'yprm_icon_fonts',
      'title'    => esc_html__('Upload Custom Icon Fonts', 'somo')
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Social Links', 'somo'),
  'id' => 'social_links',
  'customizer_width' => '400px',
  'icon' => 'fab fa-twitter',
  'fields' => array(
    array(
      'id' => 'social_target',
      'type' => 'select',
      'title' => esc_html__('Open Link In', 'somo'),
      'options' => array(
        '_self' => esc_html__('Current Tab', 'somo'),
        '_blank' => esc_html__('New Tab', 'somo'),
      ),
      'default' => '_self',
    ),
    array(
      'id' => 'sl1',
      'type' => 'label',
      'title' => esc_html__('Social Button 1', 'somo'),
    ),
    array(
      'id' => 'social_icon1',
      'type' => 'select',
      'title' => esc_html__('Social Icon', 'somo'),
      'options' => yprm_redux_social_icons(),
      'default' => '',
    ),
    array(
      'id' => 'social_link1',
      'type' => 'text',
      'title' => esc_html__('Link', 'somo'),
    ),
    array(
      'id' => 'sb2',
      'type' => 'label',
      'title' => esc_html__('Social Button 2', 'somo'),
    ),
    array(
      'id' => 'social_icon2',
      'type' => 'select',
      'title' => esc_html__('Social Icon', 'somo'),
      'options' => yprm_redux_social_icons(),
      'default' => '',
    ),
    array(
      'id' => 'social_link2',
      'type' => 'text',
      'title' => esc_html__('Link', 'somo'),
    ),
    array(
      'id' => 'sb3',
      'type' => 'label',
      'title' => esc_html__('Social Button 3', 'somo'),
    ),
    array(
      'id' => 'social_icon3',
      'type' => 'select',
      'title' => esc_html__('Social Icon', 'somo'),
      'options' => yprm_redux_social_icons(),
      'default' => '',
    ),
    array(
      'id' => 'social_link3',
      'type' => 'text',
      'title' => esc_html__('Link', 'somo'),
    ),
    array(
      'id' => 'sb4',
      'type' => 'label',
      'title' => esc_html__('Social Button 4', 'somo'),
    ),
    array(
      'id' => 'social_icon4',
      'type' => 'select',
      'title' => esc_html__('Social Icon', 'somo'),
      'options' => yprm_redux_social_icons(),
      'default' => '',
    ),
    array(
      'id' => 'social_link4',
      'type' => 'text',
      'title' => esc_html__('Link', 'somo'),
    ),
    array(
      'id' => 'sb5',
      'type' => 'label',
      'title' => esc_html__('Social Button 5', 'somo'),
    ),
    array(
      'id' => 'social_icon5',
      'type' => 'select',
      'title' => esc_html__('Social Icon', 'somo'),
      'options' => yprm_redux_social_icons(),
      'default' => '',
    ),
    array(
      'id' => 'social_link5',
      'type' => 'text',
      'title' => esc_html__('Link', 'somo'),
    ),
    array(
      'id' => 'sb6',
      'type' => 'label',
      'title' => esc_html__('Social Button 6', 'somo'),
    ),
    array(
      'id' => 'social_icon6',
      'type' => 'select',
      'title' => esc_html__('Social Icon', 'somo'),
      'options' => yprm_redux_social_icons(),
      'default' => '',
    ),
    array(
      'id' => 'social_link6',
      'type' => 'text',
      'title' => esc_html__('Link', 'somo'),
    ),
    array(
      'id' => 'sb7',
      'type' => 'label',
      'title' => esc_html__('Social Button 7', 'somo'),
    ),
    array(
      'id' => 'social_icon7',
      'type' => 'select',
      'title' => esc_html__('Social Icon', 'somo'),
      'options' => yprm_redux_social_icons(),
      'default' => '',
    ),
    array(
      'id' => 'social_link7',
      'type' => 'text',
      'title' => esc_html__('Link', 'somo'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Footer', 'somo'),
  'id' => 'footer_area',
  'customizer_width' => '400px',
  'icon' => 'fas fa-th-large',
  'fields' => array(
    array(
      'id' => 'footer',
      'type' => 'button_set',
      'title' => esc_html__('Footer', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'footer_logo',
      'type' => 'button_set',
      'title' => esc_html__('Footer Logo', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'footer_light_logo',
      'type' => 'background',
      'title' => esc_html__('Logo Image - light', 'somo'),
      'desc' => esc_html__('Choose a logo image to display for "Light" header skin', 'somo'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
      'required' => array('footer_logo', '=', 'true'),
    ),
    array(
      'id' => 'footer_dark_logo',
      'type' => 'background',
      'title' => esc_html__('Logo Image - Dark', 'somo'),
      'desc' => esc_html__('Choose a logo image to display for "Dark" header skin', 'somo'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
      'required' => array('footer_logo', '=', 'true'),
    ),
    array(
      'id' => 'footer_logo_size',
      'units' => 'px',
      'type' => 'dimensions',
      'units_extended' => 'false',
      'title' => esc_html__('Logo Size', 'somo'),
      'output' => array('.site-footer .site-logo'),
      'height' => true,
      'required' => array('footer_logo', '=', 'true'),
    ),
    array(
      'id' => 'footer_mobile_logo_size',
      'units' => 'px',
      'type' => 'dimensions',
      'units_extended' => 'false',
      'title' => esc_html__('Mobile Logo Size', 'somo'),
      'output' => array('.is-mobile-body .site-footer .site-logo'),
      'height' => true,
      'required' => array('footer_logo', '=', 'true'),
    ),
    array(
      'id' => 'footer_scroll_top',
      'type' => 'button_set',
      'title' => esc_html__('Scroll Top', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'footer_copyright',
      'type' => 'text',
      'title' => esc_html__('Copyright', 'somo'),
    ),
    array(
      'id' => 'footer_right_text',
      'type' => 'text',
      'title' => esc_html__('Right Text', 'somo'),
    ),
    array(
      'id' => 'footer_links',
      'type' => 'textarea',
      'title' => esc_html__('Footer Links', 'somo'),
      'description' => wp_kses(__('New per row.<br>#||Link Label', 'somo') ,'post'),
    ),
    array(
      'id' => 'footer_cols_title',
      'type' => 'raw',
      'title' => esc_html__('Cols Size', 'somo'),
      'desc' => wp_kses(__('<b>Example:</b> col-12 col-sm-6 col-md-4 col-lg-3<br><a href="https: //getbootstrap.com/docs/4.3/layout/grid/?#grid-options" target="_blank">Bootstrap Grid Instructions</a><br>
      If you want hide column enter <b>hide</b>', 'somo'), 'post'),
    ),
    array(
      'id' => 'footer_col_1',
      'type' => 'text',
      'title' => esc_html__('Col 1', 'somo'),
      'default' => 'col-12 col-sm-6 col-md-4',
    ),
    array(
      'id' => 'footer_col_2',
      'type' => 'text',
      'title' => esc_html__('Col 2', 'somo'),
      'default' => 'col-12 col-sm-3 col-md-2',
    ),
    array(
      'id' => 'footer_col_3',
      'type' => 'text',
      'title' => esc_html__('Col 3', 'somo'),
      'default' => 'col-12 col-sm-3 col-md-2',
    ),
    array(
      'id' => 'footer_col_4',
      'type' => 'text',
      'title' => esc_html__('Col 4', 'somo'),
      'default' => 'col-12 col-md',
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('404 Page', 'somo'),
  'id' => '404_page',
  'customizer_width' => '400px',
  'icon' => 'fa fa-exclamation-circle',
  'fields' => array(
    array(
      'id' => 'site_scheme_404',
      'type' => 'select',
      'title' => esc_html__('Color Scheme', 'somo'),
      'options' => array(
        'light' => esc_html__('Light', 'somo'),
        'dark' => esc_html__('Dark', 'somo'),
      ),
      'default' => 'dark',
    ),
    array(
      'id' => '404_bg_color',
      'type' => 'color',
      'title' => esc_html__('Background Color', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('background' => '.banner-404 .bg-overlay .color'),
    ),
    array(
      'id' => '404_bg',
      'type' => 'background',
      'title' => esc_html__('Background Image', 'somo'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => '404_sub_heading',
      'type' => 'textarea',
      'title' => esc_html__('Sub Heading', 'somo'),
      'default' => wp_kses( __('#oooops', 'somo'), 'post'),
    ),
    array(
      'id' => '404_heading',
      'type' => 'textarea',
      'title' => esc_html__('Heading', 'somo'),
      'default' => wp_kses( __('404 Error', 'somo'), 'post'),
    ),
    array(
      'id' => '404_text',
      'type' => 'textarea',
      'title' => esc_html__('Text', 'somo'),
      'default' => esc_html__('You are on a non existing page!', 'somo'),
    ),
    array(
      'id' => '404_page_text_color',
      'type' => 'color',
      'title' => esc_html__('Text Color', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.block-404'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Coming Soon Page', 'somo'),
  'id' => 'coming_soon',
  'customizer_width' => '400px',
  'icon' => 'fas fa-calendar-alt',
  'fields' => array(
    array(
      'id' => 'site_scheme_coming_soon',
      'type' => 'select',
      'title' => esc_html__('Color Scheme', 'somo'),
      'options' => array(
        'light' => esc_html__('Light', 'somo'),
        'dark' => esc_html__('Dark', 'somo'),
      ),
      'default' => 'dark',
    ),
    array(
      'id' => 'coming_soon_bg',
      'type' => 'background',
      'title' => esc_html__('Background Image', 'somo'),
      'background-attachment' => false,
      'background-position' => false,
      'background-repeat' => false,
      'background-origin' => false,
      'background-color' => false,
      'background-size' => false,
      'background-clip' => false,
      'preview_media' => true,
      'preview' => false,
    ),
    array(
      'id' => 'coming_soon_color',
      'type' => 'color',
      'title' => esc_html__('Text Color', 'somo'),
      'validate' => 'color',
      'transparent' => false,
      'output' => array('color' => '.coming-soon-block'),
    ),
    array(
      'id' => 'coming_soon_subscribe_code',
      'type' => 'text',
      'title' => esc_html__('Subscribe Form ShortCode', 'somo'),
    ),
    array(
      'id' => 'coming_soon_sub_heading',
      'type' => 'textarea',
      'title' => esc_html__('Sub Heading', 'somo'),
      'default' => esc_html__('#underconstruction', 'somo'),
    ),
    array(
      'id' => 'coming_soon_heading',
      'type' => 'textarea',
      'title' => esc_html__('Heading', 'somo'),
      'default' => esc_html__('Coming Soon', 'somo'),
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Portfolio Project Page', 'somo'),
  'id' => 'project_page',
  'customizer_width' => '400px',
  'icon' => 'fas fa-tasks',
  'fields' => array(
    array(
      'id' => 'project_image',
      'type' => 'select',
      'title' => esc_html__('Project Image', 'somo'),
      'options' => array(
        'cover' => esc_html__('Cover', 'somo'),
        'original' => esc_html__('Original', 'somo'),
        'disabled' => esc_html__('Disabled', 'somo'),
      ),
      'default' => 'cover',
    ),
    array(
      'id' => 'project_style',
      'type' => 'select',
      'title' => esc_html__('Style Project Page', 'somo'),
      'options' => array(
        'grid' => esc_html__('Grid', 'somo'),
        'masonry' => esc_html__('Masonry', 'somo'),
        'packery' => esc_html__('Packery', 'somo'),
        'slider' => esc_html__('Slider', 'somo'),
      ),
      'default' => 'grid',
    ),
    array(
      'id' => 'project_count_cols',
      'type' => 'select',
      'title' => esc_html__('Cols Count', 'somo'),
      'options' => array(
        '1' => esc_html__('1', 'somo'),
        '2' => esc_html__('2', 'somo'),
        '3' => esc_html__('3', 'somo'),
        '4' => esc_html__('4', 'somo'),
      ),
      'required' => array('project_style', '=', array('grid', 'masonry', 'packery')),
      'default' => '3',
    ),
    array(
      'id' => 'project_featured_image',
      'type' => 'button_set',
      'title' => esc_html__('Featured Image', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'project_categories',
      'type' => 'button_set',
      'title' => esc_html__('Categories', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Project Items', 'somo'),
  'id' => 'project_items',
  'customizer_width' => '400px',
  'icon' => 'fa fa-th',
  'fields' => array(
    array(
      'id' => 'project_in_popup',
      'type' => 'button_set',
      'title' => esc_html__('Open Project In Popup', 'somo'),
      'options' => array(
        'true' => esc_html__('Yes', 'somo'),
        'false' => esc_html__('No', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'portfolio_style',
      'type' => 'select',
      'title' => esc_html__('Portfolio Style', 'somo'),
      'options' => array(
        'masonry' => esc_html__('Masonry', 'somo'),
        'grid' => esc_html__('Grid', 'somo'),
      ),
      'default' => 'grid',
    ),
    array(
      'id' => 'portfolio_cols',
      'type' => 'select',
      'title' => esc_html__('Cols Count', 'somo'),
      'options' => array(
        'col2' => esc_html__('Col 2', 'somo'),
        'col3' => esc_html__('Col 3', 'somo'),
        'col4' => esc_html__('Col 4', 'somo'),
      ),
      'default' => 'col3',
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Portfolio LightBox', 'somo'),
  'id' => 'portfolio_light_box',
  'customizer_width' => '400px',
  'icon' => 'far fa-images',
  'fields' => array(
    array(
      'id' => 'project_image_zoom',
      'type' => 'button_set',
      'title' => esc_html__('Zoom', 'somo'),
      'options' => array(
        'show' => esc_html__('Show', 'somo'),
        'hide' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'show',
    ),
    array(
      'id' => 'project_image_full_screen',
      'type' => 'button_set',
      'title' => esc_html__('Toggle Full Screen', 'somo'),
      'options' => array(
        'show' => esc_html__('Show', 'somo'),
        'hide' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'show',
    ),
    array(
      'id' => 'project_image_share',
      'type' => 'button_set',
      'title' => esc_html__('Share', 'somo'),
      'options' => array(
        'show' => esc_html__('Show', 'somo'),
        'hide' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'show',
    ),
    array(
      'id' => 'project_image_download',
      'type' => 'button_set',
      'title' => esc_html__('Download Link', 'somo'),
      'options' => array(
        'show' => esc_html__('Show', 'somo'),
        'hide' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'hide',
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Blog post', 'somo'),
  'id' => 'blog_post',
  'customizer_width' => '400px',
  'icon' => 'far fa-edit',
  'fields' => array(
    array(
      'id' => 'blog_feature_image',
      'type' => 'button_set',
      'title' => esc_html__('Blog Feature Image', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'blog_feature_image_style',
      'type' => 'button_set',
      'title' => esc_html__('Blog Feature Image Style', 'somo'),
      'options' => array(
        'cover' => esc_html__('Cover', 'somo'),
        'original' => esc_html__('Original', 'somo'),
      ),
      'default' => 'cover',
    ),
    array(
      'id' => 'blog_date',
      'type' => 'button_set',
      'title' => esc_html__('Show Date', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'blog_like',
      'type' => 'button_set',
      'title' => esc_html__('Show Like', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'blog_comments',
      'type' => 'button_set',
      'title' => esc_html__('Show Comments', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'blog_categories',
      'type' => 'button_set',
      'title' => esc_html__('Show Categories', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
    array(
      'id' => 'blog_sidebar',
      'type' => 'button_set',
      'title' => esc_html__('Show Sidebar', 'somo'),
      'options' => array(
        'true' => esc_html__('Show', 'somo'),
        'false' => esc_html__('Hide', 'somo'),
      ),
      'default' => 'true',
    ),
  ),
));

Redux::setSection($opt_name, array(
  'title' => esc_html__('Translations', 'somo'),
  'id' => 'translations',
  'customizer_width' => '400px',
  'icon' => 'fa fa-language',
  'fields' => array(
    array(
      'id' => 'tr_load_more',
      'type' => 'text',
      'title' => esc_html__('Load More', 'somo'),
    ),
    array(
      'id' => 'tr_all',
      'type' => 'text',
      'title' => esc_html__('All', 'somo'),
    ),
    array(
      'id' => 'tr_read_more',
      'type' => 'text',
      'title' => esc_html__('Read More', 'somo'),
    ),
    array(
      'id' => 'tr_view_category',
      'type' => 'text',
      'title' => esc_html__('View Category', 'somo'),
    ),
    array(
      'id' => 'tr_back_to_top',
      'type' => 'text',
      'title' => esc_html__('back to top', 'somo'),
    ),
    array(
      'id' => 'tr_open_project',
      'type' => 'text',
      'title' => esc_html__('open project', 'somo'),
    ),
    array(
      'id' => 'tr_prev',
      'type' => 'text',
      'title' => esc_html__('Prev', 'somo'),
    ),
    array(
      'id' => 'tr_next',
      'type' => 'text',
      'title' => esc_html__('Next', 'somo'),
    ),
    array(
      'id' => 'tr_send',
      'type' => 'text',
      'title' => esc_html__('Send', 'somo'),
    ),
  ),
));