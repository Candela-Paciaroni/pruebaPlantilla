<?php
/**
 * The template for displaying all single posts
 */

get_header();
$customizer_ID = '_logisfare_customizer_options';

$blog_single_is_banner      = tw_get_option($customizer_ID, 'blog_single_is_banner', 1);
$blog_single_banner_block   = tw_get_option($customizer_ID, 'blog_single_banner_block', -1);
if(function_exists('logisfare_post_view_count')){ logisfare_post_view_count(get_the_ID()); }

if(logisfare_is_edited_by_elementor(get_the_ID())):
    ?>
    <section class="logisfareBlogPageViewer">
        <?php
            while(have_posts()):
                the_post();
                the_content();
            endwhile;
        ?>
    </section>
    <?php
else:
    if($blog_single_is_banner == 1 && $blog_single_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
        Themewar_Builder::render_template($blog_single_banner_block);
    elseif($blog_single_is_banner == 1 && ($blog_single_banner_block < 0 || $blog_single_banner_block == '')):
        get_template_part( 'template-parts/header/default', 'header' );
    endif;
    ?>
    <section class="blogDetailsPgSec">
        <div class="container">
            <div class="row">
                <div class="col-lg-<?php echo (!is_active_sidebar('sidebar-1') ? '10 offset-lg-1' : 8) ?> col-md-12">
                    <?php
                        while(have_posts()):
                            the_post();
                            get_template_part( 'template-parts/post/content', 'single' );
                        endwhile;
                    ?>
                </div>
                <?php if(is_active_sidebar('sidebar-1')): ?>
                    <div class="col-lg-4 blogSidebarCol">
                        <div class="sidebar blogRightSidebar">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
endif;
    
get_footer();