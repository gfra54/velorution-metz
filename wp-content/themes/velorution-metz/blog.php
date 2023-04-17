<?php
/*
Template Name: Posts
*/

wp_enqueue_script('velorution-metz-blog-script', get_template_directory_uri() . '/js/blog.js', array(), wp_get_theme()->get('Version'), true);
wp_enqueue_style('velorution-metz-blog-style', get_template_directory_uri() . '/css/blog.css', array(), wp_get_theme()->get('Version'));

get_header();
get_template_part('template-parts/blog/header');

$posts = wp_get_recent_posts();
?>



<section class="hero is-info is-medium is-bold">
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, <br>sed eiusmod tempor incididunt ut labore et dolore magna aliqua</h1>
        </div>
    </div>
</section>


<div class="container">

    <!-- START ARTICLE FEED -->
    <section class="articles">
        <div class="column is-8 is-offset-2">

            <?php if ($posts) {

                $i = 0;
                foreach ($posts as $post) {
                    $i++;
                    if ($i > 1) {
                        echo '<hr aria-hidden="true" />';
                    }
                    get_template_part('template-parts/post/content');
                    // , get_post_type());
                }
            } elseif (is_search()) { ?>
                <!-- .no-search-results -->
            <?php } ?>

        </div>
    </section>
</div>

<?php
get_template_part('template-parts/blog/footer');

get_footer();
