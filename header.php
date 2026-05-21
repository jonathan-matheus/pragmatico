<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title("|", true, "right"); bloginfo("name"); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="site-shell mx-auto w-full max-w-5xl px-4 sm:px-6 lg:px-8">
        <style>
            .pragmatico-text-color {
                color:
                    <?php echo
                        sanitize_hex_color(
                            get_theme_mod('pragmatico_header_text_color', '#1a202c')
                        );
                    ?>
                ;
            }
        </style>

        <header class="site-header py-4">
            <div class="container mx-auto flex items-center justify-between px-4">
                <!-- Site Title -->
                <h1 class="site-title text-xl font-bold pragmatico-text-color"><a
                        href="<?php echo esc_url(home_url('/')); ?>">
                        <?php bloginfo('name'); ?>
                    </a></h1>

                <!-- Navigation Menu -->
                <nav class="site-navigation ml-auto flex items-center justify-center">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'primary-menu flex items-center justify-center gap-6 pragmatico-text-color',
                    ));
                    ?>
                </nav>
            </div>
        </header>