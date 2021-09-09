<?php
add_action('rest_api_init', function () {
    register_rest_route('velorution-metz', '/email/', array(
        'methods' => ['POST', 'GET'],
        'callback' => function () {

            if ($email = $_POST['email']) {
                if ($u = get_user_by('email', $email)) {
                    return new WP_Error('user_exists', 'Il semble que vous soyez déjà inscrit avec cette adresse e-mail', array('status' => 409, 'email' => $email));
                }
                $password = random_readable_pwd();
                if ($uid = wp_create_user($email, $password, $email)) {
                    wp_new_user_notification( $uid);
                    return get_user_by('id', $uid);
                }
            }
        }
    ));
});
