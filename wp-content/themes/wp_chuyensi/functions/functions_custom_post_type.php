<?php

/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
if(!function_exists('custom_post_type_init')){
    function custom_post_type_init() {
        $labels = array(
            'name'               => _x( 'Books', 'post type general name', _TEXT_DOMAIN ),
            'singular_name'      => _x( 'Book', 'post type singular name', _TEXT_DOMAIN ),
            'menu_name'          => _x( 'Books', 'admin menu', _TEXT_DOMAIN ),
            'name_admin_bar'     => _x( 'Book', 'add new on admin bar', _TEXT_DOMAIN ),
            'add_new'            => _x( 'Add New', 'book', _TEXT_DOMAIN ),
            'add_new_item'       => __( 'Add New Book', _TEXT_DOMAIN ),
            'new_item'           => __( 'New Book', _TEXT_DOMAIN ),
            'edit_item'          => __( 'Edit Book', _TEXT_DOMAIN ),
            'view_item'          => __( 'View Book', _TEXT_DOMAIN ),
            'all_items'          => __( 'All Books', _TEXT_DOMAIN ),
            'search_items'       => __( 'Search Books', _TEXT_DOMAIN ),
            'parent_item_colon'  => __( 'Parent Books:', _TEXT_DOMAIN ),
            'not_found'          => __( 'No books found.', _TEXT_DOMAIN ),
            'not_found_in_trash' => __( 'No books found in Trash.', _TEXT_DOMAIN )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', _TEXT_DOMAIN ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'post-type-slug' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-wordpress', //https://developer.wordpress.org/resource/dashicons/#wordpress
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

        register_post_type( 'post-type-name', $args );
    }
}
//add_action( 'init', 'custom_post_type_init' );


if (!function_exists('service_category')) {
    /**
     * Register a taxonomy.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
     */
    function service_category()
    {

        register_taxonomy('custom_taxonomy', 'post-type-name', array(
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

/*------------------Register Thiet ke--------------------------*/
if(!function_exists('products_post_type')){
    function products_post_type() {
        $labels = array(
            'menu_name'          => _x( 'Sản phẩm', 'admin menu', _TEXT_DOMAIN ),
            'name'               => _x( 'Sản phẩm', 'post type general name', _TEXT_DOMAIN ),
            'singular_name'      => _x( 'Sản phẩm', 'post type singular name', _TEXT_DOMAIN ),
            'name_admin_bar'     => _x( 'Sản phẩm', 'add new on admin bar', _TEXT_DOMAIN ),
            'add_new'            => _x( 'Thêm mới', 'book', _TEXT_DOMAIN ),
            'add_new_item'       => __( 'Thêm mới', _TEXT_DOMAIN ),
            'new_item'           => __( 'Sản phẩm mới', _TEXT_DOMAIN ),
            'edit_item'          => __( 'Sửa', _TEXT_DOMAIN ),
            'view_item'          => __( 'Xem chi tiết', _TEXT_DOMAIN ),
            'all_items'          => __( 'Tất cả', _TEXT_DOMAIN ),
            'search_items'       => __( 'Tìm kiếm', _TEXT_DOMAIN ),
            'parent_item_colon'  => __( 'Sản phẩm cha:', _TEXT_DOMAIN ),
            'not_found'          => __( 'Không tìm thấy sản phẩm nào.', _TEXT_DOMAIN ),
            'not_found_in_trash' => __( 'Không tìm thấy sản phẩm nào trong thùng rác.', _TEXT_DOMAIN )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', _TEXT_DOMAIN ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'san-pham' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-products',
            'taxonomies'         => array( 'post_tag' ),
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

        register_post_type( 'products_post_type', $args );
    }
}
add_action( 'init', 'products_post_type' );

if (!function_exists('products_taxonomy')) {
    /**
     * Register a taxonomy.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
     */
    function products_taxonomy()
    {

        register_taxonomy('products_taxonomy', 'products_post_type', array(
            // Hierarchical taxonomy (like categories)
            'hierarchical' => true,
            // This array of options controls the labels displayed in the WordEvent Admin UI
            'labels' => array(
                'menu_name' => __('Danh mục sản phẩm'),
                'name' => _x('Danh mục sản phẩm', 'taxonomy general name'),
                'singular_name' => _x('Danh mục sản phẩm', 'taxonomy singular name'),
                'search_items' => __('Tìm danh mục'),
                'all_items' => __('Tất cả danh mục'),
                'parent_item' => __('Danh mục cha'),
                'parent_item_colon' => __('Danh mục cha:'),
                'edit_item' => __('Sửa danh mục'),
                'update_item' => __('Sửa danh mục'),
                'add_new_item' => __('Thêm danh mục'),
                'new_item_name' => __('Thêm danh mục'),
            ),

            // Control the slugs used for this taxonomy
            'rewrite' => array(
                'slug' => 'danh-muc-san-pham', // This controls the base slug that will display before each term
                'with_front' => false, // Don't display the category base before "/locations/"
                'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
        ));
    }
}
add_action('init', 'products_taxonomy', 0);