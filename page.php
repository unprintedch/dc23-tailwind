<?php get_header(); ?>

<div class="container">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
		<?php endwhile; ?>
	<?php endif; ?>

</div>

<?php
get_footer();