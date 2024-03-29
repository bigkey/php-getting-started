<?php

// Porto Content Box
add_shortcode('porto_content_box', 'porto_shortcode_content_box');
add_action('vc_after_init', 'porto_load_content_box_shortcode');

function porto_shortcode_content_box($atts, $content = null) {
    ob_start();
    if ($template = porto_shortcode_template('porto_content_box'))
        include $template;
    return ob_get_clean();
}

function porto_load_content_box_shortcode() {
    $animation_type = porto_vc_animation_type();
    $animation_duration = porto_vc_animation_duration();
    $animation_delay = porto_vc_animation_delay();
    $custom_class = porto_vc_custom_class();

    vc_map( array(
        "name" => "Porto " . __("Content Box", 'porto-shortcodes'),
        "base" => "porto_content_box",
        "category" => __("Porto", 'porto-shortcodes'),
        "icon" => "porto_vc_content_box",
        'is_container' => true,
        'weight' => - 50,
        'js_view' => 'VcColumnView',
        "params" => array(
            array(
                'type' => 'dropdown',
                'heading' => __('Skin Color', 'porto-shortcodes'),
                'param_name' => 'skin',
                'std' => 'custom',
                'value' => porto_vc_commons('colors'),
                'admin_label' => true
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Border Top Color', 'porto-shortcodes'),
                'param_name' => 'border_top_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
                'admin_label' => true
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Border Radius', 'porto-shortcodes'),
                'param_name' => 'border_radius',
                'description' => __('Enter the border radius in px.', 'porto-shortcodes'),
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Border Top Width', 'porto-shortcodes'),
                'param_name' => 'border_top_width',
                'description' => __('Enter the border top width in px.', 'porto-shortcodes'),
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Background Type', 'porto-shortcodes'),
                'param_name' => 'bg_type',
                'value' => porto_vc_commons('content_boxes_bg_type'),
                'admin_label' => true
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Background Gradient Top Color', 'porto-shortcodes'),
                'param_name' => 'bg_top_color',
                'dependency' => array(
                    'element' => 'bg_type',
                    'value' => array( 'featured-boxes-custom' )
                ),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Background Gradient Bottom Color', 'porto-shortcodes'),
                'param_name' => 'bg_bottom_color',
                'dependency' => array(
                    'element' => 'bg_type',
                    'value' => array( 'featured-boxes-custom' )
                ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Text Align", 'porto-shortcodes'),
                "param_name" => "align",
                "value" => porto_vc_commons('align'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Style', 'porto-shortcodes'),
                'param_name' => 'box_style',
                'value' => porto_vc_commons('content_boxes_style'),
                'admin_label' => true
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Effect', 'porto-shortcodes'),
                'param_name' => 'box_effect',
                'value' => porto_vc_commons('content_box_effect'),
                'admin_label' => true
            ),
            array(
                'type' => 'checkbox',
                'heading' => __('Show FontAwesome Icon', 'porto-shortcodes'),
                'param_name' => 'show_icon',
                'value' => array(__('Yes, please', 'js_composer') => 'yes'),
                'description' => ''
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __('Select FontAwesome Icon', 'porto-shortcodes'),
                'param_name' => 'icon',
                'dependency' => array('element' => 'show_icon', 'not_empty' => true)
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Color', 'porto-shortcodes'),
                'param_name' => 'icon_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Background Color', 'porto-shortcodes'),
                'param_name' => 'icon_bg_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Border Color', 'porto-shortcodes'),
                'param_name' => 'icon_border_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Wrap Border Color', 'porto-shortcodes'),
                'param_name' => 'icon_wrap_border_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Box Shadow Color', 'porto-shortcodes'),
                'param_name' => 'icon_shadow_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Hover Color', 'porto-shortcodes'),
                'param_name' => 'icon_hcolor',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Hover Background Color', 'porto-shortcodes'),
                'param_name' => 'icon_hbg_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Hover Border Color', 'porto-shortcodes'),
                'param_name' => 'icon_hborder_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Wrap Hover Border Color', 'porto-shortcodes'),
                'param_name' => 'icon_wrap_hborder_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            array(
                'type' => 'colorpicker',
                'heading' => __('Icon Hover Box Shadow Color', 'porto-shortcodes'),
                'param_name' => 'icon_hshadow_color',
                'dependency' => array('element' => 'skin', 'value' => array( 'custom' )),
            ),
            $animation_type,
            $animation_duration,
            $animation_delay,
            $custom_class
        )
    ) );

    if (!class_exists('WPBakeryShortCode_Porto_Content_Box')) {
        class WPBakeryShortCode_Porto_Content_Box extends WPBakeryShortCodesContainer {
        }
    }
}