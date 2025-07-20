<?php
class MeditationsPostType
{
    public function registerPostType()
    {
        register_post_type("meditations", [
            "labels" => [
                "name" => __("Meditações", "pragmatico"),
                "singular_name" => __("Meditação", "pragmatico"),
            ],
            "public" => true,
            "has_archive" => true,
            "rewrite" => ["slug" => "meditations"],
            "supports" => ["title", "editor"],
        ]);
    }
}