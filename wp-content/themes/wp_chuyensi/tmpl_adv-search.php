<?php
/**
 * Template Name: Search advanced
 * Author: SuoiNguyen
 */

get_header();
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
            <div class="search-container">
                <?php echo do_shortcode("[wd_asp elements='search,settings,results' ratio='100%,100%,100%' id=1]");?>
            </div>
            <!-- ./row-->
        </div>
    </div>
<?php

get_footer();
?>