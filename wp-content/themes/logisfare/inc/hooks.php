<?php
/*
 * Logisfare Hooks Class
 */

class Logisfare_Hooks_Class
{

    public static $_instance;

    public function __construct()
    {
        $this->logisfare_init();
    }

    /* * ---------------------------------------------------------------
     * Init all hooks and others
     * -------------------------------------------------------------* */

    public function logisfare_init()
    {
        add_action('after_setup_theme', array($this, 'logisfare_theme_setup'));
        add_action('widgets_init', array($this, 'logisfare_widgets_init'));

        add_action('wp_enqueue_scripts', array($this, 'logisfare_enqueue_style'));
        add_action('wp_enqueue_scripts', array($this, 'logisfare_enqueue_script'));
        add_action('admin_enqueue_scripts', array($this, 'logisfare_enqueue_style_for_admin'));

        add_action('tgmpa_register', array($this, 'logisfare_plugin_activation_notive'));
        add_action('admin_menu', array($this, 'logisfare_remove_theme_settings'), 999);
        add_action('wp_enqueue_scripts', array($this, 'logisfare_dequeue_dashicon'));

        add_action('wp_ajax_nopriv_post_like', array($this, 'logisfare_ajax_post_like'));
        add_action('wp_ajax_post_like', array($this, 'logisfare_ajax_post_like'));

        add_action('admin_init', array($this, 'logisfare_hide_front_page_editor'));

        add_filter('comment_form_fields', array($this, 'logisfare_rearrange_comment_form'));

        add_filter('body_class', array($this, 'logisfare_body_classes'));
        add_filter('fw:ext:backups-demo:demos', array($this, 'logisfare_live_demos'));

        add_filter('the_password_form', array($this, 'logisfare_password_protected_form'));

        add_filter('woocommerce_add_to_cart_fragments', array($this, 'logisfare_cart_button_item_count'));
    }

    public function logisfare_body_classes($classes)
    {
        $header_style = tw_get_option('_logisfare_customizer_options', 'header_style', 1);
        $classes[] = 'active_header_' . $header_style;
        return $classes;
    }



    /* * ---------------------------------------------------------------
     * Theme Setup
     * -------------------------------------------------------------* */

