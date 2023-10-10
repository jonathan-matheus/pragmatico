<?php
function pragmatico_post_type_projects()
{
    register_post_type(
        'projetos',
        [
            'labels' => [
                'name' => 'Projetos',
                'singular_name' => 'Projeto'
            ],
            'public' => true,
            'menu_icon' => 'dashicons-portfolio',
            'menu_position' => 5,
            'show_in_rest' => true,
            'supports' => [
                'title',
                'editor',
                'thumbnail'
            ]
        ]
    );
}
add_action('init', 'pragmatico_post_type_projects');

function pragmatico_metabox_projetos()
{
    add_meta_box(
        'pragmatico_metabox_projetos',
        'Breve descrição do projeto',
        'pragmatico_function_metabox_projetos',
        'projetos'
    );
}
add_action('add_meta_boxes', 'pragmatico_metabox_projetos');

function pragmatico_function_metabox_projetos($post)
{
    $texto = get_post_meta(
        $post->ID,
        'descricao',
        true
    );

    $categoria = get_post_meta(
        $post->ID,
        'categoria',
        true
    );

    echo '<label for="categoria">Categorização Principal</label>';
    echo '</br>';
    echo '<input type="text" name="categoria" id="categoria" value="' . $categoria . '">';
    echo '<br>';

    echo '<label for="descricao">Breve descrição do projeto</label>';
    echo '</br>';
    echo '<textarea name="descricao" id="descricao" cols="100" rows="5">';
    echo $texto;
    echo '</textarea>';
}

function pragmatico_save_metabox_projetos($post_id)
{
    update_post_meta($post_id, 'descricao', $_POST['descricao']);
    update_post_meta($post_id, 'categoria', $_POST['categoria']);
}
add_action('save_post', 'pragmatico_save_metabox_projetos');
