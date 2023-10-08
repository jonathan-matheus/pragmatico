<?php
// Carregadno cabeçalho
require_once('header.php');
?>

<!-- Exibe o conteudo da págian -->
<div class="s-48"></div>
<div class="container">
    <h1 class="font-1-xl w-c"><?php the_title(); ?></h1>
    <?php the_content(); ?>
</div>

<?php
// Carregando rodape
require_once('footer.php');
?>