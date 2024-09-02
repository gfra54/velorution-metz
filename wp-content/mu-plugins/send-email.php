<?php

add_action('init', function () {
    if (isset($_GET['send-email'])) {
        $dr = isset($_GET['dry-run']);
        $uid = $_GET['uid'] ?? false;

        $timestamp = strtotime('last fri of this month');
        $next_vr = date('d/m/Y', $timestamp);
        setlocale(LC_TIME, "fr_FR");
        $next_vr_fr = strftime("%A %d %B", $timestamp);

        $timestamp = strtotime('last fri of next month');
        $date_next = utf8_encode(strftime("%A %d %B %Y", $timestamp));


        $meta = 'vrm-email-sent-ok-' . $next_vr;
        if ($uid) {
            $users = [get_user_by('id', $uid)];
        } else {
            $users = get_users();
        }
        $cpt = 0;
        $sent = [];
        foreach ($users as $user) {
            $id = $user->ID;
            if ($uid || !get_field('non_optin', 'user_' . $id)) {
                if ($uid || !get_user_meta($id, $meta)) {

                    $email = [
                        'to' => $user->user_email,
                        'sujet' => 'Rendez-vous à la Vélorution Metz le ' . $next_vr_fr,
                        'content' => "<font face=sans-serif>Salut à tous,
                            <b>La prochaine Vélorution Metz aura lieu le " . $next_vr_fr . " !</b>
                            Nous vous invitons à nous rejoindre à 19h sur le parvis de la garde de Metz. 
                            Le temps que tout le monde arrive, le départ se fera aux alentours de 19h15. 
                                                        
                            <a href=https://velorution-metz.fr>Consultez notre site</a> ou envoyez un mail à <a href='mailto:contact@velorution-metz.fr'>contact@velorution-metz.fr</a> si vous voulez en savoir plus sur le mouvement.

                            A vendredi !</font>
                            <a href=https://velorution-metz.fr>velorution-metz.fr</a>
                            <a href=https://velorution-metz.fr><img src=https://velorution-metz.fr/wp-content/uploads/2022/10/logo-alpha-black.png width=100></a>
                            ps: si vous ne pouvez pas être présent pour cette vélorution, <b>sachez que le mois prochain la vélorution aura lieu le " . $date_next . ". À vos agendas</b> !
                        "
                    ];
                    if (!$dr) {
                        if (wp_mail($email['to'], $email['sujet'], $email['content'])) {
                            update_user_meta($id, $meta, true);
                        }
                    }
                    $sent[] = $email['to'];
                    $cpt++;
                }
            }
        }
        if ($dr) {
            echo 'Mode test<br>';
            if ($cpt) {
                $uri = str_replace('&dry-run', '', $_SERVER['REQUEST_URI']);
                echo '<a href="' . $uri . '">Valider le test et envoyer le mail à ' . $cpt . ' contacts</a>';
            }
        } else {
        }
        file_get_contents('https://eosus221qxlacqs.m.pipedream.net?' . $cpt);
        echo '<p>'.$cpt . ' emails envoyés pour ' . count($users) . ' users</p>';
        echo '<ul>';
        foreach ($sent as $email) {
            echo '<li>' . $email;
        }
        echo '</ul>';
        exit;
        print_r($_GET);
        exit;
    }
});
