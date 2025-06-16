<?php
/**
 * Carrega a folha de estilos CSS do Bootstrap no tema WordPress.
 *
 * Este método adiciona a folha de estilos CSS do Bootstrap localizada no diretório
 * node_modules do tema, tornando os estilos do Bootstrap disponíveis em todo o tema.
 *
 * Métodos:
 * @method void loadBootstrap() Enfileira a folha de estilos CSS do Bootstrap.
 */
class Style
{
    /**
     * Enfileira a folha de estilos CSS do Bootstrap para o tema.
     *
     * Este método registra e enfileira o arquivo CSS do Bootstrap localizado no
     * diretório node_modules do tema. Deve ser chamado para garantir que os estilos
     * do Bootstrap estejam disponíveis no frontend.
     *
     * @return void
     */
    public function loadBootstrap(): void
    {
        wp_enqueue_style(
            "bootstrap",
            get_template_directory_uri() .
            "/node_modules/bootstrap/dist/css/bootstrap.min.css"
        );
    }

    /**
     * Enfileira a folha de estilos CSS do cabeçalho para o tema.
     *
     * Este método registra e enfileira o arquivo 'header.css' localizado no diretório assets/css do tema.
     * Deve ser chamado para garantir que os estilos do cabeçalho sejam carregados corretamente no frontend.
     *
     * @return void
     */
    public function loadHeader(): void
    {
        wp_enqueue_style(
            "header",
            get_template_directory_uri() .
            "/assets/css/header.css"
        );
    }

    public function loadFonts(): void
    {
        wp_enqueue_style(
            "fonts",
            get_template_directory_uri() .
            "/assets/css/fonts.css"
        );
    }
}
