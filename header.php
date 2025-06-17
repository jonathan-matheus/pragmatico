<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php require_once get_template_directory() . "/include/colors.php"; ?>
    <div class="container">
        <div id="header"
            class="d-flex flex-column gap-4 flex-sm-row flex-wrap justify-content-between align-items-center">
            <div>
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
                ?>
            </div>
            <nav class="d-flex flex-column flex-sm-row gap-4 align-items-center">
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                ]);
                ?>
                <a href="<?= get_theme_mod('primary_button_link', '#'); ?>">
                    <button type="button" class="btn btn-content font-1-m-b">
                        <?=
                            get_theme_mod('primary_button_text', 'Contact');
                        ?>
                    </button>
                </a>
            </nav>
        </div>