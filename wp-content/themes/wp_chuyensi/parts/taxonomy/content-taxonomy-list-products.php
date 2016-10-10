<?php
/**
 * Created by PhpStorm.
 * User: SuoiNguyen
 * Date: 9/24/2016
 * Time: 11:49 AM
 */
$current_cate = get_queried_object();
$sort = $_REQUEST['sort'];

$valid = array('name', 'name_desc', 'date','date_desc', 'price', 'price_desc');
$meta_key = '';
if($sort){
    if(in_array($sort, $valid)) {
        if($sort == "name" || $sort == "date" || $sort == "price"){
            $order = 'ASC';
        }
        if ($sort == "name_desc" || $sort == "date_desc" || $sort == "price_desc"){
            $order = 'DESC';
        }
        if($sort == "name" || $sort == "name_desc"){
            $order_by = 'title';
        }
        if($sort == "date" || $sort == "date_desc"){
            $order_by = 'date';
        }
        if($sort == "price" || $sort == "price_desc"){
            $order_by = 'meta_value_num';
            $meta_key = 'price';
        }
    }else{
        $order_by = 'date';
        $order = 'DESC';
    }
}else{
    $order_by = 'date';
    $order = 'DESC';
}

$paged = isset($_REQUEST['trang']) ? $_REQUEST['trang'] : 1;
$paged = $paged < 1 ? 1 : $paged;
$posts_per_page = isset($_REQUEST['posts_per_page']) ? (int)$_REQUEST['posts_per_page'] : 15;
$posts_per_page = $posts_per_page < 3 ? 3 : $posts_per_page;

$current_object = get_queried_object();
$terms_child = get_term_children( $current_object->term_id, $current_object->taxonomy );

//Query
$args = array(
    'post_type' => 'products_post_type',
    'meta_key' => $meta_key,
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish',
    'orderby' => $order_by,
    'order' => $order,
    'paged' => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => $current_object->taxonomy,
            'field' => 'id',
            'terms' => array_merge( [$current_object->term_id], $terms_child),
            'include_children' => false,
            'operator' => 'IN'
        )),
);

$the_query = new WP_Query( $args );

$args_pagi = array(
    'format'    => '?trang=%#%',
    'current' => max(1, $paged),
    'total' => $the_query->max_num_pages,
    'show_all' => false,
    'end_size' => 1,
    'mid_size' => 2,
    'prev_next' => true,
    'next_text' => 'Next &raquo;',
    'prev_text' => '&laquo; Prev',
    'type' => 'plain',
    'add_fragment' => '',
    'before_page_number' => '',
    'after_page_number' => '',
);

?>
<form action="" method="get" id="form-sorting">
    <div class="center_column col-xs-12 col-sm-9" id="center_column">
        <!-- view-product-list-->
        <div id="view-product-list" class="view-product-list">
            <h2 class="page-heading">
                <span class="page-heading-title"><?php _e($current_cate->name, _TEXT_DOMAIN)?></span>
            </h2>
            <div class="sortPagiBar">
                <div class="bottom-pagination">
                    <nav>
                        <ul class="pagination">
                            <?php echo paginate_links($args_pagi)?>
                        </ul>
                    </nav>
                </div>
                <div class="sort-product">
                    <select class="ist-sort-by-button-group" name="sort">
                        <option value="" disabled selected="selected">Sắp xếp</option>
                        <option value="name" <?php echo $sort == "name"? "selected" : ""?> >A-Z</option>
                        <option value="name_desc" <?php echo $sort == "name_desc"? "selected" : ""?> >Z-A</option>
                        <option value="date_desc" <?php echo $sort == "date_desc"? "selected" : ""?> >Mới nhất</option>
                        <option value="date" <?php echo $sort == "date"? "selected" : ""?> >Cũ nhất</option>
                        <option value="price" <?php echo $sort == "price"? "selected" : ""?> >Giá tăng dần</option>
                        <option value="price_desc" <?php echo $sort == "price_desc"? "selected" : ""?> >Giá giảm dần</option>
                    </select>
                    <div class="sort-product-icon">
                        <i class="fa fa-sort-alpha-asc"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- PRODUCT LIST -->
        <ul class="row product-list ist-grid">
            <?php
            // The Loop
            if ( $the_query->have_posts() ) {
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
                    <li class="col-xs-6 col-sm-4 col-responsive">
                        <div class="product-container">
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
                                    <div class="price" style="color: <?php _e($c)?>">
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
                        </div>
                    </li>
                    <?php
                endwhile;
            }else{
                echo '<h2 class="no-result">Không có sản phẩm nào!</h2>';
            }
            ?>

        </ul>
        <!-- ./PRODUCT LIST -->
        <!-- ./view-product-list-->
        <div class="sortPagiBar">
            <div class="bottom-pagination">
                <nav>
                    <ul class="pagination">
                        <div class="bottom-pagination">
                            <nav>
                                <ul class="pagination">
                                    <?php echo paginate_links($args_pagi)?>
                                </ul>
                            </nav>
                        </div>
                    </ul>
                </nav>
            </div>
            <div class="sort-product">
                <select class="ist-sort-by-button-group">
                    <option value="" disabled selected="selected">Sắp xếp</option>
                    <option value="name" <?php echo $sort == "name"? "selected" : ""?> >A-Z</option>
                    <option value="name_desc" <?php echo $sort == "name_desc"? "selected" : ""?> >Z-A</option>
                    <option value="date_desc" <?php echo $sort == "date_desc"? "selected" : ""?> >Mới nhất</option>
                    <option value="date" <?php echo $sort == "date"? "selected" : ""?> >Cũ nhất</option>
                    <option value="price" <?php echo $sort == "price"? "selected" : ""?> >Giá tăng dần</option>
                    <option value="price_desc" <?php echo $sort == "price_desc"? "selected" : ""?> >Giá giảm dần</option>
                </select>
                <div class="sort-product-icon">
                    <i class="fa fa-sort-alpha-asc"></i>
                </div>
            </div>
        </div>
    </div>
</form>


