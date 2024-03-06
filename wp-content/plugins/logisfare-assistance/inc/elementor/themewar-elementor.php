<?php

if (!defined('ABSPATH')) exit;

final class Themewar_Elementor
{

    /**
     * Instance
     * @since 1.0.0
     */

    public static $_instance;


    public $file = __FILE__;

    /**
     * Load Construct
     * @since 1.0.0
     */ 

    public function __construct(){
        
        add_action('elementor/controls/register', array( $this, 'THEMEWAR_icon_pack' ), 11 );
        
        add_action('elementor/elements/categories_registered', array($this, 'THEMEWAR_add_widget_categories'));
        add_action('elementor/widgets/register', array($this, 'THEMEWAR_elements'));

        add_action('elementor/editor/after_enqueue_styles', array($this, 'THEMEWAR_editor_enqueue_styles'));
        add_action('elementor/editor/before_enqueue_scripts', array($this, 'THEMEWAR_editor_enqueue_scripts'));

        add_action('elementor/frontend/before_enqueue_scripts', array($this, 'THEMEWAR_frontend_enqueue_scripts'));
        add_action('elementor/frontend/after_enqueue_styles', array($this, 'THEMEWAR_frontend_enqueue_scripts'));

    }

            
    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void 
    */

    public function THEMEWAR_icon_pack( $controls_manager ) {

        require_once (dirname($this->file). '/controls/themewar-autocomplete.php');
        $controls_manager->register_control( 'themewar_autocomplete', new Themewar_Autocomplete() );
    }
    
    /**
     * Category Register
     * @since  1.0.0
     */

    public function THEMEWAR_add_widget_categories($elements_manager){
        $elements_manager->add_category(
            'themewar-elements',[
                'title' => esc_html__('Logisfare Core Widgets', 'themewar'),
                'icon'  => 'eicon-kit-plugins',
            ],
            1
        );
        $elements_manager->add_category(
            'themewar-sidebar-elements', [
                'title' => esc_html__('Logisfare Sidebar Widgets', 'themewar'),
                'icon'  => 'eicon-footer',
            ],
            2
        );
        $elements_manager->add_category(
            'themewar-header-elements', [
                'title' => esc_html__('Logisfare Header Widgets', 'themewar'),
                'icon'  => 'eicon-footer',
            ],
            3
        );
        $elements_manager->add_category(
            'themewar-footer-elements', [
                'title' => esc_html__('Logisfare Footer Widgets', 'themewar'),
                'icon'  => 'eicon-footer',
            ],
            4
        );
    }

    /**
     * Elements register
     * @since  1.0.0
     */

