<?php
/**
 * Creates widget with recent post thumbnail
 */

class Themewar_Recentpost_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'logisfare_rrPost_widget',
            'description'   => 'Logisfare Recent Post.'
        );
        
        parent::__construct('ano-rppwt', esc_html__('Logisfare Latest News', 'themewar'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $title  = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Latest News', 'themewar' );
        $number_of_posts1 = (isset($instance['number_of_posts1']) && $instance['number_of_posts1'] != '') ? $instance['number_of_posts1'] : 3;
        $ord_by  = (isset($instance['ord_by']) && $instance['ord_by'] != '') ? $instance['ord_by'] : 'date';
        $ord    = (isset($instance['ord']) && $instance['ord'] != '') ? $instance['ord'] : 'DESC';
        $title_length = (isset($instance['title_length']) && $instance['title_length'] != '') ? $instance['title_length'] : 46;
        
        
        $title = apply_filters( 'widget_title', $title );
        echo wp_kses_post($args['before_widget']);
        if ( ! empty( $title ) )
        {
            echo wp_kses_post($args['before_title']) . esc_html($title) . $args['after_title'];
        }
        
        
        $stickies = get_option( 'sticky_posts' );
        $querys = array(
            'post_type'         => array('post'),
            'post_status'       => array('publish'),
            'order'             => $ord,
            'posts_per_page'    => $number_of_posts1,
            'post__not_in'      => $stickies
        );
        if($ord_by == 'view_count'):
            $querys['meta_key'] = '_logisfare_post_view';
            $querys['orderby'] = 'meta_value_num';
        else:
            $querys['orderby'] = $ord_by;
        endif;

        $themewar_query = new WP_Query($querys);
        echo '<div class="latestPostsWrap">';
            if($themewar_query->have_posts()){
                while($themewar_query->have_posts()): $themewar_query->the_post();
                ?>
                <div class="latestPost">
                    <img src="<?php echo logisfare_post_thumbnail(get_the_ID(), 85, 85); ?>" alt="<?php echo get_the_title(); ?>">
                    <p>
                        <i class="themewar_circle-user"></i>
                        <?php echo esc_html__('By ', 'themewar'); ?>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a>
                    </p>
                    <h3>
                        <a href="<?php echo get_post_permalink() ; ?>">
                            <?php 
                                if($title_length > 0):
                                    $postExcerpt = wp_strip_all_tags(get_the_title());
                                    $theCutExcerpt = $postExcerpt;
                                    if (preg_match('/^.{1,'.$title_length.'}\b/s', $postExcerpt, $myMatch)):
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
            }
        echo '</div>';
        wp_reset_postdata();
        echo wp_kses_post($args['after_widget']);
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        return $new_instance;
    }
    
    function form($instance)
    {
        $title = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Recent Posts', 'themewar' );
        $title_length = (isset($instance['title_length']) && $instance['title_length'] != '') ? $instance['title_length'] : '';
        $number_of_posts1 = (isset($instance['number_of_posts1']) && $instance['number_of_posts1'] != '') ? $instance['number_of_posts1'] : 3;
        $ord_by = (isset($instance['ord_by']) && $instance['ord_by'] != '') ? $instance['ord_by'] : 'date';
        $ord = (isset($instance['ord']) && $instance['ord'] != '') ? $instance['ord'] : 'DESC';
        ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title_length' )); ?>"><?php _e( 'Post Title Length:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title_length' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title_length' )); ?>" type="number" value="<?php echo esc_attr( $title_length ); ?>" />
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'number_of_posts1' )); ?>"><?php _e( 'Number Of Posts:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_of_posts1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_of_posts1' )); ?>" type="number" value="<?php echo esc_attr( $number_of_posts1 ); ?>" />
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'ord_by' )); ?>"><?php _e( 'Order By:' , 'themewar' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ord_by' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ord_by' )); ?>">
            <option value="date" <?php if($ord_by == 'date'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Date', 'themewar'); ?></option>
            <option value="ID" <?php if($ord_by == 'ID'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ID', 'themewar'); ?></option>
            <option value="title" <?php if($ord_by == 'title'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Title', 'themewar'); ?></option>
            <option value="rand" <?php if($ord_by == 'rand'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Random', 'themewar'); ?></option>
            <option value="comment_count" <?php if($ord_by == 'comment_count'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('Comment Count', 'themewar'); ?></option>
            <option value="view_count" <?php if($ord_by == 'view_count'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('View Count', 'themewar'); ?></option>
        </select>
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>"><?php _e( 'Order:' , 'themewar' ); ?></label>
        <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'ord' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'ord' )); ?>">
            <option value="ASC" <?php if($ord == 'ASC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ASC', 'themewar'); ?></option>
            <option value="DESC" <?php if($ord == 'DESC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('DESC', 'themewar'); ?></option>
        </select>
	</p>
    <?php
    }
}