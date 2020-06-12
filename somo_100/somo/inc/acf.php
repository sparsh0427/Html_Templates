<?php
if (function_exists("register_field_group")) {
  register_field_group(array(
    'id' => 'acf_coming-soom-settings',
    'title' => esc_html__('Coming Soom Settings', 'somo'),
    'fields' => array(
      array(
        'key' => 'field_59bfb14f288cf',
        'label' => esc_html__('Date', 'somo'),
        'name' => 'date',
        'type' => 'date_picker',
        'date_format' => 'yy/mm/dd',
        'display_format' => 'dd/mm/yy',
        'first_day' => 1,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'page-coming-soon.php',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array(
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array(
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array(
    'id' => 'acf_page-settings',
    'title' => esc_html__('Page Settings', 'somo'),
    'fields' => array(
      array(
        'key' => 'field_58a43bba66153',
        'label' => esc_html__('Header Color Mode', 'somo'),
        'name' => 'header_color_mode',
        'type' => 'select',
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'light' => esc_html__('Light', 'somo'),
          'dark' => esc_html__('Dark', 'somo'),
        ),
        'default_value' => 'default',
        'allow_null' => 0,
        'multiple' => 0,
        'instructions' => wp_kses(__('<b>Light</b> - White text color & Dark background color<br><b>Dark</b> - Black text color & Light background color', 'somo'), 'post'),
      ),
      array(
        'key' => 'field_58a43a8166152',
        'label' => esc_html__('Header Style', 'somo'),
        'name' => 'header_style',
        'type' => 'select',
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'logo-left' => esc_html__('Logo on Left', 'somo'),
          'logo-center' => esc_html__('Logo on Center', 'somo'),
          'logo-right' => esc_html__('Logo on Right', 'somo'),
          'side' => esc_html__('Side', 'somo'),
        ),
        'default_value' => 'default',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_58a592079667e',
        'label' => esc_html__('Navigation Type', 'somo'),
        'name' => 'navigation_type',
        'type' => 'select',
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side',
            ),
          ),
          'allorany' => 'all',
        ),
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'disabled' => esc_html__('Disabled', 'somo'),
          'hidden_menu' => esc_html__('Hidden', 'somo'),
          'visible_menu' => esc_html__('Visible', 'somo'),
          'fullscreen' => esc_html__('Fullscreen', 'somo'),
        ),
        'default_value' => '',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_58a592079667e',
        'label' => esc_html__('Navigation hover style', 'somo'),
        'name' => 'navigation_item_hover_style',
        'type' => 'select',
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side',
            ),
          ),
          'allorany' => 'all',
        ),
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'style1' => esc_html__('Style 1', 'somo'),
          'style2' => esc_html__('Style 2', 'somo'),
          'style3' => esc_html__('Style 3', 'somo'),
          'style4' => esc_html__('Style 4', 'somo'),
        ),
        'default_value' => '',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_58a58ef19684e',
        'label' => esc_html__('Header Container', 'somo'),
        'name' => 'header_container',
        'type' => 'select',
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side',
            ),
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side-type2',
            ),
          ),
          'allorany' => 'all',
        ),
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'container' => esc_html__('Center container', 'somo'),
          'container-fluid' => esc_html__('Full witdh', 'somo'),
        ),
        'default_value' => 'default',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_74884d42cdf6',
        'label' => esc_html__('Cart', 'somo'),
        'name' => 'header_cart',
        'type' => 'select',
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side',
            ),
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side-type2',
            ),
          ),
          'allorany' => 'all',
        ),
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'true' => esc_html__('Show', 'somo'),
          'false' => esc_html__('Hide', 'somo'),
        ),
        'default_value' => 'default',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_513fb3c9c826',
        'label' => esc_html__('Search', 'somo'),
        'name' => 'header_search',
        'type' => 'select',
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side',
            ),
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side-type2',
            ),
          ),
          'allorany' => 'all',
        ),
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'true' => esc_html__('Show', 'somo'),
          'false' => esc_html__('Hide', 'somo'),
        ),
        'default_value' => 'default',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_58a43c2266154',
        'label' => esc_html__('Header Space', 'somo'),
        'name' => 'header_space',
        'type' => 'radio',
        'choices' => array(
          'true' => esc_html__('Yes', 'somo'),
          'false' => esc_html__('No', 'somo'),
        ),
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side',
            ),
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side-type2',
            ),
          ),
          'allorany' => 'all',
        ),
        'other_choice' => 0,
        'save_other_choice' => 0,
        'default_value' => 'true',
        'layout' => 'horizontal',
      ),
      array(
        'key' => 'field_58a45add62c81',
        'label' => esc_html__('Footer', 'somo'),
        'name' => 'footer',
        'type' => 'select',
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'true' => esc_html__('Show', 'somo'),
          'false' => esc_html__('Hide', 'somo'),
          'minified' => esc_html__('Minified', 'somo'),
        ),
        'default_value' => 'default',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_2daefa50b0d2',
        'label' => esc_html__('Sidebar Button', 'somo'),
        'name' => 'sidebar_button',
        'type' => 'select',
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'disable' => esc_html__('Disable', 'somo'),
          'side' => esc_html__('On Side', 'somo'),
        ),
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side',
            ),
            array(
              'field' => 'field_58a43a8166152',
              'operator' => '!=',
              'value' => 'side-type2',
            ),
          ),
          'allorany' => 'all',
        ),
        'default_value' => 'default',
        'allow_null' => 0,
        'multiple' => 0,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'template-landing.php',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array(
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array(
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array(
    'id' => 'acf_project-bottom-settings',
    'title' => esc_html__('Project Settings', 'somo'),
    'fields' => array(
      array(
        'key' => 'field_423ds2345qw',
        'label' => esc_html__('Short Description', 'somo'),
        'name' => 'project_short_desc',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'fw-portfolio',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array(
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array(
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array(
    'id' => 'acf_project-settings',
    'title' => esc_html__('Project Settings', 'somo'),
    'fields' => array(
      array(
        'key' => 'field_59c3a84023b44',
        'label' => esc_html__('Featured Image', 'somo'),
        'name' => 'project_image',
        'type' => 'select',
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'cover' => esc_html__('Cover', 'somo'),
          'original' => esc_html__('Original', 'somo'),
          'disabled' => esc_html__('Disabled', 'somo'),
        ),
        'default_value' => '',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_645dsf53532',
        'label' => esc_html__('Video Sourse', 'somo'),
        'name' => 'project_video_sourse',
        'type' => 'select',
        'choices' => array(
          'none' => esc_html__('None', 'somo'),
          'external-url' => esc_html__('YouTube, Vimeo or MP4 Url', 'somo'),
          'media' => esc_html__('Media Library', 'somo'),
        ),
        'default_value' => 'none',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_585653976745',
        'label' => esc_html__('Video url', 'somo'),
        'name' => 'project_video_url',
        'type' => 'text',
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_645dsf53532',
              'operator' => '==',
              'value' => 'external-url',
            ),
          ),
          'allorany' => 'any',
        ),
      ),
      array(
        'key' => 'field_678455763547',
        'label' => esc_html__('Video', 'somo'),
        'name' => 'project_video_media',
        'type' => 'file',
        'mime_types' => 'mp4',
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_645dsf53532',
              'operator' => '==',
              'value' => 'media',
            ),
          ),
          'allorany' => 'any',
        ),
      ),
      array(
        'key' => 'field_59c0c83cdb361',
        'label' => esc_html__('Style', 'somo'),
        'name' => 'project_style',
        'type' => 'select',
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'grid' => esc_html__('Grid', 'somo'),
          'masonry' => esc_html__('Masonry', 'somo'),
          'packery' => esc_html__('Packery', 'somo'),
          'slider' => esc_html__('Slider', 'somo'),
        ),
        'default_value' => 'default',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array(
        'key' => 'field_59c0c83nlg94',
        'label' => esc_html__('Cols count', 'somo'),
        'name' => 'project_count_cols',
        'type' => 'select',
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          '1' => esc_html__('1', 'somo'),
          '2' => esc_html__('2', 'somo'),
          '3' => esc_html__('3', 'somo'),
          '4' => esc_html__('4', 'somo'),
        ),
        'default_value' => 'default',
        'conditional_logic' => array(
          'status' => 1,
          'rules' => array(
            array(
              'field' => 'field_59c0c83cdb361',
              'operator' => '==',
              'value' => 'grid',
            ),
            array(
              'field' => 'field_59c0c83cdb361',
              'operator' => '==',
              'value' => 'masonry',
            ),
            array(
              'field' => 'field_59c0c83cdb361',
              'operator' => '==',
              'value' => 'packery',
            ),
          ),
          'allorany' => 'any',
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'fw-portfolio',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array(
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array(
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array(
    'id' => 'acf_post-settings',
    'title' => esc_html__('Post Settings', 'somo'),
    'fields' => array(
      array(
        'key' => 'field_5a267b326916ab',
        'label' => esc_html__('Short Description', 'somo'),
        'name' => 'short_desc',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array(
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array(
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array(
    'id' => 'acf_post-settings2',
    'title' => esc_html__('Post Settings', 'somo'),
    'fields' => array(
      array(
        'key' => 'field_8976230934',
        'label' => esc_html__('Show Featured Image On Single Page', 'somo'),
        'name' => 'post_featured_image',
        'type' => 'select',
        'choices' => array(
          'default' => esc_html__('Default', 'somo'),
          'true' => esc_html__('Yes', 'somo'),
          'false' => esc_html__('No', 'somo'),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'post',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array(
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array(
      ),
    ),
    'menu_order' => 0,
  ));
}