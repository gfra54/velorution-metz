<?php

add_action('admin_head', function () {
    if (current_user_can('subscriber')) {
        global $_wp_admin_css_colors;
        $_wp_admin_css_colors = 0;
    }
});

function remove_core_updates(){

    global $wp_version;
    return (object) array(
        'last_checked' => time(),
        'version_checked' => $wp_version,
        );
}
add_filter('pre_site_transient_update_core', 'remove_core_updates');
add_filter('pre_site_transient_update_plugins', 'remove_core_updates');
add_filter('pre_site_transient_update_themes', 'remove_core_updates');


add_action('after_setup_theme', function () {
    if (current_user_can('subscriber')) {
        show_admin_bar(false);
    }
});
