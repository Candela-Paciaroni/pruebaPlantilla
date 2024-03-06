<?php 
    $customizer_ID = '_logisfare_customizer_options';

    $blog_is_banner         = tw_get_option($customizer_ID, 'blog_is_banner', 1);
    $blog_banner_block      = tw_get_option($customizer_ID, 'blog_banner_block', -1);
    $blog_sidebar           = tw_get_option($customizer_ID, 'blog_sidebar', 3);
    $blog_str_limit         = tw_get_option($customizer_ID, 'blog_str_limit', 295);
    $blog_readmore_label    = tw_get_option($customizer_ID, 'blog_readmore_label', esc_html__('Read Details', 'logisfare'));

    if(is_archive()):
        $blog_sidebar       = tw_get_option($customizer_ID, 'blog_arch_sidebar', 3);
        $blog_view          = tw_get_option($customizer_ID, 'blog_arch_view', 1);
        $blog_str_limit     = tw_get_option($customizer_ID, 'blog_arch_str_limit', 295);
        $blog_readmore_label = tw_get_option($customizer_ID, 'blog_arch_readmore_label', esc_html__('Read Details', 'logisfare'));

        if (class_exists('CSF') && is_category()):
            $termID     = get_queried_object()->term_id;
            $section_id = '_logisfare_taxonomies';

            $blog_cat_is_settings = tw_get_term_meta($termID, $section_id, 'blog_cat_is_settings', '0');
            if($blog_cat_is_settings == 1):
                $blog_sidebar       = tw_get_term_meta($termID, $section_id, 'blog_cat_sidebar', '3');
                $blog_view          = tw_get_term_meta($termID, $section_id, 'blog_cat_view', '1');
                $blog_cat_str_limit         = tw_get_term_meta($termID, $section_id, 'blog_cat_str_limit', 295);
                $blog_readmore_label = tw_get_term_meta($termID, $section_id, 'blog_cat_readmore_label', esc_html__('Read Details', 'logisfare'));
            endif; 
        elseif(class_exists('CSF') && is_tag()):
            $termID     = get_queried_object()->term_id;
            $section_id = '_logisfare_taxonomies_tag';

            $blog_tag_is_settings = tw_get_term_meta($termID, $section_id, 'blog_tag_is_settings', '0');
            if($blog_tag_is_settings == 1):
                $blog_sidebar       = tw_get_term_meta($termID, $section_id, 'blog_tag_sidebar', '3');
                $blog_view          = tw_get_term_meta($termID, $section_id, 'blog_tag_view', '1');
                $blog_str_limit     = tw_get_term_meta($termID, $section_id, 'blog_tag_str_limit', '295');
                $blog_readmore_label = tw_get_term_meta($termID, $section_id, 'blog_tag_readmore_label', esc_html__('Read Details', 'logisfare'));
            endif;
        endif;
        
    endif;
    
    $w = (is_active_sidebar('sidebar-1') && $blog_sidebar != 1 ? '773' : '1013');
    $h = (is_active_sidebar('sidebar-1') && $blog_sidebar != 1 ? '450' : '590');
    
    $terms = get_the_terms(get_the_ID(), 'category');
    $cats  = '';
    if (is_array($terms) && count($terms) > 0){
        $p = 1;
        $c = count($terms);
        foreach ($terms as $term) {
            if($p > 1){break;};
            $cats .= '<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
            $cats .= ($p != $c && $p < 1 ? '<span class="catsIndicator">/</span>' : '');
            $p++;
        }
    }
    $commentPrefix = (get_comments_number(get_the_ID()) > 1 && get_comments_number(get_the_ID()) < 10 ) ? '0' : '';
?>
<div class="blogPageSingle01" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
    <?php if(has_post_thumbnail()): ?>
        <div class="blogThumb logisFlash">
            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full', $h); ?>" alt="<?php echo get_the_title(); ?>">
        </div>
    <?php endif; ?>
    <div class="biMeta01">
        <?php if(is_sticky()): ?>
            <div class="stickyPost">
                <span class="stickyBTN"><?php echo esc_html__('Featured', 'logisfare'); ?></span>
            </div>
        <?php endif; ?>
        <span>
            <i class="logisfare-tag"></i>
            <?php echo logisfare_kses($cats); ?>
        </span>
        <span><i class="themewar_comments"></i><a href="#comments"><?php comments_number( '0 '.esc_html__('Comments', 'logisfare'), '01 '.esc_html__('Comment', 'logisfare'), $commentPrefix.'% '.esc_html__('Comments', 'logisfare') ); ?></a></span>
    </div>
    <h2><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
    <p class="blogDesc">
        <?php 
            $postExcerpt = wp_strip_all_tags(get_the_excerpt());
            if(!empty($postExcerpt) && $blog_str_limit > 0): 
                    $theCutExcerpt = $postExcerpt;
                    if (preg_match('/^.{1,'.$blog_str_limit.'}\b/s', $postExcerpt, $myMatch)):
                        $theCutExcerpt = $myMatch[0];
                    endif;
                    echo logisfare_kses($theCutExcerpt);
            endif;
        ?>
    </p>
    <a class="logicBtn" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($blog_readmore_label); ?></a>
</div>