<?php
if (!defined('ABSPATH')) die('Direct access forbidden.');

class Themewar_Users_Meta_Hooks
{
    public function __construct()
    {
        add_action('show_user_profile', array($this, 'themewar_user_avater'));
        add_action('edit_user_profile', array($this, 'themewar_user_avater'));
        add_action('personal_options_update', array($this, 'themewar_user_avatar_src'));
        add_action('edit_user_profile_update', array($this, 'themewar_user_avatar_src'));
    }

    public function themewar_user_avater($user) {
        $user_av_ID = get_the_author_meta('user_av_ID', $user->ID);
        $userSocialProfile = maybe_unserialize(get_the_author_meta('userSocialProfile', $user->ID));
        ?>
        <table class="form-table userProfileTable">
            <thead>
                <tr class="userProfileHeading">
                    <th colspan="3"> <?php echo esc_html__('Logisfare User Settings', 'themewar') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><label><?php echo esc_html__('User Avatar', 'themewar'); ?></label></th>
                    <td>
                        <div class="userAvaterCustomWrap">
                            <div class="userAvatarCustom">
                                <img class="user_logo" src="<?php echo logisfare_attachment_url($user_av_ID, 150, 150) ?>" alt="<?php echo esc_attr__('User Avater', 'themewar'); ?>"/>
                            </div>
                            <input type="hidden" name="user_av_ID" value="<?php echo esc_attr($user_av_ID); ?>" id="user_av_ID"/>
                            <a href="#" class="useravatar_upload"><i class="dashicons dashicons-cloud-upload"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th><label><?php echo esc_html__('Social Profiles', 'themewar'); ?></label></th>
                    <td>
                        <div class="socialProfilesContainer">
                            <?php
                                if(!empty($userSocialProfile)):
                                    $i = 1;
                                    $social_profile = (isset($userSocialProfile['social_profile']) && !empty($userSocialProfile['social_profile']) ? $userSocialProfile['social_profile'] : [0 => '']);
                                    $social_url = (isset($userSocialProfile['social_url']) && !empty($userSocialProfile['social_url']) ? $userSocialProfile['social_url'] : [0 => '']);
                                    foreach($social_profile as $key => $profile):
                                        $url = (isset($social_url[$key]) && !empty($social_url[$key]) ? $social_url[$key] : '');
                                        ?>
                                        <div class="socialProfileRow">
                                            <select name="userSocialProfile[social_profile][]">
                                                <option value=""><?php echo esc_html__('Please Select', 'themewar') ?></option>
                                                <option <?php echo ($profile == 'Facebook' ? 'selected' : '') ?> value="Facebook">Facebook</option>
                                                <option <?php echo ($profile == 'Twitter' ? 'selected' : '') ?> value="Twitter">Twitter</option>
                                                <option <?php echo ($profile == 'LinkedIn' ? 'selected' : '') ?> value="LinkedIn">LinkedIn</option>
                                                <option <?php echo ($profile == 'Pinterest' ? 'selected' : '') ?> value="Pinterest">Pinterest</option>
                                                <option <?php echo ($profile == 'Google-Plus' ? 'selected' : '') ?> value="Google-Plus">Google Plus</option>
                                                <option <?php echo ($profile == 'Vimeo' ? 'selected' : '') ?> value="Vimeo">Vimeo</option>
                                                <option <?php echo ($profile == 'Dribbble' ? 'selected' : '') ?> value="Dribbble">Dribbble</option>
                                                <option <?php echo ($profile == 'Behance' ? 'selected' : '') ?> value="Behance">Behance</option>
                                                <option <?php echo ($profile == 'Instagram' ? 'selected' : '') ?> value="Instagram">Instagram</option>
                                                <option <?php echo ($profile == 'Youtube' ? 'selected' : '') ?> value="Youtube">Youtube</option>
                                                <option <?php echo ($profile == 'Tiktok' ? 'selected' : '') ?> value="Tiktok">Tiktok</option>
                                            </select>
                                            <input type="text" placeholder="https://facebook.com" name="userSocialProfile[social_url][]" class="regular-text" value="<?php echo $url; ?>"/>
                                            <?php if($i > 1): ?>
                                            <a href="javascript:void(0);" class="button button-danger removeProfile">Remove</a>
                                            <?php endif; ?>
                                        </div>
                                        <?php
                                        $i++;
                                    endforeach;
                                else:
                                    ?>
                                    <div class="socialProfileRow">
                                        <select name="userSocialProfile[social_profile][]">
                                            <option value=""><?php echo esc_html__('Please Select', 'themewar') ?></option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="Pinterest">Pinterest</option>
                                            <option value="Google-Plus">Google Plus</option>
                                            <option value="Vimeo">Vimeo</option>
                                            <option value="Dribbble">Dribbble</option>
                                            <option value="Behance">Behance</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Youtube">Youtube</option>
                                            <option value="Tiktok">Tiktok</option>
                                        </select>
                                        <input type="text" placeholder="https://facebook.com" name="userSocialProfile[social_url][]" class="regular-text" value=""/>
                                    </div>
                                    <?php
                                endif;
                            ?>
                        </div>
                        <a href="javascript:void(0);" class="button button-primary addMoreProfile">Add More</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    function themewar_user_avatar_src($user_id)
    {
        $userSocialProfile = (isset($_POST['userSocialProfile']) && !empty($_POST['userSocialProfile']) ? serialize($_POST['userSocialProfile']) : '');
        update_user_meta($user_id, 'user_av_ID', sanitize_text_field($_POST['user_av_ID']));
        update_user_meta($user_id, 'userSocialProfile', $userSocialProfile);
        
    }
}

?>