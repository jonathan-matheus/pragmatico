<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/style.css'; ?> ">
    <link rel="stylesheet" href=" <?php echo get_template_directory_uri() . '/css/bootstrap.min.css'; ?> ">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body class="p1-b" <?php body_class(); ?>>