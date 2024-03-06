<?php if($is_topbar == 'yes'): ?>
    <section class="topBar01 hd3_topBar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="topBarItems">
                        <?php if(!empty($tpbr_info_list)): ?>
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
                        <?php endif; ?>
                        <?php if($is_tbr_social == 'yes' && !empty($tpbr_s_list)): ?>
                            <div class="topSocial">
                                <?php foreach($tpbr_s_list as $tbSlist): 
                                    
                                    $tpbr_s_icon     = (isset($tbSlist['tpbr_s_icon']) && $tbSlist['tpbr_s_icon'] != '' ? $tbSlist['tpbr_s_icon'] : array());
                                    $tpbr_s_color    = (isset($tbSlist['tpbr_s_color']) && $tbSlist['tpbr_s_color'] != '' ? $tbSlist['tpbr_s_color'] : '');
                                    $tpbr_s_url      = (isset($tbSlist['tpbr_s_url']['url']) && $tbSlist['tpbr_s_url']['url'] != '' ? $tbSlist['tpbr_s_url']['url'] : 'javascript:void(0);');
                                    $target2          = (isset($tbSlist['social_url']['is_external']) && $tbSlist['social_url']['is_external'] != '') ?  'target="_blank"' : '';
                                    $nowfllow2        = (isset($tbSlist['social_url']['nofollow']) && $tbSlist['social_url']['nofollow'] != '') ? 'rel="nofollow"' : '';

                                ?>
                                    <a <?php echo esc_attr($target2. ' '.$nowfllow2); ?> href="<?php echo esc_attr($tpbr_s_url); ?>">
                                        <?php if(!empty($tpbr_s_icon)): ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $tbSlist['tpbr_s_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<header class="headerArea03">
    <div class="headerLogoWrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="headerItems03">
                    <div class="logo">
                    <?php if(!empty($logo)):?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                        </a>
                    <?php else:?>
                        <a class="textLogo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                    <?php endif;?>
                    </div>
                    <?php if(!empty($hd_contact_list)): ?>
                        <div class="headerBoxWrap">
                            <?php 
                            $i = 1; 
                            foreach($hd_contact_list as $hdlist): 
                                if($i > 3){break; };
                                
                                $hdr_co_info_icon  = (isset($hdlist['hdr_contact_info_icon']) && $hdlist['hdr_contact_info_icon'] != '' ? $hdlist['hdr_contact_info_icon'] : array());
                                $hdr_c_info_title  = (isset($hdlist['hdr_contact_info_title']) && $hdlist['hdr_contact_info_title'] != '') ? $hdlist['hdr_contact_info_title'] : '';
                                $hdr_c_info_lable  = (isset($hdlist['hdr_contact_info_lable']) && $hdlist['hdr_contact_info_lable'] != '') ? $hdlist['hdr_contact_info_lable'] : '';
                                $hdr_c_info_url    = (isset($hdlist['hdr_contact_info_url']['url']) && $hdlist['hdr_contact_info_url']['url'] != '') ? $hdlist['hdr_contact_info_url']['url'] : '';
                                $target3           = (isset($tbSlist['hdr_contact_info_url']['is_external']) && $tbSlist['hdr_contact_info_url']['is_external'] != '') ?  'target="_blank"' : '';
                                $nowfllow3         = (isset($tbSlist['hdr_contact_info_url']['nofollow']) && $tbSlist['hdr_contact_info_url']['nofollow'] != '') ? 'rel="nofollow"' : '';
                            ?>
                            <div class="headIbox">
                                <?php if(!empty($hdr_co_info_icon)): ?>
                                    <span>
                                        <?php \Elementor\Icons_Manager::render_icon( $hdlist['hdr_contact_info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                <?php endif; ?>
                                <p><?php echo esc_html($hdr_c_info_title); ?></p>
                                <h3>
                                    <?php if(!empty($hdr_c_info_url)): ?><a <?php echo esc_attr($target3. ' '.$nowfllow3); ?> href="<?php echo esc_url($hdr_c_info_url); ?>"><?php endif; ?><?php echo esc_html($hdr_c_info_lable); ?><?php if(!empty($hdr_c_info_url)): ?></a><?php endif; ?>
                                </h3>
                            </div>
                            <?php $i++; endforeach; ?>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="menuItem03">
            <div class="row">
                <div class="col-xl-9 col-2">
                    <div class="mainNav03Wrap">
                        <a href="javascript:void(0);" class="menu_btn "><i class="themewar_bars"></i></a>
                        <nav class="mainMenu03 mainMenu">
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
                        <?php if($is_search_btn == 'yes' || $is_cart == 'yes' || $is_user): ?>
                            <div class="accessNav">
                                <?php if($is_search_btn == 'yes'): ?>
                                    <div class="anSearchBar"> 
                                        <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                            <input type="search" name="s" id="hd_s" placeholder="<?php if($input_placeholder != ''): echo esc_attr($input_placeholder); endif; ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
                                            <button type="submit"><i class="<?php echo esc_attr('logisfare-search2', 'themewar')?>"></i></button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                                <?php if($is_cart == 'yes'): ?>
                                    <div class="anCart">
                                        <a class="halCart logisfare_aj_cart" href="javascript:void(0);"><i class="<?php echo 'logisfare-cart2'; ?>"></i><span><?php echo Themewar_Assistance_Helpers::mini_cart_count(); ?></span></a>
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
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-3 col-10">
                <?php if($is_btn == 'yes' ): ?>
                    <div class="headerBtn">
                        <a class="logicBtn" <?php echo esc_attr($target . ' ' . $nofollow); ?> href="<?php echo esc_attr($btn_url);?>"><?php echo logisfare_kses($btn_lable); ?></a>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Sticky Header  -->
<header class="stickyHeader03 <?php if ($is_sticky == 'yes'): ?>isSticky<?php endif; ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navBar01">
                    <div class="logo">
                        <?php if(!empty($logo)):?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php echo get_bloginfo(); ?>"/>
                            </a>
                        <?php else:?>
                            <a class="textLogo" href="<?php echo esc_url(home_url('/')); ?>"><?php echo get_bloginfo('name'); ?></a>
                        <?php endif;?>
                    </div>
                    <div class="mainNav03Wrap">
                        <a href="javascript:void(0);" class="sticky03Btn"><i class="themewar_bars"></i></a>
                        <nav class="mainMenu03 mainMenu n0tMenuSticky">
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
                        <?php if($is_search_btn == 'yes' || $is_cart == 'yes' || $is_user == 'yes'): ?>
                            <div class="accessNav">
                                <?php if($is_search_btn == 'yes'): ?>
                                    <div class="anSearchBar"> 
                                        <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                            <input type="search" name="s" id="phd_s" placeholder="<?php if($input_placeholder != ''): echo esc_attr($input_placeholder); endif; ?>" value="<?php echo get_search_query(); ?>" autocomplete="off">
                                            <button type="submit"><i class="<?php echo esc_attr('logisfare-search2', 'themewar')?>"></i></button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                                <?php if($is_cart == 'yes'): ?>
                                    <div class="anCart">
                                        <a class="halCart logisfare_aj_cart" href="javascript:void(0);"><i class="<?php echo 'logisfare-cart2'; ?>"></i><span><?php echo Themewar_Assistance_Helpers::mini_cart_count(); ?></span></a>
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
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>