<?php
    get_header();
$current_cate = get_queried_object();

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
                    <!-- block filter -->
                    <div class="block left-module">
                        <p class="title_block"><?php _e('Lọc sản phẩm', _TEXT_DOMAIN)?></p>
                        <div class="block_content">
                            <!-- layered -->
                            <div class="layered layered-filter-price">
                                <!-- filter price -->
                                <form action="" method="GET" id="form-filter-product">
                                    <div class="layered_subtitle"><?php _e('Giá', _TEXT_DOMAIN)?></div>
                                    <div class="layered-content filter-price">
                                        <div class="layered-content slider-range">
                                            <div data-label-reasult="Range:" data-min="10000" data-max="1000000" data-unit="₫" class="slider-range-price" data-value-min="<?php echo $price_min_filter?>" data-value-max="<?php echo $price_max_filter?>"></div>
                                            <div class="amount-range-price">Range: <?php echo number_format($price_min_filter)?>₫ - <?php echo number_format($price_max_filter) ?>₫</div>
                                            <input type="text" hidden value="<?php echo $price_min_filter?>" name="price-min"/>
                                            <input type="text" hidden value="<?php echo $price_max_filter?>" name="price-max"/>
                                        </div>
                                    </div>

                                    <!-- filter Date -->
                                    <div class="layered_subtitle"><?php _e('Lọc theo ngày', _TEXT_DOMAIN)?></div>
                                    <div class="layered-content filter-date">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="start" value="<?php echo $date_from_filter?>" />
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="input-sm form-control" name="end" value="<?php echo $date_to_filter?>"/>
                                        </div>
                                    </div>
                                    <div class="submit-form">
                                        <button class="hvr-float-shadow" type="submit">Lọc</button>
                                    </div>
                                </form>
                            </div>
                            <!-- ./layered -->

                        </div>
                    </div>
                    <!-- ./block filter  -->
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
            <!-- ./row-->
        </div>
    </div>
<?php
    get_footer();
?>