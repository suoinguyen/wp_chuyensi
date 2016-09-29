<?php
/**
 * Created by PhpStorm.
 * User: np-admin
 * Date: 12/18/2014
 * Time: 8:35 AM
 */

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_options-general',
        'title' => 'Options - General',
        'fields' => array (
            array (
                'key' => 'field_548e093a78fea',
                'label' => 'Favicon',
                'name' => 'favicon',
                'type' => 'file',
                'instructions' => 'Favicon for the site, should be .ico, 16x16 (http://favicon-generator.org/)',
                'save_format' => 'url',
                'library' => 'all',
            ),
            array (
                'key' => 'field_548e09e078feb',
                'label' => 'iOS Icon iPhone',
                'name' => 'ios_icon_iphone',
                'type' => 'image',
                'instructions' => 'Icon for the web to be displayed as an app on iPhone, should be 60x60.',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_548e0a5578fec',
                'label' => 'iOS Icon iPhone iPad',
                'name' => 'ios_icon_iphone_ipad',
                'type' => 'image',
                'instructions' => 'Icon for the web to be displayed as an app on iPhone, should be 76x76.',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_548e0add78fed',
                'label' => 'iOS Icon iPhone Retina',
                'name' => 'ios_icon_iphone_retina',
                'type' => 'image',
                'instructions' => 'Icon for the web to be displayed as an app on iPhone retina, should be 120x120.',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_548e0b0678fee',
                'label' => 'iOS Icon iPad Retina',
                'name' => 'ios_icon_ipad_retina',
                'type' => 'image',
                'instructions' => 'Icon for the web to be displayed as an app on iPhone, should be 152x152.',
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_548e0b3578fef',
                'label' => 'Custom CSS',
                'name' => 'custom_css',
                'type' => 'textarea',
                'instructions' => 'Some extra css for the site, no html tag included',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'none',
            ),
            array (
                'key' => 'field_548e0b7a78ff0',
                'label' => 'Custom JS',
                'name' => 'custom_js',
                'type' => 'textarea',
                'instructions' => 'Some extra js for the site, no html tag included.',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'none',
            ),
            array (
                'key' => 'field_548e0b7a78fxz',
                'label' => 'Google Analytics',
                'name' => 'google_analytics',
                'type' => 'textarea',
                'instructions' => 'Google Analytics script.',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'none',
            ),
            array (
                'key' => 'field_02092013suph1',
                'label' => 'Facebook SDK',
                'name' => 'facebook_sdk',
                'type' => 'textarea',
                'instructions' => 'The Facebook SDK.',
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'formatting' => 'none',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 90,
    ));
}
