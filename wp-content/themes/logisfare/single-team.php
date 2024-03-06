<?php
/**
 * The template for displaying all single posts
 */

get_header();
$customizer_ID = '_logisfare_customizer_options';

$team_single_is_banner      = tw_get_option($customizer_ID, 'team_single_is_banner', 1);
$team_single_banner_block   = tw_get_option($customizer_ID, 'team_single_banner_block', -1);
if(function_exists('logisfare_post_view_count')){ logisfare_post_view_count(get_the_ID()); }

if(logisfare_is_edited_by_elementor(get_the_ID())):
    ?>
    <section class="logisfareBlogPageViewer">
        <?php
            while(have_posts()):
                the_post();
                the_content();
            endwhile;
        ?>
    </section>
    <?php
else:
    if($team_single_is_banner == 1 && $team_single_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
        Themewar_Builder::render_template($team_single_banner_block);
    elseif($team_single_is_banner == 1 && ($team_single_banner_block < 0 || $team_single_banner_block == '')):
        get_template_part( 'template-parts/header/default', 'header' );
    endif;
endif;


    
get_footer();