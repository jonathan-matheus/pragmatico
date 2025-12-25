<?php
get_header();
?>

<main class="container mx-auto max-w-4xl entry-content">
    <?php
    while (have_posts()) {
        the_post();
        ?>
        <article class="mt-[12px]">
            <!-- Imagem de capa -->
            <?php
            if (has_post_thumbnail()) {
                ?>
                <div class="relative h-[20vh] bg-cover bg-center flex items-center justify-center"
                    style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>');">
                    <!-- Overlay escuro -->
                    <div class="absolute inset-0 bg-black/80"></div>

                    <!-- Título -->
                    <h1 class="relative z-10 text-white text-4xl md:text-6xl font-1-xl text-center px-4">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <?php
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