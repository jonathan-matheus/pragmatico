<?php
function pragmatico_banco_de_dados()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'pragmatico_textos_front';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id int(11) DEFAULT '0',
        banner_top_titulo varchar(255) NOT NULL,
        banner_top_descricao text NOT NULL,
        servicos_titulo varchar(255) NOT NULL,
        servicos_descricao text NOT NULL,
        projetos_titulo varchar(255) NOT NULL,
        projetos_descricao text NOT NULL,
        sobre_titulo varchar(255) NOT NULL,
        sobre_descricao text NOT NULL,
        experiencia_titulo varchar(255) NOT NULL,
        experiencia_descricao text NOT NULL,
        banner_bottom_titulo varchar(255) NOT NULL,
        banner_bottom_descricao text NOT NULL,
        PRIMARY KEY  (id)
        )$charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('admin_init', 'pragmatico_banco_de_dados');
