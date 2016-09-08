<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(); ?></title>

    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >
    <div class="option5">
        <!-- HEADER -->
        <div id="header" class="header">
            <div class="top-header">
                <div class="container">
                    <div class="currency ">
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
                                <img alt="email" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/images/fr.jpg" />French

                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><img alt="email" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/images/en.jpg" />English</a></li>
                                <li><a href="#"><img alt="email" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/images/fr.jpg" />French</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="top-bar-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <div class="support-link">
                        <a href="#">Abount Us</a>
                        <a href="#">Support</a>
                    </div>

                    <div id="user-info-top" class="user-info pull-right">
                        <div class="dropdown">
                            <a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span></a>
                            <ul class="dropdown-menu mega_dropdown" role="menu">
                                <li><a href="login.html">Login</a></li>
                                <li><a href="#">Compare</a></li>
                                <li><a href="#">Wishlists</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.top-header -->
            <!-- MAIN HEADER -->
            <div class="container main-header">
                <div class="row">
                    <div class="col-xs-4 col-sm-12 col-md-5 col-lg-4 header-search-box">
                        <form class="form-inline">
                            <div class="form-group input-serach">
                                <input type="text"  placeholder="Keyword here...">
                            </div>
                            <button type="submit" class="pull-right btn-search"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 logo">
                        <a href="index.html"><img alt="Kute shop - GFXFree.Net" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/option5/logo.png" /></a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 group-button-header">
                        <a title="Compare" href="#" class="btn-compare">compare</a>
                        <a title="My wishlist" href="#" class="btn-heart">wishlist</a>
                        <div class="btn-cart" id="cart-block">
                            <a title="My cart" href="cart.html">Cart</a>
                            <span class="notify notify-right">2</span>
                            <div class="cart-block">
                                <div class="cart-block-content">
                                    <h5 class="cart-title">2 Items in my cart</h5>
                                    <div class="cart-block-list">
                                        <ul>
                                            <li class="product-info">
                                                <div class="p-left">
                                                    <a href="#" class="remove_link"></a>
                                                    <a href="#">
                                                        <img class="img-responsive" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/product-100x122.jpg" alt="p10">
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
                                                        <img class="img-responsive" src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/product-s5-100x122.jpg" alt="p10">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MANIN HEADER -->

            <!-- Main menu -->
            <?php get_menu('primary-menu', 'abc')?>
            <?php get_template_part('parts/header/content', 'main-menu')?>
            <!-- End main menu -->
        </div>
        <!-- end header -->