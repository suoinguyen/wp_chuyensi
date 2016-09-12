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

        </div>a
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
<style type="text/css">
    .container-flip {
        width: 200px;
        height: 260px;
        position: relative;
        perspective: 800px;
    }
    .card {
        width: 100%;
        height: 100%;
        position: absolute;
        transform-style: preserve-3d;
        transition: transform 1s;
    }
    .card .figure {
        display: block;
        height: 100%;
        width: 100%;
        line-height: 260px;
        color: white;
        text-align: center;
        font-weight: bold;
        font-size: 140px;
        position: absolute;
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -o-backface-visibility: hidden;
        backface-visibility: hidden;
    }
    .card .front {
        background: red;
    }
    .card .back {
        background: blue;
        transform: rotateY( 180deg );
    }
    .card.flipped {
        transform: rotateY( 180deg );
    }
</style>

<script type="text/javascript">
    jQuery('document').ready(function ($) {
        $('.col-md-3').on('hover', function () {
            $('.card').toggleClass('flipped');
        })
    })
</script>
<section class="container-flip">
    <div class="card">
        <figure class="front">1</figure>
        <figure class="back">2</figure>
    </div>
</section>
<div class="content-page">
    <div class="container">
        <!-- featured category fashion -->
        <?php
            $layout_products = get_field('layout_products');
            if($layout_products){
                foreach ($layout_products as $key => $l){
                $cate = $l['category'];
                $c = $l['color'];
                ?>
                <style type="text/css">
                    .category-featured.cate-<?php echo $cate->slug.$key?> .nav-menu-red li a:hover {
                        background-color: <?php _e($c)?>;
                    }
                    .category-featured.cate-<?php echo $cate->slug.$key?> .navbar-brand a:hover {
                        color: <?php _e($c)?>;
                    }
                    .category-featured.cate-<?php echo $cate->slug.$key?> .collapse.navbar-collapse li.active a {
                        background-color: <?php _e($c)?>;
                    }
                </style>
                <div class="category-featured cate-<?php echo $cate->slug.$key?>">
                    <nav class="navbar nav-menu nav-menu-red show-brand" style="background: <?php _e($c)?>;">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-brand">
                                <a href="<?php _e(get_term_link($cate->term_id))?>">
                                    <img alt="fashion" src="<?php _e($l['icon']['url'])?>"/>
                                    <span><?php _e($cate->name)?></span>
                                </a>
                            </div>
                            <span class="toggle-menu"></span>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li  class="active"><a data-toggle="tab" href="#tab-5">Mới nhất</a></li>
                                    <li><a href="#">Xem nhiều nhất</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                        <div id="elevator-1" class="floor-elevator">
                            <a href="#" class="btn-elevator up disabled fa fa-angle-up"></a>
                            <a href="#elevator-2" class="btn-elevator down fa fa-angle-down"></a>
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

                    <div class="product-featured clearfix">
                        <div class="product-featured-content">
                            <div class="product-list">
                                <div class="tab-container">
                                    <!-- tab product -->
                                    <div class="tab-panel active" id="tab-4">
                                        <ul class="product-list">
                                            <li class="col-md-3">
                                                <section class="container-flip">
                                                    <div class="card">
                                                        <div class="front figure">
                                                            <div class="left-block">
                                                                <a href="#">
                                                                    <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" /></a>
                                                                <div class="quick-view">
                                                                    <a title="Add to my wishlist" class="heart" href="#"></a>
                                                                    <a title="Add to compare" class="compare" href="#"></a>
                                                                    <a title="Quick view" class="search" href="#"></a>
                                                                </div>
                                                                <div class="add-to-cart">
                                                                    <a title="Add to Cart" href="#">Add to Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="back figure">
                                                            <div class="right-block">
                                                                <h5 class="product-name"><a href="#">Yellow Dress</a></h5>
                                                                <div class="content_price">
                                                                    <span class="price product-price">$38,95</span>
                                                                    <span class="price old-price">$52,00</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>


                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Yellow Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/03_cyan-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Cyan Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/04_nice-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Nice Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/05_flowers-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Flowers Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/06_red-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Red Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- tab product -->
                                    <!-- tab product -->
                                    <div class="tab-panel active" id="tab-4">
                                        <ul class="product-list">
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/01_blue-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Blue Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Yellow Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/03_cyan-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Cyan Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/04_nice-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Nice Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/05_flowers-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Flowers Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                            <li class="col-md-3">
                                                <div class="left-block">
                                                    <a href="#">
                                                        <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/06_red-dress.jpg" /></a>
                                                    <div class="quick-view">
                                                        <a title="Add to my wishlist" class="heart" href="#"></a>
                                                        <a title="Add to compare" class="compare" href="#"></a>
                                                        <a title="Quick view" class="search" href="#"></a>
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <a title="Add to Cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 class="product-name"><a href="#">Red Dress</a></h5>
                                                    <div class="content_price">
                                                        <span class="price product-price">$38,95</span>
                                                        <span class="price old-price">$52,00</span>
                                                    </div>

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- tab product -->
                                </div>

                            </div>
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
