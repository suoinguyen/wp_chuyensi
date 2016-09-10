<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?><?php if(wp_title('', false)) { echo '-'; } ?> <?php bloginfo('name'); ?></title>

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

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >
    <div class="option5">
        <!-- HEADER -->
        <div id="header" class="header">
            <div class="top-header">
                <div class="container">
                    <!--<div class="currency ">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">USD</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="language ">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                                <img alt="email" src="<?php /*echo _SU_THEME_HOST_PATCH*/?>/assets/images/fr.jpg" />French

                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><img alt="email" src="<?php /*echo _SU_THEME_HOST_PATCH*/?>/assets/images/en.jpg" />English</a></li>
                                <li><a href="#"><img alt="email" src="<?php /*echo _SU_THEME_HOST_PATCH*/?>/assets/images/fr.jpg" />French</a></li>
                            </ul>
                        </div>
                    </div>-->
                    <div class="top-bar-social">
                        <?php
                            $socials = get_field('list_social', 'option');
                            foreach ($socials as $social){
                                echo '<a alt="'.$social['social_link'].'" href="'.$social['social_link'].'">'.$social['social_icon'].'</i></a>';
                            }
                        ?>
                    </div>
                    <div class="support-link">
                        <?php
                            get_menu('header-mini-nav', '');
                        ?>
                    </div>
                    <div id="user-info-top" class="user-info pull-right">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span><?php _e('Tài khoản', _TEXT_DOMAIN)?></span></a>
                            <ul class="dropdown-menu mega_dropdown" role="menu">
                                <li><a href="login.html"><?php _e('Đăng nhập', _TEXT_DOMAIN)?></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--<div id="user-info-top" class="user-info pull-right">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                            <ul class="dropdown-menu mega_dropdown" role="menu">
                                <li><a href="login.html">Login</a></li>
                                <li><a href="#">Compare</a></li>
                                <li><a href="#">Wishlists</a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
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
                            <a href="<?php echo get_permalink(42)?>" class=""><?php _e('Tìm kiếm nâng cao', _TEXT_DOMAIN)?></a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 logo">
                        <a href="<?php home_url()?>"><img alt="Kute shop - GFXFree.Net" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/option5/logo.png" /></a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 group-button-header">
                        <a title="Compare" href="#" class="btn-compare btn-head">compare</a>
                        <a title="My wishlist" href="#" class="btn-heart btn-head">wishlist</a>
                        <div class="btn-cart btn-head" id="cart-block">
                            <a title="My cart" href="#">Cart</a>
                            <!--<span class="notify notify-right">2</span>
                            <div class="cart-block">
                                <div class="cart-block-content">
                                    <h5 class="cart-title">2 Items in my cart</h5>
                                    <div class="cart-block-list">
                                        <ul>
                                            <li class="product-info">
                                                <div class="p-left">
                                                    <a href="#" class="remove_link"></a>
                                                    <a href="#">
                                                        <img class="img-responsive" src="<?php /*echo _SU_THEME_HOST_PATCH*/?>/assets/data/product-100x122.jpg" alt="p10">
                                                    </a>
                                                </div>
                                                <div class="p-right">
                                                    <p class="p-name">Donec Ac Tempus</p>
                                                    <p class="p-rice">61,19 €</p>
                                                    <p>Qty: 1</p>
                                                </div>
                                            </li>
                                            <li class="product-info">
                                                <div class="p-left">
                                                    <a href="#" class="remove_link"></a>
                                                    <a href="#">
                                                        <img class="img-responsive" src="<?php /*echo _SU_THEME_HOST_PATCH*/?>/assets/data/product-s5-100x122.jpg" alt="p10">
                                                    </a>
                                                </div>
                                                <div class="p-right">
                                                    <p class="p-name">Donec Ac Tempus</p>
                                                    <p class="p-rice">61,19 €</p>
                                                    <p>Qty: 1</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="toal-cart">
                                        <span>Total</span>
                                        <span class="toal-price pull-right">122.38 €</span>
                                    </div>
                                    <div class="cart-buttons">
                                        <a href="order.html" class="btn-check-out">Checkout</a>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MANIN HEADER -->

            <!-- Main menu -->
            <?php get_template_part('parts/header/content', 'main-menu')?>
            <!-- End main menu -->
        </div>
        <!-- end header -->