<?php
if (!function_exists('template_scripts')) {
    /**
     * Enqueue scripts and styles.
     */
    function template_scripts()
    {
        #CSS
        wp_enqueue_style('bootstrap', _SU_THEME_HOST_PATCH . '/assets/lib/bootstrap/css/bootstrap.min.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('font-awesome', _SU_THEME_HOST_PATCH . '/assets/lib/font-awesome/css/font-awesome.min.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('select2', _SU_THEME_HOST_PATCH . '/assets/lib/select2/css/select2.min.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('bx-slider', _SU_THEME_HOST_PATCH . '/assets/lib/jquery.bxslider/jquery.bxslider.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('carousel', _SU_THEME_HOST_PATCH . '/assets/lib/owl.carousel/owl.carousel.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('jquery', _SU_THEME_HOST_PATCH . '/assets/lib/jquery-ui/jquery-ui.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('jquery-ui', _SU_THEME_HOST_PATCH . '/assets/css/animate.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('reset-css', _SU_THEME_HOST_PATCH . '/assets/css/reset.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('style-css', _SU_THEME_HOST_PATCH . '/assets/css/style.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('responsive', _SU_THEME_HOST_PATCH . '/assets/css/responsive.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('option-5', _SU_THEME_HOST_PATCH . '/assets/css/option5.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('main-css', _SU_THEME_HOST_PATCH . '/assets/css/main.css', array(), _SU_THEME_VERSION);
        wp_enqueue_style('hover-css', _SU_THEME_HOST_PATCH . '/assets/css/hover-css.css', array(), _SU_THEME_VERSION);

        #JS
        wp_enqueue_script('js-1.1.2',  _SU_THEME_HOST_PATCH . '/assets/lib/jquery/jquery-1.11.2.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('bootstrap-js',  _SU_THEME_HOST_PATCH . '/assets/lib/bootstrap/js/bootstrap.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('select-2-js',  _SU_THEME_HOST_PATCH . '/assets/lib/select2/js/select2.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('bx-slider-js',  _SU_THEME_HOST_PATCH . '/assets/lib/jquery.bxslider/jquery.bxslider.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('carousel-js',  _SU_THEME_HOST_PATCH . '/assets/lib/owl.carousel/owl.carousel.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('jquery-plugin-js',  _SU_THEME_HOST_PATCH . '/assets/lib/countdown/jquery.plugin.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('jquery-actual-js',  _SU_THEME_HOST_PATCH . '/assets/js/jquery.actual.min.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('theme-script',  _SU_THEME_HOST_PATCH . '/assets/js/theme-script.js', array(), _SU_THEME_VERSION, true);

        //Always after all
        wp_enqueue_script('libs-js-custom',  _SU_THEME_HOST_PATCH . '/assets/js/libs-js-custom.js', array(), _SU_THEME_VERSION, true);
        wp_enqueue_script('main-script',  _SU_THEME_HOST_PATCH . '/assets/js/main.js', array(), _SU_THEME_VERSION, true);

        # js for threaded comments
        if ( is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'template_scripts');