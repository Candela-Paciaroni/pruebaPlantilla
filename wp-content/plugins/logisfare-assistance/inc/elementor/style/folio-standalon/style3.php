<?php
    global $wp_query;
    $wp_query = new WP_Query($fargs);
    if($wp_query->have_posts()): 
        $i = 1;
        while($wp_query->have_posts()):
            $wp_query->the_post();
            
            $terms  = get_the_terms(get_the_ID(), 'folio_cat');
            $cats   = '';
            if (!empty($terms)){
                $p = 1;
                $c = count($terms);
                foreach ($terms as $term){
                    if($c > 2){break;};
                    $cats .= $term->name;
                    $cats .= ($p != $c ? ', ' : '');
                    $p++;
                }
            }
                $w = ($bzy_thumb_width > 0 ? $bzy_thumb_width : 414);
                $h = ($bzy_thumb_height > 0 ? $bzy_thumb_height : 605);
            ?>
                <div class="FolioItem_03GridV portfolioCarItam projectItemView <?php echo $animClass; ?>" <?php echo $animAttr; ?> data-firstline="<?php echo esc_attr($cursor_text_01); ?>" data-secondline="<?php echo esc_attr($cursor_text_02); ?>" data-background="<?php echo esc_attr($cursor_bg_color); ?>" data-border-color="<?php echo esc_attr($cursor_border_color); ?>">
                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), $w, $h); ?>" alt="<?php echo get_the_title(); ?>">
                    <a href="<?php echo get_the_permalink(); ?>" class="portfolioInfoPP_item">
                        <div class="portFolioInfo">
                            <i class="<?php echo esc_attr('logisfare-down-rrt-arrow', 'themewar'); ?> strokeText"></i><br>
                            <h3 class="ps_item_name"><?php echo logisfare_blog_title_formater(get_the_title(), $folio_item_length) ; ?></h3><br>
                        <?php if(!empty($cats)): ?>
                            <h4 class="ps_auth_name">
                                <?php echo logisfare_kses($cats); ?>
                            </h4>
                        <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php
            $i++;
        endwhile;
    endif;
wp_reset_query(); 
?>
               