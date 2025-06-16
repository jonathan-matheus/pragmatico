<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
                ?>
            </div>
            <nav>
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                ]);
                ?>
            </nav>
        </div>