<?php
/**
 * Template Name: Projects
 * Description: A template for displaying projects.
 */
get_header();
?>
<article class="row mb-160">
    <div class="col-4">
        <?= get_template_part("parts/projects_dados"); ?>
    </div>
    <div class="col-8">
        <?= get_template_part("parts/projects_lista"); ?>
    </div>
</article>
<?php
get_footer();
?>