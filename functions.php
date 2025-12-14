<?php
require_once get_template_directory() . '/includes/classes/class.navmenus.php';
require_once get_template_directory() . '/includes/classes/class.support.php';
require_once get_template_directory() . '/includes/classes/class.color.php';
require_once get_template_directory() . '/includes/classes/class.css.php';
require_once get_template_directory() . '/includes/classes/class.postType.php';

new NavMenus();
new Support();
new Color();
new Css();
new PostType();