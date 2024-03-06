<?php
    $w = 1013;
    $h = 652;

?>
<div class="blogDetails-content pageDetailsContent">
    <?php if(has_post_thumbnail()): ?>
        <div class="bi01Thumb staticThumbs">
            <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 'full') ?>" alt="Logisfare blog post">
        </div>
    <?php endif; ?>
    <div class="blogPostContent blogPostStatic clearfix">
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
    <?php if (comments_open(get_the_ID()) || get_comments_number(get_the_ID())): ?>
        <?php comments_template(); ?>
    <?php endif; ?>
</div>