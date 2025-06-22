<?php
/**
 * Classe ExperienciaPostType
 *
 * Registra o post type "experiencia" e seus meta campos no WordPress.
 * Adiciona meta boxes para empresa, datas e status.
 * Salva os dados ao salvar o post.
 *
 * Exemplo:
 * $experiencia = new ExperienciaPostType();
 * add_action('init', [$experiencia, 'registerPostType']);
 *
 * @package pragmatico
 */
class ExperienciaPostType
{
    public function __construct()
    {
        add_action("init", function () {
            add_action("add_meta_boxes", [$this, "addMetaBox"]);
            add_action("save_post_experiencia", [$this, "saveMetaBox"]);
        });
    }

    public function registerPostType()
    {
        register_post_type("experiencia", [
            "labels" => [
                "name" => __("Experiências", "pragmatico"),
                "singular_name" => __("Experiência", "pragmatico"),
            ],
            "public" => true,
            "has_archive" => true,
            "rewrite" => ["slug" => "experiencia"],
            "supports" => ["title", "editor", "thumbnail"],
        ]);

        // Registra os meta campos
        register_post_meta("experiencia", "empresa_nome", [
            "type" => "string",
            "single" => true,
            "show_in_rest" => true,
            "sanitize_callback" => "sanitize_text_field",
            "auth_callback" => function () {
                return current_user_can("edit_posts");
            },
        ]);
        register_post_meta("experiencia", "data_inicio", [
            "type" => "string",
            "single" => true,
            "show_in_rest" => true,
            "sanitize_callback" => "sanitize_text_field",
            "auth_callback" => function () {
                return current_user_can("edit_posts");
            },
        ]);
        register_post_meta("experiencia", "ainda_trabalha", [
            "type" => "boolean",
            "single" => true,
            "show_in_rest" => true,
            "sanitize_callback" => "rest_sanitize_boolean",
            "auth_callback" => function () {
                return current_user_can("edit_posts");
            },
        ]);
        register_post_meta("experiencia", "data_saida", [
            "type" => "string",
            "single" => true,
            "show_in_rest" => true,
            "sanitize_callback" => "sanitize_text_field",
            "auth_callback" => function () {
                return current_user_can("edit_posts");
            },
        ]);
    }

    public function addMetaBox()
    {
        add_meta_box(
            "experiencia_empresa_nome",
            __("Nome da Empresa", "pragmatico"),
            [$this, "renderEmpresaNomeMetaBox"],
            "experiencia",
            "normal",
            "default"
        );
        add_meta_box(
            "experiencia_datas",
            __("Informações de Datas", "pragmatico"),
            [$this, "renderDatasMetaBox"],
            "experiencia",
            "normal",
            "default"
        );
    }

    public function renderEmpresaNomeMetaBox($post)
    {
        $value = get_post_meta($post->ID, "empresa_nome", true);
        echo '<input type="text" id="empresa_nome" name="empresa_nome" value="' .
            esc_attr($value) .
            '" style="width:100%;" />';
    }

    public function renderDatasMetaBox($post)
    {
        $data_inicio = get_post_meta($post->ID, "data_inicio", true);
        $ainda_trabalha = get_post_meta($post->ID, "ainda_trabalha", true);
        $data_saida = get_post_meta($post->ID, "data_saida", true);

        echo '<label for="data_inicio">' .
            __("Data de Início:", "pragmatico") .
            "</label><br>";
        echo '<input type="date" id="data_inicio" name="data_inicio" value="' .
            esc_attr($data_inicio) .
            '" /><br><br>';

        echo '<label><input type="checkbox" id="ainda_trabalha" name="ainda_trabalha" value="1" ' .
            checked($ainda_trabalha, "1", false) .
            " /> " .
            __("Ainda trabalho aqui", "pragmatico") .
            "</label><br><br>";

        echo '<label for="data_saida">' .
            __("Data de Saída:", "pragmatico") .
            "</label><br>";
        echo '<input type="date" id="data_saida" name="data_saida" value="' .
            esc_attr($data_saida) .
            '" /><br>';
        echo "<small>" .
            __(
                "Preencha apenas se não trabalha mais na empresa.",
                "pragmatico"
            ) .
            "</small>";
    }

    public function saveMetaBox($post_id)
    {
        if (array_key_exists("empresa_nome", $_POST)) {
            update_post_meta(
                $post_id,
                "empresa_nome",
                sanitize_text_field($_POST["empresa_nome"])
            );
        }
        if (array_key_exists("data_inicio", $_POST)) {
            update_post_meta(
                $post_id,
                "data_inicio",
                sanitize_text_field($_POST["data_inicio"])
            );
        }
        update_post_meta(
            $post_id,
            "ainda_trabalha",
            isset($_POST["ainda_trabalha"]) ? "1" : "0"
        );
        if (array_key_exists("data_saida", $_POST)) {
            update_post_meta(
                $post_id,
                "data_saida",
                sanitize_text_field($_POST["data_saida"])
            );
        }
    }
}
