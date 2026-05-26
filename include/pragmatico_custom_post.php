<?php
/**
 * pt-br: Aqui registramos os tipos de post personalizados usados no tema, como "Experiência" e "Projeto", além de adicionar as metaboxes para os campos personalizados relacionados a esses tipos de post.
 * en: Here we register the custom post types used in the theme, such as "Experience" and "Project", as well as adding the metaboxes for the custom fields related to these
 */


/**
 * pt-br: Impede o acesso direto ao arquivo.
 * en: Prevent direct access to the file.
 */
if (!defined('ABSPATH')) {
    exit;
}

class Pragmatico_Custom_Post
{
    public function __construct()
    {
        add_action('init', [$this, 'register_experience_post_type']);
        add_action('init', [$this, 'register_project_post_type']);
        add_action('add_meta_boxes', [$this, 'register_experience_meta_box']);
        add_action('save_post_prag_experience', [$this, 'save_experience_meta']);
    }

    public function register_experience_post_type()
    {
        $labels = [
            'name' => __('Experiences', 'pragmatico'),
            'singular_name' => __('Experience', 'pragmatico'),
            'menu_name' => __('Experiences', 'pragmatico'),
            'add_new' => __('Add New', 'pragmatico'),
            'add_new_item' => __('Add New Experience', 'pragmatico'),
            'edit_item' => __('Edit Experience', 'pragmatico'),
            'new_item' => __('New Experience', 'pragmatico'),
            'view_item' => __('View Experience', 'pragmatico'),
            'search_items' => __('Search Experiences', 'pragmatico'),
            'not_found' => __('No experiences found.', 'pragmatico'),
            'not_found_in_trash' => __('No experiences found in trash.', 'pragmatico'),
        ];

        register_post_type('prag_experience', [
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'menu_position' => 21,
            'menu_icon' => 'dashicons-id',
            'has_archive' => false,
            'rewrite' => ['slug' => 'experience'],
            'supports' => ['title', 'editor', 'thumbnail', 'page-attributes'],
        ]);
    }

    public function register_project_post_type()
    {
        $labels = [
            'name' => __('Projects', 'pragmatico'),
            'singular_name' => __('Project', 'pragmatico'),
            'menu_name' => __('Projects', 'pragmatico'),
            'add_new' => __('Add New', 'pragmatico'),
            'add_new_item' => __('Add New Project', 'pragmatico'),
            'edit_item' => __('Edit Project', 'pragmatico'),
            'new_item' => __('New Project', 'pragmatico'),
            'view_item' => __('View Project', 'pragmatico'),
            'search_items' => __('Search Projects', 'pragmatico'),
            'not_found' => __('No projects found.', 'pragmatico'),
            'not_found_in_trash' => __('No projects found in trash.', 'pragmatico'),
        ];

        register_post_type('prag_project', [
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'menu_position' => 22,
            'menu_icon' => 'dashicons-portfolio',
            'has_archive' => true,
            'rewrite' => ['slug' => 'projects'],
            'supports' => ['title', 'editor', 'thumbnail'],
        ]);
    }

    public function register_experience_meta_box()
    {
        add_meta_box(
            'pragmatico_experience_details',
            __('Experience Details', 'pragmatico'),
            [$this, 'render_experience_meta_box'],
            'prag_experience',
            'normal',
            'high'
        );
    }

