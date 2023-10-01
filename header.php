<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/css/bootstrap.min.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/css/cabecalho.css'; ?>">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/css/banners.css'; ?>">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; ?> ">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body class="p1-b" <?php body_class(); ?>>
    <div class="cabecalho s-48 container d-flex align-items-center justify-content-between">
        <!-- Titulo -->
        <h1 class="font-1-xl w-c"><?php bloginfo('name'); ?></h1>

        <!-- Menu -->
        <nav class="menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'menu'
                )
            )
            ?>
        </nav>

        <!-- Botão -->
        <div class="botao p2-b">
            <a class="c4-c" href="/contato">CONTATO</a>
        </div>
    </div>