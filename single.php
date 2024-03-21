<?php get_header(); ?>

<div class="container pt-36">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="">

				<article id="post-<?php the_ID(); ?>" class="">
					<?php if (get_field("show_title")) : ?>
						<header class="mb-4 entry-header">
							<?php the_title(sprintf('<h1 class="mb-4 text-2xl font-extrabold leading-tight entry-title lg:text-5xl"><a href="%s" rel="bookmark" class="no-underline">', esc_url(get_permalink())), '</a></h1>'); ?>
							<div class="flex  gap-3">
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
						</header>
					<?php endif; ?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

</div>

<?php
get_footer();
