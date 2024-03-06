<?php
    /**
     * The template for displaying the footer
     */
    
    $customizer_ID = '_logisfare_customizer_options';

    $copy_site_info         = tw_get_option($customizer_ID, 'copy_site_info', 'Copyright &copy; ' . date('Y') . esc_html__(' All Rights Reserved.', 'logisfare'));
    $footer_is_backtotop    = tw_get_option($customizer_ID, 'footer_is_backtotop', 1);
?>

    <!-- BEGIN: SiteInfo Section -->
    <section class="siteInfoSection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="siteInfo"><?php echo logisfare_kses($copy_site_info); ?></div>
                </div>
            </div>
        </div>
    </section>
    <!-- END: SiteInfo Section -->

</div>
<!-- END: Scrollbar content -->


<!-- BEGIN: Back to Top  -->
<?php if ($footer_is_backtotop): ?>
<a href="javascript:void(0);" id="backtotop"><i class="logisfare-arrow_next"></i></a>
<?php endif;?>
<!-- END: Back To Top -->


<?php wp_footer();?>
</body>
</html>