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
