<?php
require_once get_template_directory() . '/include/class.api.php';
$api = new Api();
?>
<article>
    <h1 class="font-1-xl">
        <?= get_theme_mod('project_title', 'Project'); ?>
    </h1>
    <p class="mt-4 font-1-l">
        <?=
            get_theme_mod('text_name', 'Project Name');
        ?>
    </p>
    <p class="font-1-s c4">
        <?= get_theme_mod('text_biography', 'Project Description'); ?>
    </p>
    <div>
        <h1 class="font-1-l">
            <?= get_theme_mod('technology_title', 'Technologies'); ?>
        </h1>
        <?= get_theme_mod('technology_text', 'Technologies used in the project'); ?>
    </div>
    <div>
        <h1 class="font-1-l"><?= get_theme_mod('footer_text', 'Contact information'); ?></h1>
        <p class="font-2-m c4">
            <?= get_theme_mod('footer_phone', '(99) 99999-9999'); ?> <br>
            <?= get_theme_mod('footer_email', 'text@email.com'); ?> <br>
        </p>
    </div>
    <div>
        <h1 class="font-1-l"><?= get_theme_mod('footer_socials', 'Social Media Links'); ?></h1>
        <p class="font-2-m c4">
            <?= $api->urlFormater(
                get_theme_mod('footer_linkedin', 'https://www.linkedin.com/in/jonathan')
            ) ?> <br>
            <?= $api->urlFormater(
                get_theme_mod('footer_github', 'https://github.com/jonathandev')
            ) ?> <br>
            <?= $api->urlFormater(
                get_theme_mod('footer_instagram', 'https://www.instagram.com/jonathandev')
            ) ?>
        </p>
    </div>
</article>