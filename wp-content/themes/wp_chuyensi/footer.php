<!-- Footer -->
<footer id="footer2">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="footer-logo">
                        <a href="#"><img src="<?php echo _SU_THEME_HOST_PATCH?>/assets/images/logo_10.png"" alt="Logo"></a>
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
                            <?php
                            $socials = get_field('list_social', 'option');
                            foreach ($socials as $social){
                                if($social['social_link']){
                                    echo '<li><a class="" href="'.$social['social_link'].'" style="background: '.$social['color'].'">'.$social['social_icon'].'</i></a></li>';
                                }else{
                                    echo '<li><a class="" href="javascript:void(0)" style="background: '.$social['color'].'">'.$social['social_icon'].'</i></a></li>';
                                }
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer paralax-->
    <?php
        $bg =get_field('background', 'option');
    ?>
    <div class="footer-paralax" style="background: url(<?php echo $bg['url']?>) center no-repeat fixed">
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
                            <div class="col-sm-4 block-info-wrap">
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
                <div class="row">
                    <div class="col-md-4 fb-page-wrap block block-info-wrap">
                        <div class="widget-container">
                            <h3 class="widget-title"><?php _e('Thời gian làm việc', _TEXT_DOMAIN)?></h3>
                            <div class="footer-block">
                                <div class="work-time">
                                    <?php echo get_field('wordk_time', 'option');?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 banking-wrap block-info-wrap">
                        <div class="widget-container">
                            <h3 class="widget-title"><?php _e('Thông tin thanh toán', _TEXT_DOMAIN)?></h3>
                            <div class="row">
                            <?php
                            $list_info_banking = get_field('list_info_banking', 'option');
                            if ($list_info_banking){
                                foreach ($list_info_banking as $item){
                                    ?>
                                    <div class="col-md-4 footer-block">
                                        <ul>
                                            <li>
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                <a href="javascript:void(0)"><?php echo $item['content']?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                    </div>
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