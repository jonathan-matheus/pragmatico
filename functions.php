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
