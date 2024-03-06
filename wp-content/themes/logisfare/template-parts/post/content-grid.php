<?php
    $customizer_ID = '_logisfare_customizer_options';

    $blog_is_banner         = tw_get_option($customizer_ID, 'blog_is_banner', 1);
    $blog_banner_block      = tw_get_option($customizer_ID, 'blog_banner_block', -1);
    $blog_sidebar           = tw_get_option($customizer_ID, 'blog_sidebar', 3);
    $blog_view              = tw_get_option($customizer_ID, 'blog_view', 3);
    $blog_title_limit       = tw_get_option($customizer_ID, 'blog_title_limit', 48);
    $blog_str_limit         = tw_get_option($customizer_ID, 'blog_str_limit_grid', 90);
    $blog_grid_style        = tw_get_option($customizer_ID, 'blog_grid_style', 1);
    $blog_readmore_label    = tw_get_option($customizer_ID, 'blog_readmore_label', esc_html__('Read Details', 'logisfare'));

if(is_archive()):
    $blog_sidebar           = tw_get_option($customizer_ID, 'blog_arch_sidebar', 3);
    $blog_view              = tw_get_option($customizer_ID, 'blog_arch_view', 1);
    $blog_grid_style        = tw_get_option($customizer_ID, 'blog_arch_grid_style', 1);
    $blog_str_limit         = tw_get_option($customizer_ID, 'blog_arch_str_limit_grid', 90);
    $blog_readmore_label    = tw_get_option($customizer_ID, 'blog_arch_readmore_label', esc_html__('Read Details', 'logisfare'));

    if (class_exists('CSF') && is_category()):
        $termID     = get_queried_object()->term_id;
        $section_id = '_logisfare_taxonomies';

        $blog_cat_is_settings = tw_get_term_meta($termID, $section_id, 'blog_cat_is_settings', 2);
        if($blog_cat_is_settings == 1):

            $blog_cat_sidebar           = tw_get_term_meta($termID, $section_id, 'blog_cat_sidebar', 3);
            $blog_cat_view              = tw_get_term_meta($termID, $section_id, 'blog_cat_view', 1);
            $blog_cat_str_limit_grid    = tw_get_term_meta($termID, $section_id, 'blog_cat_str_limit_grid', 90);
            $blog_cat_readmore_label    = tw_get_term_meta($termID, $section_id, 'blog_cat_readmore_label', esc_html__('Read Details', 'logisfare'));
            $blog_cat_pagi_aligment     = tw_get_term_meta($termID, $section_id, 'blog_cat_pagi_aligment', 'start');

            $blog_sidebar               = ($blog_cat_sidebar > 0 ? $blog_cat_sidebar : $blog_sidebar);
            $blog_view                  = ($blog_cat_view > 0 ? $blog_cat_view : $blog_view);
            $blog_str_limit             = ($blog_cat_str_limit_grid > 0 ? $blog_cat_str_limit_grid : $blog_arch_str_limit);
            $blog_readmore_label        = ($blog_cat_readmore_label != '' ? $blog_cat_readmore_label : $blog_readmore_label);
        endif; 
    elseif(class_exists('CSF') && is_tag()):
        $termID     = get_queried_object()->term_id;
        $section_id = '_logisfare_taxonomies_tag';

        $blog_tag_is_settings = tw_get_term_meta($termID, $section_id, 'blog_tag_is_settings', 2);
        if($blog_tag_is_settings == 1):
            $blog_sidebar       = tw_get_term_meta($termID, $section_id, 'blog_tag_sidebar', 3);
            $blog_view          = tw_get_term_meta($termID, $section_id, 'blog_tag_view', 1);
            $blog_str_limit     = tw_get_term_meta($termID, $section_id, 'blog_tag_str_limit_grid', 90);
            $blog_readmore_label = tw_get_term_meta($termID, $section_id, 'blog_tag_readmore_label', esc_html__('Read Details', 'logisfare'));
        endif;
    endif;

endif;

$w = ($blog_sidebar == 1 && $blog_view == 2) ? 391 : 393;
$h = ($blog_sidebar == 1 && $blog_view == 2) ? ($blog_grid_style == 2 ? 264 : ($blog_grid_style == 3 ? 316 : 332)) : ($blog_grid_style == 2 ? 264 : ($blog_grid_style == 3 ? 316 : 332));

