<?php
    get_header();
    $customizer_ID = '_logisfare_customizer_options';

    $team_is_banner     = tw_get_option($customizer_ID, 'team_is_banner', 1);
    $team_banner_block  = tw_get_option($customizer_ID, 'team_banner_block', -1);

    $team_style         = tw_get_option($customizer_ID, 'team_style', '1');

    $team_col_xxl       = tw_get_option($customizer_ID, 'team_col_xxl', '4');
    $team_col_xl        = tw_get_option($customizer_ID, 'team_col_xl', '3');
    $team_col_lg        = tw_get_option($customizer_ID, 'team_col_lg', '3');
    $team_col_md        = tw_get_option($customizer_ID, 'team_col_md', '2');
    $team_col_sm        = tw_get_option($customizer_ID, 'team_col_sm', '1');

    $team_pagi_alignment = tw_get_option($customizer_ID, 'team_pagi_alignment', 'center');

    if ($team_is_banner && $team_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
        Themewar_Builder::render_template($team_banner_block);
    elseif ($team_is_banner && ($team_banner_block < 0 || $team_banner_block == '')):
        get_template_part('template-parts/header/default', 'header');
    endif;


    if(have_posts()):

?>
    <section class="teamArchivePage">
        <div class="container">
            <div class="row teamGridWraper">
                <?php 
                    $a = 1;
                    while(have_posts()):
                        the_post();

                        if(class_exists('CSF')){
                            $social_list = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_social_list', array());
                            $designation = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_designation', esc_html__('Chief Officer', 'logisfare'));
                        }

                        $w = ($team_style == 3 ? 245 : ($team_style == 2 ? 391 : 287));
                        $h = ($team_style == 3 ? 245 : ($team_style == 2 ? 450 : 280));

                ?>
                    <div class="col-xxl-<?php echo round(12 / $team_col_xxl); ?> col-xl-<?php echo round(12 / $team_col_xl); ?> col-lg-<?php echo round(12 / $team_col_lg); ?> col-md-<?php echo round(12 / $team_col_md); ?> col-sm-<?php echo round(12 / $team_col_sm); ?>">
                        <?php if($team_style == 2): ?>
                            <div class="teamItem03">
                                <div class="teamthumb03">
                                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h);?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    <?php if(!empty($social_list)):?>
                                        <div class="teamSocial03">
                                            <?php
                                                $i = 1;
                                                foreach($social_list as $social): 
                                                    $icon =  (isset($social['social_icon']) && $social['social_icon'] !='') ? $social['social_icon'] : '';
                                                    $url  =  (isset($social['social_link']['url']) && $social['social_link']['url'] !='')  ? $social['social_link']['url'] : 'javascript:void(0)';
                                                    $target  =  (isset($social['social_link']['target']) && !empty($social['social_link']['target']))  ? ' target=_blank' : '';
                                                    
                                                if($i > 4){ break;}
                                            ?>
                                            <a <?php echo esc_attr($target); ?> href="<?php echo esc_attr($url); ?>"><i class="<?php echo esc_attr($icon); ?>"></i></a>
                                        <?php $i++; endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="teamContent03 clearfix">
                                    <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title())?></a></h3>
                                    <p><?php echo esc_html($designation); ?></p>
                                </div>
                            </div>
                        <?php elseif($team_style == 3): ?>
                            <div class="teamItem02">
                                <div class="team02Thumb">
                                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h);?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                </div>
                                <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title())?></a></h3>
                                <p><?php echo esc_html($designation); ?></p>
                            </div>
                        <?php else: ?>
                            <div class="singleTeam">
                                <div class="teamMeta">
                                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h);?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    <?php if(!empty($social_list)):?>
                                        <div class="teamSocial">
                                            <?php 
                                                $i = 1;
                                                foreach($social_list as $social): 
                                                    $icon =  (isset($social['social_icon']) && $social['social_icon'] !='') ? $social['social_icon'] : '';
                                                    $url  =  (isset($social['social_link']['url']) && $social['social_link']['url'] !='')  ? $social['social_link']['url'] : 'javascript:void(0)';
                                                    $target  =  (isset($social['social_link']['target']) && !empty($social['social_link']['target']))  ? ' target=_blank' : '';
                                                    
                                                if($i > 4){ break;}
                                            ?>
                                                <a <?php echo esc_attr($target); ?> href="<?php echo esc_attr($url); ?>"><i class="<?php echo esc_attr($icon); ?>"></i></a>
                                            <?php $i++; endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="teamContent">
                                    <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title())?></a></h4>
                                    <p><?php echo esc_html($designation); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php $a++; endwhile; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="folioPagePagination teamPagePagi text-<?php echo esc_attr($team_pagi_alignment); ?>">
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
<?php endif; wp_reset_postdata();
    get_footer();

