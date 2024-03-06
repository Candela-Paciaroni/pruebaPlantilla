<?php


/**
 * Class Themewar_Footer_Builder
 */
class Themewar_Footer_Builder
{
    /**
     * Themewar_Footer_Builder constructor.
     */
    public function __construct()
    {
        add_action('wp', array($this, 'hook'));
    }

    public function hook()
    {
        $footer_style = tw_get_option('_logisfare_customizer_options', 'footer_style', 0);
        if (is_page() && class_exists('CSF')) {
            $page_is_settings = tw_get_post_meta(get_the_ID(), '_logisfare_page_meta', 'page_footer_enabled', 2);
            if ($page_is_settings == 1) {
                $footer_style = tw_get_post_meta(get_the_ID(), '_logisfare_page_meta', 'page_footer_style', 0);
            }
        }
        if ($footer_style > 0) {
            add_action('get_footer', array($this, 'themewar_footer'));
        }
    }

    /**
     * get all header template ids.
     * @return int[]|WP_Post[]
     */
    public static function get_footer_templates()
    {
        return Themewar_Builder::get_posts('tw-footer-builder');
    }

    /**
     *  override theme header
     */
    public function themewar_footer()
    {
        require __DIR__ . '/themewar-footer.php';
        $templates = [];
        $templates[] = 'footer.php';
        remove_all_actions('wp_footer');
        ob_start();
        locate_template($templates, true);
        ob_get_clean();
    }
}