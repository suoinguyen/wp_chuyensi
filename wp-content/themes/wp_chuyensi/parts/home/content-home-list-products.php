
<?php

$layout_products = get_field('layout_products');
if($layout_products){
    foreach ($layout_products as $key => $l){
        $cate = $l['category'];
        $banners = $l['banner'];
        $term_id = $cate->term_id;
        $term_slug = $cate->slug;
        $c = $l['color'];
        $terms_child = get_term_children( $term_id, $cate->taxonomy );
        ?>
        <style type="text/css">
            .category-featured.cate-<?php echo $term_slug.$key?> .nav-menu-red li a:hover {
                background-color: <?php _e($c)?>;
            }
            .category-featured.cate-<?php echo $term_slug.$key?> .navbar-brand a:hover {
                color: <?php _e($c)?>;
            }
            .category-featured.cate-<?php echo $term_slug.$key?> .collapse.navbar-collapse li.active a {
                background-color: <?php _e($c)?>;
            }
        </style>
        <div class="category-featured cate-<?php echo $term_slug.$key?>">
            <nav class="navbar nav-menu nav-menu-red show-brand" style="background: <?php _e($c)?>;">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-brand">
                        <a href="<?php _e(get_term_link($term_id))?>">
                            <?php
                            if($l['icon']){
                                echo '<img alt="fashion" src="'.$l['icon']['url'].'"/>';
                            }
                            ?>

                            <span><?php _e($cate->name)?></span>
                        </a>
                    </div>
                    <span class="toggle-menu"></span>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav" role="tablist">
                            <li role="presentation"  class="active" >
                                <a href="#newest-<?php _e($term_slug)?>" aria-controls="newest-<?php _e($term_slug)?>" role="tab" data-toggle="tab"><?php _e('Mới nhất')?></a>
                            </li>
                            <li role="presentation">
                                <a href="#view-<?php _e($term_slug)?>" aria-controls="view-<?php _e($term_slug)?>" role="tab" data-toggle="tab"><?php _e('Xem nhiều nhất')?></a>
                            </li>
                            <li role="presentation">
                                <a href="<?php echo get_term_link($term_id)?>"><?php _e('Xem tất cả')?></a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
                <div id="elevator-<?php _e($key)?>" class="floor-elevator">
                    <a href="<?php echo $key-1<0?'#':'#elevator-'.($key-1) ?>" class="btn-elevator up fa fa-angle-up <?php echo $key-1<0?'disabled':'' ?>"></a>
                    <a href="#elevator-<?php _e($key + 1)?>" class="btn-elevator down fa fa-angle-down"></a>
                </div>
            </nav>
            <div class="product-list-wrap" data-liffect="zoomOut">
                <div class="tab-container tab-content">

                    <!-- tab product -->
                    <div role="tabpanel" class="tab-panel fade active" id="newest-<?php _e($term_slug)?>">
                        <ul class="product-wrap home-product-wrap">
                            <?php
                            $args_newest = array(
                                'post_type' => 'products_post_type',
                                'posts_per_page' => 8,
                                'post_status' => 'publish',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'products_taxonomy',
                                        'field' => 'id',
                                        'terms' => array_merge( [$term_id], $terms_child),
                                        'include_children' => false,
                                        'operator' => 'IN'
                                    )),
                            );

                            $the_query = new WP_Query( $args_newest );
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
                                    ?>
                                    <li class="col-xs-6 col-sm-3 col-md-3 product-border" data-liffect="zoomOut">
                                        <div class="product-detail ele-child-effect">
                                            <?php
                                            if ($discount && !empty($discount)) {
                                                echo '<div class="flag-discount">';
                                                echo '&#45;' . $discount . '&#37; OFF';
                                                echo '</div>';
                                            }
                                            ?>
                                            <img class="img-responsive" alt="product" src="<?php echo $f_img ?>"/>
                                            <div class="price" style="color: <?php _e($c) ?>">
                                                <span><?php _e($price_show['new_price']) ?><i>₫</i></span>
                                            </div>
                                            <div class="product-info element-centeral">
                                                <div class="product-name">
                                                    <?php _e($name) ?>
                                                </div>
                                                <div class="btn-view-detail">
                                                    <a href="<?php _e($link) ?>"
                                                       style="background-color: <?php _e($c) ?>"
                                                       class="hvr-wobble-horizontal"><span><?php _e('Xem chi tiết', _TEXT_DOMAIN) ?></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                endwhile;
                            }else{
                                echo '<h2 class="no-result">Không có sản phẩm nào!</h2>';
                            }
                            // Reset Post Data
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-panel fade" id="view-<?php _e($term_slug)?>">
                            <ul class="product-wrap home-product-wrap">
                                <?php
                                $args_newest = array(
                                    'post_type' => 'products_post_type',
                                    'posts_per_page' => 8,
                                    'post_status' => 'publish',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'products_taxonomy',
                                            'field' => 'id',
                                            'terms' => array_merge( [$term_id], $terms_child),
                                            'include_children' => false,
                                            'operator' => 'IN'
                                        )),
                                    'meta_key' => 'post_views_count',
                                );

                                $the_query = new WP_Query( $args_newest );
//                                die('Method: '.__METHOD__);
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
                                        ?>
                                        <li class="col-xs-6 col-sm-3 col-md-3 product-border" data-liffect="zoomOut">
                                            <div class="product-detail ele-child-effect">
                                                <?php
                                                if ($discount && !empty($discount)) {
                                                    echo '<div class="flag-discount">';
                                                    echo '&#45;' . $discount . '&#37; OFF';
                                                    echo '</div>';
                                                }
                                                ?>
                                                <img class="img-responsive" alt="product" src="<?php echo $f_img ?>"/>
                                                <div class="price" style="color: <?php _e($c) ?>">
                                                    <span><?php _e($price_show['new_price']) ?><i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        <?php _e($name) ?>
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="<?php _e($link) ?>"
                                                           style="background-color: <?php _e($c) ?>"
                                                           class="hvr-wobble-horizontal"><span><?php _e('Xem chi tiết', _TEXT_DOMAIN) ?></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    endwhile;
                                }else{
                                    echo '<h2 class="no-result">Không có sản phẩm nào!</h2>';
                                }
                                // Reset Post Data
                                wp_reset_postdata();
                                ?>
                            </ul>
                        </div>
                    <!-- tab product -->
                </div>
            </div>
        </div>
        <?php
    }
}
?>