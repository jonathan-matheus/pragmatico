<?php
require_once get_template_directory() . "/include/class.style.php";
require_once get_template_directory() . "/include/class.supports.php";
require_once get_template_directory() . "/include/class.menus.php";
require_once get_template_directory() . "/include/controls/class.colorControls.php";
require_once get_template_directory() . "/include/controls/class.buttonControls.php";

$style = new Style();
add_action("wp_enqueue_scripts", [$style, "loadBootstrap"]);

$supports = new Supports();
add_action("after_setup_theme", [$supports, "add_supports"]);

$menus = new Menus();
add_action("init", [$menus, "registerMenus"]);
add_action("init", [$style, "loadHeader"]);
add_action('init', [$style, 'loadFonts']);

$colorControls = new ColorControls();
add_action('customize_register', [$colorControls, 'customColors']);

$buttonControls = new ButtonControls();
add_action('customize_register', [$buttonControls, 'customButtons']);