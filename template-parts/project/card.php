<?php
$color = new GetColor();
$nome = get_post_meta(get_the_ID(), '_experiencia_nome', true);
$periodo = get_post_meta(get_the_ID(), '_experiencia_periodo', true);
?>

<div class="bg-neutral-primary-soft block max-w-sm border border-default rounded-base shadow-xs">
    <a href="<?= get_permalink(); ?>">
        <img class="rounded-t-base" src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
            alt="<?= esc_attr(get_the_title()); ?>" />
    </a>
    <div class="font-2-xs mt-[12px]">
        <a href="<?= get_permalink(); ?>">
            <h5 class="text-[<?= $color::primary() ?>]"><?= esc_html(get_the_title()); ?>
            </h5>
        </a>
    </div>
    <!-- Tecnologias utilizadas -->
    <div class="flex flex-wrap gap-2 mb-3">
        <?php
        $tecnologias = get_the_terms(get_the_ID(), 'tecnologias');

        if (!empty($tecnologias) && !is_wp_error($tecnologias)) {
            foreach ($tecnologias as $tecnologia) {
                ?>
                <span class="font-1-xs text-[<?= $color::text(); ?>] bg-neutral-secondary-soft rounded">
                    <?= esc_html($tecnologia->name); ?>
                </span>
                <?php
            }
        }
        ?>
    </div>
</div>