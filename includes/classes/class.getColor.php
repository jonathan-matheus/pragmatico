<?php
class GetColor
{
    public static function primary()
    {
        return get_theme_mod('pragmatico_primary_color', '#f7f7f7');
    }

    public static function secondary()
    {
        return get_theme_mod('pragmatico_secondary_color', '#b2b2b2');
    }

    public static function text()
    {
        return get_theme_mod('pragmatico_text_color', '#404040');
    }
}