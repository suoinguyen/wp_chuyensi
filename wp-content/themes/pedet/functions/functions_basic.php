<?php
/**
 * Define text domain
 */
define('_TEXT_DOMAIN', 'text_domain');
/**
@ Thiết lập các hằng dữ liệu quan trọng
@ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme
@ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
 **/
define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/core' );

/**
@ Load file /core/init.php
@ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
 **/

require_once( CORE . '/init.php' );

/**
@ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
 **/
if ( ! isset( $content_width ) ) {
    /*
    * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
    */
    $content_width = 620;
}

/**
@ Thiết lập các chức năng sẽ được theme hỗ trợ
 **/
if ( ! function_exists( 'init_theme_setup' ) ) {
    function init_theme_setup() {

        /*
        * Thiết lập theme có thể dịch được
        */
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain( _TEXT_DOMAIN, $language_folder );

        /*
        * Tự chèn RSS Feed links trong <head>
        */
        add_theme_support( 'automatic-feed-links' );

        /*
        * Thêm chức năng post thumbnail
        */
        add_theme_support( 'post-thumbnails' );

        /*
        * Thêm chức năng title-tag để tự thêm <title>
        */
        add_theme_support( 'title-tag' );

        /*
        * Thêm chức năng post format
        */
        add_theme_support( 'post-formats',
            array(
                'image',
                'video',
                'gallery',
                'quote',
                'link'
            )
        );

        /*
        * Thêm chức năng custom background
        */
        $default_background = array(
            'default-color' => '#e8e8e8',
        );
        add_theme_support( 'custom-background', $default_background );
    }
    add_action ( 'init', 'init_theme_setup' );

}

?>