<?php require_once('header.php'); ?>

<!-- Exibe o conteudo da págian -->
<div class="s-48"></div>
<div class="container">
    <h1 class="font-1-xl w-c"><?php the_title(); ?></h1>
    <?php the_content(); ?>
</div>

<?php
// Verifique se há um post corrente
if (have_posts()) :
    while (have_posts()) : the_post();
        // Use get_the_author() para obter o nome do autor
        $author_name = get_the_author();

        // Agora você pode usar $author_name como o nome do autor
        echo "O autor deste post é: " . $author_name;
    endwhile;
endif;
?>


<?php require_once('footer.php'); ?>