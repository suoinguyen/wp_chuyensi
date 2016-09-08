<?php
the_post();
get_header(); ?>

    <div class="page-content">
        <div class="container">
            <div class="entry-title"><h2><?php the_title() ?></h2></div>

            <div class="editor-content clearfix">
                <?php the_content() ?>
            </div>
        </div>
    </div>



<?php get_footer(); ?>