<?php
//============================HEADER - LOGO SECTION=================================
//LOGO UPLOAD FIELD
$wp_customize->add_setting( 'complete[logo_image_id][url]',array( 
	'type' => 'option',
	'default' => ''. get_template_directory_uri().'/assets/images/logo.png',
	'sanitize_callback' => 'esc_url_raw',
	)
);

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_image_id',array(
					'label'       => __( 'Logo Image *', 'complete' ),
					'section'     => 'headlogo_section',
					'settings'    => 'complete[logo_image_id][url]',
					//'description' => __('This image will replace the text logo.','complete'),
						)
					)
			);
			
// Logo Image Height
$wp_customize->add_setting('complete[logo_image_height]', array(
	'type' => 'option',
	'default' => '35px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_image_height', array(
				'type' => 'text',
				'label' => __('Image Height','complete'),
				'section' => 'headlogo_section',
				'settings' => 'complete[logo_image_height]',
							'input_attrs'	=> array(
								'class'	=> 'mini_control',
							)
			) );
			
// Logo Image Width
$wp_customize->add_setting('complete[logo_image_width]', array(
	'type' => 'option',
	'default' => '195px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_image_width', array(
				'type' => 'text',
				'label' => __('Image Width','complete'),
				'section' => 'headlogo_section',
				'settings' => 'complete[logo_image_width]',
							'input_attrs'	=> array(
								'class'	=> 'mini_control',
							)
			) );	
			
// Logo Margin Top
$wp_customize->add_setting('complete[logo_margin_top]', array(
	'type' => 'option',
	'default' => '35px',
	'sanitize_callback' => 'sanitize_text_field',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control('logo_margin_top', array(
				'type' => 'text',
				'label' => __('Logo Margin Top','complete'),
				'section' => 'headlogo_section',
				'settings' => 'complete[logo_margin_top]',
							'input_attrs'	=> array(
								'class'	=> 'mini_control',
							)
			) );							
//============================ TOP BAR TEXT SECTION=================================

//Top Bar Text Box
$wp_customize->add_setting('complete[top_left_text_box]', array(
	'type' => 'option',
	'default' => __('The leading provider of Agriculture','complete'),
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'top_left_text_box', array( 
				'type' => 'textarea',
				'label' => __('Topbar Left Text Box','complete'), // Phone Number
				'section' => 'headheader_section',
				'settings' => 'complete[top_left_text_box]',
			)) );			

//Top Bar Left Phone Text
$wp_customize->add_setting('complete[phntp_text_id]', array(
	'type' => 'option',
	'default' => __('<a href="tel:+12(34)567-8988">+12(34)567-8988</a>','complete'),
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'phntp_text_id', array( 
				'type' => 'textarea',
				'label' => __('Topbar Left Phone','complete'), // Phone Number
				'section' => 'headheader_section',
				'settings' => 'complete[phntp_text_id]',
			)) );
			
//Top Bar Left Email
$wp_customize->add_setting('complete[email_text_id]', array(
	'type' => 'option',
	'default' => __('<a href="mailto:support@sitename.com">support@sitename.com</a>','complete'),
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'email_text_id', array( 
				'type' => 'textarea',
				'label' => __('Topbar Left Email','complete'), // Phone Number
				'section' => 'headheader_section',
				'settings' => 'complete[email_text_id]',
			)) );			
			
			
			
//Top Bar Right Text
$wp_customize->add_setting('complete[suptp_text]', array(
	'type' => 'option',
	'default' => __('[readmore align="center" button="Get A Quote Now" links="#"]','complete'),
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'suptp_text', array( 
				'type' => 'textarea',
				'label' => __('Topbar Right Text','complete'), 
				'section' => 'headheader_section',
				'settings' => 'complete[suptp_text]',
			)) );

//============================HEADER - TOP BAR SECTION=============================				