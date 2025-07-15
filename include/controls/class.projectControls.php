<?php
class ProjectControls
{
    public function customText(WP_Customize_Manager $wp_customizer)
    {
        $wp_customizer->add_section("project_section", [
            "title" => __("Custom Project", "pragmatico"),
            "description" => __("Project Section Settings", "pragmatico"),
            "priority" => 30,
        ]);

        $wp_customizer->add_setting("project_title", [
            "default" => __("Projects", "pragmatico"),
            "sanitize_callback" => "sanitize_text_field",
        ]);

        $wp_customizer->add_control("project_title", [
            "label" => __("Title", "pragmatico"),
            "section" => "project_section",
            "type" => "text",
        ]);
    }
}