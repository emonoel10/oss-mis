<?php

if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class CategoryimageLoadFunction
{

    protected $taxonomies;

    public static $instance = null;

    public static function pciwgas_getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    

    public static function pciwgas_initialize()
    {
        $instance = self::pciwgas_getInstance();      

        // Actions
        add_action('admin_init',                  array($instance, 'pciwgas_admin_init'));      
        add_action('edit_term',                   array($instance, 'pciwgas_save_image'));
        add_action('create_term',                 array($instance, 'pciwgas_save_image'));        
    }
   

    public static function pciwgas_get_category_image($atts = array(), $onlysrc = true)
    {
        $params = array_merge(array(
            'size'    => 'full',
            'term_id' => null,
            'alt'     => null
        ), $atts);
		
        $term_id = $params['term_id'];
        $size    = $params['size'];

        if (!$term_id) {
            $term    = get_queried_object();
            $term_id = $term->term_id;
        }

        if (!$term_id) {
            return;
        }
	
        $attachment_id   = get_option('pciwgas_categoryimage_'.$term_id);

        $attachment_meta = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
        $attachment_alt  = trim(strip_tags($attachment_meta));

        $attr = array(
            'alt'=> (is_null($params['alt']) ?  $attachment_alt : $params['alt'])
        );

        if ($onlysrc) {
            $src = wp_get_attachment_image_src($attachment_id, $size, false);
            return is_array($src) ? $src[0] : null;
        }

        return wp_get_attachment_image($attachment_id, $size, false, $attr);
    }   

    public function pciwgas_manage_category_columns($columns)
    {
        return array_merge($columns, array('image' => __('Image', 'wpcustom-category-image')));
    }

    public function pciwgas_manage_category_columns_fields($deprecated, $column_name, $term_id)
    {
        if ($column_name == 'image' && $this->pciwgas_has_image($term_id)) {
           $category_image = self::pciwgas_get_category_image(array(
                'term_id' => $term_id,
                'size'    => 'thumbnail',
            )); ?>
			<img src="<?php echo $category_image; ?>" width="80" height="80" />
		<?php	
        }
    }

    public function pciwgas_admin_init()
    {
        $this->taxonomies = pciwgas_get_option('pciwgas_category',array());

        add_filter('manage_edit-category_columns', array($this, 'pciwgas_manage_category_columns'));
        add_filter('manage_category_custom_column', array($this, 'pciwgas_manage_category_columns_fields'), 10, 3);

        foreach ((array) $this->taxonomies as $taxonomy) {
            $this->pciwgas_add_custom_column_fields($taxonomy);
        }
    }

    public function pciwgas_add_custom_column_fields($taxonomy)
    {
        add_action("{$taxonomy}_add_form_fields", array($this, 'pciwgas_add_taxonomy_field'));
        add_action("{$taxonomy}_edit_form_fields", array($this, 'pciwgas_edit_taxonomy_field'));

        // Add custom columns to custom taxonomies
        add_filter("manage_edit-{$taxonomy}_columns", array($this, 'pciwgas_manage_category_columns'));
        add_filter("manage_{$taxonomy}_custom_column", array($this, 'pciwgas_manage_category_columns_fields'), 10, 3);
    }

   

    private function pciwgas_asset_url($file)
    {
        return plugins_url($file, __FILE__);
    }

    public function pciwgas_save_image($term_id)
    {
        // Ignore quick edit
        if (isset($_POST['action']) && $_POST['action'] == 'inline-save-tax') {
            return;
        }

        $attachment_id = isset($_POST['categoryimage_attachment']) ? (int) $_POST['categoryimage_attachment'] : null;

        if (! is_null($attachment_id) && $attachment_id > 0 && !empty($attachment_id)) {
            update_option('pciwgas_categoryimage_'.$term_id, $attachment_id);
            return;
        }

        delete_option('pciwgas_categoryimage_'.$term_id);
    }

    public function pciwgas_get_attachment_id($term_id)
    {
        return get_option('pciwgas_categoryimage_'.$term_id);
    }

    public function pciwgas_has_image($term_id)
    {
        return ($this->pciwgas_get_attachment_id($term_id) !== false);
    }

    public function pciwgas_add_taxonomy_field($taxonomy)
    {
        echo $this->pciwgas_taxonomy_field('add-form-option-image', $taxonomy);
    }

    public function pciwgas_edit_taxonomy_field($taxonomy)
    {
        echo $this->pciwgas_taxonomy_field('edit-form-option-image', $taxonomy);
    }

    public function pciwgas_taxonomy_field($template, $taxonomy)
    {
        $params = array(
            'label'  => array(
                'image'        => __('Image', 'wpcustom-category-image'),
                'upload_image' => __('Upload/Edit Image', 'wpcustom-category-image'),
                'remove_image' => __('Remove image', 'wpcustom-category-image')
            ),
            'categoryimage_attachment' => null
        );


        if (isset($taxonomy->term_id) && $this->pciwgas_has_image($taxonomy->term_id)) {
            $image = self::pciwgas_get_category_image(array(
                'term_id' => $taxonomy->term_id
            ), true);

            $attachment_id = $this->pciwgas_get_attachment_id($taxonomy->term_id);

            $params = array_replace_recursive($params, array(
                'categoryimage_image'      => $image,
                'categoryimage_attachment' => $attachment_id,
            ));
        }

        return pciwgas_template($template, $params, false);
    }
}