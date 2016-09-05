<?php
/*
* Tạo sidebar cho theme
*/
if(!function_exists('sidebar_init')) {
    function sidebar_init(){
        $sidebar = array(
            'name' => __('Main Sidebar', _TEXT_DOMAIN),
            'id' => 'main-sidebar',
            'description' => 'Main sidebar for Pedet theme',
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        );
        register_sidebar($sidebar);
    }
    add_action( 'init', 'sidebar_init' );
}
?>