<?php
require_once get_template_directory() . '/includes/classes/class.getColor.php';
$color = new GetColor();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <?php
    if (is_singular()) {
        $desc = get_the_excerpt();
    } else {
        $desc = get_bloginfo('description');
    }
    ?>
    <meta name="description" content="<?= esc_attr($desc) ?> ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="container mx-auto max-w-4xl mt-[14px] px-4 md:px-0">
        <header>
            <div class="flex flex-col md:flex-row gap-4 md:gap-0 items-center justify-between">
                <div>
                    <h1 class="text-[<?= $color::primary() ?>] font-1-m-b"><a
                            href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                </div>
                <div>
                    <nav class="primary-navigation text-[<?= $color::primary() ?>]">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'menu_class' => 'primary-menu flex gap-4 font-1-m flex-col md:flex-row text-center md:text-left',
                            'container' => false,
                            'fallback_cb' => false,
                            'link_before' => '<span class="hover:underline">',
                            'link_after' => '</span>',
                        ]);
                        ?>
                    </nav>
                </div>
            </div>

            <div class="text-center">
                <h1 class="text-[<?= $color::primary() ?>] mt-[120px]  font-1-xl"><?= get_the_title(); ?></h1>
                <?php if (is_page()) { ?>
                    <p class="text-[<?= $color::secondary() ?>] font-1-xs"><?= get_the_excerpt(); ?></p>
                <?php } ?>
            </div>
        </header>