<?php

class ButtonControls
{
    public function customButtons($wp_customizer): void
    {
        $wp_customizer->add_section(
            'custom_buttons_section',
            [
                'title' => __('Custom Buttons', 'pragmatico'),
                'description' => __('Customize your theme buttons', 'pragmatico'),
            ]
        );

        $args_text_buttons = [
            'primary_button_text' => [
                'default' => __('Contact', 'pragmatico'),
                'label' => __('Contact Button Text', 'pragmatico'),
            ],
            'primary_button_link' => [
                'default' => '#',
                'label' => __('Contact Button Link', 'pragmatico'),
            ],
            'secondary_button_text' => [
                'default' => __('Projects', 'pragmatico'),
                'label' => __('Projects Button Text', 'pragmatico'),
            ],
            'secondary_button_link' => [
                'default' => '#',
                'label' => __('Projects Button Link', 'pragmatico'),
            ],
            'tertiary_button_text' => [
                'default' => __('Articles', 'pragmatico'),
                'label' => __('Articles Button Text', 'pragmatico'),
            ],
            'tertiary_button_link' => [
                'default' => '#',
                'label' => __('Articles Button Link', 'pragmatico'),
            ]
        ];

        foreach ($args_text_buttons as $text_key => $text_args) {
            $wp_customizer->add_setting(
                $text_key,
                [
                    'default' => $text_args['default'],
                    'sanitize_callback' => 'sanitize_text_field',
                ]
            );

            // Adiciona o controle de texto
            $wp_customizer->add_control(
                $text_key,
                [
                    'label' => $text_args['label'],
                    'section' => 'custom_buttons_section',
                    'settings' => $text_key,
                    'type' => 'text',
                ]
            );
        }
    }
}