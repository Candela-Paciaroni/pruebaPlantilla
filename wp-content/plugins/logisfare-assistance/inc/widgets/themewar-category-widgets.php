<?php
/**
 * Creates widget megamenu widget
 */

class Themewar_Category_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'logisfare_category post_category_widget',
            'description'   => 'Logisfare Custom Category Widgets.'
        );
        
        parent::__construct('logisfare-category', esc_html__('Logisfare Category', 'themewar'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $title       = (isset($instance['title'])) ? $instance['title'] : '';
        $catids       = (isset($instance['catids']) ? explode(',', $instance['catids']) : []);
        
        echo $args['before_widget'];
        $title = apply_filters( 'widget_title', $title );
        if ( ! empty( $title ) ):
            echo wp_kses_post($args['before_title']) . esc_html($title) . $args['after_title'];
        endif;
        
        $termID = (isset(get_queried_object()->term_id) && get_queried_object()->term_id > 0 ? get_queried_object()->term_id : 0);
        ?>
            <?php
                if(!empty($catids)):
                    echo '<ul class="postCategorys">';
                    foreach($catids as $catid):
                        if($catid > 0):
                            $cat = get_term($catid, 'category');
                            if(!empty($cat)):
                                ?>
                                <li class="blogCatItem">
                                    <a class=" <?php echo ($termID == $cat->term_id ? 'active' : ''); ?>" href="<?php echo get_category_link($cat->term_id); ?>">
                                        <span><?php echo $cat->name; ?></span>
                                        <i class="<?php echo esc_attr('themewar_arrow-right', 'themewar'); ?>"></i>
                                    </a>
                                </li>
                                <?php
                            endif;
                        endif;
                    endforeach;
                    echo '</ul>';
                endif;
            ?>
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
        $catids       = (isset($instance['catids'])) ? $instance['catids'] : '';
        $is_searchform      = (isset($instance['is_searchform'])) ? $instance['is_searchform'] : 2;

        $categoryList = get_categories();
        ?>
        <p>
             <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'themewar' ); ?></label>
             <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <div class="categoryListContainer">
            <label><?php esc_html__( 'Categories:', 'themewar' ); ?></label>
            <?php 
                if(!empty($categoryList)):
                    $catid_array = explode(',', $catids);
                    foreach($categoryList as $cat):
                        echo '<div class="singleCat">';
                            echo '<input '.(in_array($cat->term_id, $catid_array) ? 'checked' : '').' type="checkbox" class="scat" name="cates[]" value="'.$cat->term_id.'" id="cats_'.$cat->term_id.'">';
                            echo '<label for="cats_'.$cat->term_id.'">'.$cat->name.'</label>';
                        echo '</div>';
                    endforeach;
                endif;
            ?>
            <input class="catids" value="<?php echo esc_attr( $catids ); ?>" type="hidden" name="<?php echo esc_attr($this->get_field_name( 'catids' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'catids' )); ?>"/>
        </div>
        <?php
    }
}