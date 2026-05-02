<?php

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="mx-auto w-full max-w-3xl py-10">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('space-y-6'); ?>>
                <header class="space-y-2">
                    <h1 class="text-[28px] leading-[34px] font-bold text-[rgba(255,255,255,0.92)] [font-family:'M_PLUS_Rounded_1c',sans-serif]">
                        <?php the_title(); ?>
                    </h1>

                    <p class="text-[14px] leading-[22px] font-normal text-[rgba(255,255,255,0.65)] [font-family:-apple-system,BlinkMacSystemFont,'Segoe_UI',Helvetica,Arial,sans-serif,'Apple_Color_Emoji','Segoe_UI_Emoji','Segoe_UI_Symbol']">
                        <?php echo esc_html(get_the_date()); ?>
                    </p>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <figure class="overflow-hidden rounded-2xl">
                        <?php the_post_thumbnail('full', ['class' => 'h-auto w-full object-cover']); ?>
                    </figure>
                <?php endif; ?>

                <div class="text-[16px] leading-[28px] font-normal text-[rgba(255,255,255,0.9)] [font-family:-apple-system,BlinkMacSystemFont,'Segoe_UI',Helvetica,Arial,sans-serif,'Apple_Color_Emoji','Segoe_UI_Emoji','Segoe_UI_Symbol'] [&_p]:mb-5 [&_p:last-child]:mb-0 [&_h2]:mt-10 [&_h2]:mb-4 [&_h2]:text-[24px] [&_h2]:leading-[30px] [&_h2]:font-bold [&_h3]:mt-8 [&_h3]:mb-3 [&_h3]:text-[20px] [&_h3]:leading-[28px] [&_h3]:font-bold [&_ul]:mb-5 [&_ul]:list-disc [&_ul]:pl-6 [&_ol]:mb-5 [&_ol]:list-decimal [&_ol]:pl-6 [&_a]:underline">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
