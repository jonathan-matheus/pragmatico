<?php
/**
 * Template Name: Projetos
 */

get_header();
require_once get_template_directory() . '/includes/classes/class.getColor.php';
$color = new GetColor();
?>
<main class="my-8">
    <div class="grid grid-cols-2 gap-4">
        <?php
        $args_projetos = [
            'post_type' => 'projeto',
            'posts_per_page' => 2,
        ];
        $query = new WP_Query($args_projetos);
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                ?>
                <article class="mb-8">
                    <div class="h-48">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?= the_post_thumbnail_url(); ?>" class="w-full h-full object-cover object-center block">
                        </a>
                    </div>
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
    </div>
</main>
<?php
get_footer();
?>