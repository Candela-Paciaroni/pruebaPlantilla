<?php
    $w = (is_active_sidebar('sidebar-1') ? 773 : 1013);
    $h = (is_active_sidebar('sidebar-1') ? 498 : 652);

    $terms = get_the_terms(get_the_ID(), 'category');
    $cats   = '';
    if (!empty($terms)){
        $p = 1;
        $c = count($terms);
        foreach ($terms as $term){
            if($p > 2){break;};
            $cats .= '<a href="'.  get_category_link($term->term_id).'">'.$term->name.'</a>';
            $cats .= ($p != $c && $p < 2 ? '<span></span>' : '');
            $p++;
        }
    }
?>
<div class="blogPageWrap">
    <?php if(has_post_thumbnail()): ?>
        <div class="blDetThumb01">
            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full', $h) ?>" alt="Logisfare blog post">
        </div>
    <?php endif; ?>
    <div class="biMeta01 singlePostMeta">
        <div class="post_cat"> 
            <?php if(!empty($cats)):
                ?>
                <div class="post_cat">
                    <i class="logisfare-tag"></i>
                    <?php echo logisfare_kses($cats); ?>
                </div>
                <?php
            endif; ?>
        </div>
        <div class="postAuthor">
            <i class="themewar_user"></i>
            <?php echo esc_html__('By ', 'logisfare'); ?>
            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a>
        </div>
        <div class="postComment">
            <i class="themewar_comments"></i>
            <a href="#comments"><?php comments_number( '0 '.esc_html__('Comments', 'logisfare'), '1 '.esc_html__('Comment', 'logisfare'), '% '.esc_html__('Comments', 'logisfare') ); ?></a>
        </div>
    </div>
    <h2 class="blogTitle"><?php echo get_the_title(); ?></h2>
    <div class="postContent blogPostStatic clearfix">
        <?php the_content(); ?>
        <div class="clearfix"></div>
        <?php
            $defaults = array(
                'before'           => '<div class="PaginInner clearfix"><strong>' . esc_html__( 'Pages:', 'logisfare' ).'</strong>',
                'after'            => '</div>',
                'link_before'      => '<span>',
                'link_after'       => '</span>',
                'next_or_number'   => 'number',
                'separator'        => ' ',
                'nextpagelink'     => '<i class="logisfare-arrow_prev"></i>',
                'previouspagelink' => '<i class="logisfare-arrow_next"></i>',
                'pagelink'         => '%',
                'echo'             => 1
            );
            wp_link_pages( $defaults );
        ?>
        <div class="clearfix"></div>
    </div>
    <?php if(has_tag()): ?>
        <div class="blogTagWrapper">
            <div class="row postFooterRow">
                <div class="col-sm-12">
                    <div class="postTags clearfix">
                        <?php echo get_the_tag_list('', '', '', get_the_ID()) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (comments_open($post->ID) || get_comments_number($post->ID)): ?>
        <?php comments_template(); ?>
    <?php endif; ?>
</div>