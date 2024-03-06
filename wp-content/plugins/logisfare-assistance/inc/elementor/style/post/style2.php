<?php
$querys = array(
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => $lb_post_item,
    'orderby'           => $lb_order_by,
    'order'             => $lb_order
);

if (($key = array_search(0, $lb_specific)) !== false) {
    unset($lb_specific[$key]);
}
if(!empty($lb_specific)){
    $querys['post__in'] = $lb_specific;
}
if (($key = array_search(0, $lb_category)) !== false) {
    unset($lb_category[$key]);
}
if(!empty($lb_category)){
    $querys['tax_query']   = array(
        'relation'      => 'AND', 
        array(
            'taxonomy'  => 'category', 
            'field'     => 'id', 
            'terms'     => $lb_category,
            'operator'  => 'IN'
        )
    );
}
if (($key = array_search(0, $lb_tag)) !== false) {
    unset($lb_tag[$key]);
}
if(!empty($lb_tag)){
    if(isset($querys['tax_query'])):
        $querys['tax_query'][] = array(
                'taxonomy' => 'post_tag', 
                'field' => 'id', 
                'terms' => $lb_tag,
                'operator' => 'IN',
        );
    else:
        $querys['tax_query'] = array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'post_tag',
                'field' => 'id',
                'terms' => $lb_tag,
                'operator' => 'IN'
            )
        );
    endif;
}

