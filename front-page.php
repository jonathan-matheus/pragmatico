<?php
// carega o cabeçalho
require_once('header.php');
?>
<!-- Aqui começa o conteúdo da página -->
<?php

// pegando os textos do front page
global $wpdb;
$table_name = $wpdb->prefix . "pragmatico_textos_front";
$textos_resultados = $wpdb->get_results("SELECT * FROM $table_name");

// percorrendo os dados
foreach ($textos_resultados as $texto_resultado) {
    $campos = get_object_vars($texto_resultado);
    foreach ($campos as $campo => $valor) {
        $$campo = esc_html($valor);
    }
}

// html do banner top
pragmatico_banner($banner_top_titulo, $banner_top_descricao);
?>

<!-- Serviços -->
<div class="s-200"></div>
<div class="d-flex container">
    <div>
        <h2 class="font-1-xl w-c"><?php echo $servicos_titulo ?></h2>
        <p class="font-1-m c4-c"><?php echo $servicos_descricao ?></p>
    </div>

    <?php
    // pegando os servicos
    $args_servicos = [
        'post_type' => 'servicos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'ASC'
    ];

    $servicos = new WP_Query($args_servicos);

    $servicos_titulo = [];
    $servicos_descricao = [];
    $servicos_icon = [];

    if ($servicos->have_posts()) {
        while ($servicos->have_posts()) {
            $servicos->the_post();
            $servicos_titulo[] = get_the_title();
            $servicos_descricao[] = get_the_content();
            $servicos_icon[] = get_the_post_thumbnail_url();
        }
    }

    // html dos servicos
    echo '<div>';
    for ($i = 0; $i < count($servicos_titulo); $i++) {
        echo '<div class="d-flex p2-b servico">';
        echo '<div>';
        echo '<img src="' . $servicos_icon[$i] . '">';
        echo '</div>';
        echo '<div>';
        echo '<h2 class="font-1-l w-c">' . $servicos_titulo[$i]  . '</h2>';
        echo '<p class="font-2-xs c2-c">' . $servicos_descricao[$i] . '</p>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    ?>
</div>

<!-- PROJETOS -->
<div class="s-200"></div>
<div class="d-flex container justify-content-between align-items-center">
    <div>
        <h2 class="font-1-xl w-c"><?php echo $projetos_titulo ?></h2>
        <p class="font-1-m c4-c"><?php echo $projetos_descricao ?></p>
    </div>

    <div>
        <?php
        pragmatico_botao("/", "VEJA TODOS OS PROJETOS");
        ?>
    </div>
</div>

<div class="s-48"></div>
<?php
// pegando os projetos
$args_projetos = [
    'post_type' => 'projetos',
    'post_status' => 'publish',
    'posts_per_page' => 3,
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
        $projetos_descricao[] = get_post_meta(get_the_ID(), 'descricao', true);
        $projetos_categoria[] = get_post_meta(get_the_ID(), 'categoria', true);
    }
}

// html dos projetos
echo '<div class="d-flex p2-b projetos align-items-center container">';
for ($i = 0; $i < count($projetos_titulo); $i++) {
    echo '<div class="textos_projetos">';
    echo '<p class="font-2-xs c1-c">' . $projetos_categoria[$i] . '</p>';
    echo '<h2 class="font-1-l w-c">' . $projetos_titulo[$i] . '</h2>';
    echo '<p class="font-1-m c2-c">' . $projetos_descricao[$i] . '</p>';
    echo '</div>';

    echo '<div>';
    echo '<img src="' . $projetos_imagen[$i] . '">';
    echo '</div>';
}
echo '</div>';
?>

<!-- SOBRE -->
<div class="s-200"></div>
<div class="container d-flex align-items-center justify-content-between">
    <div>
        <?php
        the_custom_logo();
        ?>
    </div>
    <div class="texto_sobre">
        <?php
        echo '<h2 class="font-1-xl w-c">' . $sobre_titulo . '</h2>';
        echo '<p class="font-1-m c4-c">' . $sobre_descricao . '</p>';
        echo '<div class="d-flex justify-content-end">';
        pragmatico_botao("/", "VEJA TODOS OS PROJETOS");
        echo '</div>';
        ?>
    </div>
</div>

<!-- Experiencia -->
<div class="s-200"></div>
<div class="d-flex container">
    <div class="col-6">
        <?php
        echo '<h2 class="font-1-xl w-c">' . $experiencia_titulo . '</h2>';
        echo '<p class="font-1-m c4-c">' . $experiencia_descricao . '</p>';
        ?>
    </div>
    <?php
    // pegando as experiencias
    $args_experiencias = [
        'post_type' => 'experiencia',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date'
    ];

    $experiencias = new WP_Query($args_experiencias);
    if ($experiencias->have_posts()) {
        while ($experiencias->have_posts()) {
            $experiencias->the_post();
            $experiencias_titulo[] = get_the_title();
            $experiencias_descricao[] = get_the_content();
            $experiencias_periodo[] = get_post_meta(get_the_ID(), 'periodo', true);
        }
    }

    // html das experiencias
    echo '<div class="d-flex justify-content-between">';
    for ($i = 0; $i < count($experiencias_titulo); $i++) {
        echo '<div class="periodo_texto">';
        echo '<p class="font-1-m c4-c nowrap-text">' . $experiencias_periodo[$i] . '</p>';
        echo '</div>';

        echo '<div>';
        echo '<h2 class="font-1-m w-c">' . $experiencias_titulo[$i] . '</h2>';
        echo '<p class="font-1-m c4-c experiencias_descricao">' . $experiencias_descricao[$i] . '</p>';
        echo '</div>';
    }
    echo '</div>';
    ?>
</div>

<?php
pragmatico_banner($banner_bottom_titulo, $banner_bottom_descricao);
?>

<div class="s-48"></div>
<?php
// carega o rodapé
require_once('footer.php');
?>