    public function render_experience_meta_box($post)
    {
        wp_nonce_field('pragmatico_save_experience_meta', 'pragmatico_experience_nonce');

        $role = get_post_meta($post->ID, '_pragmatico_role', true);
        $company_name = get_post_meta($post->ID, '_pragmatico_company_name', true);
        $work_start = get_post_meta($post->ID, '_pragmatico_work_start', true);
        $work_end = get_post_meta($post->ID, '_pragmatico_work_end', true);
        $work_current = get_post_meta($post->ID, '_pragmatico_work_current', true);
        $location = get_post_meta($post->ID, '_pragmatico_location', true);
        $work_type = get_post_meta($post->ID, '_pragmatico_work_type', true);

        echo '<p><label for="pragmatico_role"><strong>' . esc_html__('Role', 'pragmatico') . '</strong></label><br>';
        echo '<input type="text" id="pragmatico_role" name="pragmatico_role" value="' . esc_attr($role) . '" class="widefat"></p>';

        echo '<p><label for="pragmatico_company_name"><strong>' . esc_html__('Company Name', 'pragmatico') . '</strong></label><br>';
        echo '<input type="text" id="pragmatico_company_name" name="pragmatico_company_name" value="' . esc_attr($company_name) . '" class="widefat"></p>';

        echo '<p><strong>' . esc_html__('Work Period', 'pragmatico') . '</strong></p>';
        echo '<p><label for="pragmatico_work_start"><strong>' . esc_html__('Start Date', 'pragmatico') . '</strong></label><br>';
        echo '<input type="date" id="pragmatico_work_start" name="pragmatico_work_start" value="' . esc_attr($work_start) . '" class="widefat"></p>';

        echo '<p><label for="pragmatico_work_end"><strong>' . esc_html__('End Date', 'pragmatico') . '</strong></label><br>';
        echo '<input type="date" id="pragmatico_work_end" name="pragmatico_work_end" value="' . esc_attr($work_end) . '" class="widefat"></p>';

        echo '<p><label for="pragmatico_work_current">';
        echo '<input type="checkbox" id="pragmatico_work_current" name="pragmatico_work_current" value="1" ' . checked($work_current, '1', false) . '> ';
        echo esc_html__('Present (I currently work here)', 'pragmatico');
        echo '</label></p>';

        echo '<p><label for="pragmatico_location"><strong>' . esc_html__('Location', 'pragmatico') . '</strong></label><br>';
        echo '<input type="text" id="pragmatico_location" name="pragmatico_location" value="' . esc_attr($location) . '" class="widefat"></p>';

        echo '<p><label for="pragmatico_work_type"><strong>' . esc_html__('Work Type', 'pragmatico') . '</strong></label><br>';
        echo '<select id="pragmatico_work_type" name="pragmatico_work_type" class="widefat">';

        $types = [
            'presencial' => __('Presencial', 'pragmatico'),
            'hibrido' => __('Hibrido', 'pragmatico'),
            'remoto' => __('Remoto', 'pragmatico'),
        ];

        foreach ($types as $value => $label) {
            echo '<option value="' . esc_attr($value) . '" ' . selected($work_type, $value, false) . '>' . esc_html($label) . '</option>';
        }

        echo '</select></p>';

        echo '<p class="description">' . esc_html__('Use the post content editor for the job description (what you did).', 'pragmatico') . '</p>';
    }

    public function save_experience_meta($post_id)
    {
        if (!isset($_POST['pragmatico_experience_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['pragmatico_experience_nonce'])), 'pragmatico_save_experience_meta')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $fields = [
            '_pragmatico_role' => 'pragmatico_role',
            '_pragmatico_company_name' => 'pragmatico_company_name',
            '_pragmatico_location' => 'pragmatico_location',
            '_pragmatico_work_type' => 'pragmatico_work_type',
        ];

        foreach ($fields as $meta_key => $post_field) {
            if (isset($_POST[$post_field])) {
                update_post_meta($post_id, $meta_key, sanitize_text_field(wp_unslash($_POST[$post_field])));
            }
        }

        $work_start = '';
        if (isset($_POST['pragmatico_work_start'])) {
            $work_start = sanitize_text_field(wp_unslash($_POST['pragmatico_work_start']));
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $work_start)) {
                $work_start = '';
            }
        }

        $is_current = isset($_POST['pragmatico_work_current']) ? '1' : '0';
        $work_end = '';

        if ($is_current !== '1' && isset($_POST['pragmatico_work_end'])) {
            $work_end = sanitize_text_field(wp_unslash($_POST['pragmatico_work_end']));
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $work_end)) {
                $work_end = '';
            }
        }

        update_post_meta($post_id, '_pragmatico_work_start', $work_start);
        update_post_meta($post_id, '_pragmatico_work_end', $work_end);
        update_post_meta($post_id, '_pragmatico_work_current', $is_current);

        $work_period = '';
        if ($work_start !== '') {
            $work_period = $work_start . ' - ' . ($is_current === '1' ? 'Present' : $work_end);
        }
        update_post_meta($post_id, '_pragmatico_work_period', trim($work_period, ' -'));
    }
}

new Pragmatico_Custom_Post();
