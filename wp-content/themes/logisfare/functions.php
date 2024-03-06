<?php
/* * ---------------------------------------------------------------
* Theme Directory Define
* -------------------------------------------------------------* */
$theme_info = wp_get_theme();

define('LOGISFARE_THEME_DIR', get_template_directory());
define('LOGISFARE_THEME_URL', get_template_directory_uri());
define('LOGISFARE_STYLESHEET_URL', get_stylesheet_uri());

define('LOGISFARE_INC_DIR', LOGISFARE_THEME_DIR . '/inc');
define('LOGISFARE_INC_URL', LOGISFARE_THEME_URL . '/inc');
define('LOGISFARE_CUSTOMIZER_DIR', LOGISFARE_THEME_DIR . '/framework-customizations/customizer/');

define('LOGISFARE_WD_DIR', LOGISFARE_THEME_DIR . '/widgets');

define('LOGISFARE_ASSETS_DIR', LOGISFARE_THEME_DIR . '/assets');
define('LOGISFARE_ASSETS_URL', LOGISFARE_THEME_URL . '/assets');

define('LOGISFARE_ASSETS_CSS_DIR', LOGISFARE_THEME_DIR . '/assets/css');
define('LOGISFARE_ASSETS_CSS_URL', LOGISFARE_THEME_URL . '/assets/css');

define('LOGISFARE_ASSETS_JS_DIR', LOGISFARE_THEME_DIR . '/assets/js');
define('LOGISFARE_ASSETS_JS_URL', LOGISFARE_THEME_URL . '/assets/js');

define('LOGISFARE_ASSETS_IMAGES_DIR', LOGISFARE_THEME_DIR . '/assets/images');
define('LOGISFARE_ASSETS_IMAGES_URL', LOGISFARE_THEME_URL . '/assets/images');


/* * ---------------------------------------------------------------
* Theme Init
* -------------------------------------------------------------* */
require_once get_parent_theme_file_path('/inc/init.php');