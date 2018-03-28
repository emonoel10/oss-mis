=== Post Category Image With Grid and Slider ===
Contributors: wponlinesupport, anoopranawat
Tags: category, category image, post category image, post category image grid, post category image slider, customization, custom category image, category featured image, category grid, category slider
Requires at least: 3.5
Tested up to: 4.9
Author URI: http://wponlinesupport.com
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Post Category Image With Grid and Slider plugin allow users to upload  category image and display in grid and slider.

== Description ==

Post Category Image With Grid and Slider plugin allow users to upload  category image and display in grid and slider.

View [FREE DEMO](https://www.wponlinesupport.com/wp-plugin/post-category-image-grid-slider/) | [PRO DEMO and Features](https://www.wponlinesupport.com/wp-plugin/post-category-image-grid-slider/) for additional information.

Checkout our new plugin - [PowerPack - Need of Every Website](https://wordpress.org/plugins/powerpack-lite/)

Once Post Category Image With Grid and Slider plugin activated,  go to **Category Image** -> and Select categories option where you want to add custom image upload

= This plugin features includes: =

* Category grid and Slider
* Custom image for category

= This plugin contain 2 shortcode: =

* Display **categories in grid** view
<code>[pci-cat-grid] --OR-- echo do_shortcode('[pci-cat-grid]');</code> 

* Display **categories in slider** view
<code>[pci-cat-slider] --OR-- echo do_shortcode('[pci-cat-slider]'); </code>

= Usage =

Go to Wp-Admin -> Posts -> Categories to see Custom Category Image options

= You can use Following parameters with grid shortcode =

<code>pci-cat-grid</code> 

* **size:**
size="full" (Enter size of image. option are large, medium, thumbnail and full)
* **taxonomy:**
taxonomy="category" (Display Specific taxonomy.)
* **term_id:**
term_id="1" (Display Specific Category id. values are Comma separated Category Id. By Default is all.)
* **Order by categories:**
orderby="name" ( Accepts term fields ('name', 'slug', 'term_group', 'term_id', 'id', 'description') )
* **Order**
order="ASC" (Accepts 'ASC' (ascending) or 'DESC' (descending). Default 'ASC' )
* **hide_empty**
hide_empty="1" (Accepts 1|true or 0|false. Default 1|true. )
* **Grid columns :**
columns="3" (display category in grid )
* **Show title :**
show_title="true" (ie show category title or not. By default value is "true" Values are "true" and "false" )
* **Show count :**
show_count="true" (ie show category post count or not. By default value is "true" Values are "true" and "false" )
* **Show description :**
show_desc="true" (ie show category description or not. By default value is "true" Values are "true" and "false" )

= You can use Following parameters with slider shortcode =

<code>pci-cat-slider</code> 

* **size:**
size="full" (Enter size of image. option are large, medium, thumbnail and full)
* **taxonomy:**
taxonomy="category" (Display Specific taxonomy.)
* **term_id:**
term_id="1" (Display Specific Category id. values are Comma separated Category Id. By Default is all.)
* **Order by categories:**
orderby="name" ( Accepts term fields ('name', 'slug', 'term_group', 'term_id', 'id', 'description') )
* **Order**
order="ASC" (Accepts 'ASC' (ascending) or 'DESC' (descending). Default 'ASC' )
* **hide_empty**
hide_empty="1" (Accepts 1|true or 0|false. Default 1|true. )
* **Show title :**
show_title="true" (ie show category title or not. By default value is "true" Values are "true" and "false" )
* **Show count :**
show_count="true" (ie show category post count or not. By default value is "true" Values are "true" and "false" )
* **Show description :**
show_desc="true" (ie show category description or not. By default value is "true" Values are "true" and "false" )
* **Number of categories display at a time:**
slidestoshow="3" (Controls number of categories display at a time)
* **Number of categories slides at a time:**
slidestoscroll="1" (Controls number of categories rotate at a time)
* **Pagination and arrows:**
dots="false" arrows="false" (Hide/Show pagination and arrows. By defoult value is "true". Values are true OR false)
* **Autoplay and Autoplay Speed:**
autoplay="true" autoplay_interval="1000"
* **Slide Speed:**
speed="3000" (Control the speed of the slider)
* **loop:**
loop="true" ( By defoult value is "true". Values are true OR false)

= Custom method without shortcode =

<code>
<?php $post_categories = get_terms('category');
	if ( $post_categories ) {
		foreach ( $post_categories as $category ) {
			$img_arra = array('size'=>$size,'term_id'=>$category->term_id);					
			$category_image = CategoryimageLoadFunction::pciwgas_get_category_image($img_arra);										
			$term_link = get_term_link( $category, 'category');	?>
				<a href="<?php echo $term_link; ?>"><img src="<?php echo $category_image; ?>"  class="" alt="" /></a>
				<a href="<?php echo $term_link; ?>"><?php echo $category->name; ?> </a>
				<?php echo $category->count; 
				 echo $category->description; 			
		}
	} ?>
</code>


== Installation ==

1. Upload the 'post-category-image-with-grid-and-slider' folder to the '/wp-content/plugins/' directory.
2. Activate the 'post-category-image-with-grid-and-slider' list plugin through the 'Plugins' menu in WordPress.
3. Once activated go to Category Image -> and Select categories option where you want to add custom image upload.
4. Once activated go to Wp-Admin -> Posts -> Categories to see Custom Category Image options
5. To display use the TWO shortcodes
<code>[pci-cat-grid]</code> 
<code>[pci-cat-slider]</code> 

== Screenshots ==

1. Admin view showing category image
2. Admin view showing category selection
3. Output in Grid and Slider


== Upgrade Notice ==

= 1.0.1 =
* Approved from WordPress

= 1.0 =
* Initial release.

== Changelog ==

= 1.0.1 =
* Approved from WordPress

= 1.0 =
* Initial release.