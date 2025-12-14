<?php
$c1 = get_theme_mod('pragmatico_primary_color', '#f7f7f7');
$c5 = get_theme_mod('pragmatico_secondary_color', '#b2b2b2');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="container mx-auto max-w-4xl mt-[14px] px-4 md:px-0">
        <header>
            <div class="flex flex-col md:flex-row gap-4 md:gap-0 items-center justify-between">
                <div>
                    <h1 class="text-[<?php echo $c1; ?>] font-1-m-b"><a
                            href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                </div>
                <div>
                    <nav class="primary-navigation text-[<?php echo $c1; ?>]">
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
                <h1 class="text-[<?php echo $c1; ?>] mt-[120px]  font-1-xl"><?= get_the_title(); ?></h1>
                <p class="text-[<?php echo $c5; ?>] font-1-xs"><?= get_the_excerpt(); ?></p>
            </div>
        </header>