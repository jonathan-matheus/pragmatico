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

        $args_colors = [
            [
                'default' => '#f7f7f7',
                'id' => 'pragmatico_primary_color',
                'label' => __('Primary Color', 'pragmatico'),
            ],
            [
                'default' => '#b2b2b2',
                'id' => 'pragmatico_secondary_color',
                'label' => __('Secondary Color', 'pragmatico'),
            ]
        ];

        foreach ($args_colors as $color) {
            $wp_customize->add_setting($color['id'], [
                'default' => $color['default'],
                'sanitize_callback' => 'sanitize_hex_color',
            ]);

            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    $color['id'] . '_control',
                    [
                        'label' => $color['label'],
                        'section' => 'pragmatico_color',
                        'settings' => $color['id'],
                    ]
                )
            );
        }
    }
}