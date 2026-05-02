<?php

if (!defined('ABSPATH')) {
    exit;
}

$name = isset($args['name']) && is_string($args['name'])
    ? $args['name']
    : get_bloginfo('name');

$role = isset($args['role']) && is_string($args['role'])
    ? $args['role']
    : __('Digital Craftsman ( Artist / Developer / Designer )', 'pragmatico');

$avatar_url = isset($args['avatar_url']) && is_string($args['avatar_url']) && $args['avatar_url'] !== ''
    ? $args['avatar_url']
    : 'https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?auto=format&fit=crop&w=200&q=80';
?>

<section class="py-6">
    <div class="mx-auto flex w-full max-w-3xl items-center justify-between gap-6">
        <div>
            <h2
                class="text-[36px] leading-[43px] font-bold pragmatico-text-color [font-family:'M_PLUS_Rounded_1c',sans-serif]">
                <?php echo esc_html($name); ?>
            </h2>
            <p
                class="mt-2 text-[16px] leading-[24px] font-normal pragmatico-text-color [font-family:-apple-system,BlinkMacSystemFont,'Segoe_UI',Helvetica,Arial,sans-serif,'Apple_Color_Emoji','Segoe_UI_Emoji','Segoe_UI_Symbol']">
                <?php echo esc_html($role); ?>
            </p>
        </div>

        <div class="shrink-0">
            <img src="<?php echo esc_url($avatar_url); ?>" alt="<?php echo esc_attr($name); ?>"
                class="h-32 w-32 rounded-full border-2 border-zinc-200 object-cover">
        </div>
    </div>
</section>