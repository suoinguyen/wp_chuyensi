<?php
/**
 * Created by PhpStorm.
 * User: SuoiNguyen
 * Date: 9/24/2016
 * Time: 11:49 AM
 */
$current_cate = get_queried_object();
$price_min = isset($_REQUEST['price-min']) ? $_REQUEST['price-min'] : 0;
$price_max = isset($_REQUEST['price-max']) ? $_REQUEST['price-max'] : 0;
$status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 1;
$date_from = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
$date_to = isset($_REQUEST['end']) ? $_REQUEST['end'] : 0;

$paged = isset($_REQUEST['trang']) ? $_REQUEST['trang'] : 1;
$paged = $paged < 1 ? 1 : $paged;
$posts_per_page = isset($_REQUEST['posts_per_page']) ? (int)$_REQUEST['posts_per_page'] : 3;
$posts_per_page = $posts_per_page < 3 ? 3 : $posts_per_page;

$current_object = get_queried_object();
$terms_child = get_term_children( $current_object->term_id, $current_object->taxonomy );

//Query

#date query
$date_query = array(array(0));
if($date_from != 0 && $date_to != 0){
    $date_from = !empty($date_from)?explode('/', $date_from):0;
    $date_to = !empty($date_to)?explode('/', $date_to):0;
    if ($date_from == $date_to){
        $date_query = array(
            array(
                'year' => $date_from['2'],
                'month' => $date_from['1'],
                'day' => $date_from['0'],
            ),
            'relation' => 'AND',
        );
    }else{
        $date_query = array(
            array(
                'after'=>array(
                    'year' => $date_from['2'],
                    'month' => $date_from['1'],
                    'day' => $date_from['0'],
                    'hour' => "00:00:00"
                ),
                'before'=>array(
                    'year' => $date_to['2'],
                    'month' => $date_to['1'],
                    'day' => $date_to['0'],
                    'hour' => "00:00:00"
                ),
            ),
            'relation' => 'AND',
        );
    }
}

#Price query
$price_query = array(array(0));
if(!empty($price_min) && !empty($price_max)){
    $price_min = round($price_min/1000);
    $price_max = round($price_max/1000);
    if($price_min == $price_max){
        $price_query = array(
            array(
                'key' => 'price',
                'value' => $price_min,
                'compare' => '='
            )
        );
    }else{
        $price_query = array(
            array(
                'key' => 'price',
                'value' => array( $price_min, $price_max ),
                'type'    => 'numeric',
                'compare' => 'BETWEEN'
            )
        );
    }

}

$args = array(
    'post_type' => 'products_post_type',
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => $current_object->taxonomy,
            'field' => 'id',
            'terms' => array_merge( [$current_object->term_id], $terms_child),
            'include_children' => false,
            'operator' => 'IN'
        )),
    'date_query' => $date_query,
    'meta_query' => $price_query
);

$the_query = new WP_Query( $args );

$args_pagi = array(
    'format'    => '?trang=%#%',
    'current' => max(1, $paged),
    'total' => $the_query->max_num_pages,
    'show_all' => false,
    'end_size' => 1,
    'mid_size' => 2,
    'prev_next' => true,
    'next_text' => 'Next &raquo;',
    'prev_text' => '&laquo; Prev',
    'type' => 'plain',
    'add_fragment' => '',
    'before_page_number' => '',
    'after_page_number' => '',
);

