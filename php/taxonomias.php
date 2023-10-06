<?php

/**
 * Registrar uma taxonomia para projetos.
 *
 * @return void
 */
function pragmatico_taxonomia_projetos()
{
    register_taxonomy(
        'tipos_projetos',
        ['projetos'],
        [
            'labels' => [
                'name' => 'Tipos Projetos',
            ],
        ]
    );
}
add_action('init', 'pragmatico_taxonomia_projetos');
