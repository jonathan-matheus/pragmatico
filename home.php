<?php
get_header();
require_once get_template_directory() . '/includes/classes/class.getColor.php';
$color = new GetColor();
?>
<main class="my-8">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>
            <article class="mb-8">
                <h2 class="text-[<?= $color::primary() ?>] font-1-l mb-2"><a
                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="text-[<?= $color::secondary() ?>] font-1-s">
                    <?php the_excerpt(); ?>
                </div>
            </article>
            <?php
        endwhile;

        // Pagination
        the_posts_pagination([
            'mid_size' => 2,
            'prev_text' => __('« Previous', 'pragmatico'),
            'next_text' => __('Next »', 'pragmatico'),
        ]);
    else:
        ?>
        <p class="text-[<?= $color::secondary() ?>] font-1-s"><?php _e('No posts found.', 'pragmatico'); ?></p>
        <?php
    endif;
    ?>
</main>
<?php
get_footer();
?>