<?php
// carrega o cabeçalho
require_once('header.php');
?>

<?php
$args = [
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish'
];

$posts = new WP_Query($args);
if ($posts->have_posts()) {
    echo '<div class="s-48"></div>';
    echo '<div class="container d-flex flex-wrap">';
    while ($posts->have_posts()) {
        $posts->the_post();
        echo '<div class="col-12 col-sm-6 s-20">';
        echo '<h1 class="font-1-l w-c fw-bold"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h1>';
        echo '<p class="font-2-xs c4-c">' . get_the_date() . '</p>';
        echo '<p class="font-2-xs c5-c">' . wp_trim_words(get_the_content(), 30) . '...</p>';
        echo '</div>';
    }
    echo '</div>';
}
?>


<?php
// carrgando o rodape
require_once('footer.php');
?>