# wp_source_suoi
This is my WP custom source

add Bootstrap_Nav
function addNav($theme_location, $menu_class=null){
	wp_nav_menu(
		array(                                             				
		        'theme_location' => $theme_location,
            'walker' => new Bootstrap_Nav_Walker,
            'menu_class' => $menu_class
   ));
}