$authrID = get_the_author_meta('ID');
$author_image = get_the_author_meta('user_av_ID');

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
?>
<div class="blogGridRow" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
    <?php if($blog_grid_style == 3): ?>
        <div class="blogItem03">
            <?php if(has_post_thumbnail()): ?>
                <div class="biThumb03">
                        <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                </div>
            <?php endif; ?>
            <div class="biMeta03">
                <span><i class="<?php echo esc_attr('themewar_clock', 'logisfare'); ?>"></i><?php echo get_the_date('d M, y'); ?></span>
                <span class="biMetaCat03">
                    <i class="<?php echo esc_attr('themewar_user', 'logisfare'); ?>"></i>
                    <?php echo esc_html('by ', 'logisfare'); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author_meta('nickname');?></a> 
                </span>
            </div>
            <?php if(get_the_title() != '') : ?>
                <h3>
                    <a href="<?php echo get_the_permalink(); ?>">
                        <?php if($blog_title_limit > 0 && strlen(wp_strip_all_tags(get_the_title())) > $blog_title_limit):
                            echo substr(wp_strip_all_tags(get_the_title()), 0, $blog_title_limit).'...';
                        else:
                            echo get_the_title();
                        endif; ?>    
                    </a>
                </h3>
            <?php endif; ?>
            <p>
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
            <a class="biBlog03" href="<?php echo get_the_permalink(); ?>">
                <span>
                    <i class="<?php echo esc_attr('themewar_arrow-right', 'logisfare'); ?>"></i>
                </span>
                <span class="bib03_btnLable"> 
                    <?php echo esc_html($blog_readmore_label); ?>
                </span>
            </a>
        </div>
    <?php elseif($blog_grid_style == 2): ?>
        <div class="blogItem02">
            <?php if(has_post_thumbnail()): ?>
                <div class="biThumb02">
                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                </div>
            <?php endif; ?>
            <div class="bpContent02">
                <div class="bpDate">
                    <span><i class="<?php echo esc_attr('themewar_calendar-days', 'logisfare'); ?>"></i></span>
                    <h4><?php echo get_the_date('d M, y'); ?></h4>
                </div>
                <?php if(get_the_title() != '') : ?>
                    <h3>
                        <a href="<?php echo get_the_permalink(); ?>">
                            <?php if($blog_title_limit > 0 && strlen(wp_strip_all_tags(get_the_title())) > $blog_title_limit):
                                echo substr(wp_strip_all_tags(get_the_title()), 0, $blog_title_limit).'...';
                            else:
                                echo get_the_title();
                            endif; ?>    
                        </a>
                    </h3>
                <?php endif; ?>
                <a class="btnLink" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($blog_readmore_label); ?><i class="<?php echo esc_attr('themewar_arrow-right', 'logisfare'); ?>"></i></a>
            </div>
        </div>
    <?php else: ?>
            <div class="blogItem01">
            <?php if(has_post_thumbnail()): ?>
                <div class="biThumb01">
                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                </div>
            <?php endif; ?>
                <div class="biContent">
                    <div class="biMeta01">
                        <?php if(!empty($cats)): ?>
                            <span class="blogCcat ">
                                <i class="<?php echo esc_attr('logisfare-tag', 'logisfare'); ?>"></i>
                                <?php echo logisfare_kses($cats); ?> 
                            </span>
                        <?php endif; ?>
                        <span>
                            <i class="<?php echo esc_attr('themewar_comments1', 'logisfare'); ?>"></i>
                            <a href="#comments"><?php comments_number( '0 '.esc_html__('Comments', 'logisfare'), '1 '.esc_html__('Comment', 'logisfare'), '% '.esc_html__('Comments', 'logisfare') ); ?></a>
                        </span>
                    </div>
                    <?php if(get_the_title() != '') : ?>
                        <h3>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <?php if($blog_title_limit > 0 && strlen(wp_strip_all_tags(get_the_title())) > $blog_title_limit):
                                    echo substr(wp_strip_all_tags(get_the_title()), 0, $blog_title_limit).'...';
                                else:
                                    echo get_the_title();
                                endif; ?>    
                            </a>
                        </h3>
                    <?php endif; ?>
                </div>
                <div class="biMeta02">
                    <div class="biAuthor">
                        <img src="<?php echo logisfare_attachment_url($author_image, 40, 40); ?>; ?>" alt="">
                        <h4><?php echo get_the_author_meta('nickname');?></h4>
                        <span><?php echo get_the_author(); ?></span>
                    </div>
                    <a class="logicBtn" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($blog_readmore_label); ?></a>
                </div>
            </div>
    <?php endif; ?>
</div>