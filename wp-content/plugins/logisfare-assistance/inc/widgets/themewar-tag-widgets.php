<?php
/**
 * Creates widget megamenu widget
 */

class Themewar_Tag_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'logisfare_tag blogTag_widget ',
            'description'   => 'Logisfare Custom Tag Widgets.'
        );
        
        parent::__construct('logisfare-tag', esc_html__('Logisfare Tag', 'themewar'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $title          = (isset($instance['title'])) ? $instance['title'] : esc_html__( 'Tags', 'themewar' );
        $alltags        = (isset($instance['tags']) ? $instance['tags'] : esc_html__( 'Tags', 'themewar' ));
        
        echo $args['before_widget'];
        $title = apply_filters( 'widget_title', $title );
        if ( ! empty( $title ) ):
            echo wp_kses_post($args['before_title']) . esc_html($title) . $args['after_title'];
        endif;
        

        $taxargs = [
            'taxonomy'      => 'post_tag',
        ];
        ?>
            <div class="blogTagItems">
            <?php
                $tags = get_categories($taxargs);
                if(!empty($tags)):
                    foreach($tags as $tag):
                        if($tag->count > 0):
                            ?>
                            <a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo esc_html($tag->name); ?>
                            </a>
                        <?php
                        endif;
                    endforeach;
                endif;
                ?>  
            </div>
        <?php
        echo $args['after_widget'];
    }
    
    
    function update ( $new_instance, $old_instance ) 
    {
        return $new_instance;
    }
    
    function form($instance)
    {
        $title       = (isset($instance['title'])) ? $instance['title'] : '';
        $tags       = (isset($instance['tags'])) ? $instance['tags'] : 'Tags';

        ?>
        <p>
             <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'themewar' ); ?></label>
             <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
             <label for="<?php echo esc_attr($this->get_field_id( 'tags' )); ?>"><?php _e( 'Taxonomy:', 'themewar' ); ?></label>
             <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tags' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tags' )); ?>" type="text" value="<?php echo esc_attr( $tags ); ?>" readonly />
        </p>
        <?php
    }
}