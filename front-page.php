<?php
// carega o cabeçalho
require_once('header.php');
?>
<!-- Aqui começa o conteúdo da página -->
<?php

// pagando textos passados pelo usuario
require_once('php/pegando_textos.php');

// html do banner top
pragmatico_banner($banner_top_titulo, $banner_top_descricao);
?>

<!-- Serviços -->
<div class="s-200"></div>
<div class="d-flex container servico_container">
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
<div class="d-flex projetos_container container justify-content-between align-items-center">
    <div>
        <h2 class="font-1-xl w-c"><?php echo $projetos_titulo ?></h2>
        <p class="font-1-m c4-c"><?php echo $projetos_descricao ?></p>
    </div>

    <div>
        <?php
        pragmatico_botao("portfolio", "VEJA TODOS OS PROJETOS");
        ?>
    </div>
</div>

<div class="s-48"></div>

<?php require_once('php/portifolio.php'); ?>

<!-- SOBRE -->
<div class="s-200"></div>
<div class="container sobre_container d-flex align-items-center justify-content-between">
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
        pragmatico_botao("portfolio", "VEJA TODOS OS PROJETOS");
        echo '</div>';
        ?>
    </div>
</div>

<!-- Experiencia -->
<div class="s-200"></div>
<div class="d-flex experiencia_container container">
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
    echo '<div class="d-flex experiencia_container justify-content-between">';
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