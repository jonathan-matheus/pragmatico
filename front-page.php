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
    $titulo_top =  esc_html($texto_resultado->banner_top_titulo);
    $descricao_top =  esc_html($texto_resultado->banner_top_descricao);
    $titulo_servios =  esc_html($texto_resultado->servicos_titulo);
    $descricao_servios =  esc_html($texto_resultado->servicos_descricao);
    $titulo_projetos =  esc_html($texto_resultado->projetos_titulo);
    $descricao_projetos =  esc_html($texto_resultado->projetos_descricao);
    $titulo_sobre =  esc_html($texto_resultado->sobre_titulo);
    $descricao_sobre =  esc_html($texto_resultado->sobre_descricao);
    $titulo_experiencia =  esc_html($texto_resultado->experiencia_titulo);
    $descricao_experiencia =  esc_html($texto_resultado->experiencia_descricao);
    $titulo_bottom =  esc_html($texto_resultado->banner_bottom_titulo);
    $descricao_bottom =  esc_html($texto_resultado->banner_bottom_descricao);
}

// html do banner top
include('banner.php');
?>

<!-- Serviços -->
<div class="s-200"></div>
<div class="container">
    <h2 class="font-1-xl w-c"><?php echo $titulo_servios ?></h2>
    <p class="font-1-m c4-c"><?php echo $descricao_servios ?></p>
</div>

<?php
// carega o rodapé
require_once('footer.php');
?>