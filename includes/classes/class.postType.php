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
        $data_inicio = get_post_meta($post->ID, '_experiencia_data_inicio', true);
        $data_fim = get_post_meta($post->ID, '_experiencia_data_fim', true);
        $ativo = get_post_meta($post->ID, '_experiencia_ativo', true);

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

        <div>
            <label for="experiencia_data_inicio" style="display: block; margin-bottom: 5px; font-weight: bold;">
                Data de Início
            </label>
            <input type="date" id="experiencia_data_inicio" name="experiencia_data_inicio"
                value="<?php echo esc_attr($data_inicio); ?>"
                style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div>
            <label for="experiencia_data_fim" style="display: block; margin-bottom: 5px; font-weight: bold;">
                Data de Fim
            </label>
            <input type="date" id="experiencia_data_fim" name="experiencia_data_fim" value="<?php echo esc_attr($data_fim); ?>"
                style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div>
            <label>
                <input type="checkbox" id="experiencia_ativo" name="experiencia_ativo" <?php checked($ativo, 'on'); ?>>
                Em andamento
            </label>
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

        if (isset($_POST['experiencia_data_inicio'])) {
            update_post_meta(
                $post_id,
                '_experiencia_data_inicio',
                sanitize_text_field($_POST['experiencia_data_inicio'])
            );
        }

        if (isset($_POST['experiencia_data_fim'])) {
            update_post_meta(
                $post_id,
                '_experiencia_data_fim',
                sanitize_text_field($_POST['experiencia_data_fim'])
            );
        }

        if (isset($_POST['experiencia_ativo'])) {
            update_post_meta(
                $post_id,
                '_experiencia_ativo',
                sanitize_text_field($_POST['experiencia_ativo'])
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

class ProjectType
{
    public function __construct()
    {
        add_action('init', [$this, 'register_post_type']);
        add_action('init', [$this, 'register_taxonomy']);
    }

    public function register_post_type()
    {
        register_post_type(
            'projeto',
            [
                'labels' => [
                    'name' => __('Projetos'),
                    'singular_name' => __('Projeto'),
                ],
                'public' => true,
                'has_archive' => true,
                'supports' => ['title', 'editor', 'thumbnail'],
                'menu_position' => 6,
                'menu_icon' => 'dashicons-layout',
                'rewrite' => ['slug' => 'projetos'],
            ]
        );
    }

    public function register_taxonomy()
    {
        register_taxonomy(
            'tecnologias',
            'projeto',
            [
                'labels' => [
                    'name' => __('Tecnologias'),
                    'singular_name' => __('Tecnologia'),
                ],
                'hierarchical' => true,
                'public' => true,
                'show_admin_column' => true,
            ]
        );
    }
}