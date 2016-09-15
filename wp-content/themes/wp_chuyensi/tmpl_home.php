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
        <?php get_template_part('parts/home/content', 'home-list-products')?>

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
