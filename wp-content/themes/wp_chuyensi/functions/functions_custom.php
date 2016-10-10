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
    function get_menu( $theme_location, $menu_class = 'nav navbar-nav' ) {
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
/*$paged = isset($_REQUEST['trang']) ? $_REQUEST['trang'] : 1;
$paged = $paged < 1 ? 1 : $paged;
$posts_per_page = isset($_REQUEST['posts_per_page']) ? (int)$_REQUEST['posts_per_page'] : 3;
$posts_per_page = $posts_per_page < 3 ? 3 : $posts_per_page;*/

#Step 2
/*$products_query = new WP_Query(array(
    'posts_per_page' => $posts_per_page,
    'paged' => '$paged',
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

/**
 * Math the price
 * @param $price
 * @param $discount
 * @return array
 */
function calculate_price($price, $discount = 1){
    $price = $price*1000;
    $price_result = array();
    $price_result['old_price'] = 0;
    $price_result['new_price'] = 0;
    if(isset($discount)){
        $price_result['old_price'] = number_format(round($price));
        $price_result['new_price'] = number_format(round($price*(100-$discount)/100));
    }
    return $price_result;
}

/**
 * Show dropdown category multi-level
 * @param $cates -> list category
 * @param int $parent_id -> category parent ID
 * @param int $level -> Level
 */
function dropdown_cat($cates, $parent_id = 0, $level = 0){
    if(is_single()){
        $current_cat = wp_get_post_terms( get_the_ID(), 'products_taxonomy');
        $current_cat = $current_cat[0];
    }else{
        $current_cat = get_queried_object();
    }

    //$dropdown_cat: Biến lưu menu lặp ở bước đệ quy này
    $dropdown_cat = array();
    foreach ($cates as $key => $item){

        // Nếu có parent_id bằng với parrent id hiện tại
        if($item->category_parent == $parent_id){
            $dropdown_cat[] = $item;

            // Sau khi thêm vào biên lưu trữ menu ở bước lặp
            // thì unset nó ra khỏi danh sách menu ở các bước tiếp theo
            unset($cates[$key]);
        }
    }

    // Điều kiện dừng của đệ quy là cho tới khi menu không còn nữa
    if($dropdown_cat){
        echo '<li class="dropdown-cat-s dropdown-cat-'.$parent_id.' level-'.$level.'">';
        foreach ($dropdown_cat as $item){
            if($current_cat->term_id == $item->term_id){
                echo '<ul class="parent parent-'.$item->term_id.' active">';
            }else{
                echo '<ul class="parent parent-'.$item->term_id.'">';
            }
            echo '<li class="ele-sgle">';
            echo '<span class="arrow"></span>';
            echo '<a href="'.get_term_link($item->term_id).'">'.$item->cat_name.'</a>';
            echo '</li>';
            // Gọi lại đệ quy
            // Truyền vào danh sách menu chưa lặp và id parent của menu hiện tại
            dropdown_cat($cates, $item->term_id, $level+1);
            echo '</ul>';
        }
        echo '</li>';
    }
}

/**
 * Add custom size image
 */
add_image_size( "thumbnail-post", 268, 327);
add_image_size( "thumbnail-post-hard", 268, 327, array( 'center', 'center' ));
//add_image_size( "thumbnail-post", 268, 327, true );
add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['medium_large']);
    unset( $sizes['large']);
    return array_merge( $sizes, array(
        'thumbnail-post' => __('Kiểu hình đại diện - Cân đối'),
        'thumbnail-post-hard' => __('Kiểu hình đại diện - Chuẩn'),
    ) );
}

