<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
    <!-- detect page type -->

    <!-- Slide show Royal slider-->
    <script type="text/javascript">
        <?php
        if(is_single()){
            $page_type = 'single';
        }else{
            $page_type = null;
        }
        ?>
        var page_type = '<?php echo $page_type?>';
    </script>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />

    <!-- Meta facebook -->
    <?php
    if(is_single()){
        $gallery = get_field('images');
        ?>
        <meta property="og:description"   content="Your description" />
        <meta property="og:image"         content="<?php echo $gallery['0']['sizes']['thumbnail-post-hard']?>" />
        <?php
    }
    ?>

    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--    favicon-->
    <link rel="shortcut icon" href="<?php echo get_field('favicon', 'option') ?>" type="image/x-icon"/>

    <!-- iOS stuffs -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="apple-touch-icon" href="<?php echo get_field('ios_icon_iphone', 'option') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_field('ios_icon_iphone_ipad', 'option') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_field('ios_icon_iphone_retina', 'option') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_field('ios_icon_ipad_retina', 'option') ?>">

    <!-- Font google Open San -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i&subset=vietnamese" rel="stylesheet">
    <?php if(is_page_template()){
        if (get_the_ID() == 36){

            # Google map Key
            echo '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxjAxbyZpC3NnEJLOXbkKp9EGY1sl7h2I"></script>';

        }
    }
    if(is_single()){
        # API Facebook
        echo get_field('facebook_sdk', 'option');
    }
    ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
    
    <div class="option5">
        <!-- HEADER -->
        <div id="header" class="header">
            <div class="top-header">
                <div class="container hidden-button">
                    <div class="top-bar-social">
                        <?php
                            $socials = get_field('list_social', 'option');
                            foreach ($socials as $social){
                                echo '<a target="_blank" title="'.$social['social_link'].'" href="'.$social['social_link'].'">'.$social['social_icon'].'</i></a>';
                            }
                        ?>
                    </div>
                    <div class="support-link">
                        <?php
                            get_menu('header-mini-nav', '');
                        ?>
                    </div>
                </div>
                <span class="button-toggle"></span>
            </div>
            <!--/.top-header -->
            <!-- MAIN HEADER -->
            <div class="container main-header">
                <div class="row">
                    <div class="col-xs-4 col-sm-12 col-md-5 col-lg-4 header-search-box">
                       <form class="search-form form-inline" action="<?php echo get_home_url() ?>" method="GET">
                        <?php $s = isset($_REQUEST['s']) ? $_REQUEST['s'] : ''; ?>
                            <div class="form-group input-serach">
                            <input type="text" value="<?php echo $s ?>" name="s"
                                       placeholder="<?php _e('Nhập tên sản phẫm...', _TEXT_DOMAIN) ?>"/>
                            </div>
                            <button type="submit" class="pull-right btn-search"><i class="fa fa-search"></i></button>
                        </form>
                        <div class="advanced-search">
                            <i class="fa fa-search-plus" aria-hidden="true"></i>
                            <a title="Tìm kiếm nâng cao" href="<?php echo get_permalink(42)?>" class=""><?php _e('Tìm kiếm nâng cao', _TEXT_DOMAIN)?></a>
                        </div>
                    </div>
                    
                    <!--Logo-->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 logo">
                        <a title="Trang chủ" href="<?php echo get_home_url()?>"><img alt="Kute shop - GFXFree.Net" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/images/logo_10.png" /></a>
                        <?php if(is_front_page())echo'<h1 hidden>'.get_bloginfo( 'description' ).' - '.get_bloginfo( 'sitename' ).'</h1>'?>
                    </div>
                </div>
            </div>
            <!-- END MANIN HEADER -->

            <!-- Main menu -->
            <?php get_template_part('parts/header/content', 'main-menu')?>
            <!-- End main menu -->
        </div>
        <!-- end header -->