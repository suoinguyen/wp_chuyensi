<?php

if(!function_exists('menu_init')){
    function menu_init(){
        /*
        * Tạo menu cho theme
        ** Tạo menu cho theme
        */
        register_nav_menu ( 'primary-menu', __('Primary Menu', _TEXT_DOMAIN) );
    }
    add_action('init', 'menu_init');
}
