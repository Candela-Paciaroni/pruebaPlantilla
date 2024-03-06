<?php
/*
Plugin Name: Logisfare Assistance
Plugin URI: https://omanthemes.com/logisfare/wp/
Description: Assistance plugin for all Logisfare Assistance.
Version: 1.0.2
Author: THEMEWAR
Author URI: https://themeforest.net/user/themewar
License:
Text Domain: themewar
 */

if (!defined('ABSPATH')) {
    exit;
}

/* * ---------------------------------------------------------------
 * Including Files
 * -------------------------------------------------------------* */
require_once dirname(__FILE__) . '/autoload.php';
require_once dirname(__FILE__) . '/framework/codestar-framework.php';
require_once dirname(__FILE__) . '/inc/elementor/icon/TwElementorIcon.php';

class THEMEWAR_Assistance
{
    public static $_instance;

    public $plugin_name = 'Logisfare Assistance';
    public $plugin_version = '1.0.1';
    public $file = __FILE__;

    public function __construct()
    {
        add_action('init', array($this, 'THEMEWAR_load_textdomain'));
        add_action('plugins_loaded', array($this, 'THEMEWAR_init'));
        $this->constants();
    }

    public function constants()
    {
        define('THEMEWAR_PLUGIN_NAME', $this->plugin_name);
        define('THEMEWAR_VERSION', $this->plugin_version);
        define('THEMEWAR_FILE', $this->file);
        define('THEMEWAR_URL', plugins_url('', $this->file));
        define('THEMEWAR_ASSETS', plugins_url('', $this->file) . '/assets');
    }

    /* * ---------------------------------------------------------------
     * Init all hooks and others
     * -------------------------------------------------------------* */
    public function THEMEWAR_init()
    {
        include dirname(__FILE__) . '/inc/helpers/helpers.php';
        add_action('wp_enqueue_scripts', array($this, 'THEMEWAR_enqueue_fontend_js_and_css'), 10);
        add_action('admin_enqueue_scripts', array($this, 'THEMEWAR_admin_enqueue_scripts'));
        add_action('login_enqueue_scripts', array($this, 'THEMEWAR_wp_login_css'), 10);
        add_action('widgets_init', array($this, 'THEMEWAR_widgets_init'));
        add_filter('pre_get_posts', array($this, 'THEMEWAR_search_filter'));
        add_filter('fw:ext:backups:tasks:success:id:demo-content-install', array($this, 'logisfare_post_author_update'));
        add_shortcode('post_view', array($this, 'THEMEWAR_post_view'));

        add_action('wp_ajax_nopriv_post_like', array($this, 'logisfare_ajax_post_like'));
        add_action('wp_ajax_post_like', array($this, 'logisfare_ajax_post_like'));
        add_shortcode('post_like', array($this, 'logisfare_post_like'));

        $this->THEMEWAR_taxonomy_and_post_type_caller();
        $this->THEMEWAR_post_type_caller();
        new Themewar_Assistance_Helpers();
        new Themewar_Users_Meta_Hooks();

        //check elementor load
        if (did_action('elementor/loaded')) {
            Themewar_Elementor::THEMEWAR_get_instance();
            new Themewar_Builder();
        }
        add_action('admin_head', array($this, 'THEMEWAR_hide_brizy_admin_notice'));

        add_filter('gutenberg_use_widgets_block_editor', '__return_false');
        add_filter('use_widgets_block_editor', '__return_false');
        
        
        if (class_exists('woocommerce')):
            add_action('comment_post', [$this, 'THEMEWAR_insert_product_review_title'], 10, 1 );
            add_action('edit_comment', [$this, 'THEMEWAR_edit_product_review_title'] );
            add_action( 'add_meta_boxes_comment', [$this, 'THEMEWAR_add_comment_meta_box'] );
        endif;
    }

    /* * ---------------------------------------------------------------
     * Load textdomain
     * -------------------------------------------------------------* */

    public function THEMEWAR_taxonomy_and_post_type_caller()
    {
        $tmgc_tax = new Themewar_Taxonomies('themewar');
        $tmgc_tax->THEMEWAR_inits('folio_cat', 'Category', 'Folio Categories', 'folio');
    }

