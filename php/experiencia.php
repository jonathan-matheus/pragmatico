<?php
function pragmatico_post_type_experiencia()
{
    register_post_type(
        'experiencia',
        [
            'labels' => [
                'name' => 'Experiência',
                'singular_name' => 'Experiência'
            ],
            'public' => true,
            'menu_icon' => 'dashicons-businessman',
            'menu_position' => 5,
            'supports' => [
                'title',
                'editor'
            ]
        ]
    );
}
add_action('init', 'pragmatico_post_type_experiencia');

function pragmatico_metabox_experiencia()
{
    add_meta_box(
        'pragmatico_metabox_experiencia',
        'periodo',
        'pragmatico_function_metabox_experiencia',
        'experiencia'
    );
}
add_action('add_meta_boxes', 'pragmatico_metabox_experiencia');

function pragmatico_function_metabox_experiencia($post)
{
    $texto = get_post_meta(
        $post->ID,
        'periodo',
        true
    );

    echo '<label for="periodo">Período</label>';
    echo '</br>';
    echo '<input type="text" name="periodo" id="periodo" value="' . $texto . '">';
}

function pragmatico_save_metabox_experiencia($post_id)
{
    update_post_meta(
        $post_id,
        'periodo',
        $_POST['periodo']
    );
}
add_action('save_post', 'pragmatico_save_metabox_experiencia');
