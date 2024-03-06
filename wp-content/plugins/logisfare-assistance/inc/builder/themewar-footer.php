
<!-- BEGIN: Footer  -->
<?php do_action('themewar_before_footer'); 
?>
<div class="themewar-footer-content">
    <?php
    $footer_style = tw_get_option('_logisfare_customizer_options', 'footer_style', '');

    if (is_page() && class_exists('CSF')) {
        $page_is_settings    = tw_get_post_meta(get_the_ID(), '_logisfare_page_meta', 'page_footer_enabled', 2);
        if ($page_is_settings == 1 && $footer_style != '') {
            $footer_style = tw_get_post_meta(get_the_ID(),'_logisfare_page_meta', 'page_footer_style', -1);
        }
    }
    if ($footer_style > 0) {
        $footer = Themewar_Builder::render_template($footer_style);
    }
    ?>
</div>
<?php do_action('themewar_after_footer'); ?>
<!-- END: Footer  -->

<?php
    $footer_is_backtotop = tw_get_option('_logisfare_customizer_options', 'footer_is_backtotop', 1);
    if($footer_is_backtotop):
    ?>
    <?php if($footer_is_backtotop): ?>
        <!-- BEGIN: BACK TO TOP  -->
        <a href="javascript:void(0);" id="backtotop"><i class="logisfare-arrow_next"></i></a>
        <!-- END: BACK TO TOP  -->
    <?php endif; ?>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>