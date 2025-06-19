<article id="introducao">
    <p class="font-1-xs">
        <?=
            get_theme_mod('text_hello', 'Hey, I am');
        ?>
    </p>
    <h1 class="font-1-xxl-p texto-gradiente-triplo">
        <?=
            get_theme_mod('text_name', 'Jonathan M. Silva');
        ?>
    </h1>
    <h2 class="font-1-xxl-p texto-gradiente-triplo">
        <?=
            get_theme_mod('text_skills', 'Skills');
        ?>
    </h2>
    <p class="font-2-l c4">
        <?=
            get_theme_mod('text_biography', 'Biography');
        ?>
    </p>
    <a href="<?=
        get_theme_mod('link_button', '#');
    ?>">
        <button type="button" class="btn btn-outline-light">
            <?=
                get_theme_mod('text_button', 'Download CV');
            ?>
        </button>
    </a>
</article>