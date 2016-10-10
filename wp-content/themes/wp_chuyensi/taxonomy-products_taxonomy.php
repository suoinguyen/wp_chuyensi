<?php
    get_header();
$current_object = get_queried_object();

$date_from_filter = $_REQUEST['start'];

$date_to_filter = $_REQUEST['end'];


$price_min_filter = $_REQUEST['price-min'];
$price_min_filter = !$price_min_filter || empty($price_min_filter) ?'10000':$price_min_filter;

$price_max_filter = $_REQUEST['price-max'];
$price_max_filter = !$price_max_filter || empty($price_max_filter) ?'1000000':$price_max_filter;

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
                <!-- Left colunm -->
                <div class="col-md-12">
                    <!-- category-slider -->
                    <div class="category-slider">
                        <ul class="owl-carousel owl-style2" data-dots="false" data-loop="false" data-nav = "true" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-items="1">
                            <?php
                            $variable = get_field('field_name', $current_object->term_id);
                            ?>
                            <?php
                            $variable = get_field('list_banner',$current_object );
                            if($variable){
                                foreach ($variable as $item){
                                    ?>
                                    <li>
                                        <img src="<?php echo $item['url']?>" alt="category-slider">
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- ./category-slider -->
                </div>
                <div class="content-wrapper">
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
                                <div class="tags">
                                    <a href="#"><span class="level1">actual</span></a>
                                    <a href="#"><span class="level2">adorable</span></a>
                                    <a href="#"><span class="level3">change</span></a>
                                    <a href="#"><span class="level4">consider</span></a>
                                    <a href="#"><span class="level3">phenomenon</span></a>
                                    <a href="#"><span class="level4">span</span></a>
                                    <a href="#"><span class="level1">spanegs</span></a>
                                    <a href="#"><span class="level5">spanegs</span></a>
                                    <a href="#"><span class="level1">actual</span></a>
                                    <a href="#"><span class="level2">adorable</span></a>
                                    <a href="#"><span class="level3">change</span></a>
                                    <a href="#"><span class="level4">consider</span></a>
                                    <a href="#"><span class="level2">gives</span></a>
                                    <a href="#"><span class="level3">change</span></a>
                                    <a href="#"><span class="level2">gives</span></a>
                                    <a href="#"><span class="level1">good</span></a>
                                    <a href="#"><span class="level3">phenomenon</span></a>
                                    <a href="#"><span class="level4">span</span></a>
                                    <a href="#"><span class="level1">spanegs</span></a>
                                    <a href="#"><span class="level5">spanegs</span></a>
                                </div>
                            </div>
                        </div>
                        <!-- ./TAGS -->
                    </div>
                    <!-- ./left colunm -->
                    <!-- Center colunm-->
                    <?php get_template_part('parts/taxonomy/content', 'taxonomy-list-products')?>
                    <!-- ./ Center colunm -->
                </div>
            </div>
            <!-- ./row-->
        </div>
    </div>
<?php
    get_footer();
?>