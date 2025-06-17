<?php
/**
 * Classe ColorControls
 *
 * Fornece métodos para registrar e gerenciar configurações e controles de cores 
 * personalizadas no Customizer do WordPress.
 *
 * @package pragmatico
 */
class ColorControls
{
    /**
     * Registra configurações e controles de cores personalizadas no Customizer do WordPress.
     *
     * Este método adiciona uma nova seção chamada "Cores Personalizadas" ao Customizer,
     * permitindo que os usuários personalizem as cores primária e secundária do tema, incluindo seus estados hover.
     * Para cada opção de cor, uma configuração e um controle de cor são registrados.
     *
     * @param WP_Customize_Manager $wp_customizer Instância do gerenciador do Customizer do WordPress.
     *
     * @return void
     */
    public function customColors($wp_customizer): void
    {
        $wp_customizer->add_section(
            'custom_colors_section',
            [
                'title' => __('Custom Colors', 'pragmatico'),
                'description' => __('Customize your theme colors', 'pragmatico'),
            ]
        );

        $args_colors = [
            'primary_color' => [
                'default' => '#ffffff',
                'label' => __('Primary Color', 'pragmatico'),
            ],
            'primary_color_hover' => [
                'default' => '#DEDEDE',
                'label' => __('Primary Color Hover', 'pragmatico'),
            ],
            'secondary_color' => [
                'default' => '#000000',
                'label' => __('Secondary Color', 'pragmatico'),
            ],
            'secondary_color_hover' => [
                'default' => '#404040',
                'label' => __('Secondary Color Hover', 'pragmatico'),
            ],
        ];


        foreach ($args_colors as $color_key => $color_args) {
            // Adiciona a configuração de cor
            $wp_customizer->add_setting(
                $color_key,
                [
                    'default' => $color_args['default'],
                    'sanitize_callback' => 'sanitize_hex_color',
                ]
            );

            // Adiciona o controle de cor
            $wp_customizer->add_control(
                new WP_Customize_Color_Control(
                    $wp_customizer,
                    $color_key,
                    [
                        'label' => $color_args['label'],
                        'section' => 'custom_colors_section',
                        'settings' => $color_key,
                    ]
                )
            );
        }
    }
}