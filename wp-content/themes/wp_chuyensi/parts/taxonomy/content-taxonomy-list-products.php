<?php
/**
 * Created by PhpStorm.
 * User: SuoiNguyen
 * Date: 9/24/2016
 * Time: 11:49 AM
 */
?>
<ul class="row product-list ist-grid">
    <?php
    $price_min = isset($_REQUEST['price-min']) ? $_REQUEST['price-min'] : 0;
    $price_max = isset($_REQUEST['price-max']) ? $_REQUEST['price-max'] : 0;
    $status = isset($_REQUEST['status']) ? $_REQUEST['status'] : 1;
    $date_from = isset($_REQUEST['start']) ? $_REQUEST['start'] : 0;
    $date_to = isset($_REQUEST['end']) ? $_REQUEST['end'] : 0;

    $page = isset($_REQUEST['post_page']) ? (int)$_REQUEST['post_page'] : 1;
    $posts_per_page = isset($_REQUEST['posts_per_page']) ? (int)$_REQUEST['posts_per_page'] : 18;
    $page = $page < 1 ? 1 : $page;
    $posts_per_page = $posts_per_page < 3 ? 3 : $posts_per_page;

    $current_object = get_queried_object();
    $terms_child = get_term_children( $current_object->term_id, $current_object->taxonomy );

    //Query
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
    }else{
        $date_query = array(array(0));
    }

    $args = array(
        'post_type' => 'products_post_type',
        'posts_per_page' => $posts_per_page,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => $current_object->taxonomy,
                'field' => 'id',
                'terms' => array_merge( [$current_object->term_id], $terms_child),
                'include_children' => false,
                'operator' => 'IN'
        )),
        'date_query' => $date_query
    );

    $argsPagi = array(
        'format' => '?post_page=%#%',
        'current' => $page,
        'total' => $args->max_num_pages,
        'show_all' => false,
        'end_size' => 2,
        'mid_size' => 3,
        'prev_next' => true,
        'next_text' => '<i class="fa fa-caret-right"></i>',
        'prev_text' => '<i class="fa fa-caret-left"></i>',
        'type' => 'plain',
        'add_args' => null,
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
    );

    $the_query = new WP_Query( $args );
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
                                       class="hvr-pulse-shrink"><span><?php _e('Xem chi tiết', _TEXT_DOMAIN) ?></span></a>
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

