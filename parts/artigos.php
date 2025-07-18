<?php
$query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 6,
));
?>
<article>
    <h2 class="font-1-xl w mb-3">Artigos</h2>
    <div class="row gy-4">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                <div class="col-6">
                    <a class="link-underline link-underline-opacity-0" href="<?php get_the_permalink(); ?>">
                        <h3 class="font-1-l w"><?= get_the_title(); ?></h3>
                    </a>
                    <p class="font-1-m c9"><?= get_the_date(); ?></p>
                    <p class="c6 font-1-m">
                        <?php
                        $excerpt = get_the_excerpt();
                        $limite = 180;
                        if (strlen($excerpt) > $limite) {
                            $excerpt = substr($excerpt, 0, $limite) . '...';
                        }
                        echo $excerpt;
                        ?>
                    </p>
                </div>
            <?php }
        }
        wp_reset_postdata();
        ?>
    </div>
    <a href="<?= get_theme_mod('tertiary_button_link', '#'); ?>">
        <button type="button" class="btn btn-content font-1-m-b btn-w mt-3">
            <?= get_theme_mod('tertiary_button_text', 'Articles') ?>
        </button>
    </a>
</article>