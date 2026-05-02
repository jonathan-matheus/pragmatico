<?php
/**
 * Template Name: Popular Posts Grid
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$posts_query = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
]);
?>

<main class="px-4 py-10 sm:px-6">
    <section class="mx-auto w-full max-w-3xl">
        <h1 class="mb-6 text-[20px] leading-[24px] font-bold text-[rgba(255,255,255,0.92)] [font-family:'M_PLUS_Rounded_1c',sans-serif]">
            <?php esc_html_e('Popular Posts', 'pragmatico'); ?>
        </h1>

        <?php if ($posts_query->have_posts()): ?>
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2">
                <?php while ($posts_query->have_posts()):
                    $posts_query->the_post(); ?>
                    <article>
                        <a href="<?php the_permalink(); ?>" class="block">
                            <div class="overflow-hidden rounded-2xl">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('large', [
                                        'class' => 'h-44 w-full object-cover',
                                        'loading' => 'lazy',
                                    ]); ?>
                                <?php else: ?>
                                    <div class="h-44 w-full rounded-2xl bg-zinc-200"></div>
                                <?php endif; ?>
                            </div>

                            <h2 class="mt-3 text-center text-[16px] leading-[24px] font-normal text-[rgba(255,255,255,0.92)] [font-family:-apple-system,BlinkMacSystemFont,'Segoe_UI',Helvetica,Arial,sans-serif,'Apple_Color_Emoji','Segoe_UI_Emoji','Segoe_UI_Symbol']">
                                <?php echo esc_html(get_the_title()); ?>
                            </h2>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>
                <?php esc_html_e('No posts found.', 'pragmatico'); ?>
            </p>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </section>
</main>

<?php get_footer(); ?>
