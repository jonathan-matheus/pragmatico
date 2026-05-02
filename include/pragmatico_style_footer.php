<?php
if (!defined('ABSPATH')) {
    exit;
}

class Pragmatico_Style_Footer
{
    public function __construct()
    {
        add_action('customize_register', [$this, 'register_footer_controls']);
    }

    public function register_footer_controls($wp_customize)
    {
        $wp_customize->add_section('pragmatico_footer_section', [
            'title' => __('Footer', 'pragmatico'),
            'priority' => 40,
        ]);

        $fields = [
            'pragmatico_footer_email' => __('Email', 'pragmatico'),
            'pragmatico_footer_phone' => __('Phone', 'pragmatico'),
            'pragmatico_footer_linkedin' => __('LinkedIn URL', 'pragmatico'),
            'pragmatico_footer_instagram' => __('Instagram URL', 'pragmatico'),
            'pragmatico_footer_github' => __('GitHub URL', 'pragmatico'),
        ];

        $priority = 10;
        foreach ($fields as $setting_id => $label) {
            $is_url = str_contains($setting_id, 'linkedin') || str_contains($setting_id, 'instagram') || str_contains($setting_id, 'github');

            $wp_customize->add_setting($setting_id, [
                'default' => '',
                'sanitize_callback' => $is_url ? 'esc_url_raw' : 'sanitize_text_field',
                'transport' => 'refresh',
            ]);

            $wp_customize->add_control($setting_id . '_control', [
                'label' => $label,
                'section' => 'pragmatico_footer_section',
                'settings' => $setting_id,
                'type' => $is_url ? 'url' : 'text',
                'priority' => $priority,
            ]);

            $priority += 10;
        }
    }
}

new Pragmatico_Style_Footer();
