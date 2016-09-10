<?php
/**
 * Created by PhpStorm.
 * User: SuoiNguyen
 * Date: 9/10/2016
 * Time: 10:56 PM
 */
?>
<div id="home-slider">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 header-top-right">
                <div class="homeslider">
                    <ul id="contenhomeslider">
                        <?php
                            $sliders = get_field('list_slide');
                            foreach ($sliders as $slide){
                                echo '<li><img alt="" src="'.$slide['slider_image']['url'].'" title="" /></li>';
                            }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
