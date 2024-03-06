<?php
    /**
     * Archive.php
     */
    get_header();
    $customizer_ID = '_logisfare_customizer_options';

    $blog_arch_is_banner        = tw_get_option($customizer_ID, 'blog_arch_is_banner', 1);
    $blog_arch_banner_block     = tw_get_option($customizer_ID, 'blog_arch_banner_block', -1);
    $blog_arch_sidebar          = tw_get_option($customizer_ID, 'blog_arch_sidebar', 3);
    $blog_arch_view             = tw_get_option($customizer_ID, 'blog_arch_view', 1);
    $blog_arch_str_limit        = tw_get_option($customizer_ID, 'blog_arch_str_limit', 295);
    $blog_arch_readmore_label   = tw_get_option($customizer_ID, 'blog_arch_readmore_label', esc_html__('Read Details', 'logisfare'));
    $blog_arch_pagi_alignment   = tw_get_option($customizer_ID, 'blog_arch_pagi_alignment', 'start');

    if (class_exists('CSF') && is_category()):
        $termID     = get_queried_object()->term_id;
        $section_id = '_logisfare_taxonomies';
        
        $blog_cat_is_settings = tw_get_term_meta($termID, $section_id, 'blog_cat_is_settings', 2);
        if ($blog_cat_is_settings == 1):

            $blog_cat_is_banner         = tw_get_term_meta($termID, $section_id, 'blog_cat_is_banner', 1);
            $blog_cat_banner_block      = tw_get_term_meta($termID, $section_id, 'blog_cat_banner_block', '-1');
            $blog_cat_sidebar           = tw_get_term_meta($termID, $section_id, 'blog_cat_sidebar', 3);
            $blog_cat_view              = tw_get_term_meta($termID, $section_id, 'blog_cat_view', 1);
            $blog_cat_str_limit         = tw_get_term_meta($termID, $section_id, 'blog_cat_str_limit', 295);
            $blog_cat_readmore_label    = tw_get_term_meta($termID, $section_id, 'blog_cat_readmore_label', esc_html__('Read Details', 'logisfare'));
            $blog_cat_pagination_aligment = tw_get_term_meta($termID, $section_id, 'blog_cat_pagination_aligment', 'start');

            $blog_arch_is_banner        = ($blog_cat_is_banner > 0 ? $blog_cat_is_banner : $blog_arch_is_banner);
            $blog_arch_banner_block     = ($blog_cat_banner_block > 0 ? $blog_cat_banner_block : $blog_arch_banner_block);
            $blog_arch_sidebar          = ($blog_cat_sidebar > 0 ? $blog_cat_sidebar : $blog_arch_sidebar);
            $blog_arch_view             = ($blog_cat_view > 0 ? $blog_cat_view : $blog_arch_view);
            $blog_arch_str_limit        = ($blog_cat_str_limit > 0 ? $blog_cat_str_limit : $blog_arch_str_limit);
            $blog_arch_readmore_label   = ($blog_cat_readmore_label != '' ? $blog_cat_readmore_label : $blog_arch_readmore_label);
            $blog_arch_pagi_alignment = ($blog_cat_pagination_aligment != '' ? $blog_cat_pagination_aligment : $blog_arch_pagi_alignment);
        endif;
    elseif (class_exists('CSF') && is_tag()):
        $termID     = get_queried_object()->term_id;
        $section_id = '_logisfare_taxonomies_tag';

        $blog_tag_is_settings = tw_get_term_meta($termID, $section_id, 'blog_tag_is_settings', 2); 
        if ($blog_tag_is_settings == 1):
            
            $blog_tag_is_banner         = tw_get_term_meta($termID, $section_id, 'blog_tag_is_banner', 1);
            $blog_tag_banner_block      = tw_get_term_meta($termID, $section_id, 'blog_tag_banner_block', '-1');
            $blog_tag_sidebar           = tw_get_term_meta($termID, $section_id, 'blog_tag_sidebar', 3);
            $blog_tag_view              = tw_get_term_meta($termID, $section_id, 'blog_tag_view', 1);
            $blog_tag_str_limit         = tw_get_term_meta($termID, $section_id, 'blog_tag_str_limit', 295);
            $blog_tag_readmore_label    = tw_get_term_meta($termID, $section_id, 'blog_tag_readmore_label', esc_html__('Read Details', 'logisfare'));
            $blog_tag_pagination_aligment = tw_get_term_meta($termID, $section_id, 'blog_tag_pagination_aligment', 'start');

            $blog_arch_is_banner        = ($blog_tag_is_banner > 0 ? $blog_tag_is_banner : $blog_arch_is_banner);
            $blog_arch_banner_block     = ($blog_tag_banner_block > 0 ? $blog_tag_banner_block : $blog_arch_banner_block);
            $blog_arch_sidebar          = ($blog_tag_sidebar > 0 ? $blog_tag_sidebar : $blog_arch_sidebar);
            $blog_arch_view             = ($blog_tag_view > 0 ? $blog_tag_view : $blog_arch_view);
            $blog_arch_str_limit        = ($blog_tag_str_limit > 0 ? $blog_tag_str_limit : $blog_arch_str_limit);
            $blog_arch_readmore_label   = ($blog_tag_readmore_label != '' ? $blog_tag_readmore_label : $blog_arch_readmore_label);
            $blog_arch_pagi_alignment   = ($blog_tag_pagination_aligment != '' ? $blog_tag_pagination_aligment : $blog_arch_pagi_alignment);

        endif;
    endif;
    if ($blog_arch_is_banner && $blog_arch_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
        Themewar_Builder::render_template($blog_arch_banner_block);
    elseif ($blog_arch_is_banner && ($blog_arch_banner_block < 0 || $blog_arch_banner_block == '')):
        get_template_part('template-parts/header/default', 'header');
    endif;

    $areaClass = (!is_active_sidebar('sidebar-1') || $blog_arch_sidebar == 1 ? ($blog_arch_view == 2 ? 'col-lg-12' : 'col-lg-10 offset-lg-1') : ($blog_arch_sidebar == 2 ? 'col-lg-8 col-md-12' : 'col-lg-8 col-md-12'));
    $colClass = (is_active_sidebar('sidebar-1') && ($blog_arch_sidebar == 2 || $blog_arch_sidebar == 3) ? 'col-lg-6 col-md-6' : 'col-lg-4 col-md-6');
    $blogViewSB = ($blog_arch_sidebar == 2 ? 'blogLSB' : ($blog_arch_sidebar == 1 ? 'blogNSB' : 'blogRSB'));
?>
<section class="blogPageSection">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('sidebar-1') && $blog_arch_sidebar == 2): ?>
                <div class="col-lg-4 blogSidebarCol">
                    <div class="sidebar blogLeftSidebar">
                        <?php dynamic_sidebar('sidebar-1');?>
                    </div>
                </div>
            <?php endif;?>
            <div class="<?php echo esc_attr($areaClass); ?>">
                <?php
                    if ($blog_arch_view == 2):
                        echo '<div class="blogGridView ' .esc_attr($blogViewSB) .'"><div class="row">';
                        while (have_posts()):
                            the_post();
                            echo '<div class="' . esc_attr($colClass) . '">';
                            get_template_part('template-parts/post/content', 'grid');
                            echo '</div>';
                        endwhile;
                        echo '</div></div>';
                    else:
                        echo '<div class="blogListView ' .esc_attr($blogViewSB) .'">';
                        while (have_posts()):
                            the_post();
                            get_template_part('template-parts/post/content', 'list');
                        endwhile;
                        echo '</div>';
                    endif;
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blogArchivePagination text-<?php echo esc_attr($blog_arch_pagi_alignment); ?>">
                            <?php
                                the_posts_pagination(
                                    array(
                                        'prev_text' => logisfare_kses('<i class="logisfare-arrow_prev"></i>'),
                                        'next_text' => logisfare_kses('<i class="logisfare-arrow_next"></i>'),
                                        'before_page_number' => '',
                                        'class' => 'logisfarePagination',
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php wp_reset_query(); ?>
            <?php if (is_active_sidebar('sidebar-1') && $blog_arch_sidebar == 3): ?>
                <div class="col-lg-4 blogSidebarCol">
                    <div class="sidebar blogRightSidebar">
                        <?php dynamic_sidebar('sidebar-1');?>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
<?php
    $blog_arch_bloks = tw_get_option($customizer_ID, 'blog_arch_bloks', '');
    $blocks_id = array();
    if (!empty($blog_arch_bloks)) {
        foreach ($blog_arch_bloks as $sb):
            if ($sb['blog_arch_ids'] != '' && $sb['blog_arch_ids'] != 'none' && class_exists('THEMEWAR_Assistance')):
                Themewar_Builder::render_template($sb['blog_arch_ids']);
            endif;
        endforeach;
    }
get_footer();
