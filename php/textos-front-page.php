<?php
function pragmatico_textos_front_page()
{
    add_theme_page(
        'Textos - Pagina Inicial',
        'Textos - Pagina Inicial',
        'edit_theme_options',
        'theme-options',
        'pragmatico_textos_front_page_callback'
    );
}
add_action('admin_menu', 'pragmatico_textos_front_page');

function pragmatico_textos_front_page_callback()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'pragmatico_textos_front';

    if (isset($_POST['submit'])) {
        $banner_top_titulo = sanitize_text_field($_POST['banner-top-titulo']);
        $banner_top_descricao = sanitize_textarea_field($_POST['banner-top-descricao']);
        $servicos_titulo = sanitize_text_field($_POST['servicos-titulo']);
        $servicos_descricao = sanitize_textarea_field($_POST['servicos-descricao']);
        $projetos_titulo = sanitize_text_field($_POST['projetos-titulo']);
        $projetos_descricao = sanitize_textarea_field($_POST['projetos-descricao']);
        $sobre_titulo = sanitize_text_field($_POST['sobre-titulo']);
        $sobre_descricao = sanitize_textarea_field($_POST['sobre-descricao']);
        $experiencia_titulo = sanitize_text_field($_POST['experiencia-titulo']);
        $experiencia_descricao = sanitize_textarea_field($_POST['experiencia-descricao']);
        $banner_bottom_titulo = sanitize_text_field($_POST['banner-bottom-titulo']);
        $banner_bottom_descricao = sanitize_textarea_field($_POST['banner-bottom-descricao']);

        // Verifique se já existe uma entrada no banco de dados
        $existing_entry = $wpdb->get_row("SELECT * FROM $table_name");

        if ($existing_entry) {
            // Atualize os valores existentes
            $wpdb->update(
                $table_name,
                array(
                    'banner_top_titulo' => $banner_top_titulo,
                    'banner_top_descricao' => $banner_top_descricao,
                    'servicos_titulo' => $servicos_titulo,
                    'servicos_descricao' => $servicos_descricao,
                    'projetos_titulo' => $projetos_titulo,
                    'projetos_descricao' => $projetos_descricao,
                    'sobre_titulo' => $sobre_titulo,
                    'sobre_descricao' => $sobre_descricao,
                    'experiencia_titulo' => $experiencia_titulo,
                    'experiencia_descricao' => $experiencia_descricao,
                    'banner_bottom_titulo' => $banner_bottom_titulo,
                    'banner_bottom_descricao' => $banner_bottom_descricao
                ),
                array('id' => 0),
                array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
            );
            echo 'Update';
        } else {
            // Insira uma nova entrada
            $wpdb->insert(
                $table_name,
                array(
                    'banner_top_titulo' => $banner_top_titulo,
                    'banner_top_descricao' => $banner_top_descricao,
                    'servicos_titulo' => $servicos_titulo,
                    'servicos_descricao' => $servicos_descricao,
                    'projetos_titulo' => $projetos_titulo,
                    'projetos_descricao' => $projetos_descricao,
                    'sobre_titulo' => $sobre_titulo,
                    'sobre_descricao' => $sobre_descricao,
                    'experiencia_titulo' => $experiencia_titulo,
                    'experiencia_descricao' => $experiencia_descricao,
                    'banner_bottom_titulo' => $banner_bottom_titulo,
                    'banner_bottom_descricao' => $banner_bottom_descricao
                ),
                array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
            );
            echo 'Insert';
        }

        if ($wpdb->last_error) {
            echo 'Erro MySQL: ' . $wpdb->last_error;
        }
    }

    // Obtenha os valores atuais do banco de dados
    $current_values = $wpdb->get_row("SELECT * FROM $table_name");

    echo '<h1>Textos - Pagina Inicial</h1>';
    echo '<h2>Banner - top</h2>';
    echo '<form action="" method="post">';
    echo '<label for="banner-top-titulo">TITULO</label>';
    echo '<br>';
    echo '<input type="text" name="banner-top-titulo" id="banner-top-titulo" value="' . esc_attr($current_values->banner_top_titulo) . '">';
    echo '<br>';

    echo '<label for="banner-top-descricao">DESCRICAO</label>';
    echo '<br>';
    echo '<textarea name="banner-top-descricao" id="banner-top-descricao">' . esc_textarea($current_values->banner_top_descricao) . '</textarea>';

    echo '<h2>Serviços</h2>';
    echo '<label for="servicos-titulo">TITULO</label>';
    echo '<br>';
    echo '<input type="text" name="servicos-titulo" id="servicos-titulo" value="' . esc_attr($current_values->servicos_titulo) . '">';
    echo '<br>';

    echo '<label for="servicos-descricao">DESCRICAO</label>';
    echo '<br>';
    echo '<textarea name="servicos-descricao" id="servicos-descricao">' . esc_textarea($current_values->servicos_descricao) . '</textarea>';

    echo '<h2>Projetos</h2>';
    echo '<label for="projetos-titulo">TITULO</label>';
    echo '<br>';
    echo '<input type="text" name="projetos-titulo" id="projetos-titulo" value="' . esc_attr($current_values->projetos_titulo) . '">';
    echo '<br>';

    echo '<label for="projetos-descricao">DESCRICAO</label>';
    echo '<br>';
    echo '<textarea name="projetos-descricao" id="projetos-descricao">' . esc_textarea($current_values->projetos_descricao) . '</textarea>';
    echo '<br>';

    echo '<h2>Sobre</h2>';
    echo '<label for="sobre-titulo">TITULO</label>';
    echo '<br>';
    echo '<input type="text" name="sobre-titulo" id="sobre-titulo" value="' . esc_attr($current_values->sobre_titulo) . '">';
    echo '<br>';

    echo '<label for="sobre-descricao">DESCRICAO</label>';
    echo '<br>';
    echo '<textarea name="sobre-descricao" id="sobre-descricao">' . esc_textarea($current_values->sobre_descricao) . '</textarea>';
    echo '<br>';

    echo '<h2>Experiência</h2>';
    echo '<label for="experiencia-titulo">TITULO</label>';
    echo '<br>';
    echo '<input type="text" name="experiencia-titulo" id="experiencia-titulo" value="' . esc_attr($current_values->experiencia_titulo) . '">';
    echo '<br>';

    echo '<label for="experiencia-descricao">DESCRICAO</label>';
    echo '<br>';
    echo '<textarea name="experiencia-descricao" id="experiencia-descricao">' . esc_textarea($current_values->experiencia_descricao) . '</textarea>';
    echo '<br>';

    echo '<h2>Banner - bottom</h2>';
    echo '<label for="banner-bottom-titulo">TITULO</label>';
    echo '<br>';
    echo '<input type="text" name="banner-bottom-titulo" id="banner-bottom-titulo" value="' . esc_attr($current_values->banner_bottom_titulo) . '">';
    echo '<br>';

    echo '<label for="banner-bottom-descricao">DESCRICAO</label>';
    echo '<br>';
    echo '<textarea name="banner-bottom-descricao" id="banner-bottom-descricao">' . esc_textarea($current_values->banner_bottom_descricao) . '</textarea>';
    echo '<br>';

    echo '<br><br>';
    echo '<input type="submit" name="submit" value="Salvar">';
    echo '</form>';
}
