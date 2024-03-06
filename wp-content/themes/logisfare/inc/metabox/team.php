<?php if (!defined('ABSPATH')) {die;} // Cannot access directly.
if (class_exists('CSF')) {
    $section_id = '_logisfare_team_meta';
    CSF::createMetabox($section_id, array(
        'title' => esc_html__('Team Member Setting', 'logisfare'),
        'post_type' => 'team',
        'show_restore' => false,
        'theme' => 'light',
        'nav' => 'inline',

    ));

    // Template Page Banner
    CSF::createSection($section_id, array(
        'title' => esc_html__('Template Page Banner', 'logisfare'),
        'fields' => array(
            array(
                'id' => 'page_footer_style',
                'type' => 'select',
                'title' => esc_html__('Select Banner Block', 'logisfare'),
                'placeholder' => esc_html__('Select Banner Block', 'logisfare'),
                'desc' => esc_html__('This option only work if you using page templates for this page.', 'logisfare'),
                'options' => 'posts',
                'ajax' => true,
                'query_args' => array(
                    'post_type' => 'blocks',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                ),
            ),
        ),
    ));

    //Member Settings
    CSF::createSection($section_id, array(
        'title' => esc_html__('Member Setting', 'logisfare'),
        'fields' => array(
            array(
                'id'      => 'team_designation',
                'type'    => 'text',
                'title'   => esc_html__('Designation', 'logisfare'),
                'default' => esc_html__('Chief Officer', 'logisfare'),
                'placeholder' => esc_html__('Type your designation...', 'logisfare'),
            ),
            array(
                'type'    => 'notice',
                'style'   => 'warning',
                'content' => esc_html__('You can show max 4 Social icons in your team profile.','logisfare'),
            ),
            array(
                'id'     => 'team_social_list',
                'type'   => 'group',
                'title'  => esc_html__('Add Social Item', 'logisfare'),
                'fields' => array(
                    array(
                        'id'    => 'social_title',
                        'type'  => 'text',
                        'title' => esc_html__('Social Title', 'logisfare'),
                        'default' => esc_html__('Facebook', 'logisfare'),
                    ),
                    array(
                        'id'          => 'social_icon',
                        'type'        => 'select',
                        'title'       => 'Select Social Icon',
                        'placeholder' => 'Select a Social Icon',
                        'options'     => array(
                            'themewar_facebook-f'     => 'Facebook',
                            'themewar_twitter'        => 'Twitter',
                            'themewar_instagram'      => 'Instagram',
                            'themewar_linkedin-in'    => 'LinkedIn',
                            'themewar_behance'        => 'behance',
                            'themewar_dribbble'       => 'dribbble',
                            'themewar_skype'          => 'Skype',
                            'themewar_discord'        => 'discord',
                            'themewar_github-alt'     => 'GitHub',
                            'themewar_tiktok'         => 'tiktok',
                            'themewar_youtube'        => 'Youtube',
                            'themewar_tumblr'         => 'Tumblr',
                            'themewar_tumblr'         => 'Tumblr',
                            'themewar_square-vimeo'   => 'Vimeo',
                        ),
                        'default'     => 'themewar_facebook-f'
                    ),
                    array(
                        'id'    => 'social_link',
                        'type'  => 'link',
                        'title' => esc_html__('Social URL','logisfare'),
                    ),
                ),
            ),
        ),
    ));

}
