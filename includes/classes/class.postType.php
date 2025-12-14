<?php
class PostType
{
    public function __construct()
    {
        add_action('init', [$this, 'register_post_type']);
        add_action('init', [$this, 'register_taxonomy']);
        add_action('init', [$this, 'insert_default_terms']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_box_data']);
    }

    public function register_post_type()
    {
        register_post_type(
            'experience',
            [
                'labels' => [
                    'name' => __('Experiences'),
                    'singular_name' => __('Experience'),
                ],
                'public' => true,
                'has_archive' => true,
                'supports' => ['title', 'editor', 'thumbnail'],
                'menu_position' => 5,
                'menu_icon' => 'dashicons-portfolio',
            ]
        );
    }

    public function add_meta_boxes()
    {
        add_meta_box(
            'experience_details',
            __('Experience Details', 'pragmatico'),
            [$this, 'render_meta_box'],
            'experience',
            'normal',
            'high'
        );
    }

    public function render_meta_box($post)
    {
        // Recuperar valores salvos
        $nome = get_post_meta($post->ID, '_experiencia_nome', true);
        $periodo = get_post_meta($post->ID, '_experiencia_periodo', true);

        // Nonce para segurança
        wp_nonce_field('experiencia_nonce', 'experiencia_nonce_field');
        ?>

        <div style="margin-bottom: 15px;">
            <label for="experiencia_nome" style="display: block; margin-bottom: 5px; font-weight: bold;">
                Nome
            </label>
            <input type="text" id="experiencia_nome" name="experiencia_nome" value="<?php echo esc_attr($nome); ?>"
                style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div>
            <label for="experiencia_periodo" style="display: block; margin-bottom: 5px; font-weight: bold;">
                Período de Tempo
            </label>
            <input type="text" id="experiencia_periodo" name="experiencia_periodo" value="<?php echo esc_attr($periodo); ?>"
                placeholder="Ex: Janeiro 2020 - Dezembro 2023"
                style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <?php
    }

    public function save_meta_box_data($post_id)
    {
        // Verificar nonce
        if (
            !isset($_POST['experiencia_nonce_field']) ||
            !wp_verify_nonce($_POST['experiencia_nonce_field'], 'experiencia_nonce')
        ) {
            return;
        }

        // Verificar permissões
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Salvar Nome
        if (isset($_POST['experiencia_nome'])) {
            update_post_meta(
                $post_id,
                '_experiencia_nome',
                sanitize_text_field($_POST['experiencia_nome'])
            );
        }

        // Salvar Período
        if (isset($_POST['experiencia_periodo'])) {
            update_post_meta(
                $post_id,
                '_experiencia_periodo',
                sanitize_text_field($_POST['experiencia_periodo'])
            );
        }
    }

    public function register_taxonomy()
    {
        register_taxonomy(
            'experience_category',
            'experience',
            [
                'labels' => [
                    'name' => __('Experience Categories'),
                    'singular_name' => __('Experience Category'),
                ],
                'hierarchical' => true,
                'public' => true,
                'show_admin_column' => true,
            ]
        );
    }

    public function insert_default_terms()
    {
        $terms = ['experiencia', 'formacao_academica', 'certificacoes'];
        foreach ($terms as $term) {
            if (!term_exists($term, 'experience_category')) {
                wp_insert_term($term, 'experience_category');
            }
        }
    }
}