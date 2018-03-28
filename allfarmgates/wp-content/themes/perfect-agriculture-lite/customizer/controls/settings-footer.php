<?php
//----------------------Footer Columns 1----------------------------------
	$wp_customize->add_setting('complete[foot_cols1_title]', array(
		'type' => 'option',
		'default'	=> __('ABOUT US','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_cols1_title', array( 
		'type' => 'text',
		'label'	=> __('Columns 1 Title','complete'),
		'section' => 'footer_columns_section',
		'settings' => 'complete[foot_cols1_title]',
	)) );	
	
$wp_customize->add_setting('complete[foot_cols1_content]', array(
	'type' => 'option',
	'default' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><p>Cras Donec nec orci consequat feugiat sem veluctus velit facilisis quis efficitur vel.</p>[social_area]
    [social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="google-plus" link="#"]	
    [social icon="linkedin" link="#"]
    [social icon="pinterest" link="#"]
[/social_area]',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'foot_cols1_content', array( 
				'type' => 'editor',
				'label' => __('Columns 1 Content','complete'), 
				'section' => 'footer_columns_section',
				'settings' => 'complete[foot_cols1_content]',
			)) );	
 	 
//----------------------Footer Columns 1----------------------------------		

//----------------------Footer Columns 2----------------------------------
	$wp_customize->add_setting('complete[foot_cols2_title]', array(
		'type' => 'option',
		'default'	=> __('LATEST POSTS','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_cols2_title', array( 
		'type' => 'text',
		'label'	=> __('Columns 2 Title','complete'),
		'section' => 'footer_columns_section',
		'settings' => 'complete[foot_cols2_title]',
	)) );	
	
$wp_customize->add_setting('complete[foot_cols2_content]', array(
	'type' => 'option',
	'default' => '[footerposts show="4"]',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'foot_cols2_content', array( 
				'type' => 'editor',
				'label' => __('Columns 2 Content','complete'), 
				'section' => 'footer_columns_section',
				'settings' => 'complete[foot_cols2_content]',
			)) );	
 	 
//----------------------Footer Columns 2----------------------------------	

//----------------------Footer Columns 3----------------------------------
	$wp_customize->add_setting('complete[foot_cols3_title]', array(
		'type' => 'option',
		'default'	=> __('NAVIGATION','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_cols3_title', array( 
		'type' => 'text',
		'label'	=> __('Columns 3 Title','complete'),
		'section' => 'footer_columns_section',
		'settings' => 'complete[foot_cols3_title]',
	)) );	
	
$wp_customize->add_setting('complete[foot_cols3_content]', array(
	'type' => 'option',
	'default' => '[footermenu]',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'foot_cols3_content', array( 
				'type' => 'editor',
				'label' => __('Columns 3 Content','complete'), 
				'section' => 'footer_columns_section',
				'settings' => 'complete[foot_cols3_content]',
			)) );	
 	 
//----------------------Footer Columns 3----------------------------------	

//----------------------Footer Columns 4----------------------------------
	$wp_customize->add_setting('complete[foot_cols4_title]', array(
		'type' => 'option',
		'default'	=> __('QUICK CONTACT','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_cols4_title', array( 
		'type' => 'text',
		'label'	=> __('Columns 4 Title','complete'),
		'section' => 'footer_columns_section',
		'settings' => 'complete[foot_cols4_title]',
	)) );	
	
$wp_customize->add_setting('complete[foot_cols4_content]', array(
	'type' => 'option',
	'default' => '<p>Praesent nec dictum dolor, eget faucibus neque. Curabitur ac dolor a eros malesuadaing.<br><br> Phone: 1.800.555.6789<br> Email: <a href="mailto:demo@lorem.com">demo@lorem.com</a><br> Web: <a href="http://www.demo.com">demo.com</a></p>',
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control(	new complete_Editor_Control( $wp_customize, 'foot_cols4_content', array( 
				'type' => 'editor',
				'label' => __('Columns 4 Content','complete'), 
				'section' => 'footer_columns_section',
				'settings' => 'complete[foot_cols4_content]',
			)) );	
 	 
//----------------------Footer Columns 4----------------------------------	



//----------------------Footer Info Box ----------------------------------
	$wp_customize->add_setting('complete[foot_infobox1_heading]', array(
		'type' => 'option',
		'default'	=> __('VISIT US','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox1_heading', array( 
		'type' => 'text',
		'label'	=> __('Column 1 Heading','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox1_heading]',
	)) );
	
	$wp_customize->add_setting('complete[foot_infobox1_icon]', array(
		'type' => 'option',
		'default'	=> __('<i class="fa fa-map-o" aria-hidden="true"></i>','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox1_icon', array( 
		'type' => 'text',
		'label'	=> __('Column 1 Icon','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox1_icon]',
	)) );	
	
	$wp_customize->add_setting('complete[foot_infobox1_description]', array(
		'type' => 'option',
		'default'	=> __('Aliquam porta tincidunt enim.','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox1_description', array( 
		'type' => 'textarea',
		'label'	=> __('Column 1 Description','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox1_description]',
	)) );
	
	
	
	$wp_customize->add_setting('complete[foot_infobox2_heading]', array(
		'type' => 'option',
		'default'	=> __('EMAIL US','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox2_heading', array( 
		'type' => 'text',
		'label'	=> __('Column 2 Heading','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox2_heading]',
	)) );
	
	$wp_customize->add_setting('complete[foot_infobox2_icon]', array(
		'type' => 'option',
		'default'	=> __('<i class="fa fa-envelope-o" aria-hidden="true"></i>','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox2_icon', array( 
		'type' => 'text',
		'label'	=> __('Column 2 Icon','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox2_icon]',
	)) );	
	
	$wp_customize->add_setting('complete[foot_infobox2_description]', array(
		'type' => 'option',
		'default'	=> __('info@sitename.com','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox2_description', array( 
		'type' => 'textarea',
		'label'	=> __('Column 2 Description','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox2_description]',
	)) );	
	
	$wp_customize->add_setting('complete[foot_infobox3_heading]', array(
		'type' => 'option',
		'default'	=> __('CALL US','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox3_heading', array( 
		'type' => 'text',
		'label'	=> __('Column 3 Heading','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox3_heading]',
	)) );
	
	$wp_customize->add_setting('complete[foot_infobox3_icon]', array(
		'type' => 'option',
		'default'	=> __('<i class="fa fa-phone" aria-hidden="true"></i>','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox3_icon', array( 
		'type' => 'text',
		'label'	=> __('Column 3 Icon','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox3_icon]',
	)) );	
	
	$wp_customize->add_setting('complete[foot_infobox3_description]', array(
		'type' => 'option',
		'default'	=> __('987 685 4528','complete'),
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	) );
	$wp_customize->add_control(	new WP_Customize_Text_Control( $wp_customize, 'foot_infobox3_description', array( 
		'type' => 'textarea',
		'label'	=> __('Column 3 Description','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[foot_infobox3_description]',
	)) );	
	
	
// Hide Section
	$wp_customize->add_setting('complete[hide_foot_infobox]',array(
			'type' => 'option',
			'default' => '',
			'sanitize_callback' => 'complete_sanitize_checkbox',
			'transport' => 'postMessage',
	));	 

	$wp_customize->add_control( new complete_Controls_Toggle_Control( $wp_customize, 'hide_foot_infobox', array(
		'label' => __('Hide This Section','complete'),
		'section' => 'footer_infobox_section',
		'settings' => 'complete[hide_foot_infobox]',
	)) );	

//----------------------------COPYRIGHT SECTION------------------------------

//Footer Copyright Text
$wp_customize->add_setting('complete[footer_text_id]', array(
	'type' => 'option',
	'default' => __('Copyright 2016 All Rights Reserved | Powered by <a href="https://www.sktthemes.net/" target="_blank" rel="nofollow">sktthemes.net</a>','complete'),
	'sanitize_callback' => 'wp_kses_post',
	'transport' => 'postMessage',
) );
			$wp_customize->add_control( new complete_Editor_Control( $wp_customize, 'footer_text_id', array( 
				'type' => 'editor',
				'label' => __('Footer Copyright Text','complete'),
				'section' => 'copyright_section',
				'settings' => 'complete[footer_text_id]',
			)) );