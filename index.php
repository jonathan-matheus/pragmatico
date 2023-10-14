<?php require_once('header.php'); ?>

<?php
/**
 * Pagando textos passados pelo usuario, esses textos são usados nos banners
 */
require_once('php/pegando_textos.php');
?>

<!-- Exibe o conteudo da págian -->
<div class="s-48"></div>
<div class="p2-b">
    <div class="s-120"></div>
    <div class="container">
        <h1 class="font-1-xl text-uppercase w-c"><?php the_title(); ?></h1>

        <?php
        // Verifica se o post é do tipo post, caso seja, exibe o autor e a data
        $post_type = get_post_type();
        if ($post_type == 'post') {
            include('php/author.php');
        }
        ?>

    </div>
    <div class="s-120"></div>
</div>
<div class="s-48"></div>

<?php
/** 
 * verifica se eu estou na página portfolio, ou blog, se sim ira caregar o 
 * conteudo de portifolio ou blog
 */
if (is_page('portfolio')) {
    include('php/portifolio.php');
} else if (is_page('blog')) {
    include('php/list_posts.php');
}
?>

<!-- Exibe o conteudo do post/pagina -->
<div class="container">
    <?php
    if (!is_page('portfolio') && !is_page('blog')) {
        the_content();
    }
    ?>
</div>

<?php
/**
 * Exibe o banner de rodape
 * 
 * Os dados ($banner_bottom_titulo, $banner_bottom_descricao) vem do arquivo 
 * arquivo php/pegando_textos.php, logo e nescessario que ele esteja incluído
 */
pragmatico_banner($banner_bottom_titulo, $banner_bottom_descricao);
?>

<div class="s-48"></div>

<?php require_once('footer.php'); ?>