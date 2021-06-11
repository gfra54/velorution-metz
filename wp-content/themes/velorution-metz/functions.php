<?php


wp_enqueue_style('velorution-metz-style', get_template_directory_uri() . '/css/showcase.css', array(), wp_get_theme()->get('Version'));
wp_enqueue_script('velorution-metz-script', get_template_directory_uri() . '/js/showcase.js', array(), wp_get_theme()->get('Version'), true);
add_theme_support('title-tag');


if (function_exists('acf_add_options_page')) {

    acf_add_options_page('Options');
}

add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );


add_action('init', function () {
    register_nav_menu('menu', __('Menu'));
});



function get_post_by_name(string $name, string $post_type = "post") {
    $query = new WP_Query([
        "post_type" => $post_type,
        "name" => $name
    ]);

    return $query->have_posts() ? reset($query->posts) : null;
}




add_action( 'init', function() {
    add_post_type_support( 'page', 'excerpt' );
});