?>
<div class="center_column col-xs-12 col-sm-9" id="center_column">
    <!-- category-slider -->
    <div class="category-slider">
        <ul class="owl-carousel owl-style2" data-dots="false" data-loop="true" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
            <li>
                <img src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/category-slide.jpg" alt="category-slider">
            </li>
            <li>
                <img src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/slide-cart2.jpg" alt="category-slider">
            </li>
        </ul>
    </div>
    <!-- ./category-slider -->
    <!-- view-product-list-->
    <div id="view-product-list" class="view-product-list">
        <h2 class="page-heading">
            <span class="page-heading-title"><?php _e($current_cate->name, _TEXT_DOMAIN)?></span>
        </h2>
        <div class="sortPagiBar">
            <div class="bottom-pagination">
                <nav>
                    <ul class="pagination">
                        <?php echo paginate_links($args_pagi)?>
                    </ul>
                </nav>
            </div>
            <div class="sort-product">
                <select class="ist-sort-by-button-group">
                    <option value="" disabled selected="selected">Sắp xếp</option>
                    <option value="name">A-Z</option>
                    <option value="name_desc">Z-A</option>
                    <option value="date">Mới nhất</option>
                    <option value="date_desc">Cũ nhất</option>
                    <option value="price">Giá tăng dần</option>
                    <option value="price_desc">Giá giảm dần</option>
                </select>
                <div class="sort-product-icon">
                    <i class="fa fa-sort-alpha-asc"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT LIST -->
    <ul class="row product-list ist-grid">
        <?php
        // The Loop
        if ( $the_query->have_posts() ) {
            while ($the_query->have_posts()) : $the_query->the_post();
                $id = get_the_ID();
                $link = get_the_permalink();
                $price_val = get_field('price');
                $discount = get_field('discount');
                $price_show = calculate_price($price_val, $discount);

                $name = get_the_title();
                $thumbnail_id = get_post_thumbnail_id();
                $gallery = get_field('images');
                $f_img = wp_get_attachment_image_url($thumbnail_id, 'thumbnail-post-hard');
                if (!isset($f_img) || empty($f_img)) {
                    $f_img = $gallery[0]['sizes']['thumbnail-post-hard'];
                }
                $date = get_the_date('d/m/Y');
                ?>
                <li class="col-xs-6 col-sm-4 col-responsive ist-element-item">
                    <div hidden class="ist-price"><?php _e($price_show['new_price']) ?></div>
                    <div hidden class="ist-price-desc"><?php _e($price_show['new_price']) ?></div>
                    <div hidden class="ist-name"><?php _e($name) ?></div>
                    <div hidden class="ist-name-desc"><?php _e($name) ?></div>
                    <div hidden class="ist-date"><?php echo $date?></div>
                    <div hidden class="ist-date-desc"><?php echo $date?></div>
                    <div class="product-container">
                        <div class="product-detail">
                            <?php
                            if ($discount && !empty($discount)) {
                                echo '<div class="flag-discount">';
                                echo '&#45;' . $discount . '&#37; OFF';
                                echo '</div>';
                            }
                            ?>
                            <div class="product-thumbnail">
                                <img class="img-responsive" alt="product" src="<?php echo $f_img ?>"/>
                            </div>
                            <div class="product-info">
                                <div class="price" style="color: <?php _e($c)?>">
                                    <span><?php _e($price_show['new_price']) ?><i>₫</i></span>
                                </div>
                                <div class="wrapper">
                                    <div class="product-name">
                                        <?php _e($name) ?>
                                    </div>
                                    <div class="btn-view-detail">
                                        <a href="<?php _e($link) ?>"
                                           class="hvr-round-corners"><span><?php _e('Xem chi tiết', _TEXT_DOMAIN) ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            endwhile;
        }else{
            echo '<h2 class="no-result">Không có sản phẩm nào!</h2>';
        }
        ?>

    </ul>
    <!-- ./PRODUCT LIST -->
    <!-- ./view-product-list-->
    <div class="sortPagiBar">
        <div class="bottom-pagination">
            <nav>
                <ul class="pagination">
                    <div class="bottom-pagination">
                        <nav>
                            <ul class="pagination">
                                <?php echo paginate_links($args_pagi)?>
                            </ul>
                        </nav>
                    </div>
                </ul>
            </nav>
        </div>
        <div class="sort-product">
            <select class="ist-sort-by-button-group">
                <option value="" disabled selected="selected">Sắp xếp</option>
                <option value="name">A-Z</option>
                <option value="name_desc">Z-A</option>
                <option value="date">Mới nhất</option>
                <option value="date_desc">Cũ nhất</option>
                <option value="price">Giá tăng dần</option>
                <option value="price_desc">Giá giảm dần</option>
            </select>
            <div class="sort-product-icon">
                <i class="fa fa-sort-alpha-asc"></i>
            </div>
        </div>
    </div>
</div>


