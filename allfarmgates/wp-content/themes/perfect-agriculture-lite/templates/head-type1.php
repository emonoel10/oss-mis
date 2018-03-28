<?php 
/**
 * Header layout 1 for Perfect Agriculture Lite
 *
 * Displays The Header layout 1. This file is imported in header.php
 *
 * @package Perfect Agriculture Lite
 * 
 * @since Perfect 1.0
 */
global $complete;?>

<!--HEADER STARTS-->
    	<!--HEAD INFO AREA-->
		<div class="head-info-area type1">
        	<div class="center">
            	<?php if(!dynamic_sidebar('headerleft')) : ?>
                <div class="left phntp"><span><?php if (!empty ($complete['top_left_text_box'])) { ?><?php $tptextleft = html_entity_decode($complete['top_left_text_box']); $tptextleft = stripslashes($tptextleft); echo do_shortcode($tptextleft); ?><?php } ?></span><span class="phntxt"><?php if (!empty ($complete['phntp_text_id'])) { ?><?php $phntp = html_entity_decode($complete['phntp_text_id']); $phntp = stripslashes($phntp); echo do_shortcode($phntp); ?><?php } ?></span><span class="emltxt"><?php if (!empty ($complete['email_text_id'])) { ?><?php $tpemail = html_entity_decode($complete['email_text_id']); $tpemail = stripslashes($tpemail); echo do_shortcode($tpemail); ?><?php } ?></span></div><?php endif; ?>
                <?php if(!dynamic_sidebar('headerright')) : ?>
				<div class="right"><span class="suptp"><?php if (!empty ($complete['suptp_text'])) { ?><?php $suptp = html_entity_decode($complete['suptp_text']); $suptp = stripslashes($suptp); echo do_shortcode($suptp); ?><?php } ?></span> </div><?php endif; ?>
                <div class="clear"></div>                
            </div>
        </div>
    <div class="header type1">
        <div class="center">

            <!--LOGO START-->
                <div class="logo">
                    <?php if(!empty($complete['logo_image_id']['url'])){   ?>
                        <a class="logoimga" title="<?php bloginfo('name') ;?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php $logo = $complete['logo_image_id']; echo $logo['url']; ?>" /></a>
                        <span class="desc"><?php echo bloginfo('description'); ?></span>
                    <?php }else{ ?>
                            <?php if ( is_home() ) { ?>   
                            <h1><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php bloginfo('name'); ?></a></h1>
                            <span class="desc"><?php echo bloginfo('description'); ?></span>
                            <?php }else{ ?>
                            <h2><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php bloginfo('name'); ?></a></h2>
                            <span class="desc"><?php echo bloginfo('description'); ?></span>
                            <?php } ?>
                    
                    <?php } ?>
                </div>
            <!--LOGO END-->
            
    	    <!--MENU START--> 
                <!--MOBILE MENU START-->
                <a id="simple-menu" href="#sidr"><i class="fa-bars"></i></a>
                <!--MOBILE MENU END--> 
                <div id="topmenu" class="<?php if ('header' == $complete['social_bookmark_pos'] ) { ?> has_bookmark<?php } ?>">
                <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
                </div>
            <!--MENU END-->            
 
    </div>
    </div>
<!--HEADER ENDS-->