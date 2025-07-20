<?php
require_once get_template_directory() . '/include/class.api.php';
$api = new Api();

$query = new WP_Query([
    'post_type' => 'meditations',
    'posts_per_page' => 1,
    'orderby' => 'rand'
]);
?>
<div class="text-center">
    <h1 class="font-1-xl"><?= get_theme_mod('meditacoes_setting', 'Meditations'); ?></h1>
    <div class="w-50 mx-auto font-2-m mt-3">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                the_content();
            }
        }
        ?>
    </div>
</div>
<div class="mt-5 d-flex justify-content-between">
    <div>
        <h1 class="font-1-l"><?= get_theme_mod('footer_text', 'Contact information'); ?></h1>
        <p class="font-2-m c4">
            <?= get_theme_mod('footer_phone', '(99) 99999-9999'); ?> <br>
            <?= get_theme_mod('footer_email', 'text@email.com'); ?> <br>
        </p>
    </div>
    <div class="text-end">
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
</div>
</div>
<?php
wp_footer();
?>
</body>

</html>