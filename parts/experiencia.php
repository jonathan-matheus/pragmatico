<?php

$query = new WP_Query([
    'post_type' => 'experiencia',
    'posts_per_page' => -1,
    'meta_key' => 'data_inicio',
    'orderby' => 'meta_value',
    'order' => 'DESC',
]);
?>
<article>
    <h1 class="font-1-xl pb-4">
        <?= get_theme_mod("experiencia_title", "Experience") ?>
    </h1>
    <div class="d-flex flex-column gap-4">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                <div class="d-flex gap-4 align-items-start">
                    <div>
                        <img src="<?= get_the_post_thumbnail_url(); ?>" width="85" alt="Imagem de Experiência">
                    </div>
                    <div>
                        <h2 class="font-1-s w"><?= get_the_title(); ?></h2>
                        <p class="font-1-xs">
                            <?= get_post_meta(get_the_ID(), 'empresa_nome', true) ?> <br>
                            <?php
                            $data_inicio = get_post_meta(get_the_ID(), 'data_inicio', true);
                            $data_fim = get_post_meta(get_the_ID(), 'data_saida', true);

                            $data_inicio_formatted = date_i18n('F \d\e Y', strtotime($data_inicio));
                            $data_fim_formatted = $data_fim ? date_i18n('F \d\e Y', strtotime($data_fim)) : null;
                            ?>
                            <?php
                            $ainda_trabalha = get_post_meta(get_the_ID(), 'ainda_trabalha', true);
                            if ($ainda_trabalha) {
                                $url = get_site_url() . "/wp-json/periodo/v1/dados?inicio={$data_inicio}";
                                $periodo_response = wp_remote_get($url);
                                error_log("PERIODO: " . print_r($periodo_response, true));
                                echo $data_inicio_formatted . " - " . __("the moment", "pragmatico") . " - " . json_decode(wp_remote_retrieve_body($periodo_response));
                            } else {
                                $url = get_site_url() . "/wp-json/periodo/v1/dados?inicio={$data_inicio}&fim={$data_fim}";
                                $periodo_response = wp_remote_get($url);
                                echo $data_inicio_formatted . " - " . $data_fim_formatted . " - " . json_decode(wp_remote_retrieve_body($periodo_response));
                            }
                            ?>
                        </p>
                        <?= get_the_content(); ?>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        }
        ?>
    </div>
</article>