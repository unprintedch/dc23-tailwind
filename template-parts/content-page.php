<?php
$show_title = get_field( 'show_title' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

	<?php if( $show_title ) : ?>
		<header class="entry-header">
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

</article>