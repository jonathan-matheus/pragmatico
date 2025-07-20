<?php
class FooterControls
{
    public function customFooter($wp_customizer)
    {
        $wp_customizer->add_section(
            'custom_footer_section',
            [
                'title' => __('Custom Footer', 'pragmatico'),
                'description' => __('Customize your theme footer', 'pragmatico'),
            ]
        );

        $args_text = [
            'footer_text' => [
                'default' => __('Contact information', 'pragmatico'),
                'label' => __('Contact Text', 'pragmatico'),
                'type' => 'text'
            ],
            'footer_phone' => [
                'default' => '(99) 99999-9999',
                'label' => __('Footer phone', 'pragmatico'),
                'type' => 'text'
            ],
            'footer_email' => [
                'default' => 'text@email.com',
                'label' => __('Footer email', 'pragmatico'),
                'type' => 'email'
            ],
            'footer_socials' => [
                'default' => __('Social Media Links', 'pragmatico'),
                'label' => __('Footer Socials', 'pragmatico'),
                'type' => 'text'
            ],
            'footer_linkedin' => [
                'default' => 'https://www.linkedin.com/in/yourprofile',
                'label' => __('Footer LinkedIn', 'pragmatico'),
                'type' => 'url'
            ],
            'footer_github' => [
                'default' => 'https://github.com/yourusername',
                'label' => __('Footer GitHub', 'pragmatico'),
                'type' => 'url'
            ],
            'footer_instagram' => [
                'default' => 'https://www.instagram.com/yourprofile',
                'label' => __('Footer Instagram', 'pragmatico'),
                'type' => 'url'
            ],
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
                    'section' => 'custom_footer_section',
                    'settings' => $key,
                    'type' => isset($value['type']) ? $value['type'] : 'text'
                ]
            );
        }
    }
}