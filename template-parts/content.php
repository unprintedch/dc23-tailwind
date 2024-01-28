<article id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>
	<?php if (get_field("show_title")) : ?>
		<header class="mb-4 entry-header">
			<?php the_title(sprintf('<h2 class="mb-1 text-2xl font-extrabold leading-tight entry-title md:text-3xl"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
			<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
		</header>
	<?php endif; ?>
	<?php if (is_search() || is_archive()) : ?>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>

	<?php else : ?>

		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content(
				sprintf(
					__('Continue reading %s', 'tm21'),
					the_title('<span class="screen-reader-text">"', '"</span>', false)
				)
			);

			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'tm21') . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'tm21') . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
			?>
		</div>

	<?php endif; ?>

</article>