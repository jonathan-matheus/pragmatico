<?php
class introducaoControls
{
    public function customText($wp_customizer)
    {
        $wp_customizer->add_section(
            'custom_text_section',
            [
                'title' => __('Custom Introduction', 'pragmatico'),
                'description' => __('Customize your theme text', 'pragmatico'),
            ]
        );

        $args_text = [
            'text_hello' => [
                'default' => __('Hey, I am', 'pragmatico'),
                'label' => __('Text Hello', 'pragmatico')
            ],
            'text_name' => [
                'default' => __('Jonathan M. Silva', 'pragmatico'),
                'label' => __('Text Name', 'pragmatico')
            ],
            'text_skills' => [
                'default' => __('Skills', 'pragmatico'),
                'label' => __('Text Skills', 'pragmatico')
            ],
            'text_biography' => [
                'default' => __('Biography', 'pragmatico'),
                'label' => __('Text Biography'),
                'type' => 'textarea'
            ],
            'text_button' => [
                'default' => __('Download CV', 'pragmatico'),
                'label' => __('Text Button', 'pragmatico')
            ],
            'link_button' => [
                'default' => '#',
                'label' => __('Link Button', 'pragmatico')
            ]
        ];

        foreach ($args_text as $key => $value) {
            $wp_customizer->add_setting(
                $key,
                [
                    'default' => $value['default'],
                    'sanitize_callback' => 'sanitize_text_field'
                ]
            );

            $wp_customizer->add_control(
                $key,
                [
                    'label' => $value['label'],
                    'section' => 'custom_text_section',
                    'settings' => $key,
                    'type' => isset($value['type']) ? $value['type'] : 'text'
                ]
            );
        }
    }
}