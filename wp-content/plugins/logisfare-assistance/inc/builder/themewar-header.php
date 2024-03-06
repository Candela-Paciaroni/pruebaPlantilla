<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php wp_head();?>
</head>
<body <?php body_class();?> >
<?php wp_body_open();?>
<?php echo (function_exists('logisfare_preloader_creator') ? logisfare_preloader_creator() : ''); ?>
<!-- BEGIN: Header  -->
<?php do_action('themewar_before_header');?>
<div class="themewar-header-content">
    <?php
$header_style = tw_get_option('_logisfare_customizer_options', 'header_style', '');
if (is_page() && class_exists('CSF')) {
    $page_is_settings = tw_get_post_meta(get_the_ID(), '_logisfare_page_meta', 'page_header_enabled', 2);
    if ($page_is_settings == 1) {
        $header_style = tw_get_post_meta(get_the_ID(), '_logisfare_page_meta', 'page_header_style', -1);
    }
}
if ($header_style > 0 && $header_style != '') {
    $header = Themewar_Builder::render_template($header_style);
}
?>
</div>
<?php do_action('themewar_after_header');?>