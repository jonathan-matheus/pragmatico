<?php
class sobreControls
{
    public function customText($wp_customizer): void
    {
        $wp_customizer->add_section("custom_text_section_about", [
            "title" => __("Custom about", "pragmatico"),
            "description" => __("Customize your about text", "pragmatico"),
        ]);

        $args_text = [
            "about_me_title" => [
                "default" => __("About me", "pragmatico"),
                "label" => __("About me title", "pragmatico"),
            ],
            "about_me_text" => [
                "default" => __("About me text", "pragmatico"),
                "label" => __("About me text", "pragmatico"),
                "type" => "textarea",
            ],
            "technology_title" => [
                "default" => __("Technology", "pragmatico"),
                "label" => __("Technology title", "pragmatico"),
                "type" => "text",
            ],
            "technology_text" => [
                "default" => __("Technology text", "pragmatico"),
                "label" => __("Technology text", "pragmatico"),
                "type" => "textarea",
            ],
        ];

        foreach ($args_text as $key => $value) {
            $wp_customizer->add_setting($key, [
                "default" => $value["default"],
                "sanitize_callback" => "wp_kses_post",
            ]);

            $wp_customizer->add_control($key, [
                "label" => $value["label"],
                "section" => "custom_text_section_about",
                "settings" => $key,
                "type" => isset($value["type"]) ? $value["type"] : "text",
            ]);
        }
    }
}
