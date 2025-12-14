<?php
get_header();
?>

<main>
    <?= the_content(); ?>
    <?php
    // A variável $c1 foi definida no header.php
    ?>
    <h2 class="mb-[12px] text-[<?= $c1 ?>] font-2-s">
        Experiencia
    </h2>

    <!-- Card de experiencias -->
    <div class="flex gap-[12px]">
        <div>
            <!-- Imagem -->
            <img src="https://media.licdn.com/dms/image/v2/D4D0BAQHbeLccvlpopA/company-logo_100_100/B4DZkLltuzHYAQ-/0/1756836060918/mesha_logo?e=1767225600&v=beta&t=7aQgqtQDXPeF0TOmk-afh585WA0BsBjTQb0DP9VVqKo"
                alt="" class="rounded-full w-[50px] h-[50px]">
        </div>
        <div>
            <h3>Full Stack PHP/WordPress</h3>
        </div>
    </div>
</main>

<?php
get_footer();
?>