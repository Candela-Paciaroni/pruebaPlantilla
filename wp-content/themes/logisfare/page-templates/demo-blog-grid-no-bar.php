<?php
/* 
 * Template Name: Demo Blog Grid No Sidebar
 */
get_header();
$customizer_ID = '_logisfare_customizer_options';

$blog_is_banner         = tw_get_option($customizer_ID, 'blog_is_banner', 1);
$blog_banner_block      = tw_get_option($customizer_ID, 'blog_banner_block', -1);
$blog_pagination_alignment = tw_get_option($customizer_ID, 'blog_pagination_alignment', 'start');
$blog_grid_style        = tw_get_option($customizer_ID, 'blog_grid_style', 1);
$blog_title_limit       = tw_get_option($customizer_ID, 'blog_title_limit', 48);
$blog_str_limit         = tw_get_option($customizer_ID, 'blog_str_limit_grid', 90);
$blog_readmore_label    = tw_get_option($customizer_ID, 'blog_readmore_label', esc_html__('Read Details', 'logisfare'));

if ($blog_is_banner && $blog_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
    Themewar_Builder::render_template($blog_banner_block);
elseif ($blog_is_banner && ($blog_banner_block < 0 || $blog_banner_block == '')):
    get_template_part('template-parts/header/default', 'header');
endif;


$blog_sidebar = 1;
$blog_view = 2;
$areaClass = (!is_active_sidebar('sidebar-1') || $blog_sidebar == 1 ? ($blog_view == 2 ? 'col-lg-12' : 'col-lg-10 offset-lg-1') : ($blog_sidebar == 2 ? 'col-lg-8 col-md-12' : 'col-lg-8 col-md-12'));
$colClass = (is_active_sidebar('sidebar-1') && ($blog_sidebar == 2 || $blog_sidebar == 3) ? 'col-lg-6 col-md-6' : 'col-lg-4 col-md-6');

$blogViewSB = ($blog_sidebar == 2 ? 'blogLSB' : ($blog_sidebar == 1 ? 'blogNSB' : 'blogRSB'));

$w = ($blog_sidebar == 1 && $blog_view == 2) ? 391 : 393;
$h = ($blog_sidebar == 1 && $blog_view == 2) ? ($blog_grid_style == 2 ? 264 : ($blog_grid_style == 3 ? 316 : 332)) : ($blog_grid_style == 2 ? 264 : ($blog_grid_style == 3 ? 316 : 332));


?>
<section class="blogPageSection">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('sidebar-1') && $blog_sidebar == 2): ?>
                <div class="col-lg-4 blogSidebarCol">
                    <div class="sidebar blogLeftSidebar">
                        <?php dynamic_sidebar('sidebar-1');?>
                    </div>
                </div>
            <?php endif;?>
            <div class="<?php echo esc_attr($areaClass); ?>">
                <?php
                global $wp_query;
                $paged = (get_query_var('paged') ? get_query_var('paged') : (get_query_var('page')  ? get_query_var('page') : 1));
                $fargs = array(
                    'post_type'         => 'post',
                    'post_status'       => 'publish',
                    'posts_per_page'    => 9,
                    'orderby'           => 'ID',
                    'order'             => 'DESC',
                    'paged'             => $paged
                );
                $wp_query = new WP_Query($fargs);
                
                    echo '<div class="blogGridView ' .esc_attr($blogViewSB) .'"><div class="row">';
                    while (have_posts()):
                        the_post();
                        echo '<div class="' . esc_attr($colClass) . '">';

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
                                                <?php echo esc_html('by ', 'logisfare'); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author_meta('logisfare');?></a> 
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
                                            <?php if(is_sticky()): ?>
                                                <span class="stickyBTN"><?php echo esc_html__('Sticky Post', 'logisfare'); ?></span>
                                            <?php endif; ?>
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
                                                <img src="<?php echo logisfare_attachment_url($author_image, 40, 40); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                                <h4><?php echo get_the_author_meta('nickname');?></h4>
                                                <span><?php echo get_author_role(); ?></span>
                                            </div>
                                            <a class="logicBtn" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($blog_readmore_label); ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php
                        echo '</div>';
                    endwhile;
                    echo '</div></div>';
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blogPagePagination text-<?php echo esc_attr($blog_pagination_alignment); ?> <?php echo esc_attr(($blog_view == 1) ? 'blogListViewPagin' : ''); ?>">
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
            <?php if (is_active_sidebar('sidebar-1') && $blog_sidebar == 3): ?>
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

$blog_bloks = tw_get_option($customizer_ID, 'blog_bloks', '');
$blocks_id = array();
if (!empty($blog_bloks)) {
    foreach ($blog_bloks as $sb):
        if ($sb['block_ids'] != '' && $sb['block_ids'] != 'none' && class_exists('THEMEWAR_Assistance')):
            Themewar_Builder::render_template($sb['block_ids']);
        endif;
    endforeach;
}
get_footer();