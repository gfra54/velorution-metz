<?php
foreach (glob(__DIR__ . '/actions/*.php') as $action) {
    include $action;
}
add_theme_support('title-tag');

wp_enqueue_style('velorution-metz-common-style', get_template_directory_uri() . '/css/common.css', array(), wp_get_theme()->get('Version'));


if (function_exists('acf_add_options_page')) {

    acf_add_options_page('Options');
}

add_theme_support('post-thumbnails', array('post', 'page'));


add_action('init', function () {
    register_nav_menu('menu', __('Menu'));
});

add_filter('the_content', function($content) {
    $i = 6;
    while($i > 0){
        $pattern = "/<h$i(.*?)>/i";
        $replacement = "<h$i$1 class=\"title mt-2 is-" . ($i + 1) . "\">";
        $content = preg_replace($pattern, $replacement, $content);
        $i--;
    }
    return $content;
});


function get_post_by_name(string $name, string $post_type = "post")
{
    $query = new WP_Query([
        "post_type" => $post_type,
        "name" => $name
    ]);

    return $query->have_posts() ? reset($query->posts) : null;
}


add_action('init', function () {
    add_post_type_support('page', 'excerpt');
});


function random_readable_pwd($length=10){

    // the wordlist from which the password gets generated
    // (change them as you like)
    $words = 'AbbyMallard,AbigailGabble,AbisMal,Abu,Adella,TheAgent,AgentWendyPleakley,Akela,AltheAlligator';

    $phonetic = array("a"=>"alfa","b"=>"bravo","c"=>"charlie","d"=>"delta","e"=>"echo","f"=>"foxtrot","g"=>"golf","h"=>"hotel","i"=>"india","j"=>"juliett","k"=>"kilo","l"=>"lima","m"=>"mike","n"=>"november","o"=>"oscar","p"=>"papa","q"=>"quebec","r"=>"romeo","s"=>"sierra","t"=>"tango","u"=>"uniform","v"=>"victor","w"=>"whisky","x"=>"x-ray","y"=>"yankee","z"=>"zulu");

   // Split by ",":
    $words = explode(',', $words);
    if (count($words) == 0){ die('Wordlist is empty!'); }

    // Add words while password is smaller than the given length
    $pwd = '';
    while (strlen($pwd) < $length){
        $r = mt_rand(0, count($words)-1);
        $pwd .= $words[$r];
    }

    $num = mt_rand(1, 99);
     if ($length > 2){
        $pwd = substr($pwd,0,$length-strlen($num)).$num;
    } else {
        $pwd = substr($pwd, 0, $length);
    }

   $pass_length = strlen($pwd);
   $random_position = rand(0,$pass_length);

   $syms = "!@#%^*()-?";
   $int = rand(0,9);
   $rand_char = $syms[$int];

   $pwd = substr_replace($pwd, $rand_char, $random_position, 0);

    return $pwd;
}


function me($var) {
	$ret = print_r($var,true);
		echo '<pre>'.htmlspecialchars($ret).'</pre>';

	exit;
}