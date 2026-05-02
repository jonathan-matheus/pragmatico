<?php

/**
 * pt-br: Impede que o arquivo seja executado fora do WordPress.
 * 
 * en: Prevents the file from running outside of WordPress.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * pt-br: Classe responsável por registrar as opções de estilo do header no Customizer.
 * 
 * en: Class responsible for registering header style options in the Customizer.
 */
class Pragmatico_Style_Header
{
    public function __construct()
    {
        add_action('customize_register', [$this, 'register_header_text_color_control']);
    }

    public function register_header_text_color_control($wp_customize)
    {
        $wp_customize->add_section('pragmatico_header_section', [
            'title' => __('Header', 'pragmatico'),
            'priority' => 30,
        ]);

        $wp_customize->add_setting('pragmatico_header_text_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'pragmatico_header_text_color_control',
            [
                'label' => __('Cor do texto do header', 'pragmatico'),
                'section' => 'pragmatico_header_section',
                'settings' => 'pragmatico_header_text_color',
            ]
        ));
    }
}

new Pragmatico_Style_Header();
