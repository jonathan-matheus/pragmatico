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

// cria o post type projetos
require_once('php/projetos.php');

// criando taxonomias
require_once('php/taxonomias.php');

// cria post type experiencia
require_once('php/experiencia.php');

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

function pragmatico_banner($titulo, $descricao)
{
    echo '<div class="s-48"></div>';
    echo '<div class="container p2-b banner">';
    echo '<h2 class="w-c font-1-xl">' . $titulo . '</h2>';
    echo '<p class="c4-c font-1-m">' . $descricao . '</p>';
    echo '</div>';
}
