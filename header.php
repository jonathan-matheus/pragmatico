<?php
$titulo = get_bloginfo('name');
$home_url = get_home_url();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="container pt-2 pb-2">
        <div class="d-flex flex-wrap justify-content-between">
            <div>
                <a class="text-decoration-none" href="<?= esc_attr($home_url) ?>">
                    <h1 class="font-inter white"><?= $titulo ?></h1>
                </a>
            </div>
            <div>
                <?php
                if (has_nav_menu('header-menu')) {
                    wp_nav_menu([
                        'theme_location' => 'header-menu',
                        'container' => false,
                        'menu_class' => 'nav gap-3',
                        'depth' => 1,
                    ]);
                }
                ?>
            </div>
        </div>
        <hr class="opacidade-50 m-0 p-0">
    </div>