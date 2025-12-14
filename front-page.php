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

    <!-- Card de experiencias -->
    <div class="flex flex-col gap-[24px]">
        <div class="flex gap-[12px]">
            <div>
                <!-- Imagem -->
                <img src="https://media.licdn.com/dms/image/v2/D4D0BAQHbeLccvlpopA/company-logo_100_100/B4DZkLltuzHYAQ-/0/1756836060918/mesha_logo?e=1767225600&v=beta&t=7aQgqtQDXPeF0TOmk-afh585WA0BsBjTQb0DP9VVqKo"
                    alt="" class="rounded-full w-[50px] h-[50px]">
            </div>
            <div>
                <h3 class="text-white font-2-s">Full Stack PHP/WordPress</h3>
                <div class="font-2-xs text-[<?= $color::secondary() ?>]">
                    <h4>Mesha Tecnologia - Tempo integral</h4>
                    <h4>jun de 2024 - o momento - 1 ano 6 meses</h4>
                </div>
                <div class="text-white font-2-xs">
                    <p>
                        - Desenvolvimento de temas WordPress e Plugins <br>
                        - Suporte ao cliente no uso do WordPress
                    </p>
                </div>
            </div>
        </div>

        <div class="flex gap-[12px]">
            <div>
                <!-- Imagem -->
                <img src="https://media.licdn.com/dms/image/v2/D4D0BAQHbeLccvlpopA/company-logo_100_100/B4DZkLltuzHYAQ-/0/1756836060918/mesha_logo?e=1767225600&v=beta&t=7aQgqtQDXPeF0TOmk-afh585WA0BsBjTQb0DP9VVqKo"
                    alt="" class="rounded-full w-[50px] h-[50px]">
            </div>
            <div>
                <h3 class="text-white font-2-s">Full Stack PHP/WordPress</h3>
                <div class="font-2-xs text-[<?= $color::secondary() ?>]">
                    <h4>Mesha Tecnologia - Tempo integral</h4>
                    <h4>jun de 2024 - o momento - 1 ano 6 meses</h4>
                </div>
                <div class="text-white font-2-xs">
                    <p>
                        - Desenvolvimento de temas WordPress e Plugins <br>
                        - Suporte ao cliente no uso do WordPress
                    </p>
                </div>
            </div>
        </div>
</article>
<?php
get_footer();
?>