    /* * ---------------------------------------------------------------
     * Custome Post Type
     * -------------------------------------------------------------* */
    public function THEMEWAR_post_type_caller()
    {
        $tmgc_posts = new Themewar_Custom_Post('themewar');
        $tmgc_posts->THEMEWAR_inits('folio', 'Portfolio', 'Portfolios', array('menu_icon' => 'dashicons-portfolio', 'has_archive' => true));
        $tmgc_posts->THEMEWAR_inits('service', 'Service', 'Services', array('menu_icon' => 'dashicons-megaphone', 'has_archive' => true));
        $tmgc_posts->THEMEWAR_inits('team', 'Team', 'Team', array('menu_icon' => 'dashicons-buddicons-buddypress-logo', 'has_archive' => true));
        $tmgc_posts->THEMEWAR_inits('blocks', 'Block', 'Blocks', array('menu_icon' => 'dashicons-editor-kitchensink', 'has_archive' => false));
    }

    /* * ----------------------------------------------------------
     * JS and CSS for Frontend
     * -------------------------------------------------------------* */
    public static function THEMEWAR_instance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new THEMEWAR_Assistance();
        }
        return self::$_instance;
    }

    public function THEMEWAR_enqueue_fontend_js_and_css()
    {
        wp_enqueue_script('logisfare-assistance', plugin_dir_url($this->file) . 'assets/js/logisfare-assistance.js', array('jquery'), '', true);
        wp_localize_script('logisfare-assistance', 'logisfare_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
    }

    /* * ---------------------------------------------------------------
     * Load Css For WP Login
     * -------------------------------------------------------------* */
    public function THEMEWAR_load_textdomain()
    {
        load_plugin_textdomain('themewar', false, dirname(__FILE__) . '/languages');
    }

    /* * ---------------------------------------------------------------
     * Taxonomy Caller
     * -------------------------------------------------------------* */
    public function THEMEWAR_widgets_init()
    {
        register_widget('Themewar_Recentpost_Widgets');
        register_widget('Themewar_Social_Widgets');
        register_widget('Themewar_Category_Widgets');
        register_widget('Themewar_Tag_Widgets');
        register_widget('Themewar_Gallery_Widgets');
    }

    /* * ---------------------------------------------------------------
     * Posttype Caller
     * -------------------------------------------------------------* */
    public function THEMEWAR_admin_enqueue_scripts()
    {
        if (function_exists('wp_enqueue_media')) {
            wp_enqueue_media();
        } else {
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }

        wp_enqueue_style('logisfare-assistance', plugin_dir_url($this->file) . 'assets/css/admin_style.css', true);
        wp_enqueue_script('themewar-theme-core', plugin_dir_url($this->file) . 'assets/js/themewar_admin.js', false);
    }

    /*======================================================================
    / Set Capabilities
    /=====================================================================*/
    public function THEMEWAR_wp_login_css()
    {
        wp_enqueue_style('themewar-theme-core', plugin_dir_url($this->file) . 'assets/css/login_style.css', false);
    }

    /* * ---------------------------------------------------------------
     * Hide Brizy
     * -------------------------------------------------------------* */
    public function THEMEWAR_hide_brizy_admin_notice()
    {
        echo '<style>
        .notice.fw-brz-dismiss {display: none;}
      </style>';
    }

    /**---------------------------------------------------------------
     * Post View Shortcodes
     * -------------------------------------------------------------**/
    public function THEMEWAR_post_view($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'pid' => 0,
                ),
                $atts
            )
        );

        if ($pid < 1) {
            return '';
        }

        $view = get_post_meta($pid, '_logisfare_post_view', true);
        $view = (empty($view)) ? esc_html__('0', 'themewar') : $view;

        $html = '<span class="logisfareViewCount"><i class="logisfare-eye-svgrepo-com"></i>' . esc_html($view) . ' ' . esc_html__('Views', 'themewar') . '</span>';

        return $html;
    }

    /**---------------------------------------------------------------
     * Post Like Ajax
     * -------------------------------------------------------------**/
    public function logisfare_ajax_post_like()
    {
        $pid = $_POST['pid'];

        $like = get_post_meta($pid, '_logisfare_post_like', true);
        $like = (empty($like)) ? 0 : $like;
        $like++;

        update_post_meta($pid, '_logisfare_post_like', $like);
        echo wp_kses_post($like);
        wp_die();
    }

    /**---------------------------------------------------------------
     * Post Like Shortcodes
     * -------------------------------------------------------------**/
    public function logisfare_post_like($atts)
    {
        extract(
            shortcode_atts(
                array(
                    'pid' => 0,
                ),
                $atts
            )
        );

        if ($pid < 1) {
            return '';
        }

        $post_like = get_post_meta($pid, '_logisfare_post_like', true);
        $post_like = ($post_like > 0) ? $post_like : 0;

        $html = '<a class="post_like" href="' . $pid . '"><i class="logisfare-thumbs-up"></i><span>' . $post_like . '</span></a>';
        return $html;
    }

    /**---------------------------------------------------------------
     * Search Filter
     * -------------------------------------------------------------**/
    public function THEMEWAR_search_filter($query)
    {
        if ($query->is_search) {
            if (isset($_GET['product_cat']) && !empty($_GET['product_cat'])) {
                $args['tax_query'] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => sanitize_text_field(wp_unslash($_REQUEST['product_cat'])),
                    ),
                );
            }
        }
        return $query;
    }

    /**---------------------------------------------------------------
     * Insert Product Comment Meta
     * -------------------------------------------------------------**/
    public function themewar_insert_product_review_title($comment_id)
    {
        if (isset($_POST['review_title'])):
            update_comment_meta($comment_id, 'review_title', esc_html($_POST['review_title']));
        endif;
    }

    /**---------------------------------------------------------------
     * Update Product Comment Meta
     * -------------------------------------------------------------**/
    public function themewar_edit_product_review_title($comment_id)
    {
        if (!isset($_POST['logisfare_comment_update']) || !wp_verify_nonce($_POST['logisfare_comment_update'], 'logisfare_comment_update')) {
            return;
        }

        if (isset($_POST['review_title'])):
            update_comment_meta($comment_id, 'review_title', esc_html($_POST['review_title']));
        endif;
    }

    /**---------------------------------------------------------------
     * Add Product Comment Meta Box
     * -------------------------------------------------------------**/
    public function themewar_add_comment_meta_box()
    {
        add_meta_box('logisfare-review-title', esc_html__('Review Title', 'themewar'), [$this, 'themewar_comment_review_title_mate_box'], 'comment', 'normal', 'high');
    }
    public function themewar_comment_review_title_mate_box($comment)
    {
        $review_title = get_comment_meta($comment->comment_ID, 'review_title', true);
        wp_nonce_field('logisfare_comment_update', 'logisfare_comment_update', false);
        ?>
        <p>
                <label for="logisfare_review_title"><?php esc_html__('Review Title', 'themewar');?></label>
                <input type="text" name="review_title" value="<?php echo esc_attr($review_title); ?>" class="widefat" />
        </p>
        <?php
    }
    
    /**---------------------------------------------------------------
     * Update Post Author
     * -------------------------------------------------------------**/
    public function logisfare_post_author_update(){
        global $wpdb;
        $userId = 1;
        $users = get_users([
            'role'  => 'Administrator',
            'orderby' => 'ID',
            'order'   => 'ASC'
        ]);
        if(!empty($users)){
            $i = 1;
            foreach($users as $user){
                if($i > 1){brake;}
                $userId = $user->ID;
                $i++;
            }
        }
        $sql = "SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'post' and post_status = 'publish'";
        $results = $wpdb->get_results($sql, ARRAY_A);
        if(!empty($results)){
            foreach($results as $res){
                wp_update_post(array('ID' => $res['ID'], 'post_author' => $userId));
            }
        }
    }
}

THEMEWAR_Assistance::THEMEWAR_instance();