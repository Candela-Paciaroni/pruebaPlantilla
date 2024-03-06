<?php if($tst_view == 2) : ?>
    <section class="testimonialSection01 <?php echo $animClass; ?>" <?php echo esc_attr($animAttr);?>>
        <div class="testiTopBg">
            <div class="container">
               <div class="row align-items-end">
                  <div class="col-md-8 col-sm-12">
                     <h3 class="subTitle"><?php echo esc_html($tst_hd_sub_title); ?><i  aria-hidden="true" class="<?php echo esc_attr('logisfare-right_sec','themewar'); ?>"></i></h3>
                     <h2 class="secTitle"><?php echo logisfare_kses($tst_hd_title); ?></h2>
                  </div>
                  <div class="col-md-4 col-ms-12">
                    <?php if($tst_style == 2): ?>
                        <?php if($nav == 'yes'): ?>
                            <div class="testControls">
                                <button class="tprev01"><i class="<?php echo esc_attr('themewar_arrow-left', 'themewar'); ?>"></i></button>
                                <button class="tnext01"><i class="<?php echo esc_attr('themewar_arrow-right', 'themewar'); ?>"></i></button>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if($nav == 'yes'): ?>
                            <div class="testControls03">
                                <button class="tprev3"><i class="<?php echo esc_attr('themewar_arrow-left', 'themewar'); ?>"></i></button>
                                <button class="tnext3"><i class="<?php echo esc_attr('themewar_arrow-right', 'themewar'); ?>"></i></button>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                  </div>
               </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
               <div class="col-lg-12">
                 <div class="testWrapper02" 
                    data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
                    data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
                    data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
                    data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>"
                    
                    data-itemxxl="<?php echo esc_attr($items_xxl_col); ?>"
                    data-itemxl="<?php echo esc_attr($items_xl_col); ?>"
                    data-itemlg="<?php echo esc_attr($items_lg_col); ?>"
                    data-itemmd="<?php echo esc_attr($items_md_col); ?>"
                    data-itemsm="<?php echo esc_attr($items_sm_col); ?>" 
                    data-gapping="<?php echo esc_attr($gapping); ?>"
                >
                    <?php if($tst_style == 2): ?>
                        <div class="testimonialCarousel02 owl-carousel">
                            <?php if(!empty($testimony_list)): 
                                foreach($testimony_list as $list): 

                                    $quote_image        = (isset($list['quote_image']['id']) && $list['quote_image']['id'] !='') ? $list['quote_image']['id'] : '';
                                    $tst_quote_content  = (isset($list['tst_quote_content']) && $list['tst_quote_content'] !='') ? $list['tst_quote_content'] : '';
                                    $tst_aut_logo       = (isset($list['tst_aut_logo']['url']) && $list['tst_aut_logo']['url'] !='') ? $list['tst_aut_logo']['url'] : '';
                                    $tst_aut_title      = (isset($list['tst_aut_title']) && $list['tst_aut_title'] !='') ? $list['tst_aut_title'] : '';
                                    $tst_aut_desig      = (isset($list['tst_aut_desig']) && $list['tst_aut_desig'] !='') ? $list['tst_aut_desig'] : '';
                                
                                ?>
                                <div class="testimonialItem01">
                                    <div class="tsAuthorMeta">
                                        <?php if(!empty($quote_image)): ?>
                                            <img class="tsTitle" src="<?php echo esc_attr(logisfare_attachment_url($quote_image, 100, 100)); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                        <?php endif;?>
                                    </div>
                                    <p><?php echo logisfare_kses($tst_quote_content); ?></p>
                                    <div class="tsAuthor02">
                                        <?php if(!empty($tst_aut_logo)) : ?>
                                            <img src="<?php echo esc_url($tst_aut_logo); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                        <?php endif; ?>
                                        <?php if(!empty($tst_aut_title)): ?>
                                            <h4><?php echo esc_html($tst_aut_title); ?></h4>
                                        <?php endif; ?>
                                        <?php if(!empty($tst_aut_desig)): ?>
                                            <span><?php echo esc_html($tst_aut_desig); ?></span>
                                        <?php endif;?>
                                    </div>
                                </div>
                            <?php  endforeach; endif;?>
                        </div>
                    <?php else: ?>
                        <div class="testimonialCarousel01 owl-carousel">
                            <?php if(!empty($testimony_list)): 
                                foreach($testimony_list as $list): 

                                    $quote_image        = (isset($list['quote_image']['url']) && $list['quote_image']['url'] !='') ? $list['quote_image']['url'] : '';
                                    $tst_quote_content  = (isset($list['tst_quote_content']) && $list['tst_quote_content'] !='') ? $list['tst_quote_content'] : '';
                                    $tst_aut_logo       = (isset($list['tst_aut_logo']['url']) && $list['tst_aut_logo']['url'] !='') ? $list['tst_aut_logo']['url'] : '';
                                    $tst_aut_title      = (isset($list['tst_aut_title']) && $list['tst_aut_title'] !='') ? $list['tst_aut_title'] : '';
                                    $tst_aut_desig      = (isset($list['tst_aut_desig']) && $list['tst_aut_desig'] !='') ? $list['tst_aut_desig'] : '';
                                
                                ?>
                            <div class="tesItem01">
                                <?php if(!empty($quote_image)): ?>
                                    <img class="tsTitle" src="<?php echo esc_url($quote_image); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                <?php endif;?>
                                <p><?php echo logisfare_kses($tst_quote_content); ?></p>
                                <div class="tesAuthor">
                                    <?php if(!empty($tst_aut_logo)) : ?>
                                        <img src="<?php echo esc_url($tst_aut_logo); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                                    <?php endif; ?>
                                    <?php if(!empty($tst_aut_title)): ?>
                                        <h4><?php echo esc_html($tst_aut_title); ?></h4>
                                    <?php endif; ?>
                                    <?php if(!empty($tst_aut_desig)): ?>
                                        <span><?php echo esc_html($tst_aut_desig); ?></span>
                                    <?php endif;?>
                                </div>
                            </div>
                            <?php endforeach; endif; ?>
                        </div>
                    <?php endif; ?>
                  </div>
               </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <div class="tesWrap01 <?php echo $animClass; ?>" 
        data-autoplay="<?php echo ($autoplay == 'yes' ? '1' : '0'); ?>" 
        data-loop="<?php echo ($loop == 'yes' ? '1' : '0'); ?>" 
        data-nav="<?php echo ($nav == 'yes' ? '1' : '0'); ?>" 
        data-dots="<?php echo ($dots == 'yes' ? '1' : '0'); ?>"
        
        data-itemxxl="<?php echo esc_attr($items_xxl_col); ?>"
        data-itemxl="<?php echo esc_attr($items_xl_col); ?>"
        data-itemlg="<?php echo esc_attr($items_lg_col); ?>"
        data-itemmd="<?php echo esc_attr($items_md_col); ?>"
        data-itemsm="<?php echo esc_attr($items_sm_col); ?>" 
        data-gapping="<?php echo esc_attr($gapping); ?>"
        <?php echo esc_attr($animAttr);?>
    >
    <!-- testimonialSlider01 -->
        <?php if($tst_style == 2): ?>
        <div class="testimonialCarousel02 owl-carousel">
            <?php if(!empty($testimony_list)): 
                foreach($testimony_list as $list): 

                    $quote_image        = (isset($list['quote_image']['url']) && $list['quote_image']['url'] !='') ? $list['quote_image']['url'] : '';
                    $tst_quote_content  = (isset($list['tst_quote_content']) && $list['tst_quote_content'] !='') ? $list['tst_quote_content'] : '';
                    $tst_aut_logo       = (isset($list['tst_aut_logo']['url']) && $list['tst_aut_logo']['url'] !='') ? $list['tst_aut_logo']['url'] : '';
                    $tst_aut_title      = (isset($list['tst_aut_title']) && $list['tst_aut_title'] !='') ? $list['tst_aut_title'] : '';
                    $tst_aut_desig      = (isset($list['tst_aut_desig']) && $list['tst_aut_desig'] !='') ? $list['tst_aut_desig'] : '';
                
                ?>
                <div class="testimonialItem01">
                    <div class="tsAuthorMeta">
                        <?php if(!empty($quote_image)): ?>
                            <img class="tsTitle" src="<?php echo esc_url($quote_image); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                        <?php endif;?>
                    </div>
                    <p><?php echo logisfare_kses($tst_quote_content); ?></p>
                    <div class="tsAuthor02">
                        <?php if(!empty($tst_aut_logo)) : ?>
                            <img src="<?php echo esc_url($tst_aut_logo); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                        <?php endif; ?>
                        <?php if(!empty($tst_aut_title)): ?>
                            <h4><?php echo esc_html($tst_aut_title); ?></h4>
                        <?php endif; ?>
                        <?php if(!empty($tst_aut_desig)): ?>
                            <span><?php echo esc_html($tst_aut_desig); ?></span>
                        <?php endif;?>
                    </div>
                </div>
            <?php  endforeach; endif;?>
        </div>
        <?php else: ?>
        <div class="testimonialCarousel01 owl-carousel">
            <?php if(!empty($testimony_list)): 
                foreach($testimony_list as $list): 

                    $quote_image        = (isset($list['quote_image']['url']) && $list['quote_image']['url'] !='') ? $list['quote_image']['url'] : '';
                    $tst_quote_content  = (isset($list['tst_quote_content']) && $list['tst_quote_content'] !='') ? $list['tst_quote_content'] : '';
                    $tst_aut_logo       = (isset($list['tst_aut_logo']['url']) && $list['tst_aut_logo']['url'] !='') ? $list['tst_aut_logo']['url'] : '';
                    $tst_aut_title      = (isset($list['tst_aut_title']) && $list['tst_aut_title'] !='') ? $list['tst_aut_title'] : '';
                    $tst_aut_desig      = (isset($list['tst_aut_desig']) && $list['tst_aut_desig'] !='') ? $list['tst_aut_desig'] : '';
                
                ?>
            <div class="tesItem01">
                <?php if(!empty($quote_image)): ?>
                    <img class="tsTitle" src="<?php echo esc_url($quote_image); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                <?php endif;?>
                <p><?php echo logisfare_kses($tst_quote_content); ?></p>
                <div class="tesAuthor">
                    <?php if(!empty($tst_aut_logo)) : ?>
                        <img src="<?php echo esc_url($tst_aut_logo); ?>" alt="<?php echo esc_attr(bloginfo('name')); ?>">
                    <?php endif; ?>
                    <?php if(!empty($tst_aut_title)): ?>
                        <h4><?php echo esc_html($tst_aut_title); ?></h4>
                    <?php endif; ?>
                    <?php if(!empty($tst_aut_desig)): ?>
                        <span><?php echo esc_html($tst_aut_desig); ?></span>
                    <?php endif;?>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
