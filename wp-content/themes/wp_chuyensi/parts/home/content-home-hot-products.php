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
                    $id = get_the_ID();
                    $price = (float)get_field('price');
                    $discount = get_field('discount');
                    $price_show = calculate_price($price, $discount);
                    var_dump($price_show);
                    $name = get_the_title();
                    $thumbnail_id = get_post_thumbnail_id();
                    $gallery = get_field('images');
                    $f_img = wp_get_attachment_image_url($thumbnail_id, 'thumbnail-post-hard');
                    if(!isset($f_img) || empty($f_img)){
                        $f_img = $gallery[0]['sizes']['thumbnail-post-hard'];
                    }
                   ?>
                    <li>
                        <div class="left-block">
                            <img class="img-responsive" alt="product" src="<?php echo $f_img?>" />
                            <div class="detail-info">
                                <p><?php the_title()?></p>
                            </div>
                            <div class="btn-detail-view">
                                <a title="" href="<?php echo $l ?>"><?php _e('Xem chi tiết', _TEXT_DOMAIN)?></a>
                            </div>
                            <?php
                            var_dump(calculate_price(99, 30));
                                if($discount && !empty($discount)){
                                    echo '<div class="price-percent-reduction2">';
                                    echo '&#45;'.$discount.'&#37; OFF';
                                    echo '</div>';
                                }
                            ?>

                        </div>
                        <div class="right-block">
                            <div class="content_price">
                                <span class="price product-price"><?php _e($price_show)?>.000<i>₫</i></span>
                                <span class="price old-price"><?php _e($price)?>.000<i>₫</i></span>
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
