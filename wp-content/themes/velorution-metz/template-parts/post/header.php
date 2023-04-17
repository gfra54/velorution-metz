<?php


?>

<header>

<?php
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
		}

	
		if ( has_excerpt() && is_singular() ) {
			?>

				<?php the_excerpt(); ?>
	
			<?php
		}

		?>

</header>
