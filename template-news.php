<?php
/*
Template name: News
*/
?>

<?php get_header(); ?>

<div class="container">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('template-parts/content', get_post_format()); ?>
		<?php endwhile; ?>
	<?php endif;
	wp_reset_postdata();
	?>
</div>



<div class="container">
	<?php
	$args = array(
		'post_type' 		=> array('post'),
		'posts_per_page' 	=> -1,
	);
	$the_query = new WP_Query($args);
	?>
	<?php if ($the_query->have_posts()) : ?>
		<div class="flex flex-col gap-10">
			<?php while ($the_query->have_posts()) :
				$the_query->the_post(); ?>
				<a href="<?php echo get_permalink() ?>" class="no-underline	">
					<h2 class="mb-3"><?php the_title() ?></h2>
					<div class="flex gap-3">
						<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
						<?php
						// list posts tags
						$tags = get_the_tags();
						if ($tags) {
							foreach ($tags as $tag) {
								echo '<div class="text-sm text-gray-700">#' . $tag->name . '</div>';
							}
						}
						?>
					</div>
					<p><?php the_excerpt() ?></p>
					<?php
					// display post thumbnail if exists
					if (has_post_thumbnail()) {
						the_post_thumbnail();
					}
					?>
				</a>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>

<?php
get_footer();
