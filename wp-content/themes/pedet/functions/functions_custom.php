<?php
/**
@ get_logo()
 * %1$s: get_bloginfo( ‘url’ )
 * %2$s: get_bloginfo( ‘description’ )
 * %3$s: get_bloginfo( ‘sitename’ )
 **/
if ( ! function_exists( 'get_logo' ) ) {
    function get_logo() {?>
        <div class="logo">

            <div class="site-name">
                <?php if ( is_home() ) {
                    printf(
                        '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                        get_bloginfo( 'url' ),
                        get_bloginfo( 'description' ),
                        get_bloginfo( 'sitename' )
                    );
                } else {
                    printf(
                        '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
                        get_bloginfo( 'url' ),
                        get_bloginfo( 'description' ),
                        get_bloginfo( 'sitename' )
                    );
                } // endif ?>
            </div>
            <div class="site-description"><?php bloginfo( 'description' ); ?></div>

        </div>
    <?php }
}

/**
@ get_menu( $theme_location, $menu_class )
 *
 * slug         : $theme_location
* class of menu : $menu_class
 **/
if ( ! function_exists( 'get_menu' ) ) {
    function get_menu( $theme_location, $menu_class = null ) {
        $menu = array(
            'theme_location' => $theme_location,
            'walker' => new Bootstrap_Nav_Walker,
            'menu_class' => $menu_class

        );
        wp_nav_menu( $menu );
    }
}

/**
 * Pagination
 */
#Step 1
/*$page = isset($_REQUEST['post_page']) ? (int)$_REQUEST['post_page'] : 1;
$posts_per_page = isset($_REQUEST['posts_per_page']) ? (int)$_REQUEST['posts_per_page'] : 8;

$page = $page < 1 ? 1 : $page;
$posts_per_page = $posts_per_page < 3 ? 3 : $posts_per_page;*/

#Step 2
/*$products_query = new WP_Query(array(
    'posts_per_page' => $posts_per_page
    'custom query field' =>...
));*/

#Step 3
/*$argsPagi = array(
    'format' => '?post_page=%#%',
    'current' => $page,
    'total' => $products_query->max_num_pages,
    'show_all' => false,
    'end_size' => 2,
    'mid_size' => 3,
    'prev_next' => true,
    'next_text' => ' <i class="fa fa-caret-right"></i>',
    'prev_text' => ' <i class="fa fa-caret-left"></i>',
    'type' => 'plain',
    'add_args' => null,
    'add_fragment' => '',
    'before_page_number' => '',
    'after_page_number' => ''
);*/

#Step 4
#place the code to show
/*
<div class="pagination-wrap-bottom">
    <div class="pagination clearfix">
        <?php echo __("PAGE", _NP_TEXT_DOMAIN) ?>
        <?php echo paginate_links($argsPagi); ?>
    </div>
</div>
*/

/**
 * Count post view
 */

 if(!function_exists('getPostViews')){

     if(!function_exists('setPostViews')){
         function setPostViews($postID) {
             $count_key = 'post_views_count';
             $count = get_post_meta($postID, $count_key, true);
             if(empty($count)){
                 delete_post_meta($postID, $count_key);
                 add_post_meta($postID, $count_key, '1');
             }else{
                 $count++;
                 update_post_meta($postID, $count_key, $count);
             }
         }
     }

     function getPostViews($postID){
         $count_key = 'post_views_count';
         $count = get_post_meta($postID, $count_key, true);
         if(empty($count)){
             delete_post_meta($postID, $count_key);
             add_post_meta($postID, $count_key, '0');
             return 0;
         }
         return $count;
     }
 }


