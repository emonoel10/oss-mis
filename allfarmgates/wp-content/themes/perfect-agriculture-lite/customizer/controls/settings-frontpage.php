<?php
//----------------------HOME FOUR BLOCKS FROM PAGES-------------------------------------
	$wp_customize->add_setting('featuredpage-setting1',array(
			'sanitize_callback'	=> 'complete_sanitize_integer',
			'default' => '0',
			'capability' => 'edit_theme_options',				
	));
	
	$wp_customize->add_control('featuredpage-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box one:','complete'),
			'section'	=> 'home_blocks'	
	));
	
//  Page 1 Image
	$wp_customize->add_setting( 'complete[featuredpage-setting1_image][url]',array( 
		'type' => 'option',
		'default' => ''. get_template_directory_uri().'/images/featured_icon1.png',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featuredpage-setting1_image',array(
			'label'       => __( 'Select image for page box one', 'complete' ),
			'section'     => 'home_blocks',
			'settings'    => 'complete[featuredpage-setting1_image][url]'
				)
			)
	);	
	
	$wp_customize->add_setting('featuredpage-setting2',array(
			'sanitize_callback'	=> 'complete_sanitize_integer',
			'default' => '0',
			'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control('featuredpage-setting2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box two:','complete'),
			'section'	=> 'home_blocks'
	));
	
//  Page 2 Image
	$wp_customize->add_setting( 'complete[featuredpage-setting2_image][url]',array( 
		'type' => 'option',
		'default' => ''. get_template_directory_uri().'/images/featured_icon2.png',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featuredpage-setting2_image',array(
			'label'       => __( 'Select image for page box two', 'complete' ),
			'section'     => 'home_blocks',
			'settings'    => 'complete[featuredpage-setting2_image][url]'
				)
			)
	);	
	
	$wp_customize->add_setting('featuredpage-setting3',array(
			'sanitize_callback'	=> 'complete_sanitize_integer',
			'default' => '0',
			'capability' => 'edit_theme_options',
	));
	
	$wp_customize->add_control('featuredpage-setting3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for box three:','complete'),
			'section'	=> 'home_blocks'
	));	
	
//  Page 3 Image
	$wp_customize->add_setting( 'complete[featuredpage-setting3_image][url]',array( 
		'type' => 'option',
		'default' => ''. get_template_directory_uri().'/images/featured_icon3.png',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featuredpage-setting3_image',array(
			'label'       => __( 'Select image for page box three', 'complete' ),
			'section'     => 'home_blocks',
			'settings'    => 'complete[featuredpage-setting3_image][url]'
				)
			)
	);	
	
// Color Section Of Home Blocks

// Block Section Background Color
$wp_customize->add_setting( 'complete[homeblock_color_id]', array(
	'type' => 'option',
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	'transport' => 'postMessage',
) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'homeblock_color_id', array(
				'label' => __('Section Background Color','complete'),
				'section' => 'home_blocks',
				'settings' => 'complete[homeblock_color_id]',
			) ) );
			
// Block Section Background Image
$wp_customize->add_setting( 'complete[homeblock_bg_setting]',array( 
	'type' => 'option',
	'default' => '',
	'sanitize_callback' => 'esc_url_raw',
	)
);
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'homeblock_bg_setting',array(
					'label'       => __( 'Section Background Image', 'complete' ),
					'section'     => 'home_blocks',
					'settings'    => 'complete[homeblock_bg_setting]'
						)
					)
			);
			
			
