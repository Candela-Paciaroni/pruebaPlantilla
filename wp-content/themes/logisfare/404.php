<?php

/**
 * The template for displaying 404 pages (not found)
 */
get_header();

$customizer_ID = '_logisfare_customizer_options';

$fof_is_banner          = tw_get_option($customizer_ID, 'fof_is_banner', 1);
$fof_is_banner_block    = tw_get_option($customizer_ID, 'fof_is_banner_block', -1);
$fof_is_content         = tw_get_option($customizer_ID, 'fof_is_content', 2);
$fof_is_content_block   = tw_get_option($customizer_ID, 'fof_is_content_block', 0);
$fof_contents           = tw_get_option($customizer_ID, 'fof_contents', esc_html__('The Link You Followed Probably Broken, or the page has been removed...', 'logisfare'));
$fof_hbtn_label         = tw_get_option($customizer_ID, 'fof_hbtn_label', esc_html__('Back To Home', 'logisfare'));

if ($fof_is_banner && $fof_is_banner_block > 0 && class_exists('THEMEWAR_Assistance')):
    Themewar_Builder::render_template($fof_is_banner_block);
elseif ($fof_is_banner && ($fof_is_banner_block == 0 || $fof_is_banner_block == '')):
    get_template_part('template-parts/header/default', 'header');
endif;

if ($fof_is_content && $fof_is_content_block > 0 && class_exists('THEMEWAR_Assistance')):
    Themewar_Builder::render_template($fof_is_content_block);
else:
?>
    <section class="foferrorSec">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="foferrorContent text-center">
                        <h2 data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="400">404</h2>
                        <p data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="450"><?php echo logisfare_kses($fof_contents); ?></p>
                        <span data-aos="zoom-in" data-aos-easing="linear" data-aos-duration="500" >
                            <a class="solidBTn logicBtn" href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html($fof_hbtn_label); ?></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif;

get_footer();
