<?php
// pega os dados do autor
while (have_posts()) {
    the_post();
    // Pega o nome do autor
    $author_name = get_the_author();
    // Pega a data de publicação do post
    $post_date = get_the_date();
    // Pega a url do avatar do author
    $author_avatar_url = get_avatar_url(get_the_author_meta('ID'));
}
?>

<!-- HTML do autor -->
<div class="d-flex align-items-center">
    <div>
        <img class="rounded-circle avatar" width="60px" src="<?php echo $author_avatar_url; ?>" alt="avatar do autor">
    </div>
    <p class="font-1-m w-c align-items-center">
        Autor: <?php echo $author_name; ?><br>
        Publicado em: <?php echo $post_date; ?>
    </p>
</div>