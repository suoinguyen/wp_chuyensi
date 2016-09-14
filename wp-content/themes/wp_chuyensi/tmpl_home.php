<?php
/**
 * Template Name: Trang chủ
 * Author: SuoiNguyen
 */

get_header();
?>

<!-- Home slider-->
<?php get_template_part('parts/home/content', 'home-slider')?>
<!-- END Home slider-->

<div class="page-top">
    <div class="container">
        <div class="row">

            <!-- Hot products -->
            <?php get_template_part('parts/home/content', 'home-hot-products')?>
            <!-- End Hot products -->

        </div>
        <!-- Banner bottom -->
        <div class="row banner-bottom">
            <?php
                $banners = get_field('list_banners');
                if($banners){
                    foreach ($banners as $key => $banner){
                        ?>
                        <div class="col-sm-6 <?php echo $key == 0 ? 'item-left' : 'item-right'?>">
                            <div class="banner-boder-zoom">
                                <a href="<?php echo $banner['link'] ? $banner['link'] : '#' ?>">
                                    <img alt="ads" class="img-responsive" src="<?php echo $banner['image']['url']?>" />
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
        <!-- end banner bottom -->
    </div>
</div>
<!---->
<div class="content-page">
    <div class="container">
        <!-- featured category fashion -->
        <?php
            $layout_products = get_field('layout_products');
            if($layout_products){
                foreach ($layout_products as $key => $l){
                    $cate = $l['category'];
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
                                        <img alt="fashion" src="<?php _e($l['icon']['url'])?>"/>
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
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                            <div id="elevator-<?php _e($key)?>" class="floor-elevator">
                                <a href="<?php echo $key-1<0?'#':'#elevator-'.($key-1) ?>" class="btn-elevator up fa fa-angle-up <?php echo $key-1<0?'disabled':'' ?>"></a>
                                <a href="#elevator-<?php _e($key + 1)?>" class="btn-elevator down fa fa-angle-down"></a>
                            </div>
                        </nav>

                        <div class="category-banner">
                            <div class="col-sm-6 banner">
                                <a href="#"><img alt="ads2" class="img-responsive" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/ads2.jpg" /></a>
                            </div>
                            <div class="col-sm-6 banner">
                                <a href="#"><img alt="ads2" class="img-responsive" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/ads3.jpg" /></a>
                            </div>
                        </div>

                        <div class="product-list-wrap">
                            <div class="tab-container tab-content">

                                <!-- tab product -->
                                <div role="tabpanel" class="tab-panel fade active" id="newest-<?php _e($term_slug)?>">
                                    <ul class="product-wrap">
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
                                        if ( $the_query->have_posts() ) :
                                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                                $id = get_the_ID();
                                                $link = get_the_permalink();
                                                $price = get_field('price');
                                                $name = get_the_title();
                                                $thumbnail_id = get_post_thumbnail_id();
                                                $gallery = get_field('images');
                                                $f_img = wp_get_attachment_image_url($thumbnail_id, 'thumbnail-post-hard');
                                                if(!isset($f_img) || empty($f_img)){
                                                    $f_img = $gallery[0]['sizes']['thumbnail-post-hard'];
                                                }
                                                ?>
                                                <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                                    <div class="product-detail">
                                                        <img class="img-responsive" alt="product" src="<?php echo $f_img?>" />
                                                        <div class="price" style="color: <?php _e($c)?>">
                                                            <span><?php _e($price)?>.000 <i>₫</i></span>
                                                        </div>
                                                        <div class="product-info element-centeral">
                                                            <div class="product-name">
                                                                <?php _e($name)?>
                                                            </div>
                                                            <div class="btn-view-detail">
                                                                <a href="<?php _e($link)?>" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span><?php _e('Xem chi tiết', _TEXT_DOMAIN)?></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php
                                            endwhile;
                                        endif;
                                        // Reset Post Data
                                        wp_reset_postdata();
                                        ?>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-panel fade" id="view-<?php _e($term_slug)?>">
                                    <ul class="product-wrap">
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>70000 <i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>7.000 <i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>7.000 <i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>7.000 <i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>70000 <i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>7.000 <i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>7.000 <i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>7.000 <i>₫</i></span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#" style="background-color: <?php _e($c)?>" class="hvr-wobble-horizontal"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
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

        <!-- end featured category fashion -->

        <!-- Baner bottom -->
        <div class="row banner-bottom">
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/ads17.jpg" /></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="banner-boder-zoom">
                    <a href="#"><img alt="ads" class="img-responsive" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/ads18.jpg" /></a>
                </div>
            </div>
        </div>
        <!-- end banner bottom -->
    </div>
</div>

<?php get_footer(); ?>
