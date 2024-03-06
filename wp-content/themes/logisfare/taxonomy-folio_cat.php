<?php
get_header();
$customizer_ID = '_logisfare_customizer_options';

    $folio_cat_is_banner    = tw_get_option($customizer_ID, 'folio_cat_is_banner', 1);
    $folio_cat_banner_block = tw_get_option($customizer_ID, 'folio_cat_banner_block', -1);
    
    $folio_cat_is_masonry   = tw_get_option($customizer_ID, 'folio_cat_is_masonry', 2);
    $folio_cat_style        = tw_get_option($customizer_ID, 'folio_cat_style', '1');
    
    $folio_cat_col_xxl      = tw_get_option($customizer_ID, 'folio_cat_col_xxl', '3');
    $folio_cat_col_xl       = tw_get_option($customizer_ID, 'folio_cat_col_xl', '3');
    $folio_cat_col_lg       = tw_get_option($customizer_ID, 'folio_cat_col_lg', '3');
    $folio_cat_col_md       = tw_get_option($customizer_ID, 'folio_cat_col_md', '2');
    $folio_cat_col_sm       = tw_get_option($customizer_ID, 'folio_cat_col_sm', '1');
    
    $folio_cat_thumb_width  = tw_get_option($customizer_ID, 'folio_cat_thumb_width', '');
    $folio_cat_thumb_height = tw_get_option($customizer_ID, 'folio_cat_thumb_height', '');
    $folio_cat_title_length = tw_get_option($customizer_ID, 'folio_cat_title_length', 25);
    $folio_cat_pagi_alignment = tw_get_option($customizer_ID, 'folio_cat_pagi_alignment', 'center');
    
    if($folio_cat_is_banner && $folio_cat_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
        Themewar_Builder::render_template($folio_cat_banner_block);
    elseif($folio_cat_is_banner && ($folio_cat_banner_block < 0 || $folio_cat_banner_block == '')):
        get_template_part( 'template-parts/header/default', 'header' );
    endif;
    
    if(have_posts()):
    ?>
    <section class="folioArchivePage">
        <div class="container projectGallery <?php echo esc_attr($folio_cat_style ==1 ? '' : 'pGrid02'); ?>">
            <div class="row <?php echo esc_attr($folio_cat_is_masonry ? 'shafull_container' : '') ?>">
                <?php 
                    $i = 1;
                    $a = 1;
                    $class = ($folio_cat_is_masonry ? 'shaf_item' : '');
                    $arr_h = [2, 4, 5, 6, 7, 10, 12, 14, 15, 16, 17, 20, 22, 24, 25, 26, 27, 30];
                    $arr_h2 = [1, 3, 4, 7, 9, 10, 13, 15, 16, 19, 21, 22];
                    while(have_posts()):
                        the_post();
                        $terms  = get_the_terms(get_the_ID(), 'folio_cat');

                        if($folio_cat_style == 1):
                            $cats   = '';
                            if (is_array($terms) && count($terms) > 0){
                                $p = 1;
                                $c = count($terms);
                                foreach ($terms as $term){
                                    if($p > 2){break;};
                                    $cats .='<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                                    $cats .= ($p != $c && $p < 2 ? '<span></span>' : '');
                                    $p++;
                                }
                            };
                        else:  
                            $cats   = '';
                            if (is_array($terms) && count($terms) > 0){
                                $p = 1;
                                $c = count($terms);
                                $catClass = ($folio_cat_style == 3 ? 'collTag' : '');
                                foreach ($terms as $term){
                                    if($p > 1){break;};
                                    $cats .='<a class="'.$catClass.'" href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
                                    $cats .= ($p != $c && $p < 1 ? '<span></span>' : '');
                                    $p++;
                                }
                            };
                        endif;  
                ?>
                    <div class="<?php echo esc_attr($class) ?> col-xxl-<?php echo round(12 / $folio_cat_col_xxl); ?> col-xl-<?php echo round(12 / $folio_cat_col_xl); ?> col-lg-<?php echo round(12 / $folio_cat_col_lg); ?> col-md-<?php echo round(12 / $folio_cat_col_md); ?> col-sm-<?php echo round(12 / $folio_cat_col_sm); ?>">
                        <?php if($folio_cat_style == 2): ?>
                            <?php
                                $w = ($folio_cat_thumb_width > 0 ? $folio_cat_thumb_width : 387);
                                if($folio_cat_is_masonry):
                                    $h = (in_array($i, $arr_h) ? 323 : 500);
                                else:
                                    $h = ($folio_cat_thumb_height > 0 ? $folio_cat_thumb_height : 500);
                                endif;
                            ?>
                            <div class="mix project_item">
                                <div class="pdItem01">
                                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                    <div class="pdTitle01">
                                    <div class="pdTitle_wrap">
                                            <?php if(!empty($cats)): ?>
                                                <?php echo logisfare_kses($cats); ?>
                                            <?php endif; ?>
                                            <h3>
                                                <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo logisfare_blog_title_formater(get_the_title(), $folio_cat_title_length ); ?></a>
                                            </h3>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php elseif($folio_cat_style == 3): ?> 
                            <?php
                                $w = ($folio_cat_thumb_width > 0 ? $folio_cat_thumb_width : 387);
                                if($folio_cat_is_masonry):
                                    $h = (in_array($i, $arr_h) ? 323 : 500);
                                else:
                                    $h = ($folio_cat_thumb_height > 0 ? $folio_cat_thumb_height : 500);
                                endif;
                            ?>
                            <div class="mix project_item">
                                <div class="collSingleItem">
                                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                    <div class="collCat">
                                        <h4>
                                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo logisfare_blog_title_formater(get_the_title(), $folio_cat_title_length ); ?></a>
                                        </h4>
                                        <?php if(!empty($cats)): ?>
                                            <?php echo logisfare_kses($cats); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="collShape01">
                                    <img class="collPG01" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/bgimg/proGridShap01.png'); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    <img class="collPG02" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/bgimg/proGridShap02.png'); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    <img class="collPG03" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/bgimg/proGridShap03.png'); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    
                                    </div>
                                    <div class="collShape02">
                                    <img class="collPG01" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/bgimg/proGridShap04.png'); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    <img class="collPG02" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/bgimg/proGridShap05.png'); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    </div>
                                    <a href="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full'); ?>" class="viewColl popup_image"><i class="<?php echo esc_attr('themewar_eye', 'logisfare'); ?>"></i></a>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php
                                $w = ($folio_cat_thumb_width > 0 ? $folio_cat_thumb_width : 387);
                                if($folio_cat_is_masonry):
                                    $h = (in_array($i, $arr_h) ? 323 : 500);
                                else:
                                    $h = ($folio_cat_thumb_height > 0 ? $folio_cat_thumb_height : 500);
                                endif;
                            ?>
                            <div class="mix project_item">
                                <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                                <a href="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full'); ?>" class="projectShow popup_image"><i class="<?php echo esc_attr('themewar_eye', 'logisfare'); ?>"></i></a>
                                <div class="projectContent">
                                    <div class="projectCat02">
                                        <?php if(!empty($cats)): ?>
                                            <?php echo logisfare_kses($cats); ?>
                                        <?php endif; ?>
                                    </div>
                                    <h3>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo logisfare_blog_title_formater(get_the_title(), $folio_cat_title_length ); ?></a>
                                    </h3>
                                </div>
                                <span class="projectrCircle"></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $i++; $a++;
                endwhile; 
                ?>
                <?php if($folio_cat_is_masonry): ?><div class="col-md-1 col-lg-1 col-xl-1 shaf_sizer"></div><?php endif; ?>
            
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="folioPagePagination folioArcPagePagi text-<?php echo esc_attr($folio_cat_pagi_alignment); ?>">
                        <?php
                            the_posts_pagination(
                                array(
                                    'prev_text'        => logisfare_kses('<i class="logisfare-arrow_prev"></i>'),
                                    'next_text'        => logisfare_kses('<i class="logisfare-arrow_next"></i>'),
                                    'before_page_number' => '',
                                    'class'            => 'logisfarePagination'
                                )
                            );
                        ?>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <?php endif;  wp_reset_query();
get_footer();