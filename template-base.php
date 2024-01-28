<?php
/*
Template name: Base
*/
?>


<?php get_header(); ?>
<div class="container">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<?php
				$args = array(
					'post_type' 		=> array( 'post' ),
					'posts_per_page' 	=> -1,
					'facetwp' 			=> true
				);
				$the_query = new WP_Query( $args );
			?>
			<?php if ( $the_query->have_posts() ) { ?>
				<div class="flex flex-wrap gap-10 p-4 border-2 border-gray-400">
					<div>
						<h4>Checkboxes</h4>
						<?php echo facetwp_display('facet','cat_checkboxes'); ?>
					</div>
					<div class="flex flex-col gap-y-4">
						<h4>Select</h4>
						<?php echo facetwp_display('facet','cat_select'); ?>
						<select name="" id="">
							<option value="">Normal select</option>
							<option value="option_1">Option 1</option>
							<option value="option_2">Option 2</option>
							<option value="option_3">Option 3</option>
						</select>
					</div>
					<div>
						<h4>FSelect</h4>
						<?php echo facetwp_display('facet','cat_fselect'); ?>
					</div>
					<div>
						<h4>Radios</h4>
						<?php echo facetwp_display('facet','cat_radio'); ?>
					</div>
					<div>
						<h4>Dates</h4>
						<?php echo facetwp_display('facet','cat_dates'); ?>
					</div>
					<div>
						<h4>Search</h4>
						<?php echo facetwp_display('facet','search'); ?>
					</div>
					<div>
						<?php echo facetwp_display('facet','reset'); ?>
					</div>
				</div>
				<div class="grid grid-cols-4 gap-4 mt-10">
					<?php while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
						<a href="#" class="p-4 border border-gray-300">
							<h3><?php the_title() ?></h3>
						</a>
					<?php } ?>
				</div>
				<?php } wp_reset_postdata(); ?>

			<?php get_template_part('template-parts/content', get_post_format()); ?>

		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php
get_footer();
