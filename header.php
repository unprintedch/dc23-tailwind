<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>

	<div id="page" class="">

		<div class="fixed top-0 bottom-0 left-0 right-0 z-20 w-full h-full transition-all duration-500 ease-out bg-white opacity-0 pointer-events-none overlay"></div>

		<?php get_template_part('template-parts/offcanvas', 'menu') ?>

		<header class="fixed z-30 w-full py-4 transition-all duration-300 header">
			<div class="container flex items-center justify-end m-auto">
				<a href="<?php echo home_url(); ?>" class="mr-auto">
					<?php
					if (get_field('logo', 'option')) {
						$attachment_id = get_field('logo', 'option');
						echo wp_get_attachment_image($attachment_id, 'large', "", array("class" => "w-32"));
					} else {
						get_template_part('template-parts/logo', null);
					}
					?>
				</a>

				<?php wp_nav_menu(
					array(
						'container_id'    => 'primary',
						'container_class' => 'hidden lg:block',
						'menu_class'      => 'menu dropdown',
						'theme_location'  => 'primary',
						'li_class'        => '',
						'fallback_cb'     => false,
					)
				); ?>

				<div class="burger-menu lg:hidden">
					<span class="bg-primary"></span>
					<span class="bg-primary"></span>
					<span class="bg-primary"></span>
				</div>

			</div>
		</header>

		<div id="content" class="site-content">
			<main>