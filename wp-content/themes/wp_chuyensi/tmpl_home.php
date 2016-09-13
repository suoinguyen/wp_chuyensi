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

                        <div class="product-list-wrap">
                            <div class="tab-container">
                                <!-- tab product -->
                                <div class="tab-panel active" id="tab-4">
                                    <ul class="product-wrap">
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>60.000</span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test product name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <a href="#"><span style="background-color: <?php _e($c)?>">Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                    <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>60.000</span>
                                                </div>
                                                <div class="product-info element-centeral">
                                                    <div class="product-name">
                                                        Test proddddddddddddddddddd dsssssssss dsdsdsdsd dsdsdsd
                                                        duct name
                                                    </div>
                                                    <div class="btn-view-detail">
                                                        <span>Xem chi tiết</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <a href="#">
                                                    <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                </a>
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>60.000</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <a href="#">
                                                    <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                </a>
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>60.000</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <a href="#">
                                                    <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                </a>
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>60.000</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <a href="#">
                                                    <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                </a>
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>60.000</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <a href="#">
                                                    <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                </a>
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>60.000</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="col-xs-6 col-sm-4 col-md-3 product-border">
                                            <div class="product-detail">
                                                <a href="#">
                                                    <img class="img-responsive" alt="product" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/02_yellow-dress.jpg" />
                                                </a>
                                                <div class="price" style="color: <?php _e($c)?>">
                                                    <span>60.000</span>
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
