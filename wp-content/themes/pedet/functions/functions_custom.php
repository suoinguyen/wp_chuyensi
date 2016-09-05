<?php
/**
@ Thiết lập hàm hiển thị logo
@ get_logo()
 * %1$s: get_bloginfo( ‘url’ )
 * %2$s: get_bloginfo( ‘description’ )
 * %3$s: get_bloginfo( ‘sitename’ )
 **/
if ( ! function_exists( 'get_logo' ) ) {
    function get_logo() {?>
        <div class="logo">

            <div class="site-name">
                <?php if ( is_home() ) {
                    printf(
                        '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                        get_bloginfo( 'url' ),
                        get_bloginfo( 'description' ),
                        get_bloginfo( 'sitename' )
                    );
                } else {
                    printf(
                        '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
                        get_bloginfo( 'url' ),
                        get_bloginfo( 'description' ),
                        get_bloginfo( 'sitename' )
                    );
                } // endif ?>
            </div>
            <div class="site-description"><?php bloginfo( 'description' ); ?></div>

        </div>
    <?php }
}

/**
@ Thiết lập hàm hiển thị menu
@ get_menu( $slug )
 **/
if ( ! function_exists( 'get_menu' ) ) {
    function get_menu( $slug ) {
        $menu = array(
            'theme_location' => $slug,
            'container' => 'nav',
            'container_class' => $slug,
        );
        wp_nav_menu( $menu );
    }
}

/**
@ Tạo hàm phân trang cho index, archive.
@ Hàm này sẽ hiển thị liên kết phân trang theo dạng chữ: Newer Posts & Older Posts
@ get_pagination()
 **/
if ( ! function_exists( 'get_pagination' ) ) {
    function get_pagination() {
        /*
         * Không hiển thị phân trang nếu trang đó có ít hơn 2 trang
         */
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return '';
        }
        ?>

        <nav class="pagination" role="navigation">
        <?php if ( get_next_post_link() ) : ?>
            <div class="prev"><?php next_posts_link( __('Older Posts', _TEXT_DOMAIN) ); ?></div>
        <?php endif; ?>

        <?php if ( get_previous_post_link() ) : ?>
            <div class="next"><?php previous_posts_link( __('Newer Posts', _TEXT_DOMAIN) ); ?></div>
        <?php endif; ?>

        </nav><?php
    }
}

/**
@ Hàm hiển thị ảnh thumbnail của post.
@ Ảnh thumbnail sẽ không được hiển thị trong trang single
@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
@ get_thumbnail( $size )
 **/
if ( ! function_exists( 'get_thumbnail' ) ) {
    function get_thumbnail( $size ) {
        // Chỉ hiển thumbnail với post không có mật khẩu
        if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) :?>
            <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
        endif;
    }
}