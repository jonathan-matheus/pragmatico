<?php
class ExperienciaControls
{
    public function customText(WP_Customize_Manager $wp_customizer)
    {
        $wp_customizer->add_section("experiencia_section", [
            "title" => __("Custom Experience", "pragmatico"),
            "description" => __("Experience Section Settings", "pragmatico"),
            "priority" => 30,
        ]);

        $wp_customizer->add_setting("experiencia_title", [
            "default" => __("Experience", "pragmatico"),
            "sanitize_callback" => "sanitize_text_field",
        ]);

        $wp_customizer->add_control("experiencia_title", [
            "label" => __("Title", "pragmatico"),
            "section" => "experiencia_section",
            "type" => "text",
        ]);
    }
}
