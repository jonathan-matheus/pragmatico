<?php
// pegando os projetos
$args_projetos = [
    'post_type' => 'projetos',
    'post_status' => 'publish',
    'posts_per_page' => (is_front_page()) ? 3 : -1,
    'order' => 'ASC'
];

$projetos = new WP_Query($args_projetos);
$projetos_categoria = [];
$projetos_titulo = [];
$projetos_descricao = [];
$projetos_imagen = [];

if ($projetos->have_posts()) {
    while ($projetos->have_posts()) {
        $projetos->the_post();
        $projetos_titulo[] = get_the_title();
        $projetos_imagen[] = get_the_post_thumbnail_url();
        $projetos_url[] = get_the_permalink();
        $projetos_descricao[] = get_post_meta(get_the_ID(), 'descricao', true);
        $projetos_categoria[] = get_post_meta(get_the_ID(), 'categoria', true);
    }
}

// html dos projetos
echo '<div class="d-flex p2-b projetos align-items-center container">';
for ($i = 0; $i < count($projetos_titulo); $i++) {
    echo '<div class="textos_projetos">';
    echo '<p class="font-2-xs c1-c">' . $projetos_categoria[$i] . '</p>';
    echo '<h2 class="font-1-l w-c"><a href="' . $projetos_url[$i] . '">' . $projetos_titulo[$i] . '</a></h2>';
    echo '<p class="font-1-m c2-c">' . $projetos_descricao[$i] . '</p>';
    echo '</div>';

    echo '<a href="' . $projetos_url[$i] . '">';
    echo '<div class="img_projetos">';
    echo '<img src="' . $projetos_imagen[$i] . '">';
    echo '</div>';
    echo '</a>';
}
echo '</div>';
