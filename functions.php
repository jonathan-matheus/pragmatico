<?php

// Require Classes

require_once get_template_directory() . "/include/class.style.php";
require_once get_template_directory() . "/include/class.supports.php";
require_once get_template_directory() . "/include/class.menus.php";

// Require Controls

require_once get_template_directory() .
    "/include/controls/class.colorControls.php";
require_once get_template_directory() .
    "/include/controls/class.buttonControls.php";
require_once get_template_directory() .
    "/include/controls/class.introducaoControls.php";
require_once get_template_directory() .
    "/include/controls/class.sobreControls.php";
require_once get_template_directory() .
    "/include/controls/class.experienciaControls.php";
require_once get_template_directory() .
    "/include/controls/class.projectControls.php";
require_once get_template_directory() .
    "/include/controls/class.meditacoesControls.php";
require_once get_template_directory() .
    "/include/controls/class.footerControls.php";

// Require Post Types

require_once get_template_directory() .
    "/include/postTypes/class.experienciaPostType.php";
require_once get_template_directory() .
    "/include/postTypes/class.projetosPostType.php";
require_once get_template_directory() .
    "/include/postTypes/class.meditationsPostType.php";

// Require APIs

require_once get_template_directory() . "/apis/class.periodo.php";
require_once get_template_directory() . "/apis/class.urlFormater.php";

// Style

$style = new Style();
add_action("wp_enqueue_scripts", [$style, "loadBootstrap"]);
add_action("wp_enqueue_scripts", [$style, "loadFonts"]);
add_action("wp_enqueue_scripts", [$style, "loadIntroducao"]);
add_action("wp_enqueue_scripts", [$style, "loadGeneral"]);

// Supports

$supports = new Supports();
add_action("after_setup_theme", [$supports, "add_supports"]);

// Menus

$menus = new Menus();
add_action("init", [$menus, "registerMenus"]);
add_action("init", [$style, "loadHeader"]);
add_action("init", [$style, "loadFonts"]);

// Controls

$colorControls = new ColorControls();
add_action("customize_register", [$colorControls, "customColors"]);
$buttonControls = new ButtonControls();
add_action("customize_register", [$buttonControls, "customButtons"]);
$introducaoControls = new introducaoControls();
add_action("customize_register", [$introducaoControls, "customText"]);
$sobreControls = new sobreControls();
add_action("customize_register", [$sobreControls, "customText"]);
$experienciaControls = new ExperienciaControls();
add_action("customize_register", [$experienciaControls, "customText"]);
$projectControls = new ProjectControls();
add_action("customize_register", [$projectControls, "customText"]);
$meditacoesControls = new MeditacoesControls();
add_action("customize_register", [$meditacoesControls, "customText"]);
$footerControls = new FooterControls();
add_action("customize_register", [$footerControls, "customFooter"]);

// Post Types

$experienciaPostType = new ExperienciaPostType();
add_action("init", [$experienciaPostType, "registerPostType"]);
$projetosPostType = new ProjetosPostType();
add_action("init", [$projetosPostType, "registerPostType"]);
add_action("init", [$projetosPostType, "registerTaxonomy"]);
add_action("add_meta_boxes", [$projetosPostType, "addMetaBoxes"]);
add_action("save_post", [$projetosPostType, "saveMetaBox"]);
$meditationsPostType = new MeditationsPostType();
add_action("init", [$meditationsPostType, "registerPostType"]);

// APIs

$periodo = new Periodo();
add_action("rest_api_init", [$periodo, "registrarRotas"]);
$urlFormater = new UrlFormater();
add_action("rest_api_init", [$urlFormater, "registrarRotas"]);