    public function logisfare_theme_setup()
    {
        load_theme_textdomain('logisfare', get_template_directory() . '/languages');
        $GLOBALS['content_width'] = 1170;

        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(755, 420, true);

        add_theme_support('title-tag');

        register_nav_menu('primary-menu', esc_html__('Primary Menu', 'logisfare'));

        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'script', 'style'));
        
        add_theme_support('woocommerce');
    }

    /* * ---------------------------------------------------------------
     * Widget Init
     * -------------------------------------------------------------* */
    public function logisfare_widgets_init()
    {

        logisfare_register_sidebars(
            array(
                'sidebar-1' => array(
                    'name' => esc_html__('Blog Sidebar', 'logisfare'),
                    'description' => esc_html__('Blog sidebar, Only for blog pages.', 'logisfare'),
                ),
                'sidebar-2' => array(
                    'name' => esc_html__('Shop Sidebar', 'logisfare'),
                    'description' => esc_html__('Shop sidebar, Only for Shop pages.', 'logisfare'),
                ),
            ),

            array(
                'before_widget' => '<aside id="%1$s" class="widget %2$s">',
                'after_widget' => "</aside>",
                'before_title' => '<h3 class="widgetTitle">',
                'after_title' => '</h3>',
            ));

    }

    /* * ---------------------------------------------------------------
     * CSS Enqueue
     * -------------------------------------------------------------* */
    public function logisfare_enqueue_style(){
        wp_enqueue_style('logisfare-google-fonts', logisfare_google_fonts_url());
        wp_enqueue_style('logisfare-style', get_stylesheet_uri());
        
        wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css');
        wp_enqueue_style('logisfare-icons', get_template_directory_uri().'/assets/css/logisfare-icons.css');
        wp_enqueue_style('themewar-icons', get_template_directory_uri().'/assets/css/themewar-icons.css');
        
        wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
        wp_enqueue_style('slick', get_template_directory_uri().'/assets/css/slick.css');
        wp_enqueue_style('lightcase', get_template_directory_uri().'/assets/css/lightcase.css');
        wp_enqueue_style('owl-theme-default', get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
        wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
        wp_enqueue_style('nice-select', get_template_directory_uri().'/assets/css/nice-select.css');
        wp_enqueue_style('aos', get_template_directory_uri().'/assets/css/aos.css');

        wp_enqueue_style('logisfare-preset', get_template_directory_uri().'/assets/css/preset.css');
        wp_enqueue_style('logisfare-theme', get_template_directory_uri().'/assets/css/theme.css');
        wp_enqueue_style('logisfare-responsive', get_template_directory_uri().'/assets/css/responsive.css');
        wp_enqueue_style('logisfare-proloaders', get_template_directory_uri().'/assets/css/preloader.css');
    }
    
    public function logisfare_enqueue_style_for_admin(){
        wp_enqueue_style('logisfare-admin-style', get_template_directory_uri().'/assets/css/themewar-admin-style.css');
        if(class_exists('CSF')){
            wp_enqueue_style('logisfare-icons', get_template_directory_uri().'/assets/css/logisfare-icons.css');
            wp_enqueue_style('themewar-icons', get_template_directory_uri().'/assets/css/themewar-icons.css');
        }
    }


    /* * -----------------------------------------------------------
     * JS Enqueue
     * -------------------------------------------------------------* */
    public function logisfare_enqueue_script(){
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
        

        wp_enqueue_script('masonry');
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '', TRUE);
        wp_enqueue_script('shuffle', get_template_directory_uri().'/assets/js/shuffle.min.js', array('bootstrap'), '', TRUE);
        wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('shuffle'), '', TRUE);
        wp_enqueue_script('owl-filter', get_template_directory_uri().'/assets/js/owl.carousel.filter.js', array('owl-carousel'), '', TRUE);
        wp_enqueue_script('jquery-appear', get_template_directory_uri().'/assets/js/jquery.appear.js', array('owl-filter'), '', TRUE);
        wp_enqueue_script('jquery-nice-select', get_template_directory_uri().'/assets/js/jquery.nice-select.js', array('jquery-appear'), '', TRUE);
        wp_enqueue_script('lightcase', get_template_directory_uri().'/assets/js/lightcase.js', array('jquery-nice-select'), '', TRUE);
        wp_enqueue_script('slick', get_template_directory_uri().'/assets/js/slick.js', array('lightcase'), '', TRUE);
        wp_enqueue_script('gmaps', get_template_directory_uri().'/assets/js/gmaps.js', array('slick'), '', TRUE);
        wp_enqueue_script('aos', get_template_directory_uri().'/assets/js/aos.js', array('gmaps'), '', TRUE);
        wp_enqueue_script('jq-plugin', get_template_directory_uri().'/assets/js/jquery.plugin.min.js', array('aos'), '', TRUE);
        wp_enqueue_script('customizer', get_template_directory_uri().'/assets/js/customizer.js', array('jq-plugin'), '', TRUE);

        wp_enqueue_script('logisfare-theme', get_template_directory_uri().'/assets/js/theme.js', array('customizer'), '', TRUE);
        
        $params = array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'ajax_nonce' => wp_create_nonce('logisfare_security_check'),
        );
        wp_localize_script('logisfare-theme', 'logisfare_object', $params);
    }

    public function logisfare_remove_theme_settings()
    {
        remove_submenu_page('themes.php', 'fw-settings');
    }

    public function logisfare_dequeue_dashicon()
    {
        if (current_user_can('update_core')) {
            return;
        }
        wp_deregister_style('dashicons');
    }

    /* * ---------------------------------------------------------------
     * TGMPA Activator
     * -------------------------------------------------------------* */
    public function logisfare_plugin_activation_notive()
    {
        $plugins = array(
            array(
                'name' => esc_html__('Elementor', 'logisfare'),
                'slug' => 'elementor',
                'required' => true,
            ),
            array(
                'name'		 => esc_html__( 'WooCommerce', 'logisfare' ),
                'slug'		 => 'woocommerce',
                'required'	 => true,
            ),
            array(
                'name'		 => esc_html__( 'WCBoost Variation Swatches', 'logisfare' ),
                'slug'		 => 'wcboost-variation-swatches',
                'required'	 => true,
            ),
            array(
                'name' => esc_html__('Logisfare Assistance', 'logisfare'),
                'slug' => 'logisfare-assistance',
                'required' => true,
                'source' => 'https://themewar.com/plugins/logisfare-assistance.zip',
                'version' => '1.0.2',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => esc_html__('Revolution Slider', 'logisfare'),
                'slug' => 'revslider',
                'required' => true,
                'source' => 'https://themewar.com/plugins/revslider.zip',
                'version' => '',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => esc_html__('Tw Demo Importer', 'logisfare'),
                'slug' => 'tw-demo-importer',
                'required' => false,
                'source' => 'https://themewar.com/plugins/tw-demo-importer.zip',
                'version' => '',
                'force_activation' => false,
                'force_deactivation' => false,
                'external_url' => '',
            ),
            array(
                'name' => esc_html__('Contact Form 7', 'logisfare'),
                'slug' => 'contact-form-7',
                'required' => true,
            ),
            array(
                'name' => esc_html__('MC4WP: Mailchimp for WordPress', 'logisfare'),
                'slug' => 'mailchimp-for-wp',
                'required' => false,
            ),
        );

        $config = array(
            'id' => 'logisfare',
            'default_path' => '',
            'menu' => 'tgmpa-install-plugins',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => false,
            'message' => '',
        );

        tgmpa($plugins, $config);
    }

    /* * ---------------------------------------------------------------
     * Create Instance
     * -------------------------------------------------------------* */
    public static function logisfare_instance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Logisfare_Hooks_Class();
        }
        return self::$_instance;

    }

    /* * ---------------------------------------------------------------
     * Hide Front Page Editor
     * -------------------------------------------------------------* */
    public function logisfare_hide_front_page_editor()
    {
        $post_id = (isset($_GET['post'])) ? $_GET['post'] : '';
        if ($post_id < 1) {
            return;
        }

        $template_file = get_post_meta($post_id, '_wp_page_template', true);

        if ($template_file == 'page-templates/front-page.php') {
            remove_post_type_support('page', 'editor');
        }
    }

    /* * ---------------------------------------------------------------
     * Re Arange Comment Form
     * -------------------------------------------------------------* */
    public function logisfare_rearrange_comment_form($fields)
    {
        global $post;
        $postID = (isset($post->ID) && $post->ID > 0 ? $post->ID : 0);
        $post_type = get_post_type($postID);
        if ($post_type && $post_type != 'product'):
            $comment_field = $fields['comment'];
            unset($fields['comment']);
            $fields['comment'] = $comment_field;

            $cookies_field = $fields['cookies'];
            unset($fields['cookies']);
            $fields['cookies'] = $cookies_field;

            return $fields;
        else:
            return $fields;
        endif;
    }

    public function logisfare_live_demos($demos)
    {
        $demos_array = array(
            'logisfare-live-demo' => array(
                'title' => esc_html__('Logisfare Live Dummy', 'logisfare'),
                'screenshot' => get_template_directory_uri() . '/screenshot.png',
                'preview_link' => 'https://themewar.com/wp/logisfare',
            ),
        );

        $download_url = 'http://themewar.com/wp/logisfare_dummy_data/';

        foreach ($demos_array as $id => $data) {
            $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
                'url' => $download_url,
                'file_id' => $id,
            ));
            $demo->set_title($data['title']);
            $demo->set_screenshot($data['screenshot']);
            $demo->set_preview_link($data['preview_link']);

            $demos[$demo->get_id()] = $demo;

            unset($demo);
        }

        return $demos;
    }

    public function logisfare_password_protected_form()
    {
        global $post;

        $password_form_message = esc_html__('This content is password protected. To view it please enter your password below:', 'logisfare');

        $label = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
        $form = '<form class="protected-post-form" action="' . esc_url(site_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
            <p class="passwordFormNote">' . $password_form_message . '</p>
            <input placeholder="' . esc_attr__('Password', 'logisfare') . '" name="post_password" id="' . $label . '" class="pw-window" type="password" size="20" />
            <input type="submit" class="btn btn-large" name="Submit" value="' . esc_attr__("Submit", 'logisfare') . '" />
        </form>';
        return $form;
    }

    
    /* * ---------------------------------------------------------------
     * Logisfare Fragments
     * -------------------------------------------------------------* */
    public function logisfare_cart_button_item_count($fragments)
    {
        global $woocommerce;
        ob_start();
        ?>
        <a class="halCart logisfare_aj_cart" href="javascript:void(0);"><i class="logisfare-cart2"></i><span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'logisfare'), $woocommerce->cart->cart_contents_count); ?></span>
        <?php
        $fragments['a.logisfare_aj_cart'] = ob_get_clean();
        return $fragments;
    }

    
}




$logisfare_instance = Logisfare_Hooks_Class::Logisfare_instance();
