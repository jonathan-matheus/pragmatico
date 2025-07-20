<?php

class MeditacoesControls
{
    public function customText($wp_customizer)
    {
        $wp_customizer->add_section(
            'meditacoes_section',
            [
                'title' => __('Custom Meditatios', 'pragmatico'),
                'description' => __('Customize your theme text', 'pragmatico'),
            ]
        );

        $wp_customizer->add_setting(
            'meditacoes_setting',
            [
                'default' => __('Meditations', 'pragmatico'),
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );

        $wp_customizer->add_control(
            'meditacoes_setting',
            [
                'label' => __('Custom Text', 'pragmatico'),
                'section' => 'meditacoes_section',
                'settings' => 'meditacoes_setting',
                'type' => 'text',
            ]
        );
    }
}