$qp = new WP_Query($querys);
if($qp->have_posts()): ?>
    <div class="row blogsliderWrapper"
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
        <?php
        if($lb_select_pst_style == 3): 
        ?>
            <div class="blogCarousel owl-carousel">
                <?php
                while($qp->have_posts()):
                    $qp->the_post();

                    $w = ($lb_post_thumb_width > 0 && !empty($lb_post_thumb_width) ? $lb_post_thumb_width : 391);
                    $h = ($lb_post_thumb_height > 0 && !empty($lb_post_thumb_width) ? $lb_post_thumb_height : 314);

                    $dateFormat = (get_option('date_format') != '' ? get_option('date_format') : 'd M, Y');
                    $lpDay = get_the_date('d');
                    $lpMonth = get_the_date('M');
                    $lpYear = get_the_date('Y');
                    
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
                    <div class="blogItem03">
                        <div class="biThumb03 <?php echo esc_attr($class); ?>">
                            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                        </div>
                        <div class="biMeta03">
                            <span><i class="<?php echo esc_attr('themewar_clock', 'themewar'); ?>"></i><?php echo get_the_date('d M, y'); ?></span>
                            <span class="biMetaCat03">
                                <i class="<?php echo esc_attr('themewar_user', 'themewar'); ?>"></i>
                                <?php echo esc_html('by ', 'themewar'); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author_meta('nickname');?></a> 
                            </span>
                        </div>
                        <div class="biContent03">
                            <h3>
                                <a href="<?php echo get_the_permalink(); ?>">
                                    <?php 
                                        if($lb_title_strlimit > 0 && strlen(wp_strip_all_tags(get_the_title())) > $lb_title_strlimit):
                                            echo substr(wp_strip_all_tags(get_the_title()), 0, $lb_title_strlimit).'';
                                        else:
                                            echo get_the_title();
                                        endif;
                                    ?>
                                </a>
                            </h3>
                            <p>
                                <?php 
                                    $postExcerpt = wp_strip_all_tags(get_the_excerpt());
                                    if(!empty($postExcerpt) && $lb_strlimit > 0): 
                                            $theCutExcerpt = $postExcerpt;
                                            if (preg_match('/^.{1,'.$lb_strlimit.'}\b/s', $postExcerpt, $myMatch)):
                                                $theCutExcerpt = $myMatch[0];
                                            endif;
                                            echo logisfare_kses($theCutExcerpt);
                                    endif;
                                ?>
                            </p>
                            <a class="biBlog03" href="<?php echo get_the_permalink(); ?>">
                                <span>
                                    <i class="<?php echo esc_attr('logisfare-arrow-next', 'themewar'); ?>"></i>
                                </span>
                                <span class="bib03_btnLable"> 
                                    <?php echo esc_html($rm_label); ?>
                                </span>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php elseif($lb_select_pst_style == 2): ?>
            <div class="blogCarousel owl-carousel">
                <?php 
                while($qp->have_posts()):
                    $qp->the_post();

                    $w = ($lb_post_thumb_width > 0 && !empty($lb_post_thumb_width) ? $lb_post_thumb_width : 598);
                    $h = ($lb_post_thumb_height > 0 && !empty($lb_post_thumb_width) ? $lb_post_thumb_height : 400);

                    $dateFormat = (get_option('date_format') != '' ? get_option('date_format') : 'd M, Y');
                    $lpDay = get_the_date('d');
                    $lpMonth = get_the_date('M');
                    $lpYear = get_the_date('Y');
                    
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
                <div class="blogItem02">
                    <div class="biThumb02 <?php echo esc_attr($class); ?>">
                        <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                    </div>
                    <div class="bpContent02">
                        <div class="bpDate">
                            <span><i class="<?php echo esc_attr('themewar_calendar-days', 'themewar'); ?>"></i></span>
                            <h4><?php echo get_the_date('d M, y'); ?></h4>
                        </div>
                        <h3>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <?php 
                                    if($lb_title_strlimit > 0 && strlen(wp_strip_all_tags(get_the_title())) > $lb_title_strlimit):
                                        echo substr(wp_strip_all_tags(get_the_title()), 0, $lb_title_strlimit).'';
                                    else:
                                        echo get_the_title();
                                    endif;
                                ?>
                            </a>
                        </h3>
                        <a class="btnLink" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($rm_label); ?><i class="<?php echo esc_attr('themewar_arrow-right', 'themewar'); ?>"></i></a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="blogCarousel owl-carousel">
                <?php 
                while($qp->have_posts()):
                    $qp->the_post();

                    $w = ($lb_post_thumb_width > 0 && !empty($lb_post_thumb_width) ? $lb_post_thumb_width : 391);
                    $h = ($lb_post_thumb_height > 0 && !empty($lb_post_thumb_width) ? $lb_post_thumb_height : 330);

                    $dateFormat = (get_option('date_format') != '' ? get_option('date_format') : 'd M, Y');
                    $lpDay = get_the_date('d');
                    $lpMonth = get_the_date('M');
                    $lpYear = get_the_date('Y');
                    
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
                <div class="blogItem01">
                    <div class="biThumb01 <?php echo esc_attr($class); ?>">
                        <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                    </div>
                    <div class="biContent">
                        <div class="biMeta01">
                            <?php if(!empty($cats)): ?>
                                <span class="blogCcat ">
                                    <i class="<?php echo esc_attr('logisfare-tag', 'themewar'); ?>"></i>
                                    <?php echo logisfare_kses($cats); ?> 
                                </span>
                            <?php endif; ?>
                            <span>
                                <i class="<?php echo esc_attr('themewar_comments1', 'themewar'); ?>"></i>
                                <a href="#comments"><?php comments_number( '0 '.esc_html__('Comments', 'themewar'), '1 '.esc_html__('Comment', 'themewar'), '% '.esc_html__('Comments', 'themewar') ); ?></a>
                            </span>
                        </div>
                        <h3>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <?php 
                                    if($lb_title_strlimit > 0 && strlen(wp_strip_all_tags(get_the_title())) > $lb_title_strlimit):
                                        echo substr(wp_strip_all_tags(get_the_title()), 0, $lb_title_strlimit).'';
                                    else:
                                        echo get_the_title();
                                    endif;
                                ?>
                            </a>
                        </h3>
                    </div>
                    <div class="biMeta02 authorAra">
                        <div class="biAuthor">
                            <img src="<?php echo logisfare_attachment_url($author_image, 40, 40);?>" alt="">
                            <h4><?php echo get_the_author_meta('nickname');?></h4>
                            <span><?php echo get_author_role(); ?></span>
                        </div>
                        <a class="logicBtn" href="<?php echo get_the_permalink(); ?>"><?php echo esc_html($rm_label); ?></a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif;
wp_reset_postdata(); ?>

            