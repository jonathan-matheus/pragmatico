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
<div class="container">
    <h2 class="font-1-xl w-c"><?php echo $servicos_titulo ?></h2>
    <p class="font-1-m c4-c"><?php echo $servicos_descricao ?></p>
</div>

<?php
// carega o rodapé
require_once('footer.php');
?>