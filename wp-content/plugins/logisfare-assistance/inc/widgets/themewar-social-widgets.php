<?php
/**
 * Social Widget
 */

class Themewar_Social_Widgets extends WP_Widget
{
    function __construct() 
    {
        $widget_opt = array(
            'classname'     => 'logisfare_social_widget',
            'description'   => 'Logisfare Social.'
        );
        
        parent::__construct('logisfare_soc', esc_html__('Logisfare Social', 'themewar'), $widget_opt);
    }
    
    function widget( $args, $instance )
    {
        $title      = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Follow Us', 'themewar' );

        $au_facebook = (isset($instance['au_facebook'])) ? $instance['au_facebook'] : '';
        $au_twitter = (isset($instance['au_twitter'])) ? $instance['au_twitter'] : '';
        $au_dribbble = (isset($instance['au_dribbble'])) ? $instance['au_dribbble'] : '';
        $au_linkedin = (isset($instance['au_linkedin'])) ? $instance['au_linkedin'] : '';
        $au_google_plus = (isset($instance['au_google_plus'])) ? $instance['au_google_plus'] : '';
        $rss = (isset($instance['rss'])) ? $instance['rss'] : '';
        $pinterest = (isset($instance['pinterest'])) ? $instance['pinterest'] : '';
        $instagram = (isset($instance['instagram'])) ? $instance['instagram'] : '';
        $behance = (isset($instance['behance'])) ? $instance['behance'] : '';
        $tumblr = (isset($instance['tumblr'])) ? $instance['tumblr'] : '';
        $youtube = (isset($instance['youtube'])) ? $instance['youtube'] : '';
        
        echo $args['before_widget'];
        ?>
            <?php if ( !empty( $title ) ) {
                echo wp_kses_post($args[ 'before_title' ]) . apply_filters( 'widget_title', $title ) . $args[ 'after_title' ];
            }?>
            <div class="sidebarSocial clearfix">
                <?php if($au_facebook != ''): ?>
                <a class="fac social-icon-link" href="<?php echo esc_url($au_facebook); ?>"><i class="themewar_facebook-f"></i></a>
                <?php endif; ?>
                <?php if($au_twitter != ''): ?>
                <a class="twi social-icon-link" href="<?php echo esc_url($au_twitter); ?>"><i class="themewar_twitter"></i></a>
                <?php endif; ?>
                <?php if($au_linkedin != ''): ?>
                <a class="lin social-icon-link" href="<?php echo esc_url($au_linkedin); ?>"><i class="themewar_linkedin-in"></i></a>
                <?php endif; ?>
                <?php if($au_google_plus != ''): ?>
                <a class="glp social-icon-link" href="<?php echo esc_url($au_linkedin); ?>"><i class="themewar_google-plus-g"></i></a>
                <?php endif; ?>
                <?php if($youtube != ''): ?>
                <a class="you social-icon-link" href="<?php echo esc_url($youtube); ?>"><i class="themewar_youtube"></i></a>
                <?php endif; ?>
                <?php if($tumblr != ''): ?>
                <a class="tum social-icon-link" href="<?php echo esc_url($tumblr); ?>"><i class="themewar_tumblr"></i></a>
                <?php endif; ?>
                <?php if($au_dribbble != ''): ?>
                <a class="dri social-icon-link" href="<?php echo esc_url($au_dribbble); ?>"><i class="themewar_dribbble"></i></a>
                <?php endif; ?>
                <?php if($rss != ''): ?>
                <a class="rss social-icon-link" href="<?php echo esc_url($rss); ?>"><i class="themewar_rss"></i></a>
                <?php endif; ?>
                <?php if($pinterest != ''): ?>
                <a class="pin social-icon-link" href="<?php echo esc_url($pinterest); ?>"><i class="themewar_pinterest-p"></i></a>
                <?php endif; ?>
                <?php if($instagram != ''): ?>
                <a class="ins social-icon-link" href="<?php echo esc_url($instagram); ?>"><i class="themewar_instagram"></i></a>
                <?php endif; ?>
                <?php if($behance != ''): ?>
                <a class="beh social-icon-link" href="<?php echo esc_url($behance); ?>"><i class="themewar_behance"></i></a>
                <?php endif; ?>
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
        $title      = (isset($instance['title']) && $instance['title'] != '') ? $instance['title'] : esc_html__( 'Follow Us', 'themewar' );

        $au_facebook = (isset($instance['au_facebook'])) ? $instance['au_facebook'] : '';
        $au_twitter = (isset($instance['au_twitter'])) ? $instance['au_twitter'] : '';
        $au_dribbble = (isset($instance['au_dribbble'])) ? $instance['au_dribbble'] : '';
        $au_linkedin = (isset($instance['au_linkedin'])) ? $instance['au_linkedin'] : '';
        $au_google_plus = (isset($instance['au_google_plus'])) ? $instance['au_google_plus'] : '';
        $rss = (isset($instance['rss'])) ? $instance['rss'] : '';
        $pinterest = (isset($instance['pinterest'])) ? $instance['pinterest'] : '';
        $instagram = (isset($instance['instagram'])) ? $instance['instagram'] : '';
        $behance = (isset($instance['behance'])) ? $instance['behance'] : '';
        $tumblr = (isset($instance['tumblr'])) ? $instance['tumblr'] : '';
        $youtube = (isset($instance['youtube'])) ? $instance['youtube'] : '';
        ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'au_facebook' )); ?>"><?php _e( 'Facebook:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'au_facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'au_facebook' )); ?>" type="text" value="<?php echo esc_attr( $au_facebook ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'au_twitter' )); ?>"><?php _e( 'Twitter:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'au_twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'au_twitter' )); ?>" type="text" value="<?php echo esc_attr( $au_twitter ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'au_linkedin' )); ?>"><?php _e( 'Linkedin:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'au_linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'au_linkedin' )); ?>" type="text" value="<?php echo esc_attr( $au_linkedin ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'au_google_plus' )); ?>"><?php _e( 'Google Plus:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'au_google_plus' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'au_google_plus' )); ?>" type="text" value="<?php echo esc_attr( $au_google_plus ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>"><?php _e( 'Youtube:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>"><?php _e( 'Tumblr:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tumblr' )); ?>" type="text" value="<?php echo esc_attr( $tumblr ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'au_dribbble' )); ?>"><?php _e( 'Dribbble:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'au_dribbble' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'au_dribbble' )); ?>" type="text" value="<?php echo esc_attr( $au_dribbble ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>"><?php _e( 'RSS:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'rss' )); ?>" type="text" value="<?php echo esc_attr( $rss ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>"><?php _e( 'Pinterest:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' )); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>"><?php _e( 'Instagram:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id( 'behance' )); ?>"><?php _e( 'Behance:' , 'themewar' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'behance' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'behance' )); ?>" type="text" value="<?php echo esc_attr( $behance ); ?>" />
    </p>
        <?php
    }
}