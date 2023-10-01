<?php
// adiciona alguns suportes ao tema
require_once('php/suporte.php');

// registra o menu
require_once('php/menu.php');

// executa algumas funções durante a instalação como criar páginas
require_once('php/ativacao.php');

// pagina do thema com os textos da front page
require_once('php/textos-front-page.php');

// cria as tabelas nescessarias no banco de dados
require_once('php/banco-de-dados.php');

// cria o post type servicos
require_once('php/servicos.php');

// FUNÇÕES GEREAIS

/**
 * Gera um elemento HTML de botão com um link e um valor.
 *
 * @param string $link O URL para o qual o botão deve apontar.
 * @param string $valor O texto que deve ser exibido no botão.
 * @return void
 */
function pragmatico_botao($link, $valor)
{
    echo '<div class="botao w-b">';
    echo '<a class="c12-c" href="' . $link . '">' . $valor . '</a>';
    echo '</div>';
}
