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
 * pt-br: Classe responsável por registrar as opções de estilo da página About no Customizer.
 * 
 * en: Class responsible for registering About page style options in the Customizer.
 */
class Pragmatico_Style_About
{
    /**
     * pt-br: Construtor que adiciona a ação para registrar as opções de estilo.
     * 
     * en: Constructor that adds the action to register style options.
     */

    public function __construct()
    {
        add_action('customize_register', [$this, 'register_about_style_controls']);
    }

    public function register_about_style_controls($wp_customize)
    {
        $wp_customize->add_section('pragmatico_about_section', [
            'title' => __('About', 'pragmatico'),
            'priority' => 35,
        ]);

        $about_fields = [
            'pragmatico_about_intro_text' => [
                'default' => __('Hello, this is my introductory text.', 'pragmatico'),
                'label' => __('First Introduction Text', 'pragmatico'),
                'priority' => 10,
            ],
            'pragmatico_about_professional_name' => [
                'default' => __('Your Name', 'pragmatico'),
                'label' => __('Professional Name', 'pragmatico'),
                'priority' => 20,
            ],
            'pragmatico_about_professional_role' => [
                'default' => __('Your Role', 'pragmatico'),
                'label' => __('Professional Role', 'pragmatico'),
                'priority' => 30,
            ],
            'pragmatico_about_work_title' => [
                'default' => __('Work', 'pragmatico'),
                'label' => __('About Text Title', 'pragmatico'),
                'priority' => 40,
            ],
            'pragmatico_about_experience_title' => [
                'default' => __('Experience', 'pragmatico'),
                'label' => __('Experience Section Title', 'pragmatico'),
                'priority' => 45,
            ],
        ];

        foreach ($about_fields as $setting_id => $field) {
            $wp_customize->add_setting($setting_id, [
                'default' => $field['default'],
                'sanitize_callback' => 'sanitize_text_field',
                'transport' => 'refresh',
            ]);

            $wp_customize->add_control($setting_id . '_control', [
                'label' => $field['label'],
                'section' => 'pragmatico_about_section',
                'settings' => $setting_id,
                'type' => 'text',
                'priority' => $field['priority'],
            ]);
        }

        $wp_customize->add_setting('pragmatico_about_work_description', [
            'default' => __('Tell your professional story here.', 'pragmatico'),
            'sanitize_callback' => 'wp_kses_post',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control('pragmatico_about_work_description_control', [
            'label' => __('Professional Story Text', 'pragmatico'),
            'section' => 'pragmatico_about_section',
            'settings' => 'pragmatico_about_work_description',
            'type' => 'textarea',
            'priority' => 50,
        ]);

        $wp_customize->add_setting('pragmatico_about_profile_photo', [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'pragmatico_about_profile_photo_control',
            [
                'label' => __('Professional Profile Photo', 'pragmatico'),
                'section' => 'pragmatico_about_section',
                'settings' => 'pragmatico_about_profile_photo',
            ]
        ));
    }

}

new Pragmatico_Style_About();
