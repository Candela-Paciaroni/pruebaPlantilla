<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

function Themewar_Classes_Autoload($class_name) {

    if (FALSE === strpos($class_name, 'Themewar_')) {
        return;
    }

    $file_name = str_replace(
            array('Themewar_', '_'),
            array('', '-'),
            strtolower($class_name)
    );

    $file_from = explode('-', $file_name);
    $folder = end($file_from);
    // Compile our path from the current location
    $file = dirname(__FILE__) . '/inc/'.$folder.'/' . $file_name . '.php';
    // If a file is found
    if (file_exists($file)) {
        // Then load it up!
        require( $file );
    }
}
spl_autoload_register('Themewar_Classes_Autoload');