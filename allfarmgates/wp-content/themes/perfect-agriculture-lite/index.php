<?php 
/**
 * The index page of Perfect
 *
 * Displays the home page elements.
 *
 * @package Perfect Agriculture Lite
 * 
 * @since SKT Perfect Agriculture Lite 1.0
 */
global $complete;
?>
<?php get_header(); ?>
<?php if ( is_front_page() ) { ?>
<div class="fixed_site layer_wrapper">
  <div class="fixed_wrap fixindex"> 
<!-- Featture Boxes Section Start -->
    <div class="featured_area <?php if($complete['homeblock_bg_setting']){ ?>featured_area_bg<?php } ?> <?php if(!empty($complete['hide_boxes'])){ echo 'hide_section';} ?>" <?php if(!empty($complete['ftd_bg_video'])){ ?>data-vidbg-bg="mp4: <?php $ftdbgvideo = $complete['ftd_bg_video']; echo do_shortcode($ftdbgvideo); ?>" data-vidbg-options="loop: true, muted: true, overlay: false"<?php } ?>>
      <div class="center">
        <div class="sectionrow">
<?php
$pages = array();
for ( $count = 1; $count <= 4; $count++ ) {
	$mod = get_theme_mod( 'featuredpage-setting' . $count );
	if ( 'page-none-selected' != $mod ) {
		$pages[] = $mod;
	}
}
$filterArray = array_filter($pages);
if(count($filterArray) == 0){ ?>
<?php
for($bx=1; $bx<4; $bx++) { ?>
<div class="featured_block fblock3 <?php if($bx%3==0){ ?>no_margin_padding_right<?php } ?>">
<div class="featuredinfomain">
 	<div class="featured-thumb"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/featured_icon<?php echo esc_attr($bx); ?>.png"></div>
    <div class="featured-cont-box">
    	<h3><?php echo 'Crop Protection';?></h3>
        <p><?php echo 'Donec mauris ligula, dictum sit amet aliquet et, maximus a diam. Morbi nec condimentum quam. In posuere, mi quis congue aliquam, mi diam posuere diam';?></p>
         <a href="<?php echo esc_url('#');?>" class="sktmore"><?php echo 'Read More';?></a>
        </div>
</div>
</div>
	
<?php } ?>                    
<?php 	
}else{

$filled_array=array_filter($pages);
$classNo = count($filled_array);	
	
$args = array(
	'posts_per_page' => 3,
	'post_type' => 'page',
	'post__in' => $pages,
	'orderby' => 'post__in'
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	$count = 1;
	while ( $query->have_posts() ) : $query->the_post();
	?>
	<div class="featured_block <?php echo 'fblock'.$classNo; if($count % $classNo == 0){ ?> no_margin_padding_right<?php } ?>">
<div class="featuredinfomain">
	<?php if(!empty($complete['featuredpage-setting'.$count.'_image']['url'])){   ?>
    <div class="featured-thumb">
    <img src="<?php $pgimg = $complete['featuredpage-setting'.$count.'_image']; echo $pgimg['url']; ?>" />
    </div><?php } ?>
    <div class="featured-cont-box">
    	<h3><?php the_title(); ?></h3>
        <p><?php echo wp_trim_words( get_the_content(), $complete['featured_excerpt'] ); ?></p>
        <?php if (!empty ($complete['featured_block_button'])) { ?>
                    <a href="<?php the_permalink(); ?>" class="sktmore"><?php $ftdbutton = html_entity_decode($complete['featured_block_button']); $ftdbutton = stripslashes($ftdbutton); echo do_shortcode($ftdbutton); ?></a>   
                    <?php } ?>
        </div>
</div>         
 	</div>
        <?php if($count % $classNo == 0) { ?>
        <div class="clear"></div>
        <?php } ?>
	<?php
	$count++;
	endwhile;
 endif;
}
 
?></div>
<div class="clear"></div>
      </div>
    </div>
    <!-- Featture Boxes Section End -->   
    <!-- Home Section 1 -->
	<?php if($complete['hide_boxes_section1'] == ''){?>    
    <section class="home1_section_area <?php if($complete['section1_bg_image']){ ?>home1_section_area_bg<?php } ?>" <?php if(!empty($complete['section1_bg_video'])){ ?>data-vidbg-bg="mp4: <?php $sec1bgvideo = $complete['section1_bg_video']; echo do_shortcode($sec1bgvideo); ?>" data-vidbg-options="loop: true, muted: true, overlay: false"<?php } ?>>
    	<div class="center">
            <div class="home_section1_content">
             	  <?php 
				  	$pagesetting1 = get_theme_mod( 'page-setting1');
					if ($pagesetting1 == '0'){
						echo '<div class="su-column su-column-size-1-1"><div class="su-column-inner su-clearfix"><img class="lazy alignright size-full wp-image-16170" src="'.get_template_directory_uri().'/images/welcome-thumb.png"><div class="headingtitle"><h3 style="color:#404040; align:left;">WELCOME</h3></div>Nulla vehicula elit mauris, eget porttitor eros faucibus eget. Etiam lacinia mattis nisi vel fermentum. Vestibulum suscipit odio tortor, sit amet ornare quam blandit vel. Sed consequat purus libero, eu dignissim felis maximus at. Duis faucibus diam ut lobortis consectetur. Curabitur eget justo neque. Nam vel dolor lectus. Aliquam eu ullamcorper urna. Curabitur id tortor nibh.<div class="spacecode" style="height:33px;"></div> Sed ornare consequat diam a ultricies. Pellentesque lobortis faucibus condimentum. Suspendisse laoreet justo eget dui euismod, vitae ultricies tortor fringilla. Integer eleifend odio non consectetur vulputate. Maecenas ante neque, condimentum a augue quis, sollicitudin egestas velit. Nulla et porta sapien, et vehicula risus. Nulla facilisi. Phasellus ligula nisi, pharetra eu nunc non, gravida fermentum odio. In sollicitudin erat vitae massa lacinia consectetur. <div class="spacecode" style="height:33px;"></div><div class="view-all-btn" style="text-align:left"><a href="#">Read More</a></div></div></div>';
					}
					else
					{
					$secone = new WP_Query('page_id='.$pagesetting1.'');
					while ($secone->have_posts()) : $secone->the_post();
					?>
					<?php the_content(); ?>
					<?php endwhile; wp_reset_postdata(); ?>
					<?php 
					}
					?> 
            </div>
        </div>
    </section>
    <?php get_template_part('templates/post','layout4'); ?>        
    <?php } ?>
    <?php wp_reset_postdata(); ?>
    <!-- Home Section 1 -->
  </div>
</div>
<?php }else{ ?>
<div class="fixed_site">
  <div class="fixed_wrap fixindex">
    <!--CUSTOM PAGE HEADER STARTS-->
        <?php get_template_part('sktframe/core','pageheader'); ?>
    <!--CUSTOM PAGE HEADER ENDS-->  
    
    <?php get_template_part('templates/post','layout4'); ?>
  </div>
</div>
<?php } //is_front_page ENDS ?>
<?php get_footer(); ?>