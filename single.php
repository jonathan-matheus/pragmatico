<?php
get_header();
?>

<main class="container mx-auto max-w-4xl">
    <?php
    while (have_posts()) {
        the_post();
        ?>
        <article class="mt-[12px]">
            <!-- Imagem de capa -->
            <?php
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail(get_the_ID(), 'large', [
                    'class' => 'w-full h-96 object-cover rounded mb-6'
                ]);
            }
            ?>
            <div><?php the_content(); ?></div>
        </article>
        <?php
    }
    ?>
</main>

<?php
get_footer();
?>