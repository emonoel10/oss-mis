<?php
global $complete;  
$ImageUrl[] = esc_url(get_template_directory_uri() ."/images/slides/slider1.jpg");
$ImageUrl[] = esc_url(get_template_directory_uri() ."/images/slides/slider2.jpg");
$ImageUrl[] = esc_url(get_template_directory_uri() ."/images/slides/slider3.jpg"); 

for($i=1; $i<=10; $i++){
	if(!empty($complete['slide_image'.$i])){
		$imgArr[] = $i;
	}
}
require get_template_directory() . '/frontpage/slider.php';
?>
<section id="home_slider">
  <div class="slider-main">
    <?php if(!empty($imgArr)){ ?>
    <div class="slider-wrapper theme-default">
      <div id="slider" class="nivoSlider">
        <?php
			   foreach($imgArr as $val){
				?>
        <img src="<?php echo $complete['slide_image'.$val]; ?>" data-thumb="<?php echo $complete['slide_image'.$val]; ?>" alt="" title="<?php echo esc_attr('#htmlcaption'.$val) ; ?>" />
        <?php } ?>
      </div>
      <?php foreach($imgArr as $val)	{ ?>
      <div id="htmlcaption<?php echo esc_attr($val); ?>" class="nivo-html-caption">
        <?php if(!empty($complete['slide_title'.$val])){ ?>
        <div class="title"><?php echo $complete['slide_title'.$val]; ?></div>
        <?php } ?>
        <?php if(!empty($complete['slide_desc'.$val])){ ?>
        <div class="slidedesc"><?php echo $complete['slide_desc'.$val]; ?></div>
        <?php } ?>
        <?php if(!empty($complete['slide_btn'.$val])){ ?>
        <div class="slidebtn"><a class="slidelink" href="<?php echo $complete['slide_link'.$val]; ?>"><?php echo $complete['slide_btn'.$val]; ?></a></div>
        <?php } ?>        
      </div>
      <?php } ?>
    </div>
    <?php }
	else { ?>
    <div class="slider-wrapper slide-temp theme-default">
      <div id="slider" class="nivoSlider">
        <?php foreach($ImageUrl as $val) { ?>
        <img src="<?php echo $val; ?>" data-thumb="<?php echo $val; ?>" alt="" title="#htmlcaption" />
        <?php } ?>
      </div>
      <?php for($i=1; $i<=3; $i++)	{ ?>
      <div id="htmlcaption" class="nivo-html-caption">
        <div class="title"><?php echo 'THE <span style="color:#b1e902;">LEADING</span> PROVIDER OF AGRICULTURAL PRODUCTS AND SERVICES'; ?></div>
        <div class="slidedesc"><p><?php echo 'Nam luctus malesuada ante eu ornare. Pellentesque molestie lorem nulla, eu aliquet metus pharetra vitae. Aliquam luctus porta purus, sit amet placerat orci tincidunt nec. Suspendisse fermentum mi libero, porta viverra risus dapibus et. Sed lobortis lorem turpis, at dictum mauris hendrerit eu.';?></p></div>
        <div class="slidebtn"><a href="<?php echo esc_url('#');?>"><strong><?php echo 'READ MORE';?></strong></a></div>
      </div>
      <?php } ?>
    </div>
    <?php } ?>
  </div>
</section>