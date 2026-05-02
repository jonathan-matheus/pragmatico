<?php

/**
 * pt-br: Impede que o arquivo seja executado fora do WordPress.
 * 
 * en: Prevents the file from running outside of WordPress.
 */
if (!defined('ABSPATH')) {
    exit;
}

$title = isset($args['title']) && is_string($args['title'])
    ? $args['title']
    : __('Work', 'pragmatico');

$description = isset($args['description']) && is_string($args['description'])
    ? $args['description']
    : __('Takuya is a freelance and a full-stack developer based in Osaka with a passion for building digital services/stuff he wants. He has a knack for all things launching products, from planning and designing all the way to solving real-life problems with code. When not online, he loves hanging out with his camera. Currently, he is living off of his own product called Inkdrop. He publishes content for marketing his products and his YouTube channel called "Dev as Life" has more than 200k subscribers.', 'pragmatico');
?>

<section class="py-8">
    <div class="mx-auto w-full max-w-3xl">
        <h3
            class="inline-block border-b-4 border-zinc-500 pb-1 text-[20px] leading-[24px] font-bold text-[rgba(255,255,255,0.92)] [font-family:'M_PLUS_Rounded_1c',sans-serif]">
            <?php echo esc_html($title); ?>
        </h3>

        <div
            class="mt-5 max-w-4xl text-[16px] leading-[24px] font-normal text-[rgba(255,255,255,0.92)] [font-family:-apple-system,BlinkMacSystemFont,'Segoe_UI',Helvetica,Arial,sans-serif,'Apple_Color_Emoji','Segoe_UI_Emoji','Segoe_UI_Symbol'] [&_p]:mb-4 [&_p:last-child]:mb-0">
            <?php echo wpautop(wp_kses_post($description)); ?>
        </div>
    </div>
</section>