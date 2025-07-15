<?php
class ProjetosPostType
{
    public function registerPostType()
    {
        register_post_type(
            'projetos',
            [
                'labels' => [
                    'name' => __('Projetos', 'pragmatico'),
                    'singular_name' => __('Projeto', 'pragmatico'),
                ],
                'public' => true,
                'has_archive' => true,
                'rewrite' => ['slug' => 'projetos'],
                'supports' => ['title', 'editor', 'thumbnail']
            ]
        );
    }

    public function registerTaxonomy()
    {
        register_taxonomy(
            'tecnologia',
            'projetos',
            [
                'labels' => [
                    'name' => __('Tecnologias', 'pragmatico'),
                    'singular_name' => __('Tecnologia', 'pragmatico'),
                ],
                'hierarchical' => true,
                'public' => true,
                'show_admin_column' => true,
                'rewrite' => ['slug' => 'tecnologia'],
            ]
        );
    }

    public function addMetaBoxes()
    {
        add_meta_box(
            'projetos_info_metabox',
            __('Informações do Projeto', 'pragmatico'),
            [$this, 'renderMetaBox'],
            'projetos',
            'normal',
        );
    }

    public function renderMetaBox($post)
    {
        $tipo = get_post_meta($post->ID, 'projeto_tipo', true);
        $link = get_post_meta($post->ID, 'projeto_link', true);

        ?>
        <label for="projeto_tipo"><strong><?= __('Tipo de projeto', 'pragmatico') ?></strong></label><br>
        <select name="projeto_tipo" id="projeto_tipo" class="widefat">
            <option value="Projeto de estudos" <?php selected($tipo, 'estudos') ?>><?= __('Projeto de Estudos', 'pragmatico') ?>
            </option>
            <option value="Projeto profissional" <?php selected($tipo, 'profissional') ?>>
                <?= __('Projeto Profissional', 'pragmatico') ?>
            </option>
        </select>
        <br><br>
        <label for="projeto_link"><strong><?= __('Link do Projeto', 'pragmatico') ?></strong></label><br>
        <input type="url" class="widefat" name="projeto_link" id="projeto_link" value="<?php echo esc_attr($link); ?>">
        <br><br>
        <?php
    }

    public function saveMetaBox($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (isset($_POST['projeto_tipo'])) {
            update_post_meta($post_id, 'projeto_tipo', sanitize_text_field($_POST['projeto_tipo']));
        }

        if (isset($_POST['projeto_link'])) {
            update_post_meta($post_id, 'projeto_link', esc_url_raw($_POST['projeto_link']));
        }
    }
}