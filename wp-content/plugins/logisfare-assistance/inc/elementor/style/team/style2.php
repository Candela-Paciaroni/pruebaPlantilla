<?php 
$querys = array(
    'post_type'         => 'team',
    'post_status'       => 'publish',
    'posts_per_page'    => $lb_post_item,
    'orderby'           => $lb_order_by,
    'order'             => $lb_order
);

$qp = new WP_Query($querys);

if($qp->have_posts()): 
?>
    <div class="row <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
    <div class="teamSliderdWraper"
        data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
        data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
        data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
        data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>" 
        
        data-itemxxl="<?php echo esc_attr($lb_xxl_col); ?>"
        data-itemxl="<?php echo esc_attr($lb_xl_col); ?>"
        data-itemlg="<?php echo esc_attr($lb_lg_col); ?>"
        data-itemmd="<?php echo esc_attr($lb_md_col); ?>"
        data-itemsm="<?php echo esc_attr($lb_sm_col); ?>"
        
        data-gapping="<?php echo esc_attr($gapping); ?>"
    >
        <?php if($mem_view_style == 3) : ?>
            <div class="teamCarousel owl-carousel">
                <?php 
                    while($qp->have_posts()):
                    $qp->the_post();	

                    if(class_exists('CSF')){
                        $social_list = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_social_list', array());
                        $designation = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_designation', esc_html__('Chief Officer', 'logisfare'));
                    }
                    $w = 391;
                    $h = 450;
                ?>
                    <div class="teamItem03">
                        <div class="teamthumb03">
                            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h);?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                            <?php if(!empty($social_list)): ?>
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
                                    <?php $i++; endforeach ; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="teamContent03 clearfix">
                            <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title())?></a></h3>
                            <p><?php echo esc_html($designation); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php elseif($mem_view_style == 2) : ?>
            <div class="teamCarousel owl-carousel">
                <?php 
                    while($qp->have_posts()):
                    $qp->the_post();	

                    if(class_exists('CSF')){
                        $designation = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_designation', esc_html__('Chief Officer', 'logisfare'));
                    }
                    $w = 245;
                    $h = 245;
                ?>
                    <div class="teamItem02">
                        <div class="team02Thumb">
                            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h);?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                        </div>
                        <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title())?></a></h3>
                        <p><?php echo esc_html($designation); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="teamCarousel owl-carousel">
                <?php 
                    while($qp->have_posts()):
                    $qp->the_post();	

                    if(class_exists('CSF')){
                        $social_list = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_social_list', array());
                        $designation = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_designation', esc_html__('Chief Officer', 'logisfare'));
                    }
                    $w = 287;
                    $h = 280;
                ?>
                    <div class="singleTeam ">
                        <div class="teamMeta">
                            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h);?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                            <?php if(!empty($social_list)): ?>
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
                                    <?php $i++; endforeach ; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="teamContent">
                            <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title())?></a></h4>
                            <p><?php echo esc_html($designation);?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        </div>
    </div>
<?php endif; 
wp_reset_postdata(); ?>