<div>
    <ul class="list-unstyled d-flex flex-wrap gap-3">
        <li class="w">Todos</li>
        <?php
        $tecnologias = get_terms([
            'taxonomy' => 'tecnologia',
            'hide_empty' => false,
        ]);
        foreach ($tecnologias as $tecnologia) {
            echo '<li>' . $tecnologia->name . '</li>';
        }
        ?>
    </ul>

    <?php
    $args_projetos = [
        'post_type' => 'projetos',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    ];
    $projetos = new WP_Query($args_projetos);
    if ($projetos->have_posts()) {
        while ($projetos->have_posts()) {
            $projetos->the_post();
            $image[] = get_the_post_thumbnail_url(get_the_ID(), 'full');
        }
    }
    wp_reset_postdata();
    ?>
    <div class="row g-3">
        <?php
        if (!empty($image)) {
            foreach ($image as $img) {
                echo '<div class="col-6">';
                echo '<img class="img-fluid" src="' . esc_url($img) . '" alt="' . esc_attr(get_the_title()) . '">';
                echo '</div>';
            }
        } else {
            echo '<p>No projects found.</p>';
        }
        ?>
    </div>
</div>