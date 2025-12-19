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
        'meta_key' => '_experiencia_data_inicio',
        'orderby' => 'meta_value',
        'order' => 'DESC'
    ];
    $query = new WP_Query($args_experiencia);
    ?>
    <!-- Card de experiencias -->
    <div class="flex flex-col gap-[24px]">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('template-parts/experience/card');
            }
            wp_reset_postdata();
        } else {
            echo '<p class="text-white">Nenhuma experiência encontrada.</p>';
        }
        wp_reset_postdata();
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
                get_template_part('template-parts/experience/card');
            }
            wp_reset_postdata();
        } else {
            echo '<p class="text-white">Nenhuma experiência encontrada.</p>';
        }
        wp_reset_postdata();
        ?>
</article>

<article>
    <h2 class="mt-[32px] mb-[12px] text-[<?= $color::primary() ?>] font-2-s">
        Licenças e certificações
    </h2>
    <?php
    $args_experiencia = [
        'post_type' => 'experience',
        'posts_per_page' => -1,
        'tax_query' => [
            [
                'taxonomy' => 'experience_category',
                'field' => 'slug',
                'terms' => 'certificacoes',
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
                get_template_part('template-parts/experience/card');
            }
            wp_reset_postdata();
        } else {
            echo '<p class="text-white">Nenhuma experiência encontrada.</p>';
        }
        wp_reset_postdata();
        ?>
</article>
<article>
    <h2 class="mt-[32px] mb-[12px] text-[<?= $color::primary() ?>] font-2-s">
        Habilidades
    </h2>
    <?php
    $args_tecnologias = [
        'taxonomy' => 'tecnologias',
        'hide_empty' => false,
    ];

    foreach (get_terms($args_tecnologias) as $tecnologia) {
        echo '<span class="inline-block bg-white text-black rounded px-4 py-2 mr-2 mb-2 font-1-xs">' . esc_html($tecnologia->name) . '</span>';
    }
    ?>
</article>
<article>
    <h2 class="mt-[32px] mb-[12px] text-[<?= $color::primary() ?>] font-2-s">
        Projetos
    </h2>
    <?php
    $args_projetos = [
        'post_type' => 'projeto',
        'posts_per_page' => 2,
    ];
    $query = new WP_Query($args_projetos);
    ?>
    <!-- Card de projetos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-[20px]">
        <?php
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('template-parts/project/card');
            }
            wp_reset_postdata();
        } else {
            echo '<p class="text-white">Nenhum projeto encontrado.</p>';
        }
        wp_reset_postdata();
        ?>
    </div>
</article>
<?php
get_footer();
?>