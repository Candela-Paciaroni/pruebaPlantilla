<?php
/**
 * index.php
 *
 * The main template file.
 */
get_header();
$customizer_ID = '_logisfare_customizer_options';

$blog_is_banner         = tw_get_option($customizer_ID, 'blog_is_banner', 1);
$blog_banner_block      = tw_get_option($customizer_ID, 'blog_banner_block', -1);
$blog_pagination_alignment = tw_get_option($customizer_ID, 'blog_pagination_alignment', 'start');

if ($blog_is_banner && $blog_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
    Themewar_Builder::render_template($blog_banner_block);
elseif ($blog_is_banner && ($blog_banner_block < 0 || $blog_banner_block == '')):
    get_template_part('template-parts/header/default', 'header');
endif;

$blog_sidebar   = tw_get_option($customizer_ID, 'blog_sidebar', 3);
$blog_view      = tw_get_option($customizer_ID, 'blog_view', 1);
$areaClass = (!is_active_sidebar('sidebar-1') || $blog_sidebar == 1 ? ($blog_view == 2 ? 'col-lg-12' : 'col-lg-10 offset-lg-1') : ($blog_sidebar == 2 ? 'col-lg-8 col-md-12' : 'col-lg-8 col-md-12'));
$colClass = (is_active_sidebar('sidebar-1') && ($blog_sidebar == 2 || $blog_sidebar == 3) ? 'col-lg-6 col-md-6' : 'col-lg-4 col-md-6');

$blogViewSB = ($blog_sidebar == 2 ? 'blogLSB' : ($blog_sidebar == 1 ? 'blogNSB' : 'blogRSB'));

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
                if ($blog_view == 2):
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