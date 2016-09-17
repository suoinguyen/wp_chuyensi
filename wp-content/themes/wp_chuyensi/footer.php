<!-- Footer -->
<footer id="footer2">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-logo">
                        <a href="#"><img src="<?php echo _SU_THEME_HOST_PATCH?>/assets/data/option5/logo.png" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-sm-6 footer-menu-wrap">
                    <div class="footer-menu">
                        <?php
                        get_menu('footer-menu', 'ft-wrap')
                        ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="footer-social">
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a class="vk" href="#"><i class="fa fa-vk"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer paralax-->
    <div class="footer-paralax">
        <div class="footer-row footer-center">
            <div class="container">
                <h3>Sign up below for early updates</h3>
                <p>You a Client , large or small, and want to participate in this adventure, please send us an email to support@kuteshop.com</p>                 <form class="form-inline form-subscribe">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Your E-mail Address">
                        <button type="submit" class="btn btn-default"><i class="fa fa-paper-plane-o"></i></button>
                    </div>

                </form>
            </div>
        </div>
        <div class="footer-row">
            <div class="container">
                <div class="row">
                    <?php
                    $blocks_info = get_field('blocks_info', 'option');
                    if($blocks_info){
                        foreach ($blocks_info as $item) {
                            $block_title = $item['block_title'];
                            $children_element = $item['children_element'];
                            ?>
                            <div class="col-sm-4">
                                <div class="widget-container">
                                    <h3 class="widget-title"><?php _e($block_title, _TEXT_DOMAIN)?></h3>
                                    <div class="footer-block">
                                        <ul>
                                            <?php
                                            if($children_element){
                                                foreach ($children_element as $item_2){
                                                    echo '<li>';
                                                    echo $item_2['icon']?$item_2['icon']:"<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>";
                                                    if($item_2['link_to']){
                                                        echo '<a target="_blank" href="'.$item_2['link_to'].'">'.$item_2['name'].'</a>';
                                                    }else{
                                                        echo '<a href="javascript:void(0)">'.$item_2['name'].'</a>';
                                                    }
                                                    echo '</li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-wapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="footer-coppyright">
                                Copyright © <?php the_date('Y')?> <strong style="font-style: italic">Chuyensihangthietke</strong>. All Rights Reserved.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./footer paralax-->
</footer>
<!--Back to top-->
<a href="#" class="scroll_top" title="Scroll to Top" style="display: inline;">Scroll</a>

</div>
</body>
</html>
<?php wp_footer()?>