// Block Section Background Video
	$wp_customize->add_setting( 'complete[ftd_bg_video]',array( 
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Text_Control( $wp_customize, 'ftd_bg_video',array(
			'label'       => __( 'Section Background Video Url .mp4 Only', 'complete' ),
			'section'     => 'home_blocks',
			'settings'    => 'complete[ftd_bg_video]'
				)
			)
	);	
//----------------------HOME FOUR BLOCKS FROM PAGES-------------------------------------

//----------------------HOME SECTION 1----------------------------------

	$wp_customize->add_setting('page-setting1',array(
			'sanitize_callback'	=> 'complete_sanitize_integer',
			'default' => '0',
			'capability' => 'edit_theme_options',				
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for this section:','complete'),
			'section'	=> 'home_sections1'	
	));

// Section 1 Background Color
	$wp_customize->add_setting( 'complete[section1_bgcolor_id]', array(
		'type' => 'option',
		'default' => '#fbfbfb',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'section1_bgcolor_id', array(
		'label' => __('Section Background Color','complete'),
		'section' => 'home_sections1',
		'settings' => 'complete[section1_bgcolor_id]',
	) ) );

// Section1 Background Image
	$wp_customize->add_setting( 'complete[section1_bg_image]',array( 
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'section1_bg_image',array(
			'label'       => __( 'Section Background Image', 'complete' ),
			'section'     => 'home_sections1',
			'settings'    => 'complete[section1_bg_image]'
				)
			)
	);
	
// Section1 Background Video
	$wp_customize->add_setting( 'complete[section1_bg_video]',array( 
		'type' => 'option',
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Text_Control( $wp_customize, 'section1_bg_video',array(
			'label'       => __( 'Section Background Video Url .mp4 Only', 'complete' ),
			'section'     => 'home_sections1',
			'settings'    => 'complete[section1_bg_video]'
				)
			)
	);	
	
// Hide Section
	$wp_customize->add_setting('complete[hide_boxes_section1]',array(
			'type' => 'option',
			'default' => '',
			'sanitize_callback' => 'complete_sanitize_checkbox',
			'transport' => 'postMessage',
	));	 

	$wp_customize->add_control( new complete_Controls_Toggle_Control( $wp_customize, 'hide_boxes_section1', array(
		'label' => __('Hide This Section','complete'),
		'section' => 'home_sections1',
		'settings' => 'complete[hide_boxes_section1]',
	)) );	 
//----------------------HOME SECTION 1----------------------------------
 
//----------------------FRONT CONTENT SECTION----------------------------------
	$ImageUrl1 = esc_url(get_template_directory_uri() ."/images/slides/slider1.jpg");
	$ImageUrl2 = esc_url(get_template_directory_uri() ."/images/slides/slider2.jpg");
	$ImageUrl3 = esc_url(get_template_directory_uri() ."/images/slides/slider3.jpg");
//----------------------SLIDER TYPE SECTION----------------------------------

	// Slide 1 Start
	$wp_customize->add_setting( 'complete[slide_image1]',array( 
		'type' => 'option',
		'default' => $ImageUrl1,
		'sanitize_callback' => 'esc_url_raw',
		)
	);	

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slide_image1',array(
			'label'       => __( 'Slide Image 1', 'complete' ),
			'description'       => __( 'Image size should be 1420px * 575px. More slider settings available in <a href="'.SKT_PRO_THEME_URL.'" target="_blank">PRO Version</a>', 'complete' ),
			'section'     => 'slider_section',
			'settings'    => 'complete[slide_image1]',
				)
			)
	);
	
	$wp_customize->add_setting('complete[slide_title1]', array(
		'type' => 'option',
		'default'	=> __('THE <span style="color:#b1e902;">LEADING</span> PROVIDER OF AGRICULTURAL PRODUCTS AND SERVICES','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_title1', array( 
		'type' => 'text',
		'label'	=> __('Slide Title 1','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_title1]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_desc1]', array(
		'type' => 'option',
		'default' => 'Nam luctus malesuada ante eu ornare. Pellentesque molestie lorem nulla, eu aliquet metus pharetra vitae. Aliquam luctus porta purus, sit amet placerat orci tincidunt nec. Suspendisse fermentum mi libero, porta viverra risus dapibus et. Sed lobortis lorem turpis, at dictum mauris hendrerit eu.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'slide_desc1', array( 
		'type' => 'textarea',
		'label'	=> __('Slide Description 1','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_desc1]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_link1]', array(
		'type' => 'option',
		'default'	=> __('#link1','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_link1', array( 
		'type' => 'text',
		'label'	=> __('Slide Link 1','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_link1]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_btn1]', array(
		'type' => 'option',
		'default'	=> __('Read More','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_btn1', array( 
		'type' => 'text',
		'label'	=> __('Slide Button 1','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_btn1]',
	)) );	
	// Slide 1 End
	
	// Slide 2 Start
	$wp_customize->add_setting( 'complete[slide_image2]',array( 
		'type' => 'option',
		'default' => $ImageUrl2,
		'sanitize_callback' => 'esc_url_raw',
		)
	);	

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slide_image2',array(
			'label'       => __( 'Slide Image 2', 'complete' ),
			'section'     => 'slider_section',
			'settings'    => 'complete[slide_image2]',
				)
			)
	);
	
	$wp_customize->add_setting('complete[slide_title2]', array(
		'type' => 'option',
		'default'	=> __('THE <span style="color:#b1e902;">LEADING</span> PROVIDER OF AGRICULTURAL PRODUCTS AND SERVICES','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_title2', array( 
		'type' => 'text',
		'label'	=> __('Slide Title 2','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_title2]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_desc2]', array(
		'type' => 'option',
		'default' => 'Nam luctus malesuada ante eu ornare. Pellentesque molestie lorem nulla, eu aliquet metus pharetra vitae. Aliquam luctus porta purus, sit amet placerat orci tincidunt nec. Suspendisse fermentum mi libero, porta viverra risus dapibus et. Sed lobortis lorem turpis, at dictum mauris hendrerit eu.',		
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'slide_desc2', array( 
		'type' => 'textarea',
		'label'	=> __('Slide Description 2','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_desc2]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_link2]', array(
		'type' => 'option',
		'default'	=> __('#link2','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_link2', array( 
		'type' => 'text',
		'label'	=> __('Slide Link 2','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_link2]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_btn2]', array(
		'type' => 'option',
		'default'	=> __('Read More','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_btn2', array( 
		'type' => 'text',
		'label'	=> __('Slide Button 2','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_btn2]',
	)) );	
	// Slide 2 End
	
	// Slide 3 Start
	$wp_customize->add_setting( 'complete[slide_image3]',array( 
		'type' => 'option',
		'default' => $ImageUrl3,
		'sanitize_callback' => 'esc_url_raw',
		)
	);	

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slide_image3',array(
			'label'       => __( 'Slide Image 3', 'complete' ),
			'section'     => 'slider_section',
			'settings'    => 'complete[slide_image3]',
				)
			)
	);
	
	$wp_customize->add_setting('complete[slide_title3]', array(
		'type' => 'option',
		'default'	=> __('THE <span style="color:#b1e902;">LEADING</span> PROVIDER OF AGRICULTURAL PRODUCTS AND SERVICES','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_title3', array( 
		'type' => 'text',
		'label'	=> __('Slide Title 3','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_title3]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_desc3]', array(
		'type' => 'option',
		'default' => 'Nam luctus malesuada ante eu ornare. Pellentesque molestie lorem nulla, eu aliquet metus pharetra vitae. Aliquam luctus porta purus, sit amet placerat orci tincidunt nec. Suspendisse fermentum mi libero, porta viverra risus dapibus et. Sed lobortis lorem turpis, at dictum mauris hendrerit eu.',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'slide_desc3', array( 
		'type' => 'textarea',
		'label'	=> __('Slide Description 3','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_desc3]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_link3]', array(
		'type' => 'option',
		'default'	=> __('#link3','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_link3', array( 
		'type' => 'text',
		'label'	=> __('Slide Link 3','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_link3]',
	)) );	
	
	$wp_customize->add_setting('complete[slide_btn3]', array(
		'type' => 'option',
		'default'	=> __('Read More','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'slide_btn3', array( 
		'type' => 'text',
		'label'	=> __('Slide Button 3','complete'),
		'section' => 'slider_section',
		'settings' => 'complete[slide_btn3]',
	)) );	
	// Slide 3 End
//---------------SLIDER CALLBACK-------------------//
function complete_slider_static( $control ) {
    $layout_setting = $control->manager->get_setting('complete[slider_type_id]')->value();
     
    if ( $layout_setting == 'static' ) return true;
     
    return false;
}
function complete_slider_nivoacc( $control ) {
    $layout_setting = $control->manager->get_setting('complete[slider_type_id]')->value();
     
    if ( $layout_setting == 'accordion' || $layout_setting == 'nivo' ) return true;
     
    return false;
}