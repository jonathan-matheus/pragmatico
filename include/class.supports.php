<?php
/**
 * Classe Supports
 *
 * Responsável pelo registro dos recursos de suporte do tema para um tema WordPress.
 *
 * @property array $theme_supports Lista de recursos do tema e seus argumentos a serem registrados.
 *
 * Métodos:
 * @method void add_supports() Registra todos os recursos de suporte do tema definidos em $theme_supports usando add_theme_support().
 */
class Supports
{
    private $theme_supports = [
        'title-tag',
        'post-thumbnails',
        'automatic-feed-links',
        'html5' => [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ],
        'custom-logo',
        'custom-background' => [
            'default-color' => '0D0D0D',
        ],
    ];

    public function add_supports()
    {
        foreach ($this->theme_supports as $feature => $args) {
            if (is_array($args)) {
                add_theme_support($feature, $args);
            } else {
                add_theme_support($args);
            }
        }
    }
}