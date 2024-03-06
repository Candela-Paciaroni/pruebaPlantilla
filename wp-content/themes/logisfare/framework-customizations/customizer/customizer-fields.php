<?php
/**
 *	Customizer General Settings
 *	styles for logo/title - sizing, spacing ...
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Logisfare_Fields{

	/**
     * Holds the class object.
     *
     * @since 1.0.0
     *
     */
    
	public static $_instance;

	/**
     * Load Construct
     * 
     * @since 1.0.0
     */

	public function __construct(){
		$this->logisfare_customizer_init();
	}

	/**
     * Customizer field Initialization
     *
     * @since 1.0.0
     *
     */

	public function logisfare_customizer_init(){
		add_filter( 'kirki/fields', array($this,'logisfare_general_setting') );
	}

	public function logisfare_general_setting( $fields ){

		require LOGISFARE_CUSTOMIZER_DIR . 'general-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'font-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'colorpreset-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'header-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'blog-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'blog-details-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'blog-archive-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'blog-search-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'page-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'folio-cat-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'folio-single-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'folio-arc-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'service-single-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'service-arc-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . 'footer-settings.php';
		require LOGISFARE_CUSTOMIZER_DIR . '404-settings.php';

		return $fields;
	}

	public static function logisfare_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Logisfare_Fields();
        }
        return self::$_instance;
    }
}
$Logisfare_Fields = Logisfare_Fields::logisfare_get_instance();