<?php
add_action('rest_api_init', function () {
    register_rest_route('velorution-metz', '/email/', array(
        'methods' => ['POST', 'GET'],
        'callback' => function () {
			$ret = false;
			$email = $_POST['email'];
			if(!$email) {
				$email = $_GET['email'];
			}
            if ($email) {
                if ($u = get_user_by('email', $email)) {
						wp_new_user_notification( $u->ID, '', 'user');

                    $ret = new WP_Error('user_exists', 'Il semble que vous soyez déjà inscrit avec cette adresse e-mail', array('status' => 409, 'email' => $email));
                } else {
					$password = random_readable_pwd();
					if ($uid = wp_create_user($email, $password, $email)) {
						wp_new_user_notification( $u->ID, '', 'user');
						$ret = get_user_by('id', $uid);
					}
				}
            }

			return $ret;
        }
    ));
});
