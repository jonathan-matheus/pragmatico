<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
        <nav class="primary-navigation">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class' => 'primary-menu',
                'container' => false,
                'fallback_cb' => false
            ]);
            ?>
        </nav>
    </header>