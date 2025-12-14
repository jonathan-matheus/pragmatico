<?php
get_header();
require_once get_template_directory() . '/includes/classes/class.getColor.php';
$color = new GetColor();
?>

<main>
    <?= the_content(); ?>
    <?php
    // A variável $c1 foi definida no header.php
    ?>
</main>
<article>
    <h2 class="mt-[32px] mb-[12px] text-[<?= $color::primary() ?>] font-2-s">
        Experiencia
    </h2>
    <?php
    $args_experiencia = [
        'post_type' => 'experience',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'experience_category',
                'field' => 'slug',
                'terms' => 'experiencia',
            ],
        ],
    ];

    $query = new WP_Query($args_experiencia);
    ?>
    <!-- Card de experiencias -->
    <div class="flex flex-col gap-[24px]">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                <div class="flex gap-[12px]">
                    <div>
                        <!-- Imagem -->
                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?= get_the_title(); ?>"
                            class="rounded-full w-[50px] h-[50px]">
                    </div>
                    <div>
                        <h3 class="text-white font-2-s"><?= get_the_title(); ?></h3>
                        <div class="font-2-xs text-[<?= $color::secondary() ?>]">
                            <h4><?= get_post_meta(get_the_ID(), '_experiencia_nome', true); ?></h4>
                            <h4><?= get_post_meta(get_the_ID(), '_experiencia_periodo', true); ?></h4>
                        </div>
                        <div class="text-white font-2-xs">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p class="text-white">Nenhuma experiência encontrada.</p>';
        }
        ?>
</article>

<article>
    <h2 class="mt-[32px] mb-[12px] text-[<?= $color::primary() ?>] font-2-s">
        Formação acadêmica
    </h2>
    <?php
    $args_experiencia = [
        'post_type' => 'experience',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'experience_category',
                'field' => 'slug',
                'terms' => 'formacao_academica',
            ],
        ],
    ];

    $query = new WP_Query($args_experiencia);
    ?>
    <!-- Card de experiencias -->
    <div class="flex flex-col gap-[24px]">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                <div class="flex gap-[12px]">
                    <div>
                        <!-- Imagem -->
                        <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?= get_the_title(); ?>"
                            class="rounded-full w-[50px] h-[50px]">
                    </div>
                    <div>
                        <h3 class="text-white font-2-s"><?= get_the_title(); ?></h3>
                        <div class="font-2-xs text-[<?= $color::secondary() ?>]">
                            <h4><?= get_post_meta(get_the_ID(), '_experiencia_nome', true); ?></h4>
                            <h4><?= get_post_meta(get_the_ID(), '_experiencia_periodo', true); ?></h4>
                        </div>
                        <div class="text-white font-2-xs">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p class="text-white">Nenhuma experiência encontrada.</p>';
        }
        ?>
</article>
<?php
get_footer();
?>