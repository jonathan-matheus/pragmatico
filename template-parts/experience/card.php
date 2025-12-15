<?php
$color = new GetColor();
$nome = get_post_meta(get_the_ID(), '_experiencia_nome', true);
$periodo = get_post_meta(get_the_ID(), '_experiencia_periodo', true);
?>

<div class="flex gap-[12px]">
    <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?= esc_attr(get_the_title()); ?>"
        class="rounded-full w-[50px] h-[50px]">
    <div>
        <h3 class="text-white font-2-s"><?= get_the_title(); ?></h3>
        <div class="font-2-xs text-[<?= $color::secondary() ?>]">
            <h4><?= $nome ?></h4>
            <h4><?= $periodo ?></h4>
        </div>
        <div class="text-white font-2-xs">
            <p><?php the_content(); ?></p>
        </div>
    </div>
</div>