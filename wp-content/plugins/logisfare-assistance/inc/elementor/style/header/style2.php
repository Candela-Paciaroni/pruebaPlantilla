<header class="header02 isSticky <?php echo($header_position == 2 ? ' absoluteHeader' : ''); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-4">
                <div class="logo">
                <?php if(!empty($logo)):?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                    </a>
                <?php else:?>
                    <a class="textLogo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                <?php endif;?>
                </div>
            </div>
            <div class="col-lg-9 col-sm-8">
                    <div class="topbar02">
                        <div class="topDesc">
                            <?php 
                                $i = 1;
                                foreach($tpbr_info_list as $tblist): 

                                    if($i > 3){break;};
                                    $tpbr_icon       = (isset($tblist['tpbr_icon']) && $tblist['tpbr_icon'] != '' ? $tblist['tpbr_icon'] : array());
                                    $topbar_info     = (isset($tblist['topbar_info']) && $tblist['topbar_info'] != '' ? $tblist['topbar_info'] : '');
                                    $topbar_info_url = (isset($tblist['topbar_info_url']['url']) && $tblist['topbar_info_url']['url'] != '' ? $tblist['topbar_info_url']['url'] : '');
                                    $target          = (isset($tblist['social_url']['is_external']) && $tblist['social_url']['is_external'] != '') ?  'target="_blank"' : '';
                                    $nowfllow        = (isset($tblist['social_url']['nofollow']) && $tblist['social_url']['nofollow'] != '') ? 'rel="nofollow"' : '';
                            ?>
                                <p>
                                    <?php if(!empty($tpbr_icon)): ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $tblist['tpbr_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php endif; 
                                    if(!empty($topbar_info_url)): ?><a <?php echo esc_attr($target. ' '.$nofollow); ?> href="<?php echo esc_url($topbar_info_url); ?>"><?php endif; ?><?php echo esc_html($topbar_info); ?><?php if(!empty($topbar_info_url)): ?></a><?php endif; ?>
                                </p>
                            <?php $i++; endforeach; ?>
                        </div>
                        <div class="tpRight">
                            <?php 
                            $i = 1;
                                foreach($tpbr_right_info_list as $tblistr): 

                                    if($i > 1){break;};
                                    $tpbr_r_icon       = (isset($tblistr['tpbr_right_icon']) && $tblistr['tpbr_right_icon'] != '' ? $tblistr['tpbr_right_icon'] : array());
                                    $topbar_r_info     = (isset($tblistr['topbar_right_info']) && $tblistr['topbar_right_info'] != '' ? $tblistr['topbar_right_info'] : '');
                                    $topbar_info_r_url = (isset($tblistr['topbar_right_info_url']['url']) && $tblistr['topbar_right_info_url']['url'] != '' ? $tblistr['topbar_right_info_url']['url'] : '');
                                    $target2          = (isset($tblistr['topbar_right_info_url']['is_external']) && $tblistr['topbar_right_info_url']['is_external'] != '') ?  'target="_blank"' : '';
                                    $nowfllow2        = (isset($tblistr['topbar_right_info_url']['nofollow']) && $tblistr['topbar_right_info_url']['nofollow'] != '') ? 'rel="nofollow"' : '';
                            ?>
                            <p>
                                <?php if(!empty($tpbr_r_icon)): ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $tblistr['tpbr_right_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php endif; 
                                    if(!empty($topbar_info_r_url)): ?><a <?php echo esc_attr($target2. ' '.$nowfllow2); ?> href="<?php echo esc_url($topbar_info_r_url); ?>"><?php endif; ?><?php echo esc_html($topbar_r_info); ?><?php if(!empty($topbar_info_r_url)): ?></a>
                                <?php endif; ?>
                            </p>
                            <?php $i++; endforeach; ?>
                        </div>
                    </div>
                <div class="navBar02">
                    <a href="javascript:void(0);" class="menu_btn"><i class="themewar_bars"></i></a>
                    <nav class="mainMenu02 mainMenu">
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
                                    echo '<li><a href="javascript:void(0)">' . esc_html__('No Menu', 'themewar') . '</a></li>';
                                echo '</ul>';
                                }
                            }
                        ?>
                    </nav>
                <?php if($is_search_btn == 'yes' || $is_cart == 'yes' || $is_btn == 'yes' || $is_user == 'yes' ): ?>
                <div class="accessNav">
                    <?php if($is_search_btn == 'yes'): ?>
                        <div class="anSearch">
                            <a href="javascript:void(0);" class="anSearchBtn"><i class="<?php echo esc_attr('logisfare-search2', 'themewar');?>"></i></a>
                        </div>
                    <?php endif; ?>
                    <?php if($is_cart == 'yes'): ?>
                        <div class="anCart">
                            <a href="javascript:void(0);"><i class="<?php echo esc_attr('logisfare-cart2', 'themewar'); ?>"></i><span><?php echo Themewar_Assistance_Helpers::mini_cart_count(); ?></span></a>
                            <?php if($is_mini_cart == 'yes'): ?>
                                <div class="cartWidgetArea">
                                    <div class="mini_cart widget_shopping_cart_content">
                                        <?php
                                        if(function_exists('woocommerce_mini_cart')):
                                            if ( ! empty( WC()->cart) ) {
                                                woocommerce_mini_cart(); 
                                            }
                                        endif;
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($is_user == 'yes'): ?>
                            <div class="logIn_user">
                                <?php if(is_user_logged_in()): ?>
                                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                                        <i class="themewar_lock-open"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                                        <i class="themewar_lock"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php if($is_btn == 'yes') : ?>
                        <a class="logicBtn" <?php echo esc_attr($target . ' ' . $nofollow); ?> href="<?php echo esc_attr($btn_url);?>"><?php echo logisfare_kses($btn_lable); ?></a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

      
<?php if($is_search_btn == 'yes'):?>
    <section class="popup_search_sec">
        <div class="popup_search_overlay"></div>
        <div class="pop_search_background">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-6">
                        <?php if(!empty($search_popup_logo)):?>
                        <div class="popup_logo">
                            <a class="dfCursor" href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($search_popup_logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                            </a>
                        </div>
                        <?php endif;?>
                    </div>
                    <div class="col-sm-6 col-md-6 col-6">
                        <a href="javascript:void(0);" id="search_Closer" class="themewar_xmark"></a>
                    </div>
                </div>
            </div>
            <div class="middle_search">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="popup_search_form">
                                <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <input type="search" name="s" id="hd_s" placeholder="<?php if($input_placeholder != ''): echo esc_attr($input_placeholder); endif; ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
                                    <button type="submit"><i class="<?php echo esc_attr('logisfare-search', 'themewar')?>"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif;?>

