<?php
function complete_option_defaults() {
	$defaults = array(
		'converted' => '',
		'site_layout_id' => 'site_full',
		'single_post_layout_id' => 'single_layout1',
		'header_layout_id' => 'header_layout1',
		'center_width' => 83.50,
		'content_bg_color' => '#ffffff',
		'divider_icon' => 'fa-stop',
		'head_transparent' => '',
		'trans_header_color' => '#fff',
		'totop_id' => '1',
		'footer_text_id' => __('Copyright 2016 All Rights Reserved | Powered by <a href="https://www.sktthemes.net/" target="_blank" rel="nofollow">sktthemes.net</a>', 'complete'),
		'top_left_text_box' => __('The leading provider of Agriculture', 'complete'),
		'phntp_text_id' => __('<a href="tel:+12(34)567-8988">+12(34)567-8988</a>', 'complete'),
		'email_text_id' => __('<a href="mailto:support@sitename.com">support@sitename.com</a>', 'complete'),
		'suptp_text' => __('[readmore align="center" button="Get A Quote Now" links="#"]', 'complete'),
		'footmenu_id' => '1',
		'copyright_center' => '',
		
		'custom_slider' => '',
		
		'slider_type_id' => 'static',
		
		'slideefect' => 'fade',
		'slideanim' => '500',
		'slidepause' => '4000',
		'slidenav' => 'true',
		'slidepage' => 'false',
		
		'n_slide_time_id' => '6000',
		'slide_height' => '500px',
		'slidefont_size_id' => '36px',
		'slider_txt_hide' => '',

		'post_info_id' => '1',
		'post_nextprev_id' => '1',
		'post_comments_id' => '1',
		'page_header_color' => '#545556',
		'pageheader_bg_image' => '',
		'hide_pageheader' => '',
		'page_header_txtcolor' => '#555555',
		
		'post_header_color' => '#545556',
		'postheader_bg_image' => '',
		'hide_postheader' => '',		

		'blog_cat_id' => '',
		'blog_num_id' => '9',
		'blog_layout_id' => '',
		'show_blog_thumb' => '1',
		
		'sec_color_id' => '#7da500',
		'mnbg_color_id' => '#7da500',
		'submnu_textcolor_id' => '#5d5d5c',
		'submnbg_color_id' => '#ffffff',
		'mnshvr_color_id' => '#fbfbfb',
		'mobbg_color_id' => '#383939',
		'mobbgtop_color_id' => '#7da500',
		'mobmenutxt_color_id' => '#FFFFFF',
		
		'mobtoggle_color_id' => '#000000',
		'mobtoggleinner_color_id' => '#FFFFFF',
		
		'sectxt_color_id' => '#FFFFFF',
		'content_font_id' =>  array('font-family' => 'Montserrat', 'font-size' => '13px'),
		'primtxt_color_id' => '#2b2b2b',
		'logo_image_id' => array(  'url'=>''.get_template_directory_uri().'/assets/images/logo.png'),
		'logo_font_id' => array('font-family' => 'Montserrat', 'font-size' => '27px'),
		'logo_color_id' => '#797978',
		
		'logo_image_height' => '35px;',
		'logo_image_width' => '195px;',
		'logo_margin_top' => '25px;',
		
		'tpbt_font_id' => array('font-family' => 'Montserrat', 'font-size' => '13px'),
		'tpbt_color_id' => '#898989',
		'tpbt_linkcolor_id' => '#7da500',
		'tpbt_hvcolor_id' => '#f26522',	
		
		'sldtitle_font_id' => array('font-family' => 'Montserrat', 'font-size' => '25px'),
		'slddesc_font_id' => array('font-family' => 'Montserrat', 'font-size' => '14px'),
		'sldbtn_font_id' => array('font-family' => 'Montserrat', 'font-size' => '14px'),
		
		'slidetitle_color_id' => '#ffffff',	
		'slddesc_color_id' => '#ffffff',	
		'sldbtntext_color_id' => '#ffffff',
		'sldbtn_color_id' => '#ffffff',
		'sldbtn_hvcolor_id' => '#7da500',	
		
		'slide_pager_color_id' => '#ffffff',	
		'slide_active_pager_color_id' => '#7da500',	
		
			
		'global_link_color_id' => '#7da500',
		'global_link_hvcolor_id' => '#d1d0d0',		
		
		'global_h1_color_id' => '#282828',
		'global_h1_hvcolor_id' => '#7da500',	
		'global_h2_color_id' => '#282828',
		'global_h2_hvcolor_id' => '#7da500',
		'global_h3_color_id' => '#282828',
		'global_h3_hvcolor_id' => '#7da500',
		'global_h4_color_id' => '#282828',
		'global_h4_hvcolor_id' => '#7da500',
		'global_h5_color_id' => '#282828',
		'global_h5_hvcolor_id' => '#7da500',
		'global_h6_color_id' => '#282828',
		'global_h6_hvcolor_id' => '#7da500',	
		
		'post_meta_color_id' => '#282828',
		'team_box_color_id' => '#7da500',
		
		'social_text_color_id' => '#ffffff',
		'social_icon_color_id' => '#d4d3d3',
		'social_hover_icon_color_id' => '#7da500',
		'testimonialbox_color_id' => '#f7f7f7',		
		'testimonialbox_txt_color' => '#757575',
		'testimonial_pager_color_id' => '#666666',
		'testimonialbox_border_color' => '#ebeaea',
		'testimonial_activepager_color_id' => '#7da500',
		'gallery_filter_color_id' => '#7da500',
		'gallery_filtertxt_color_id' => '#000000',
		'gallery_activefiltertxt_color_id' => '#ffffff',
		'skillsbar_bgcolor_id' => '#f8f8f8',
		'skillsbar_text_color_id' => '#ffffff',								
		'global_h1_font_id' => array('font-family' => 'Montserrat', 'font-size' => '36px'),
		'global_h2_font_id' => array('font-family' => 'Montserrat', 'font-size' => '32px'),
		'global_h3_font_id' => array('font-family' => 'Montserrat', 'font-size' => '20px'),
		'global_h4_font_id' => array('font-family' => 'Montserrat', 'font-size' => '13px'),
		'global_h5_font_id' => array('font-family' => 'Montserrat', 'font-size' => '11px'),
		'global_h6_font_id' => array('font-family' => 'Montserrat', 'font-size' => '9px'),
		
		'contact_title' => 'Contact Info',
		'contact_address' => 'Donec ultricies mattis nulla Australia',
		'contact_phone' => '0789 256 321',
		'contact_email' => 'info@companyname.com',
		'contact_company_url' => 'http://demo.com',
		'contact_google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d336003.6066860609!2d2.349634820486094!3d48.8576730786213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x040b82c3688c9460!2sParis%2C+France!5e0!3m2!1sen!2sin!4v1433482358672',
		
		'head_bg_trans' => '0.4',
		'head_color_id' => '#fbfbfb',
		'head_info_color_id' => '#ffffff',
		'header_border_color' => '#dddddd',
		'menutxt_color_id' => '#5d5d5c',
		'menutxt_color_hover' => '#f26522',
		'menutxt_color_active' => '#f26522',
		'menu_size_id' => '14px',
		'sidebar_color_id' => '#FFFFFF',
		'sidebarborder_color_id' => '#eeeff5',
		'sidebar_tt_color_id' => '#666666',
		'sidebartxt_color_id' => '#999999',
		'global_link_hvcolor_id' => '#f26522',
		'sidebarlink_color_id' => '#7da500',
		'sidebarlink_hover_color_id' => '#999999',
		'flipbg_front_color_id' => '#ffffff',
		'flipbg_back_color_id' => '#f7f7f7',
		'flipborder_front_color_id' => '#e0e0e0',
		'flipborder_back_color_id' => '#000000',
		'divider_color_id' => '#8c8b8b',
		'wgttitle_size_id' => '22px',
		'timebox_color_id' => '#ffffff',
		'timeboxborder_color_id' => '#dedede',
		'gridbox_color_id' => '#ffffff',
		'gridboxborder_color_id' => '#cccccc',
		
		'service_box_bg' => '#0a7ad8',
		'service_box_bg_hover' => '#d1d0d0',
		'box_color_text' => '#ffffff',
		'go_bg_color' => '#ffffff',
		'box_right_border' => '#30a0fd',
		
		'expand_bg_color' => '#7da500',
		'expand_text_color' => '#ffffff',
		'h_seperator_color' => '#000000',
		'h_seperator_border_color' => '#7da500',
		
		'square_bg_color' => '#ffffff',
		'square_bg_hover_color' => '#79ab9f',
		'square_title_color' => '#000000',
		
		'style3_bg_color' => '#ffffff',
		'style3_hover_bg_color' => '#9f9f9f',
		'style3_border_color' => '#7da500',
		
		'perfect_bg_color' => '#ffffff',
		'perfect_border_color' => '#eaeaea',
		'perfect_hover_border_color' => '#7da500',
 
		'foot_layout_id' => '4',
		'footer_color_id' => '#f4f3f3',
		'footwdgtxt_color_id' => '#777777',
		'footer_title_color' => '#2f2f2f',
		'ptitle_font_id' =>  array('font-family' => 'Montserrat', 'subsets'=>'latin'),
		'mnutitle_font_id' =>  array('font-family' => 'Montserrat', 'subsets'=>'latin'),
		'title_txt_color_id' => '#666666',
		'link_color_id' => '#3590ea',
		'link_color_hover' => '#1e73be',
		'txt_upcase_id' => '1',
		'mnutxt_upcase_id' => '1',
		'copyright_bg_color' => '#f4f3f3',
		'copyright_txt_color' => '#929292',
		
		//Footer Info Box
		'footer_info_bgcolor' => '#161616',
		'footer_info_iconcolor' => '#ffffff',
		'footer_info_titlecolor' => '#ffffff',
		'footer_info_desccolor' => '#757575',
		'footer_info_shrtcolor' => '#00baff',
		'footer_info_dividercolor' => '#1f1f1f',		
		
		//Featured Box
		//'featured_section_title' => __('Featured Boxes', 'complete'),
		'homeblock_bg_setting' => '',
		'ftd_bg_video' => '',
		'homeblock_title_color' => '#000000',
		'homeblock_color_id' => '#ffffff',
		'featured_image_height' => '50px;',
		'featured_image_width' => '50px;',
		'featured_excerpt' => '25',
		'featured_block_bg' => '#40403f',
		'featured_block_hvr_bg' => '#7da500',
		'featured_block_box_bg' => '#fbfbfb',
		'featured_block_titlecolor' => '#40403f',
		'featured_block_title_hvcolor' => '#7da500',
		'featured_block_color' => '#414140',
		'featured_block_hovercolor' => '#ffffff',
		'featured_block_border' => '#7da500',
		'featured_block_hvborder' => '#ffc0d1',

		
		'featured_block_button' => __('Read More', 'complete'),
		'recentpost_block_button' => __('Read More', 'complete'),
		
		'featured_block_button_bg' => '#40403f',
		'featured_block_hover_button_bg' => '#7da500',
		
		'featuredpage-setting1_image' => array(  'url'=>''.get_template_directory_uri().'/images/featured_icon1.png'),
		'featuredpage-setting2_image' => array(  'url'=>''.get_template_directory_uri().'/images/featured_icon2.png'),
		'featuredpage-setting3_image' => array(  'url'=>''.get_template_directory_uri().'/images/featured_icon3.png'),
		
		'featuredpage-setting1' => '0',
		'featuredpage-setting2' => '0',
		'featuredpage-setting3' => '0',
		'hide_boxes' => '',		
		
		
		'page-setting1' => '0',
		'page-setting2' => '0',
		'page-setting3' => '0',
		'page-setting4' => '0',
		'page-setting5' => '0',
		'page-setting6' => '0',
		'page-setting7' => '0',
		'page-setting8' => '0',
		'page-setting9' => '0',
		'page-setting10' => '0',
		'page-setting11' => '0',
		'page-setting12' => '0',
		'page-setting13' => '0',
		'page-setting14' => '0',
		'page-setting15' => '0',
		'page-setting16' => '0',
		'page-setting17' => '0',
		'hide_boxes' => '',
		
		//Home Section1
		'section1_bgcolor_id' => '#fbfbfb',
		'section1_bg_image' => '',
		'section1_bg_video' => '',
		'hide_boxes_section1' => '',
		//Home Section1
		
		//Home Section2
		'section2_bgcolor_id' => '#ffffff',
		'section2_bg_image' => '',
		'section2_bg_video' => '',
		'hide_boxes_section2' => '',
		//Home Section2	
		
		//Home Section3
		'section3_bgcolor_id' => '#7da500',
		'section3_bg_image' => '',
		'section3_bg_video' => '',
		'hide_boxes_section3' => '',
		//Home Section3	
		
		//Home Section4
		'section4_bgcolor_id' => '',
		'section4_bg_image' => ''.get_template_directory_uri().'/images/features-bg.jpg',
		'section4_bg_video' => '',
		'hide_boxes_section4' => '1',
		//Home Section4		
		
		//Home Section5
		'section5_bgcolor_id' => '#ffffff',
		'section5_bg_image' => '',
		'section5_bg_video' => '',
		'hide_boxes_section5' => '1',
		//Home Section5		
		
		//Home Section6
		'section6_bgcolor_id' => '#f6f6f6',
		'section6_bg_image' => '',
		'section5_bg_video' => '',
		'hide_boxes_section6' => '1',
		//Home Section6	
		
		//Home Section7
		'section7_bgcolor_id' => '',
		'section7_bg_image' => ''.get_template_directory_uri().'/images/section-7-bg.jpg',
		'section7_bg_video' => '',
		'hide_boxes_section7' => '1',
		//Home Section7		
		
		//Home Section8
		'section8_bgcolor_id' => '#d1d0d0',
		'section8_bg_image' => '',
		'section8_bg_video' => '',
		'hide_boxes_section8' => '1',
		//Home Section8		
		
		//Home Section9
		'section9_bgcolor_id' => '#f6f6f6',
		'section9_bg_image' => '',
		'section9_bg_video' => '',
		'hide_boxes_section9' => '1',
		//Home Section9	
		
		//Home Section10
		'section10_bgcolor_id' => '',
		'section10_bg_image' => ''.get_template_directory_uri().'/images/section-10-bg.jpg',
		'section10_bg_video' => '',
		'hide_boxes_section10' => '1',
		//Home Section10
		
		//Home Section11
		'section11_bgcolor_id' => '#f6f6f6',
		'section11_bg_image' => '',
		'section11_bg_video' => '',
		'hide_boxes_section11' => '1',
		//Home Section11	
		
		//Home Section12
		'section12_bgcolor_id' => '',
		'section12_bg_image' => ''.get_template_directory_uri().'/images/section-12-bg.jpg',
		'section12_bg_video' => '',
		'hide_boxes_section12' => '1',
		//Home Section12
		
		//Home Section13
		'section13_bgcolor_id' => '#ffffff',
		'section13_bg_image' => '',
		'section13_bg_video' => '',
		'hide_boxes_section13' => '1',
		//Home Section13
		
		//Home Section14
		'section14_bgcolor_id' => '',
		'section14_bg_image' => ''.get_template_directory_uri().'/images/section-14-bg.jpg',
		'section14_bg_video' => '',
		'hide_boxes_section14' => '1',
		//Home Section14
		
		//Home Section15
		'section15_bgcolor_id' => '#f6f6f6',
		'section15_bg_image' => '',
		'section15_bg_video' => '',
		'hide_boxes_section15' => '1',
		//Home Section15
		
		//Home Section16
		'section16_bgcolor_id' => '#ffffff',
		'section16_bg_image' => '',
		'section16_bg_video' => '',
		'hide_boxes_section16' => '1',
		//Home Section16
		
		//Home Section17
		'section17_bgcolor_id' => '#ffffff',
		'section17_bg_image' => '',
		'section17_bg_video' => '',
		'hide_boxes_section17' => '1',
		//Home Section17												
		
		
		//Footer Column 1
		'foot_cols1_title' => __('ABOUT US', 'complete'),
		'foot_cols1_content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><p>Cras Donec nec orci consequat feugiat sem veluctus velit facilisis quis efficitur vel.</p>[social_area]
    [social icon="facebook" link="#"]
    [social icon="twitter" link="#"]
    [social icon="google-plus" link="#"]	
    [social icon="linkedin" link="#"]
    [social icon="pinterest" link="#"]
[/social_area]',
		//Footer Column 1	
		
		//Footer Column 2
		'foot_cols2_title' => __('LATEST POSTS', 'complete'),
		'foot_cols2_content' => '[footerposts show="4"]',
		//Footer Column 2	
		
		//Footer Column 3
		'foot_cols3_title' => __('NAVIGATION', 'complete'),
		'foot_cols3_content' => '[footermenu]',
		//Footer Column 3
		
		//Footer Column 4
		'foot_cols4_title' => __('QUICK CONTACT', 'complete'),
		'foot_cols4_content' => '<p>Praesent nec dictum dolor, eget faucibus neque. Curabitur ac dolor a eros malesuadaing.<br><br> Phone: 1.800.555.6789<br> Email: <a href="mailto:demo@lorem.com">demo@lorem.com</a><br> Web: <a href="http://www.demo.com">demo.com</a></p>',
		//Footer Column 4																
		'social_button_style' => 'simple',
		'social_show_color' => '',
		'social_bookmark_pos' => 'footer',
		'social_bookmark_size' => 'normal',
		'social_single_id' => '1',
		'social_page_id' => '',
		
		//Footer Info Box 1
		'foot_infobox1_heading' => __('VISIT US', 'complete'),
		'foot_infobox1_icon' => '<i class="fa fa-map-o" aria-hidden="true"></i>',
		'foot_infobox1_description' => 'Aliquam porta tincidunt enim.',
		
		//Footer Info Box 2
		'foot_infobox2_heading' => __('EMAIL US', 'complete'),
		'foot_infobox2_icon' => '<i class="fa fa-envelope-o" aria-hidden="true"></i>',
		'foot_infobox2_description' => 'info@sitename.com',
		
		//Footer Info Box 3
		'foot_infobox3_heading' => __('CALL US', 'complete'),
		'foot_infobox3_icon' => '<i class="fa fa-phone" aria-hidden="true"></i>',
		'foot_infobox3_description' => '987 685 4528',
		
		'hide_foot_infobox' => '',
		
		'post_lightbox_id' => '1',
		'post_gallery_id' => '1',
		'cat_layout_id' => '4',
		'hide_mob_slide' => '',
		'hide_mob_rightsdbr' => '',
		'hide_mob_page_header' => '1',
		'custom-css' => '',
	);
	
      $options = get_option('complete',$defaults);

      //Parse defaults again - see comments
      $options = wp_parse_args( $options, $defaults );

	return $options;
}?>