<?php
/**
 * Registra configurações e controles personalizados no Customizer do WordPress.
 *
 * @param WP_Customize_Manager $wp_customize Instância do gerenciador do Customizer.
 */
function pragmatico_customizer_register($wp_customize)
{
    $wp_customize->add_section(
        'home_section',
        [
            'title' => "Home",
            'description' => "Configurações da página inicial",
        ]
    );

    /**
     * Configurações e Controles do Customizer - Seção Home
     *
     * Este trecho de código adiciona três configurações ao Customizer do WordPress 
     * na seção 'home_section':
     *
     * - home_title: Título da seção inicial.
     * - home_subtitle: Subtítulo da seção inicial.
     * - home_button_text: Texto do botão.
     * 
     * Cada configuração possui um valor padrão e é sanitizada usando 
     * 'sanitize_text_field'.
     *
     * A seção 'home_section' deve ser previamente registrada para exibir os 
     * controles corretamente.
     */
    $args_settings_and_controls_home = [
        'home_title' => [
            'default' => __("Ola, eu sou John", 'pragmatico'),
            'label' => __("Título", 'pragmatico'),
            'type' => "text",
        ],
        'home_subtitle' => [
            'default' => __("Web design focado em soluções elegantes", 'pragmatico'),
            'label' => __("Subtítulo", 'pragmatico'),
            'type' => "text",
        ],
        'home_button_text' => [
            'default' => __("Veja meus projetos", 'pragmatico'),
            'label' => __("Texto do botão", 'pragmatico'),
            'type' => "text",
        ],
    ];

    foreach ($args_settings_and_controls_home as $setting_name => $setting) {
        $wp_customize->add_setting(
            $setting_name,
            [
                'default' => $setting['default'],
                'sanitize_callback' => 'sanitize_text_field',
            ]
        );

        $wp_customize->add_control(
            $setting_name,
            [
                'label' => $setting['label'],
                'section' => 'home_section',
                'type' => $setting['type'],
            ]
        );
    }
}
add_action('customize_register', 'pragmatico_customizer_register');