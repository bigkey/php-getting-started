<?php

// Porto Map Section
add_shortcode('porto_map_section', 'porto_shortcode_map_section');
add_action('vc_after_init', 'porto_load_map_section_shortcode');

function porto_shortcode_map_section($atts, $content = null) {
    ob_start();
    if ($template = porto_shortcode_template('porto_map_section'))
        include $template;
    return ob_get_clean();
}

function porto_load_map_section_shortcode() {
    $animation_type = porto_vc_animation_type();
    $animation_duration = porto_vc_animation_duration();
    $animation_delay = porto_vc_animation_delay();
    $custom_class = porto_vc_custom_class();

    vc_map( array(
        "name" => "Porto " . __("Map Section", 'porto-shortcodes'),
        "base" => "porto_map_section",
        "category" => __("Porto", 'porto-shortcodes'),
        "icon" => "porto_vc_map_section",
        'is_container' => true,
        'weight' => - 50,
        "show_settings_on_create" => false,
        'js_view' => 'VcColumnView',
        "params" => array(
            array(
                'type' => 'checkbox',
                'heading' => __("Wrap as Container", 'porto-shortcodes'),
                'param_name' => 'container',
                'std' => 'no',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
            ),
            array(
                'type' => 'checkbox',
                'heading' => __("Change Map Image", 'porto-shortcodes'),
                'param_name' => 'customize',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Map Image', 'porto-shortcodes'),
                'param_name' => 'image',
                'dependency' => array('element' => 'customize', 'not_empty' => true)
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image Gap (unit: px)', 'porto-shortcodes'),
                'std' => '164',
                'param_name' => 'gap',
                'dependency' => array('element' => 'customize', 'not_empty' => true)
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Content Min Height (unit: px)', 'porto-shortcodes'),
                'param_name' => 'min_height',
                'std' => '400',
                'dependency' => array('element' => 'customize', 'not_empty' => true)
            ),
            $animation_type,
            $animation_duration,
            $animation_delay,
            $custom_class
        )
    ) );

    if (!class_exists('WPBakeryShortCode_Porto_Map_Section')) {
        class WPBakeryShortCode_Porto_Map_Section extends WPBakeryShortCodesContainer {
        }
    }
}