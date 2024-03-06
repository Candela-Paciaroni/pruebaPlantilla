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
    <div class="row teamGridWraper">
        <?php 
        $a = 1;
            while($qp->have_posts()):
            $qp->the_post();	

            if(class_exists('CSF')){
                $social_list = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_social_list', array());
                $designation = tw_get_post_meta(get_the_Id(), '_logisfare_team_meta', 'team_designation', esc_html__('Chief Officer', 'logisfare'));
            }
            $w = ($mem_view_style == 3 ? '391' : ($mem_view_style == 2 ? 183 : 287));
            $h = ($mem_view_style == 3 ? '450' : ($mem_view_style == 2 ? 183 : 280));

            
            $animAttr = '';
            $animClass = $animAttr;
            if($is_animation == 'yes' && $animation_name !='none'){
                $animClass = ' enable_animation aos-animate';
                $animAttr .= (!empty($animation_name) ? ' data-aos="'.$animation_name.'" ' : '');
                $animation_duration = ($a== 1 ? $animation_duration : ($animation_duration + $animation_duration_inc));
                $animAttr .= (!empty($animation_duration) ? ' data-aos-duration="'.$animation_duration.'" ' : '');
                $animation_delay = ($a== 1 ? $animation_delay : ($animation_delay + $animation_delay_inc));
                $animAttr .= (!empty($animation_delay) ? ' data-aos-delay="'.$animation_delay.'" ' : '');
            }
        ?>
            <div class="col-xxl-<?php echo str_replace('.', '-', 12 / $lb_xxl_col); ?> col-xl-<?php echo str_replace('.', '-', 12 / $lb_xl_col); ?> col-lg-<?php echo str_replace('.', '-', 12 / $lb_lg_col); ?> col-md-<?php echo str_replace('.', '-', 12 / $lb_md_col); ?> col-sm-<?php echo str_replace('.', '-', 12 / $lb_sm_col)?>">
                <?php if($mem_view_style == 3) : ?>
                    <div class="teamItem03 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
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
                <?php elseif($mem_view_style == 2) : ?>
                    <div class="teamItem02 <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                        <div class="team02Thumb">
                            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h);?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">    
                        </div>
                        <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(the_title())?></a></h3>
                        <p><?php echo esc_html($designation); ?></p>
                    </div>
                <?php else: ?>
                    <div class="singleTeam <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
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
                            <p><?php echo esc_html($designation); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php $a++; endwhile; ?>
    </div>
<?php endif; 
wp_reset_postdata(); ?>