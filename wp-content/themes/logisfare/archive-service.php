<?php
    get_header();
    $customizer_ID = '_logisfare_customizer_options';

    $service_arc_is_banner      = tw_get_option($customizer_ID, 'service_arc_is_banner', 1);
    $service_arc_banner_block   = tw_get_option($customizer_ID, 'service_arc_banner_block', -1);

    $service_arc_style          = tw_get_option($customizer_ID, 'service_arc_style', '1');
    $service_arc_btn_lable      = tw_get_option($customizer_ID, 'service_arc_btn_lable', esc_html__('Learn More', 'logisfare'));

    $service_arc_col_xxl        = tw_get_option($customizer_ID, 'service_arc_col_xxl', '3');
    $service_arc_col_xl         = tw_get_option($customizer_ID, 'service_arc_col_xl', '3');
    $service_arc_col_lg         = tw_get_option($customizer_ID, 'service_arc_col_lg', '3');
    $service_arc_col_md         = tw_get_option($customizer_ID, 'service_arc_col_md', '2');
    $service_arc_col_sm         = tw_get_option($customizer_ID, 'service_arc_col_sm', '1');

    $service_arc_excerpt_length = tw_get_option($customizer_ID, 'service_arc_excerpt_length', 115);
    $service_arc_title_length   = tw_get_option($customizer_ID, 'service_arc_title_length', 20);
    $service_arc_pagi_alignment = tw_get_option($customizer_ID, 'service_arc_pagi_alignment', 'center');

    if ($service_arc_is_banner && $service_arc_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
        Themewar_Builder::render_template($service_arc_banner_block);
    elseif ($service_arc_is_banner && ($service_arc_banner_block < 0 || $service_arc_banner_block == '')):
        get_template_part('template-parts/header/default', 'header');
    endif;


   
    if(have_posts()):

?>
    <section class="serviceArchivePage">
        <div class="container">
            <div class="row serviceGridWrapp">
                <?php 
                    $a = 1;
                    while(have_posts()):
                        the_post();

                    if(class_exists('CSF')){
                        $service_icon    = tw_get_post_meta(get_the_Id(), '_service_meta', 'service_icon', array());
                        $service_excerpt = tw_get_post_meta(get_the_Id(), '_service_meta', 'service_excerpt', '');
                    }
                ?>
                    <div class="col-xxl-<?php echo round(12 / $service_arc_col_xxl); ?> col-xl-<?php echo round(12 / $service_arc_col_xl); ?> col-lg-<?php echo round(12 / $service_arc_col_lg); ?> col-md-<?php echo round(12 / $service_arc_col_md); ?> col-sm-<?php echo round(12 / $service_arc_col_sm); ?>">
                        <?php if($service_arc_style == 2): ?> 
                            <div class="singleService">
                                <div class="serviceThumb logisFlash">
                                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 391, 257); ?>" alt="<?php echo get_the_title(); ?>">
                                </div>
                                <div class="serviceContent">
                                    <div class="serConIcon">
                                        <span>
                                            <?php if(!empty($service_icon)): ?>
                                                <i class="<?php echo esc_attr($service_icon); ?>"></i>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo logisfare_blog_title_formater(get_the_title(), $service_arc_title_length, '' ); ?></a></h4>
                                    <a class="btnLink" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($service_arc_btn_lable); ?><i class="<?php echo esc_attr('themewar_arrow-right', 'logisfare'); ?>"></i></a>
                                </div>
                            </div>
                        <?php elseif($service_arc_style == 3): ?>
                            <div class="faciltItem">
                                <span>
                                    <?php if(!empty($service_icon)): ?>
                                        <i class="<?php echo esc_attr($service_icon); ?>"></i>
                                    <?php endif; ?>
                                </span>
                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo logisfare_blog_title_formater(get_the_title(), $service_arc_title_length, '' ); ?></a></h3> 
                                <p>
                                    <?php if(!empty($service_excerpt) && $service_arc_excerpt_length > 0): 
                                                $theCutExcerpt = $service_excerpt;
                                                if (preg_match('/^.{1,'.$service_arc_excerpt_length.'}\b/s', $service_excerpt, $myMatch)):
                                                    $theCutExcerpt = $myMatch[0];
                                                endif;
                                                echo esc_html($theCutExcerpt);
                                        endif;
                                    ?>
                                </p>
                                <a class="btnLink" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($service_arc_btn_lable); ?><i class="<?php echo esc_attr('themewar_arrow-right', 'logisfare'); ?>"></i></a>
                            </div>
                        <?php else: ?>
                            <div class="serviceItem03">
                                <span>
                                    <?php if(!empty($service_icon)): ?>
                                        <i class="<?php echo esc_attr($service_icon); ?>"></i>
                                    <?php endif; ?>
                                </span>
                                <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo logisfare_blog_title_formater(get_the_title(), $service_arc_title_length, '' ); ?></a></h3> 
                                <p>
                                    <?php if(!empty($service_excerpt) && $service_arc_excerpt_length > 0): 
                                            $theCutExcerpt = $service_excerpt;
                                            if (preg_match('/^.{1,'.$service_arc_excerpt_length.'}\b/s', $service_excerpt, $myMatch)):
                                                $theCutExcerpt = $myMatch[0];
                                            endif;
                                            echo esc_html($theCutExcerpt);
                                        endif;
                                    ?>
                                </p>
                                <a class="btnLink" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($service_arc_btn_lable); ?><i class="<?php echo esc_attr('themewar_arrow-right', 'logisfare'); ?>"></i></a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $a++; endwhile; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="servicePagePagination serviceArcPagePagi text-<?php echo esc_attr($service_arc_pagi_alignment); ?>">
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
    </section>
<?php endif;  wp_reset_postdata();

    get_footer();

