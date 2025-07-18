<?php
$query = new WP_Query([
    'post_type' => 'projetos',
    'posts_per_page' => 3,
    'order' => 'ASC',
]);

$contador = 1;
?>
<article>
    <h2 class="font-1-xl w"><?= get_theme_mod('project_title', 'Projects') ?></h2>
    <div class="d-flex flex-column gap-5">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                if ($contador == 0) {
                    $contador++;
                } else {
                    $contador = 0;
                }
                ?>
                <div class="row g-5 align-items-center <?= $contador ? 'flex-row-reverse' : '' ?>">
                    <div class="col-12 col-md-7">
                        <img src="<?= get_the_post_thumbnail_url(); ?>" class="img-fluid" alt="Imagem do projeto">
                    </div>
                    <div class="col-12 col-md-5 d-flex flex-column align-items-end text-end">
                        <p class="font-1-xs c9"><?= get_post_meta(get_the_ID(), 'projeto_tipo', true); ?></p>
                        <h1 class="font-2-l-b"><?= get_the_title(); ?></h1>
                        <p class="font-2-s">
                            <?= get_the_content(); ?>
                        </p>
                        <div class="d-flex gap-2 font-1-xs c9">
                            <?php
                            $termos = get_the_terms(get_the_ID(), 'tecnologia');
                            if ($termos && !is_wp_error($termos)) {
                                foreach ($termos as $termo) {
                                    echo '<span>' . esc_html($termo->name) . '</span>';
                                }
                            }
                            ?>
                        </div>
                        <?php
                        $get_url = get_site_url() . "/wp-json/url/v1/formatar?url=" . urlencode(get_post_meta(get_the_ID(), 'projeto_link', true));
                        $url_response = wp_remote_get($get_url);
                        $formatted_url = json_decode(wp_remote_retrieve_body($url_response), true);
                        ?>
                        <a href="<?= get_post_meta(get_the_ID(), 'projeto_link', true); ?>" target="_blank"
                            class="font-2-s c7"><?= $formatted_url ?></a>
                    </div>
                </div>
            <?php }
        }
        wp_reset_postdata();
        ?>
    </div>
    <a href="<?= get_theme_mod('secondary_button_link', '#'); ?>">
        <button type="button" class="btn btn-content font-1-m-b btn-w mt-3">
            <?= get_theme_mod('secondary_button_text', 'Projects') ?>
        </button>
    </a>
</article>