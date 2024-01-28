<?php get_header(); ?>


<div class="container">

	<?php if (have_posts()) : ?>
		<div class="grid grid-cols-3 grid-rows-3 gap-6">
			<?php while (have_posts()) : the_post(); ?>

				<div class="p-6 border border-gray-100 rounded-lg bg-gray-50">
					<a href="<?php the_permalink(); ?>" >
						<h3><?php the_title(); ?></h3>
					</a>
					<p><?php the_excerpt() ?></p>
				</div>

			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer();