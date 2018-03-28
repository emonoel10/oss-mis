<?php 
/**
 * Posts Layout 4 for Perfect Agriculture Lite
 *
 * Displays Divider Icons to Display Under Home Elements Title
 *
 * @package Perfect Agriculture Lite
 * 
 * @since Perfect 1.0
 */
global $complete;?>

  <!--DIVIDER-->
  <?php if($complete['divider_icon'] !== 'no_divider') { ?>
      <div class="complete_divider">
          <span class="div_left"></span>
          <span class="div_middle"><i class="fa <?php echo esc_attr($complete['divider_icon']); ?>"></i></span>
          <span class="div_right"></span>
      </div>
   <?php } ?>