<?php
class Color
{
    public function __construct()
    {
        add_action('customize_register', [$this, 'register_color']);
    }

    public function register_color($wp_customize)
    {
        $wp_customize->add_section("pragmatico_color", [
            'title' => __('Color Settings', 'pragmatico'),
            'priority' => 30,
        ]);

        $wp_customize->add_setting('pragmatico_primary_color', [
            'default' => '#f7f7f7',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'pragmatico_primary_color_control',
                [
                    'label' => __('Primary Color', 'pragmatico'),
                    'section' => 'pragmatico_color',
                    'settings' => 'pragmatico_primary_color',
                ]
            )
        );
    }
}