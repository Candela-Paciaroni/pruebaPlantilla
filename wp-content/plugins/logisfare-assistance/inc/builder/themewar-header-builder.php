<?php

/**
 * Class Themewar_Header_Builder
 */
class Themewar_Header_Builder
{
    /**
     * Themewar_Header_Builder constructor.
     */
    public function __construct()
    {
        add_action('wp', array($this, 'hook'));
    }

    public function hook()
    {
        $header_style = tw_get_option('_logisfare_customizer_options', 'header_style', 0);
        if (is_page() && class_exists('CSF')) {
            $page_is_settings = tw_get_post_meta(get_the_ID(), '_logisfare_page_meta', 'page_header_enabled', 2);
            if ($page_is_settings == 1) {
                $header_style = tw_get_post_meta(get_the_ID(), '_logisfare_page_meta', 'page_header_style', 0);
            }
        }
        if ($header_style > 0) {
            add_action('get_header', array($this, 'themewar_head'));
        }
    }

    /**
     * get all header template ids.
     * @return int[]|WP_Post[]
     */
    public static function get_header_templates()
    {
        return Themewar_Builder::get_posts('tw-header-builder');
    }

    /**
     * Override the theme header
     */

    public function themewar_head()
    {
        require __DIR__ . '/themewar-header.php';
        $templates = [];
        $templates[] = 'header.php';
        remove_all_actions('wp_head');
        ob_start();
        locate_template($templates, true);
        ob_get_clean();
    }
}
