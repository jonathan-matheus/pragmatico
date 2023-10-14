<?php require_once('header.php'); ?>

<?php
// Verifique se há um post corrente, e pegando dados do autor do post
if (have_posts()) {
    while (have_posts()) {
        the_post();
        // Pega o nome do autor
        $author_name = get_the_author();
        // Pega a data de publicação do post
        $post_date = get_the_date();
        // Pega a url do avatar do author
        $author_avatar_url = get_avatar_url(get_the_author_meta('ID'));
    }
}
?>

<!-- Exibe o conteudo da págian -->
<div class="s-48"></div>
<div class="p2-b">
    <div class="s-120"></div>
    <div class="container">
        <h1 class="font-1-xl w-c"><?php the_title(); ?></h1>

        <?php
        // Verifica se o post é do tipo post, caso seja, exibe o autor e a data
        $post_type = get_post_type();
        if ($post_type == 'post') { ?>
            <div class="d-flex align-items-center">
                <div>
                    <img class="rounded-circle avatar" width="60px" src="<?php echo $author_avatar_url; ?>" alt="avatar do autor">
                </div>
                <p class="font-1-m w-c align-items-center">
                    Autor: <?php echo $author_name; ?><br>
                    Publicado em: <?php echo $post_date; ?>
                </p>
            </div>
        <?php } ?>

    </div>
    <div class="s-120"></div>
</div>
<div class="s-48"></div>
<div class="container">
    <?php the_content(); ?>
</div>

<?php require_once('footer.php'); ?>