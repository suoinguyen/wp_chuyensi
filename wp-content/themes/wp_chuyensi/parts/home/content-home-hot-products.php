<?php
/**
 * Created by PhpStorm.
 * User: SuoiNguyen
 * Date: 9/10/2016
 * Time: 11:34 PM
 */
?>
<div class="col-xs-12 col-sm-12">
    <h2 class="page-heading">
        <span class="page-heading-title"><?php _e('SẢN PHẪM HOT NHẤT',_TEXT_DOMAIN)?></span>
    </h2>
    <div class="latest-deals-product">
        <ul class="product-list owl-carousel" data-dots="false" data-loop="true" data-nav = "true" data-margin = "10" data-autoplayTimeout="1000" data-autoplayHoverPause = "true" data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":5}}'>
            <?php
            $args = array(
                'post_type' => 'products_post_type',
                'posts_per_page' => 10,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $l = get_the_permalink();
                   ?>
                    <li>
                        <div class="left-block">
                            <a href="<?php echo $l?>">
                                <img class="img-responsive" alt="product" src="<?php echo get_the_post_thumbnail_url()?>" />
                            </a>
                            <div class="detail-info">
                                <p><?php the_title()?></p>
                            </div>
                            <div class="quick-view">
                                <a title="Add to my wishlist" class="heart" href="#"></a>
                                <a title="Add to compare" class="compare" href="#"></a>
                                <a title="Quick view" class="search" href="#"></a>
                            </div>
                            <div class="add-to-cart">
                                <a title="Add to Cart" href="#"><?php _e('Thêm vào giỏ hàng', _TEXT_DOMAIN)?></a>
                            </div>
                            <!--<div class="price-percent-reduction2">
                                -30% OFF
                            </div>-->
                        </div>
                        <div class="right-block">
                            <div class="content_price">
                                <span class="price product-price">$38,95</span>
                                <span class="price old-price">$52,00</span>
                            </div>
                        </div>
                    </li>

                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </ul>
    </div>
</div>
