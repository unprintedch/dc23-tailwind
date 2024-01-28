<?php get_header(); ?>

	<div class="container">

		<h1 class="archive-title"><?php _e( 'Search Results for:', 'tm21' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_title(); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</div>

<?php
get_footer();

