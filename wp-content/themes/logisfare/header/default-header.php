<?php
$is_breadcurmb = (isset($settings['is_breadcurmb']) && $settings['is_breadcurmb'] != '' ? $settings['is_breadcurmb'] : 'no');
$banner_title = '';

if(empty($banner_title)):
    if(is_singular()):
        global $post;
        if(is_single() && get_post_type($post->ID) == 'post'):
            $banner_title = esc_html__('Blog', 'logisfare');
        else:
            $banner_title = get_the_title ($post->ID);
        endif;
    elseif(is_archive()):
        //$banner_title = wp_strip_all_tags(single_term_title ('', false));
        if ( is_category() ):
		$banner_title = wp_strip_all_tags(single_cat_title( '', false ));
	elseif ( is_tag() ):
		$banner_title = wp_strip_all_tags(single_tag_title( '', false ));
	elseif ( is_author() ):
		$banner_title = wp_strip_all_tags(get_the_author());
	elseif ( is_post_type_archive() ):
		$banner_title = wp_strip_all_tags(post_type_archive_title( '', false ));
	elseif ( is_tax() ):
		$banner_title = wp_strip_all_tags(single_term_title( '', false ));
	endif;
    elseif(is_search()):
        $banner_title = wp_strip_all_tags(get_search_query());
    elseif(is_404()):
        $banner_title = esc_html__('404 Error', 'logisfare');
    elseif(is_home() && !is_front_page()):
        $postsPageID = (get_option('page_for_posts', '') > 0 ? get_option('page_for_posts', '') : 0);
        $banner_title = ($postsPageID > 0 ? get_the_title($postsPageID) : esc_html__('Blog', 'logisfare'));
    else:
        if(is_home() && is_front_page()):
            $banner_title = esc_html__('Blog', 'logisfare');
        else:
            $banner_title = esc_html__('Page Title', 'logisfare');
        endif;
    endif;
endif;

?>
<section class="pageBanner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-10 offset-xl-1">
                <div class="pageBannerContent">
                    <h2 class="page-title"><?php echo esc_html($banner_title) ?></h2>
                    <?php if(logisfare_breadcrumbs() != ''): ?>
                    <div class="pageBannerPath"><?php echo logisfare_breadcrumbs(); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>