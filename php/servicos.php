<?php
function pragmatico_post_type_servicos()
{
    register_post_type(
        'servicos',
        array(
            'labels' => array(
                'name' => 'Serviços',
                'singular_name' => 'Serviço',
            ),
            'public' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-awards',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
            )
        ),
    );
}
add_action('init', 'pragmatico_post_type_servicos');
