<?php
/**
 * Author: quocanh.nguyen (quocanh.nguyen@top3.com.sg)
 * Date: 17/6/2015
 * Time: 5:52 PM
 *
 * For adding and update details for custom post type
 */

if (!function_exists('grabvn_services_init')) {
    /**
     * Register a job post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function grabvn_services_init()
    {
        $labels = array(
            'name' => _x('Services', 'post type general name', _TEXT_DOMAIN),
            'singular_name' => _x('Service', 'post type singular name', _TEXT_DOMAIN),
            'menu_name' => _x('Services', 'admin menu', _TEXT_DOMAIN),
            'name_admin_bar' => _x('Service', 'add new on admin bar', _TEXT_DOMAIN),
            'add_new' => _x('Add New', 'Service', _TEXT_DOMAIN),
            'add_new_item' => __('Add New Service', _TEXT_DOMAIN),
            'new_item' => __('New Service', _TEXT_DOMAIN),
            'edit_item' => __('Edit Service', _TEXT_DOMAIN),
            'view_item' => __('View Service', _TEXT_DOMAIN),
            'all_items' => __('All Service', _TEXT_DOMAIN),
            'search_items' => __('Search Services', _TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Service:', _TEXT_DOMAIN),
            'not_found' => __('No Services found.', _TEXT_DOMAIN),
            'not_found_in_trash' => __('No Services found in Trash.', _TEXT_DOMAIN)
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'services-post'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 19,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
        );

        register_post_type('services', $args);
    }
}
//add_action( 'init', 'grabvn_services_init' );


if (!function_exists('service_category')) {
    /**
     * Register a taxonomy.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
     */
    function service_category()
    {

        register_taxonomy('custom_taxonomy', 'custom_post_type', array(
            // Hierarchical taxonomy (like categories)
            'hierarchical' => true,
            // This array of options controls the labels displayed in the WordEvent Admin UI
            'labels' => array(
                'name' => _x('Taxonomy', 'taxonomy general name'),
                'singular_name' => _x('Taxonomy', 'taxonomy singular name'),
                'search_items' => __('Search Taxonomy'),
                'all_items' => __('All Taxonomies'),
                'parent_item' => __('Parent Taxonomy'),
                'parent_item_colon' => __('Parent Taxonomy:'),
                'edit_item' => __('Edit Taxonomy'),
                'update_item' => __('Update Taxonomy'),
                'add_new_item' => __('Add New Taxonomy'),
                'new_item_name' => __('New Taxonomy Name'),
                'menu_name' => __('Our Trainers'),
            ),

            // Control the slugs used for this taxonomy
            'rewrite' => array(
                'slug' => 'taxonomy', // This controls the base slug that will display before each term
                'with_front' => false, // Don't display the category base before "/locations/"
                'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
        ));
    }
}
//add_action('init', 'template_custom_taxonomy', 0);

