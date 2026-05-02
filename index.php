<?php
get_header();

$text_message = get_theme_mod('pragmatico_about_intro_text', '');

get_template_part('template-parts/content', 'highlight-message', [
    'message' => sanitize_text_field($text_message),
]);


$name = get_theme_mod('pragmatico_about_professional_name', '');
$role = get_theme_mod('pragmatico_about_professional_role', '');
$avatar_url = get_theme_mod('pragmatico_about_profile_photo', '');

get_template_part('template-parts/content', 'about-hero', [
    'name' => sanitize_text_field($name),
    'role' => sanitize_text_field($role),
    'avatar_url' => sanitize_url($avatar_url),
]);

$title = get_theme_mod('pragmatico_about_work_title', '');
$description = get_theme_mod('pragmatico_about_work_description', '');

get_template_part('template-parts/content', 'about-work', [
    'title' => sanitize_text_field($title),
    'description' => $description,
]);

$section_title = get_theme_mod('pragmatico_about_experience_title', '');

get_template_part('template-parts/content', 'experience-list', [
    'section_title' => sanitize_text_field($section_title),
]);

get_footer();
