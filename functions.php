<?php
require_once get_template_directory() . "/include/class.style.php";
require_once get_template_directory() . "/include/class.supports.php";
require_once get_template_directory() . "/include/class.menus.php";
require_once get_template_directory() . "/include/class.colorControls.php";

$style = new Style();
add_action("wp_enqueue_scripts", [$style, "loadBootstrap"]);

$supports = new Supports();
add_action("after_setup_theme", [$supports, "add_supports"]);

$menus = new Menus();
add_action("init", [$menus, "registerMenus"]);
add_action("init", [$style, "loadHeader"]);
add_action('init', [$style, 'loadFonts']);

$controls = new ColorControls();
add_action('customize_register', [$controls, 'customColors']);