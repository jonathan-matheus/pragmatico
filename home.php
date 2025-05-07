<?php
get_header();
?>
<div class="container">
    <div class="d-flex flex-column justify-content-center align-items-center vh-100 text-center">
        <h1 class="text-white"><?php echo get_theme_mod('home_title', 'Ola, eu sou John'); ?></h1>
        <p class="text-secondary">
            <?php echo get_theme_mod('home_subtitle', 'Web design focado em soluções elegantes'); ?>
        </p>
        <button type="button"
            class="btn btn-secondary"><?php echo get_theme_mod('home_button_text', 'Veja meus projetos'); ?></button>
    </div>
</div>
<?php
get_footer();
?>