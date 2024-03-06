<?php get_header();
get_template_part('template-parts/header/default', 'header');

?>
<section <?php post_class('blocks_section'); ?>>
    <?php
    while (have_posts()){
        the_post();
        the_content();
    } ?>
</section>
<?php
get_footer();
