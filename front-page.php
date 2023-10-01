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
include('banner.php');
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

<?php
// carega o rodapé
require_once('footer.php');
?>