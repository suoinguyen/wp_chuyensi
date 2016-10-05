<?php
/**
 * WARNING! DO NOT EDIT THIS FILE DIRECTLY!
 *
 * FOR CUSTOM CSS USE THE PLUGIN THEME OPTIONS->CUSTOM CSS PANEL.
 */

/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");
?>

<?php if ($use_compatibility == true): ?>
    <?php echo $asp_res_ids1; ?>.horizontal,
    <?php echo $asp_res_ids2; ?>.horizontal,
<?php endif; ?>
<?php echo $asp_res_ids; ?>.horizontal {
    <?php wpdreams_gradient_css($style['hboxbg']); ?>
    <?php echo $style['hboxborder']; ?>
    <?php echo wpdreams_box_shadow_css($style['hboxshadow']); ?>
    display: none;
    visibility: hidden;
}

<?php if ($use_compatibility == true): ?>
    <?php echo $asp_res_ids1; ?>.horizontal .results .item,
    <?php echo $asp_res_ids2; ?>.horizontal .results .item,
<?php endif; ?>
<?php echo $asp_res_ids; ?>.horizontal .results .item {
    height: <?php echo w_isset_def($style['horizontal_res_height'], 'auto'); ?>;
    width: <?php echo $style['hreswidth']; ?>;
    margin: 10px <?php echo $style['hressidemargin']; ?>;
    padding: <?php echo $style['hrespadding']; ?>;
    float: left;
    <?php wpdreams_gradient_css($style['hresultbg']); ?>
    <?php echo $style['hresultborder']; ?>
    <?php wpdreams_box_shadow_css($style['hresultshadow']); ?>
}

<?php if ($use_compatibility == true): ?>
    <?php echo $asp_res_ids1; ?>.horizontal .results .item:hover,
    <?php echo $asp_res_ids2; ?>.horizontal .results .item:hover,
<?php endif; ?>
<?php echo $asp_res_ids; ?>.horizontal .results .item:hover {
    <?php wpdreams_gradient_css($style['hresulthbg']); ?>
}

<?php if ($use_compatibility == true): ?>
    <?php echo $asp_res_ids1; ?>.horizontal .results .item .asp_image,
    <?php echo $asp_res_ids2; ?>.horizontal .results .item .asp_image,
<?php endif; ?>
<?php echo $asp_res_ids; ?>.horizontal .results .item .asp_image {
    margin: 0 auto;
    <?php wpdreams_gradient_css($style['hresultbg']); ?>
}

<?php if ($use_compatibility == true): ?>
    <?php echo $asp_res_ids1; ?>.horizontal .results .item .asp_image,
    <?php echo $asp_res_ids2; ?>.horizontal .results .item .asp_image,
<?php endif; ?>
<?php echo $asp_res_ids; ?>.horizontal .results .item .asp_image {
    width: <?php echo $_vimagew ?>px;
    height: <?php echo $_vimageh; ?>px;
    <?php echo $style['hresultimageborder']; ?>
    float: none;
    margin: 0 auto 6px;
    position: relative;
	background-position: center;
	background-size: cover;
}

<?php if ($use_compatibility == true): ?>
	<?php echo $asp_res_ids1; ?>.horizontal .results .item .asp_image .void,
	<?php echo $asp_res_ids2; ?>.horizontal .results .item .asp_image .void,
<?php endif; ?>
<?php echo $asp_res_ids; ?>.horizontal .results .item .asp_image .void {
	position: absolute;
	width: 100%;
	height: 100%;
	<?php echo $style['hresultimageshadow']; ?>
}

<?php if ($use_compatibility == true): ?>
    <?php echo $asp_res_ids1; ?>.horizontal .results .item .asp_content h3 a,
    <?php echo $asp_res_ids2; ?>.horizontal .results .item .asp_content h3 a,
<?php endif; ?>
<?php echo $asp_res_ids; ?>.horizontal .results .item .asp_content h3 a {
    text-align: center;
}

<?php if ($use_compatibility == true): ?>
    <?php echo $asp_res_ids1; ?> .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
    <?php echo $asp_res_ids2; ?> .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
<?php endif; ?>
<?php echo $asp_res_ids; ?> .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {
    background:#fff; /* rgba fallback */
    background:rgba(<?php echo wpdreams_hex2rgb($style['overflowcolor']); ?>,0.9);
}

<?php if ($use_compatibility == true): ?>
    <?php echo $asp_res_ids1; ?> .mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
    <?php echo $asp_res_ids2; ?> .mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar,
<?php endif; ?>
<?php echo $asp_res_ids; ?> .mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar {
    background:rgba(<?php echo wpdreams_hex2rgb($style['overflowcolor']); ?>,0.95);
}

<?php echo $asp_res_ids; ?> .mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
<?php echo $asp_res_ids; ?> .mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar{
    background:rgba(<?php echo wpdreams_hex2rgb($style['overflowcolor']); ?>,1);
}

<?php echo $asp_res_ids; ?>.horizontal .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar{
    background:#fff; /* rgba fallback */
    background:<?php echo $style['hoverflowcolor']; ?>;
    opacity: 0.9;
}
<?php echo $asp_res_ids; ?>.horizontal .mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar{
    background:<?php echo $style['hoverflowcolor']; ?>;
    opacity: 0.95;
}

<?php echo $asp_res_ids; ?>.horizontal .mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
<?php echo $asp_res_ids; ?>.horizontal .mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar{
    background: <?php echo $style['hoverflowcolor']; ?>;
}

<?php echo $asp_res_ids; ?> .mCSB_scrollTools .mCSB_buttonDown:after { border-color: rgba(136, 183, 213, 0); border-top-color: <?php echo $style['arrowcolor']; ?>; border-width: 6px; left: 50%; margin-left: -6px; }
<?php echo $asp_res_ids; ?> .mCSB_scrollTools .mCSB_buttonUp:after { border-color: rgba(136, 183, 213, 0); border-bottom-color:  <?php echo $style['arrowcolor']; ?>; border-width: 6px; left: 50%; margin-left: -6px; }

<?php echo $asp_res_ids; ?>.horizontal .results .mCSB_scrollTools .mCSB_buttonLeft:after { border-color: rgba(136, 183, 213, 0); border-right-color: <?php echo $style['harrowcolor']; ?>; border-width: 7px; top: 50%; margin-top:  -7px; left: 5px; }
<?php echo $asp_res_ids; ?>.horizontal .results .mCSB_scrollTools .mCSB_buttonRight:after { border-color: rgba(136, 183, 213, 0); border-left-color: <?php echo $style['harrowcolor']; ?>; border-width: 7px; top: 50%; margin-top:  -7px; left: 5px; }
