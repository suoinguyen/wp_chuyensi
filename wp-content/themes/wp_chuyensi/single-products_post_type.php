<?php
#set post view count
setPostViews(get_the_ID());

the_post();

get_header();


$id = get_the_ID();
$link = get_the_permalink();
$price_val = get_field('price');
$discount = get_field('discount');
$price_show = calculate_price($price_val, $discount);
$name = get_the_title();
$thumbnail_id = get_post_thumbnail_id();
$gallery = get_field('images');
$status = get_field('status');
$date = get_the_date('d/m/Y');
$size = get_field('size');
?>

    <div class="columns-container">
        <div class="container" id="columns">
            <!-- breadcrumb -->
            <div class="breadcrumb clearfix">
                <?php
                if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                }
                ?>
            </div>
            <!-- ./breadcrumb -->
            <!-- row -->
            <div class="row">
                <span id="nav-button-push"></span>
                <div class="column col-xs-12 col-sm-3" id="left_column">
                    <!-- block category -->
                    <div class="block left-module">
                        <p class="title_block"><?php _e('Danh mục sản phẩm', _TEXT_DOMAIN)?></p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-category">
                                <div class="layered-content">
                                    <ul class="tree-menu-1">
                                        <?php
                                        $cate = get_categories(array(
                                            'taxonomy'=>'products_taxonomy',
                                            'hide_empty'   => 0,
                                        ));
                                        dropdown_cat($cate);
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- ./layered -->
                        </div>
                    </div>
                    <!-- ./block category  -->

                    <!-- TAGS -->
                    <div class="block left-module">
                        <p class="title_block">TAGS</p>
                        <div class="block_content">
                            <?php list_tag()?>
                        </div>
                    </div>
                    <!-- ./TAGS -->
                </div>
                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
                    <!-- Product -->
                    <div id="product">
                        <div class="primary-box row">
                            <div class="pb-left-column col-xs-12 col-sm-5">
                                <!-- product-imge-->
                                <div class="product-image">
                                    <div id="gallery-1" class="royalSlider rsDefault">
                                        <?php
                                        foreach ($gallery as $item){
                                            ?>
                                            <a class="rsImg" data-rsw="auto" data-rsh="auto" data-rsbigimg="<?php echo $item['sizes']['medium_large'] ?>" href="<?php echo $item['sizes']['medium_large'] ?>">
                                                <img width="" height="" class="rsTmb" src="<?php echo $item['sizes']['thumbnail'] ?>">
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- product-imge-->
                            </div>
                            <div class="pb-right-column col-xs-12 col-sm-7">
                                <h1 class="product-name"><?php echo $name?></h1>
                                <div class="product-price-group">
                                    <span class="price"><?php echo $price_show['new_price']?><i>₫</i></span>
                                    <?php if($discount && $discount > 0){
                                       ?><span class="old-price"><?php echo $price_show['old_price']?><i>₫</i></span>
                                        <span class="discount"><i>-</i><?php echo $discount?><i>%</i></span><?php
                                    }?>

                                </div>
                                <div class="info-orther">
                                    <p><?php _e('Status: ', _TEXT_DOMAIN)?><span class="in-stock"><strong><?php echo empty($status)?'Còn hàng':$status['label']?></strong></span></p>
                                </div>
                                <div class="form-option">
                                    <p class="form-option-title"><?php _e('Tùy chọn:', _TEXT_DOMAIN)?></p>
                                    <div class="attributes">
                                        <div class="attribute-label"><?php _e('Màu: ', _TEXT_DOMAIN)?></div>
                                        <div class="attribute-list">
                                                <?php echo get_field('custom-color')?>
                                        </div>
                                    </div>
                                    <div class="attributes">
                                        <div class="attribute-label"><?php _e('Số lượng: ', _TEXT_DOMAIN)?></div>
                                        <div class="attribute-list product-qty">
                                            <div class="qty">
                                                <input id="option-product-qty" type="text" value="1">
                                            </div>
                                            <div class="btn-plus">
                                                <a href="#" class="btn-plus-up">
                                                    <i class="fa fa-caret-up"></i>
                                                </a>
                                                <a href="#" class="btn-plus-down">
                                                    <i class="fa fa-caret-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="attributes">
                                        <div class="attribute-label">Size:</div>
                                        <div class="attribute-list">
                                            <?php echo !$size || empty($size) ? 'free-size' : $size?>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-action">
                                    <div class="button-group">
                                        <a class="btn-add-cart" href="#">Add to cart</a>
                                    </div>
                                    <div class="button-group">
                                        <div class="fb-send" data-size="large" data-href="<?php echo $link?>"></div>
                                        <div class="fb-like" data-href="<?php echo $link?>" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab product -->
                        <div class="product-tab">
                            <ul class="nav-tab">
                                <li class="active">
                                    <a aria-expanded="false" data-toggle="tab" href="#over-view"><?php _e('Mô tả', _TEXT_DOMAIN)?></a>
                                </li>
                                <li>
                                    <a aria-expanded="true" data-toggle="tab" href="#comment"><?php _e('Comment', _TEXT_DOMAIN)?></a>
                                </li>
                            </ul>
                            <div class="tab-container">
                                <div id="over-view" class="tab-panel active fade ">
                                    <?php echo get_field('product-info-detail')?get_field('product-info-detail'): '<h4>Hiện tại chưa có mô tả nào!</h4>'?>
                                </div>
                                <div id="comment" class="tab-panel fade ">
                                    <div class="fb-comments" data-href="<?php echo $link?>" data-width="100%" data-numposts="5"></div>
                                </div>
                            </div>
                        </div>
                        <!-- ./tab product -->
                        <!-- box product -->
                        <?php
                        $cates = get_the_terms($id, 'products_taxonomy');
                        $cate = array();
                        if($cates){
                            foreach ($cates as $item){
                                $cate[] = $item->term_id;
                            }
                        }
                        $args = array(
                            'post_type' => 'products_post_type',
                            'posts_per_page' => 8,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post__not_in' => array(get_the_ID()),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'products_taxonomy',
                                    'field' => 'id',
                                    'terms' => $cate,
                                    'include_children' => false,
                                    'operator' => 'IN'
                                )),
                        );

                        $the_query = new WP_Query( $args );
                        // The Loop
                        if ( $the_query->have_posts() ) {
                            ?>
                            <div class="page-product-box products-relate">
                                <h3 class="heading"><?php _e('Sản phẩm liên quan ', _TEXT_DOMAIN)?></h3>
                                <ul class="product-list owl-carousel" data-dots="false" data-loop="false" data-nav = "true" data-margin = "30" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                                <?php
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
                                    <li class="product-container">
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
                                                <div class="price">
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
                                    </li>
                                    <?php
                                endwhile;
                                ?>
                                </ul>
                            </div>
                        <?php
                        }
                        ?>
                        <!-- ./box product -->
                    </div>
                    <!-- Product -->
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </div>

<?php get_footer(); ?>