    public function THEMEWAR_elements($widgets_manager){

        
        require_once dirname($this->file) . '/themewar-heading.php';
        $widgets_manager->register(new Elementor\Themewar_Heading_Widget());

        require_once dirname($this->file) . '/themewar-text.php';
        $widgets_manager->register(new Elementor\Themewar_Text_Widget());

        require_once dirname($this->file) . '/themewar-page-banner.php';
        $widgets_manager->register(new Elementor\Themewar_Page_Banner_Widgets());

        require_once dirname($this->file) . '/themewar-image.php';
        $widgets_manager->register(new Elementor\Themewar_Image_Widgets());

        require_once dirname($this->file) . '/themewar-list.php';
        $widgets_manager->register(new Elementor\Themewar_List_Widgets()); 
        
        require_once dirname($this->file) . '/themewar-funfact.php';
        $widgets_manager->register(new Elementor\Themewar_Funfact_Widgets());

        require_once dirname($this->file) . '/themewar-skill-bar.php';
        $widgets_manager->register(new Elementor\Themewar_Skill_Bar_Widgets());

        require_once dirname($this->file) . '/themewar-about-image.php';
        $widgets_manager->register(new Elementor\Themewar_About_Image_Widgets());

        require_once dirname($this->file) . '/themewar-icon-box.php';
        $widgets_manager->register(new Elementor\Themewar_Icon_Box_Widgets());
        
        require_once dirname($this->file) . '/themewar-text-box.php';
        $widgets_manager->register(new Elementor\Themewar_Text_Box_Widgets());

        require_once dirname($this->file) . '/themewar-contact-info-box.php';
        $widgets_manager->register(new Elementor\Themewar_Contact_Info_Box_Widgets());

        require_once dirname($this->file) . '/themewar-button.php';
        $widgets_manager->register(new Elementor\Themewar_Button_Widget()); 

        require_once dirname($this->file) . '/themewar-mailchimp.php';
        $widgets_manager->register(new Elementor\Themewar_Mailchimp_Widgets());

        require_once dirname($this->file) . '/themewar-accordion.php';
        $widgets_manager->register(new Elementor\Themewar_Accordion_Widgets());

        require_once dirname($this->file) . '/themewar-history-tab.php';
        $widgets_manager->register(new Elementor\Themewar_History_Tab_Widgets());

        require_once dirname($this->file) . '/themewar-clients-slider.php';
        $widgets_manager->register(new Elementor\Themewar_Clients_Slider_Widgets());

        require_once dirname($this->file) . '/themewar-clients-grid.php';
        $widgets_manager->register(new Elementor\Themewar_Clients_Grid_Widgets());

        require_once dirname($this->file) . '/themewar-testimonial.php';
        $widgets_manager->register(new Elementor\Themewar_Testimonial_Widgets());

        require_once dirname($this->file) . '/themewar-team.php';
        $widgets_manager->register(new Elementor\Themewar_Team_Widgets()); 

        require_once dirname($this->file) . '/themewar-services-grid.php';
        $widgets_manager->register(new Elementor\Themewar_Services_Grid_Widgets());

        require_once dirname($this->file) . '/themewar-services-slider.php';
        $widgets_manager->register(new Elementor\Themewar_Services_Slider_Widgets());

        require_once dirname($this->file) . '/themewar-blocks-list.php';
        $widgets_manager->register(new Elementor\Themewar_Blocks_list_Widgets());

        require_once dirname($this->file) . '/themewar-rev-slider.php';
        $widgets_manager->register(new Elementor\Themewar_Rev_Slider_Widgets());
        
        require_once dirname($this->file) . '/themewar-folio-grid.php';
        $widgets_manager->register(new Elementor\Themewar_Folio_Grid_Widgets());

        require_once dirname($this->file) . '/themewar-folio-slide.php';
        $widgets_manager->register(new Elementor\Themewar_Folio_Slide_Widgets());

        require_once dirname($this->file) . '/themewar-latest-blog.php';
        $widgets_manager->register(new Elementor\Themewar_Latest_Blog_Widgets());
        
        require_once dirname($this->file) . '/themewar-contact-form.php';
        $widgets_manager->register(new Elementor\Themewar_Contcat_Form_Widget());
        
        require_once dirname($this->file) . '/themewar-google-map.php';
        $widgets_manager->register(new Elementor\Themewar_Google_Map_Widget());
        
        require_once dirname($this->file) . '/themewar-block-quote.php';
        $widgets_manager->register(new Elementor\Themewar_Block_Quote_Widgets());

        require_once dirname($this->file) . '/themewar-post-featured-image.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Featured_Fmage_Widgets());

        require_once dirname($this->file) . '/themewar-post-title.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Title_Widgets());

        require_once dirname($this->file) . '/themewar-post-tag.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Tag_Widgets());

        require_once dirname($this->file) . '/themewar-post-share.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Share_Widgets());

        require_once dirname($this->file) . '/themewar-post-navigation.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Navigation_widgets());
        
        require_once dirname($this->file) . '/themewar-post-meta.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Meta_Widgets());

        require_once dirname($this->file) . '/themewar-post-author-box.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Author_Box_Widgets());

        require_once dirname($this->file) . '/themewar-post-team-meta.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Team_Meta_Widgets());
        
        require_once dirname($this->file) . '/themewar-post-comment-form.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Comment_Form_Widgets()); 
        
        require_once dirname($this->file) . '/themewar-pricing-table.php';
        $widgets_manager->register(new Elementor\Themewar_Pricing_table_Widgets()); 
        
        require_once dirname($this->file) . '/themewar-fof-content.php';
        $widgets_manager->register(new Elementor\Themewar_Fof_Content_Widgets()); 
        
        require_once dirname($this->file) . '/themewar-shape-img.php';
        $widgets_manager->register(new Elementor\Themewar_Shape_img_Widgets()); 



        /*-- Sidebar Widgets -- */


        require_once dirname($this->file) . '/themewar-sidebar-search.php';
        $widgets_manager->register(new Elementor\Themewar_Search_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-post.php';
        $widgets_manager->register(new Elementor\Themewar_Post_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-category.php';
        $widgets_manager->register(new Elementor\Themewar_Category_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-tags.php';
        $widgets_manager->register(new Elementor\Themewar_Tags_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-gallery.php';
        $widgets_manager->register(new Elementor\Themewar_Sidebar_Gallery_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-social.php';
        $widgets_manager->register(new Elementor\Themewar_Sidebar_Social_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-service-menu.php';
        $widgets_manager->register(new Elementor\Themewar_Sidebar_Service_Menu_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-quick-info.php';
        $widgets_manager->register(new Elementor\Themewar_Sidebar_Quick_Info_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-project-meta.php';
        $widgets_manager->register(new Elementor\Themewar_Sidebar_Project_meta_Widgets());

        require_once dirname($this->file) . '/themewar-sidebar-project-boucher.php';
        $widgets_manager->register(new Elementor\Themewar_Sidebar_Project_Boucher_Widgets());


        
        // /*-- Headers --*/
    	require_once dirname($this->file) . '/themewar-header.php';
        $widgets_manager->register(new Elementor\Themewar_Header_Widgets());



        // /*-- Footer Widgets --*/
        require_once dirname($this->file) . '/themewar-footer-about.php';
        $widgets_manager->register(new Elementor\Themewar_Footer_About_Widgets());

        require_once dirname($this->file) . '/themewar-footer-widget-title.php';
        $widgets_manager->register(new Elementor\Themewar_Fw_Widget_Tittle_Widgets());
        
        require_once dirname($this->file) . '/themewar-footer-navigation.php';
        $widgets_manager->register(new Elementor\Themewar_Navigation_Widgets());
        
        require_once dirname($this->file) . '/themewar-footer-popular-post.php';
        $widgets_manager->register(new Elementor\Themewar_Footer_Popular_Post_Widgets());
        
        require_once dirname($this->file) . '/themewar-footer-info.php';
        $widgets_manager->register(new Elementor\Themewar_Info_Widgets());

        require_once dirname($this->file) . '/themewar-footer-social.php';
        $widgets_manager->register(new Elementor\Themewar_Social_Widgets());

    }

    /**
     * Frontend enqueue scripts
     * @since  1.0.0
     */

    public function THEMEWAR_frontend_enqueue_scripts()
    {

    }

    /**
     * Editor enqueue scripts
     * @since  1.0.0
     */

    public function THEMEWAR_editor_enqueue_scripts()
    {

    }

    /**
     * Editor enqueue styles
     * @since  1.0.0
     */

    public function THEMEWAR_editor_enqueue_styles(){
        wp_enqueue_style( 'themewar-icon-elementor', plugins_url('logisfare-assistance/assets/css/icons.css'), null, '' );
        wp_enqueue_style( 'themewar-editor-elementor', plugins_url('logisfare-assistance/assets/css/editors.css'), null, '' );
    }

    /**
     * Preview enqueue scripts
     * @since  1.0.0
     */

    public function THEMEWAR_preview_enqueue_scripts(){}

    public static function THEMEWAR_get_instance(){
        if (!isset(self::$_instance)) {
            self::$_instance = new Themewar_Elementor();
        }
        return self::$_instance;
    }

}