<?php

echo "NOOOOO";
var_dump($post);
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="card-content">
		<div class="media">
			<div class="media-content has-text-centered">
				<p class="title article-title"><?= $post->post_title; ?></p>
				<div class="tags has-addons level-item">
					<span class="tag is-rounded is-info">@VelorutionMetz</span>
					<!-- <span class="tag is-rounded">May 10, 202X</span> -->
				</div>
			</div>
		</div>
		<?php


		if (!is_search()) {
			get_template_part('template-parts/content/featured-image');
		}

		?>
		<div class="content article-body">



			<?php
			if (is_search() || !is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
				the_excerpt();
			} else {
				the_content(__('Continue reading', 'twentytwenty'));
			}
			?>
		</div>
	</div>
	</div>
	<!-- END ARTICLE -->


	<?php


	//		edit_post_link();


	// if ( is_single() ) {

	// 	get_template_part( 'template-parts/entry-author-bio' );

	// }
	?>

	<?php

	// if ( is_single() ) {

	// 	get_template_part( 'template-parts/navigation' );

	// }


	?>

</article>