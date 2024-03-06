<?php
    /**
     * The template for displaying all pages
     */
    get_header();
    $customizer_ID = '_logisfare_customizer_options';

    $pages_is_banner = tw_get_option($customizer_ID, 'pages_is_banner', 1);
    $page_banner_block = tw_get_option($customizer_ID, 'page_banner_block', -1);
    if (function_exists('logisfare_post_view_count')) {logisfare_post_view_count(get_the_ID());}

    if (logisfare_is_edited_by_elementor(get_the_ID())):
    ?>
    <section class="logisfarePageViewer">
        <?php
            while (have_posts()):
                the_post();
                the_content();
            endwhile;
        ?>
    </section>
    <?php
        else:
            if ($pages_is_banner == 1 && $page_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
                Themewar_Builder::render_template($page_banner_block);
            elseif ($pages_is_banner == 1 && ($page_banner_block < 0 || $page_banner_block == '')):
                get_template_part('template-parts/header/default', 'header');
            endif;
        ?>
            <section class="blogDetails-section singlePageSection">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <?php
                                while (have_posts()):
                                    the_post();
                                    get_template_part('template-parts/post/content', 'page');
                                endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </section>
	<?php endif;
    get_footer();