<?php
/**
 * The template for displaying comments
 */

if ( post_password_required() ) {
	return;
}
global $post;
?>

<div id="comments" class="<?php echo (is_user_logged_in() ? 'userLoggedIn' : 'userLoggedOut'); ?>">
    <?php if ( have_comments() ) : ?>
        <div class="postCommetnListBox clearfix">
            <h3 class="commentHeading cm01">
                <?php echo esc_html(get_comments_number()." "); echo comments_number( esc_html__('Comments', 'logisfare'), esc_html__('Comment', 'logisfare'), esc_html__('Comments', 'logisfare') ); ?>
            </h3>
            <div class="sibc_comments">
                <ol class="commentList">
                    <?php wp_list_comments(array('short_ping'  => true, 'style' => 'ol', 'callback'=> 'logisfare_comment_listing')); ?>
                </ol>
            </div>
            <div class="logisfarePagination comentPaginations text-left">
                <?php paginate_comments_links( array('prev_text' => '<i class="logisfare-arrow_prev"></i>', 'next_text' => '<i class="logisfare-arrow_next"></i>') ) ?>
            </div>
        </div>
    <?php endif; ?>


    <div class="commentFormArea clearfix">
	<?php
        $class = (is_user_logged_in() ? 'loggedIns' : '');
        $fields = array(
                'author' =>'<div class="col-md-6"><div class="singleForm"><input class="w-100" id="author" placeholder="'.esc_attr__('Your Name', 'logisfare').'" name="author" type="text" value="' .esc_attr( $commenter['comment_author'] ) . '" size="30" required="required" /><i class="'.esc_attr('logisfare-user','logisfare').'"></i></div></div>',
                'email'  => '<div class="col-md-6"><div class="singleForm inputEmail"><input class="w-100" id="email" placeholder="'.esc_attr__('Your Email', 'logisfare').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30" required="required" /><i class="'.esc_attr('logisfare-envalope','logisfare').'"></i></div></div>',
                'cookies'    => '',
                'url' => '<div class="col-md-12"><div class="singleForm inputUrl"><input class="w-100" id="url" placeholder="'.esc_attr__('Write Your Site Url', 'logisfare').'" name="subject" type="url" value="' .esc_attr( $commenter['comment_author_url'] ) . '" size="30" required="required" /><i class="'.esc_attr('themewar_link','logisfare').'"></i></div></div>',
                    
        );
        $fields = apply_filters('comment_form_default_fields', $fields);
        $args = array(
            'fields'               => $fields,
            'comment_field'        => '<div class="col-md-12"><div class="singleForm"><textarea id="comment" class="'.$class.' w-100" name="comment"  placeholder="'.esc_attr__('Write Your Message', 'logisfare').'" aria-required="true" required="required"></textarea><i class="themewar_comments"></i></div></div>',
            'logged_in_as'         => '',
            'comment_notes_before' => '<div class="col-md-12"><p class="commentDesc">'.esc_html__('Your email address will not be published. Required fields are marked *', 'logisfare').'</p></div>',
            'comment_notes_after'  => '',
            'id_form'              => 'comment_form',
            'id_submit'            => 'submit',
            'class_form'           => 'commentForm row '.$class,
            'class_submit'         => 'commentSubmit logicBtn',
            'name_submit'          => 'submit',
            'title_reply'          => esc_html__( 'Leave a reply' , 'logisfare'),
            'title_reply_to'       => esc_html__( 'Add A Replies to %s', 'logisfare'),
            'title_reply_before'   => '<h3 class="commentHeading02">',
            'title_reply_after'    => '</h3>',
            'cancel_reply_before'  => '<small class="cancel_reply_btn">',
            'cancel_reply_after'   => '</small>',
            'cancel_reply_link'    => esc_html__( 'Cancel Reply' , 'logisfare'),
            'label_submit'         => esc_html__( 'Submit a Comment' , 'logisfare'),
            'submit_button'        => '<div class="col-lg-12"><button type="submit" name="%1$s" id="%2$s" class="%3$s" value="%4$s"><span>%4$s</span></button></div>',
            'submit_field'         => '%1$s %2$s',
        );
    ?>
    <div class="postCommetnFormBox clearfix">
        <?php
            comment_form($args);
        ?>
    </div>
    </div>
</div>