<?php
/**
 * Displays Defeault header navigation
 */
$section_ID = '_logisfare_customizer_options';
$header_is_sticky = tw_get_option($section_ID, 'header_is_sticky', 2);
$header_logo      = tw_get_option($section_ID, 'header_logo', '');

?>
    <!-- BEGIN: Header 01 Section -->
    <header class="header01 defaultHd <?php if ($header_is_sticky == 1): ?>isSticky<?php endif; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="navBar01">
                        <div class="logo">
                            <?php if(!empty($header_logo)):?>
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                                </a>
                            <?php else:?>
                                <a class="textLogo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                            <?php endif;?>
                        </div>
                        <a href="javascript:void(0);" class="menu_btn"><i class="themewar_bars"></i></a>
                        <nav class="mainMenu">
                            <?php
                                if (has_nav_menu('primary-menu')) {
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary-menu',
                                        'container' => FALSE,
                                        'menu_class' => '',
                                        'menu_id' => '',
                                        'echo' => true
                                    ));
                                } else {
                                    if(is_user_logged_in()){
                                    echo '<ul>';
                                        echo '<li><a href="javascript:void(0)">' . esc_html__('No Menu', 'logisfare') . '</a></li>';
                                    echo '</ul>';
                                    }
                                }
                            ?>
                        </nav>
                        <div class="accessNav">
                            <div class="headerBtn">
                                <a class="logicBtn" href="javascript:void(0);"><?php echo esc_html('Get a Quote', 'logisfare'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END: Header 01 Section -->