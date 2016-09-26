<?php
    get_header();
$current_cate = get_queried_object();
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
                                            <div data-label-reasult="Range:" data-min="10000" data-max="1000000" data-unit="₫" class="slider-range-price" data-value-min="10000" data-value-max="1000000"></div>
                                            <div class="amount-range-price">Range: 10.000₫ - 1.000.000₫</div>
                                            <input type="text" hidden value="10000" name="price-min"/>
                                            <input type="text" hidden value="1000000" name="price-max"/>
                                        </div>
                                    </div>
                                    <!-- ./filter price -->

                                    <!-- filter status -->
                                   <!-- <div class="layered_subtitle"><?php /*_e('Status', _TEXT_DOMAIN)*/?></div>
                                    <div class="layered-content filter-status">
                                        <ul class="check-box-list">
                                            <li>
                                                <input type="checkbox" class="checkbox" id="status-instock" name="status[]" value="instock"/>
                                                <label for="status-instock">
                                                    <span class="button"></span>
                                                    <?php /*_e('Còn hàng', _TEXT_DOMAIN)*/?>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="checkbox" class="checkbox" id="price-outstock" name="status[]" value="outstock"/>
                                                <label for="price-outstock">
                                                    <span class="button"></span>
                                                    <?php /*_e('Hết hàng', _TEXT_DOMAIN)*/?>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="checkbox" class="checkbox" id="price-sch" name="status[]" value="sch"/>
                                                <label for="price-sch">
                                                    <span class="button"></span>
                                                    <?php /*_e('Sắp có hàng', _TEXT_DOMAIN)*/?>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>-->
                                    <!-- ./filter status -->

                                    <!-- filter color -->
                                    <div class="layered_subtitle"><?php _e('Lọc theo ngày', _TEXT_DOMAIN)?></div>
                                    <div class="layered-content filter-date">
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="input-sm form-control" name="start" />
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="input-sm form-control" name="end" />
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