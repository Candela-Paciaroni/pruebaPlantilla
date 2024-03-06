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
    <aside class="widget latest_post_widget <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
        <?php if(!empty($widget_title)): ?>
            <h3 class="widgetTitle"><?php echo esc_html($widget_title); ?></h3>
        <?php endif; ?>
        <div class="latestPostsWrap">
            <?php
                while($qp->have_posts()):
                    $qp->the_post();
                
                    $w = ($lb_post_thumb_width > 0 ? $lb_post_thumb_width : 85);
                    $h = ($lb_post_thumb_height > 0 ? $lb_post_thumb_height : 85);
                    ?>
                        <div class="latestPost <?php echo $animClass; ?>" <?php echo $animAttr; ?>>
                            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                            <p>
                                <i class="themewar_circle-user"></i>
                                <?php echo esc_html__('By ', 'themewar'); ?>
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a>
                            </p>
                            <h3>
                                <a href="<?php echo get_post_permalink() ; ?>">
                                    <?php 
                                        if($post_title_length > 0):
                                            $postExcerpt = wp_strip_all_tags(get_the_title());
                                            $theCutExcerpt = $postExcerpt;
                                            if (preg_match('/^.{1,'.$post_title_length.'}\b/s', $postExcerpt, $myMatch)):
                                                $theCutExcerpt = $myMatch[0];
                                            endif;
                                            echo logisfare_kses($theCutExcerpt);
                                        else:
                                            echo logisfare_kses(get_the_title()); 
                                        endif;
                                    ?>
                                </a>
                            </h3>
                        </div>
                    <?php
                endwhile;
            ?>
        </div>
    </aside>
<?php endif;
wp_reset_postdata(); ?>