<?php
/*
Plugin Name: Tw Demo Importer
Plugin URI: https://themewar.com
Description: importing demo contents
Version: 1.0.0
Author: Themewar
Author URI: https://themewar.com
 */

final class TwDemoImport
{
    /**
     * Holds the class object.
     */

    public static $_instance;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        if (is_admin() && !defined('FW')) {
            require_once dirname(__FILE__) . '/unyson/framework/bootstrap.php';

            register_activation_hook(__FILE__, array($this,'tw_init'));
            add_action('after_setup_theme', array($this, 'tw_remove_version'),20);
            add_filter('fw_framework_directory_uri', array($this, 'tw_fw_framework_directory_uri'));
            add_action('admin_menu', array($this,'tw_remove_unyson_menus'),20);
            add_action('network_admin_menu', array($this, 'tw_remove_unyson_menus'),20);
            add_action('after_plugin_row_' . plugin_basename(__FILE__), array($this, 'tw_plugin_notification'),10, 3);
        }
    }    
    /**
     * tw_init
     *
     * @return void
     */
    public function tw_init()
    {
        $is_active = get_option('fw_active_extensions');
        if (!empty($is_active)) {
            $tw_extension_options = array_merge($is_active, array('backups' => [], 'backups-demo' => []));
            update_option('fw_active_extensions', $tw_extension_options);
        } else {
            update_option('fw_active_extensions', array('backups' => [], 'backups-demo' => []));
        }
    }    
    /**
     * tw_remove_version
     *
     * @return void
     */
    public function tw_remove_version()
    {
        $fw_obj = fw();
        remove_filter('update_footer', array($fw_obj->backend, '_filter_footer_version'), 11);
    }    
    /**
     * tw_fw_framework_directory_uri
     *
     * @return void
     */
    public function tw_fw_framework_directory_uri()
    {
        return plugin_dir_url(__FILE__) . 'unyson/framework';
    }
    
    /**
     * tw_remove_unyson_menus
     *
     * @return void
     */
    public function tw_remove_unyson_menus()
    {
        remove_menu_page('fw-extensions');
        remove_submenu_page('tools.php', 'fw-backups');
    }
    
    /**
     * tw_plugin_notification
     *
     * @param  mixed $plugin_file
     * @param  mixed $plugin_data
     * @param  mixed $status
     * @return void
     */
    public function tw_plugin_notification($plugin_file, $plugin_data, $status)
    {
        ?>
            <tr class="plugin-update-tr">
                <td colspan="4">
                    <div class="notice inline notice-warning notice-alt">
                        <p>
                        <?php esc_html_e("Delete the plugin after demo content install.", 'tw-demo-install');?>
                        </p>
                    </div>
                </td>
            </tr>
        <?php
    }
    /**
     * initialize singleton class
     *
     * @return TwDemoImport
     */
    public static function init()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new TwDemoImport();
        }
        return self::$_instance;
    }

}

/**
 * Initializes the main plugin
 *
 * @return TwDemoImport
 */
function tw_demo_install()
{
    return TwDemoImport::init();
}

/**
 * Kick of the plugin ass
 */
tw_demo_install();